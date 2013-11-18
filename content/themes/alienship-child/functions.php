<?php

/*

// deregister styles for new registry request page, per http://www.advancedcustomfields.com/resources/tutorials/creating-a-front-end-form/

add_action( 'wp_print_styles', 'my_deregister_styles', 100 );
 
function my_deregister_styles() {
	wp_deregister_style( 'wp-admin' );
}

// create hooks for new post form, modified, per http://www.advancedcustomfields.com/resources/tutorials/using-acf_form-to-create-a-new-post/

function my_pre_save_post( $post_id )
{
    // check if this is to be a new post
    if( $post_id != 'new' )
    {
        return $post_id;
    }
 
 	// set title for new post
 	// $newtitle = the_field('requester');

    // Create a new post
    $post = array(
        'post_status' => 'draft',
        'post_title' => 'New Request',
        'post_type' => 'requests',
        'post_content' => '<p>Estimated cost: <strong>$[acf field="est_cost"] </strong></p><p>Estimated time commitment: <strong>[acf field="est_time"] hour(s) </strong></p><p>[acf field="request_description"]</p><p><a href="#" class="stripe-connect light-blue"><span>Volunteer</span></a> [ssd amount="3500"]</p>'
    );  
 
    // insert the post
    $post_id = wp_insert_post( $post ); 
 
    // update $_POST['return']
    // $_POST['return'] = add_query_arg( array('post_id' => $post_id), $_POST['return'] );    
 
    // return the new ID
    return $post_id;

}

add_filter('acf/pre_save_post' , 'my_pre_save_post' ); */

// remove rich post editor 
add_filter('user_can_richedit' , create_function('' , 'return false;') , 50); 

?>