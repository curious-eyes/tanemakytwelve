<?php
function custom_user_contactmethods( $user_contactmethods ) {
    return array(
        'twitter'  => 'twitter',
        'facebook' => 'facebook',
        'google'   => 'google+',
    );
}
add_filter( 'user_contactmethods', 'custom_user_contactmethods' );
