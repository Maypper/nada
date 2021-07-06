<?php

function splitter_extra_user_profile_fields( $user ) {
	$is_developer = get_the_author_meta( 'is_developer', $user->ID );
	?>
    <h3><?php _e( "Extra profile information", "blank" ); ?></h3>

    <table class="form-table">
        <tr>
            <th><label for="special_code"><?php _e( "Special code" ); ?></label></th>
            <td>
                <input type="text" name="special_code" id="special_code"
                       value="<?php echo esc_attr( get_the_author_meta( 'special_code', $user->ID ) ); ?>"
                       class="regular-text"/><br/>
                <span class="description"><?php _e( "Please enter your special code" ); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="is_developer"><?php _e( "Is developer?" ); ?></label></th>
            <td>
                <input type="checkbox" name="is_developer" id="is_developer" value="yes"
                       class="regular-checkbox" <?php echo $is_developer ? 'checked="checked"' : ''; ?>/>
            </td>
        </tr>
    </table>
	<?php
}

add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );


function splitter_save_profile_fields( $user_id ) {
	if ( ! current_user_can( 'edit_user', $user_id ) ) {
		return false;
	}
	update_user_meta( $user_id, 'special_code', sanitize_text_field( $_POST['special_code'] ) );
	update_user_meta( $user_id, 'is_developer', sanitize_text_field( $_POST['is_developer'] ) );

	return true;
}

add_action( 'personal_options_update', 'splitter_save_profile_fields' );
add_action( 'edit_user_profile_update', 'splitter_save_profile_fields' );


if ( wp_doing_ajax() ) {
	add_action( 'wp_ajax_login', 'splitter_ajax_login' );
	add_action( 'wp_ajax_nopriv_login', 'splitter_ajax_login' );

	add_action( 'wp_ajax_register', 'splitter_ajax_register' );
	add_action( 'wp_ajax_nopriv_register', 'splitter_ajax_register' );
}

function splitter_ajax_login() {
	wp_logout();
	check_ajax_referer( 'login', 'nonce' );
	$user = wp_signon( array(
		'user_login'    => sanitize_user( $_POST['user_login'] ),
		'user_password' => $_POST['user_password'],
		'remember'      => $_POST['remember'],
	) );
	if ( is_wp_error( $user ) ) {
		echo $user->get_error_message();
	} else {
		echo 'true';
	}
	wp_die();
}

function splitter_ajax_register() {
	check_ajax_referer( 'register', 'nonce' );
	if ( ! get_option( 'users_can_register' ) ) {
		echo 'Sorry, registration is temporarily unavailable';
		wp_die();
	}

	$first_name = sanitize_user( $_POST['first_name'] );
	$last_name  = sanitize_user( $_POST['last_name'] );
	$user_email = sanitize_email( $_POST['email'] );
	$user_name  = generate_unique_username( strtolower( sprintf( "%s%s", $first_name, $last_name ) ), '' );


	$user_id = wp_create_user( $user_name, $_POST['password'], $user_email );

	if ( is_wp_error( $user_id ) ) {
		echo $user_id->get_error_message();
	} else {
		wp_logout();

		$user = wp_signon( array(
			'user_login'    => $user_email,
			'user_password' => $_POST['password'],
			'remember'      => true,
		) );
		if ( is_wp_error( $user ) ) {
			echo $user->get_error_message();
		} else {
			echo 'true';
		}
	}
	wp_die();
}


function generate_unique_username( $username, $index ) {

	if ( $index ) {
		$new_username = sprintf( '%s-%s', $username, $index );
	} else {
		$new_username = $username;
	}

	if ( ! username_exists( $new_username ) ) {
		return $new_username;
	} else {
		$index = mt_rand( 1, 99999 );

		return generate_unique_username( $username, $index );
	}
}
