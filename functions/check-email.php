<?php
//echo $_SERVER['DOCUMENT_ROOT'];
//require_once( $_SERVER['DOCUMENT_ROOT'] . '/selfmade/wp-config.php' );
require_once( $_POST['site_url'] . '/wp-config.php' );
global $wpdb;
//SELECT * FROM `wp_sm_users` WHERE `user_email` = 'mostak.shahid@gmail.com'
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}users");
var_dump($results);
//if (filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {    
//    if($_POST['user_email'] != 'mostak.shahid@gmail.com')
//    {
//        echo "true";  //good to register
//    }
//    else
//    {
//        echo 0; //already registered
//    }
//}
//else
//{
//    echo 0; //invalid post var
//}

