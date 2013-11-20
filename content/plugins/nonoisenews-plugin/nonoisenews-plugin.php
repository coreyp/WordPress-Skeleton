<?php
/*
Plugin Name: No Noise News plugin
Description: Custom functions for sites across NNN network
*/

// redirect users on login to primary blog, per http://wordpress.stackexchange.com/questions/100801/auto-redirect-after-login 

function primary_login_redirect( $redirect_to, $request_redirect_to, $user ) {
    if ( is_a( $user, 'WP_User' ) ) {
        if ( ! is_super_admin( $user->ID ) ) {
            $user_info = get_userdata( $user->ID );
            if ( $user_info->primary_blog )
                $primary_url = get_blogaddress_by_id( $user_info->primary_blog ) . '/';
        } else { // super admins
            $primary_url = network_admin_url( 'sites.php' );
        }
        if ( $primary_url ) {
            wp_redirect( $primary_url );
            die();
        }
    }
    return $redirect_to;
} 
add_filter( 'login_redirect', 'primary_login_redirect', 100, 3 );

// remove admin bar for all logged in users except admin
add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
if (!current_user_can('manage_network') && !is_admin()) {
  show_admin_bar(false);
}
}

// remove rich post editor 
add_filter('user_can_richedit' , create_function('' , 'return false;') , 50); 

?>