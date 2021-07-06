jQuery( function( $ ){
    $( '.helpful_button' ).click(function(e){
        e.preventDefault();
        var this_button = $(this);
        $.ajax({
            url: admin_ajax.ajax_url,
            type: 'POST',
            dataType: 'json',
            data: {
                action : 'ajaxtest',
                _ajax_nonce : admin_ajax.check_nonce,
                value : $(this).data('value'),
                comment_id : $(this).data('id'),
                meta_value : $(this).data('meta_value'),
            },
            beforeSend: function () {
                $(this_button).siblings( '.helpful_button' ).each(function () {
                    $(this).attr('disabled', 1);
                })
            },
            success: function( data ) {
                $(this_button).siblings( '.helpful_button' ).each(function () {
                    $(this).removeAttr('disabled');
                });
                $(this_button).attr('disabled',1);
                $(this_button).siblings( '.helpful_button').not(this_button).next('p').text(data.old_meta);
                $(this_button).next('p').text(data.meta_value);
            },
            error: function (err) {
                alert(err);
            }
        });
    });
    var button = $( '#loadmore_btn' ),
        paged = $(button).data('paged'),
        maxPages = $(button).data('max-pages');
    button.click(function(e){
        e.preventDefault();
        $.ajax({
            url: admin_ajax.ajax_url,
            type: 'POST',
            data: {
                paged : paged,
                action : 'loadmore',
                maxPages : maxPages,
                postID : $('body').data('post-id')
            },
            error : function (err) {
                alert(err);
            },
            beforeSend : function( xhr ) {
                button.text( 'Loading...' );
            },
            success : function( data ){

                paged++; // инкремент номера страницы
                button.before( data );
                button.text( 'SHOW MORE REVIEWS' );

                // если последняя страница, то удаляем кнопку
                if( !data ) {
                    button.remove();
                }

            }
        })
    });
});