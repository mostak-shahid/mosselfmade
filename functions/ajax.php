<?php
/* AJAX action callback */
add_action( 'wp_ajax_reset_prl', 'reset_prl_ajax_callback' );
add_action( 'wp_ajax_nopriv_reset_prl', 'reset_prl_ajax_callback' );
/* Ajax Callback */
function reset_prl_ajax_callback () {
    $post_id = $_GET['post_id'];
    delete_post_meta($post_id, '_mosselfmade_page_section_layout');
    //http://tippproperty.belocal.today/wp-admin/post.php?post=16&action=edit
    $location = admin_url('/') . 'post.php?post=' . $post_id . '&action=edit';
    wp_redirect( $location, $status = 302 );
    exit; // required. to end AJAX request.
}
/* AJAX action callback */
add_action( 'wp_ajax_dummy', 'dummy_ajax_callback' );
add_action( 'wp_ajax_nopriv_dummy', 'dummy_ajax_callback' );
/* Ajax Callback */
function dummy_ajax_callback () {
    $post_id = $_POST['product'];
    $output = array();
	echo json_encode($output);
    exit; // required. to end AJAX request.
}
/* AJAX action callback */
add_action( 'wp_ajax_register_email_check', 'register_email_check_ajax_callback' );
add_action( 'wp_ajax_nopriv_register_email_check', 'register_email_check_ajax_callback' );
/* Ajax Callback */
function register_email_check_ajax_callback () {
    global $wpdb;
    if (filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) { 
        $results = $wpdb->get_var( "SELECT COUNT(*) FROM {$wpdb->prefix}users WHERE `user_email` = '{$_POST['user_email']}'");
        if($results){            
            echo json_encode(0); //already registered
        }
        else
        {
            echo "true";  //good to register
        }
    }
    else
    {
        echo json_encode(0); //invalid post var
    }
    
	//echo json_encode($output);
	//echo json_encode($results);
    exit; // required. to end AJAX request.
}
/* AJAX action callback */
add_action( 'wp_ajax_mos_user_register', 'mos_user_register_ajax_callback' );
add_action( 'wp_ajax_nopriv_mos_user_register', 'mos_user_register_ajax_callback' );
/* Ajax Callback */
function mos_user_register_ajax_callback () {
    $data = array();
    $user_id = '';
//    $data = $_POST['data'];
    parse_str($_POST['data'], $data);
//    $output = array();
    
    //add_action( 'init', function () {  
        $username = $data['user_email'];
        $password = $data['password'];
        $email_address = $data['user_email'];        
        $user = get_user_by('login', $username);
        /*
        if ( $user AND $user->roles[0] != 'administrator') {
            require_once(ABSPATH.'wp-admin/includes/user.php' );
            wp_delete_user( $user->ID );
        }
        */
        if (!username_exists($username)){
            $user_id = wp_create_user($username,$password,$email_address);
            wp_update_user(array('ID' =>$user_id,'display_name'=>$data['full_name']));
            
            update_user_meta($user_id,'first_name',$data['full_name']);
            update_user_meta($user_id,'full_name',$data['full_name']);
            //$user = new WP_User( $user_id );
            //$user->set_role( 'administrator' );
        }	
    //});
    
	echo json_encode($user_id);
    exit; // required. to end AJAX request.
}