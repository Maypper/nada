<?php
add_action( 'wp_ajax_ajaxtest', 'ajax_test' );


function ajax_test() {
	check_ajax_referer( 'comment_meta_update' );
	$comment_id = absint($_REQUEST['comment_id']);
	if ($_REQUEST['value'] === '+') {
		$meta_key = 'helpful_yes';
	} elseif ($_REQUEST['value'] === '-') {
		$meta_key = 'helpful_no';
	} else {
		wp_die('hi');
	}
	$meta_value = get_comment_meta($comment_id, $meta_key,true);

	$json = array('old_meta' => $meta_value);

	$current_user = wp_get_current_user();
	$user_votes = get_comment_meta($comment_id, 'user_votes', true);
	$user_vote = $user_votes[$current_user->ID] ?? false;
	if ($_REQUEST['value'] == $user_vote) {
		echo $meta_value;
		wp_die();
	}   elseif ($_REQUEST['value'] != $user_vote && false != $user_vote) {
		$old_meta_key = $meta_key == 'helpful_yes' ? 'helpful_no' : 'helpful_yes';
		$old_meta_value = get_comment_meta($comment_id, $old_meta_key,true);
		update_comment_meta( $comment_id, $old_meta_key,$old_meta_value - 1 );
		$json['old_meta'] = $old_meta_value - 1;
	}

	if (is_int(intval($meta_value))) {
		update_comment_meta( $comment_id, $meta_key,$meta_value + 1 );
		$user_votes[$current_user->ID] = $_REQUEST['value'];
		update_comment_meta($comment_id, 'user_votes', $user_votes);
		$json['meta_value'] = $meta_value + 1;
		echo json_encode($json);
	}
	wp_die();
}
add_action( 'wp_ajax_loadmore', 'true_loadmore' );
add_action( 'wp_ajax_nopriv_loadmore', 'true_loadmore' );

function true_loadmore() {
	global $product, $wp_query;

	$max_pages = $_POST['maxPages'];
	$paged = ! empty( $_POST[ 'paged' ] ) ? $_POST[ 'paged' ] : 1;
	$paged++;
	$wp_query = new WP_Query(array(
		'p' => $_POST['postID'],
		'post_type' => 'any'
	));
	set_query_var('cpage', $paged);
	if ($wp_query->have_posts()) {
		while ( $wp_query->have_posts() ) {
			$wp_query->the_post();
			if ($paged > $max_pages) {
				wp_die();
			}
			comments_template();
		}
	}

	wp_die();

}