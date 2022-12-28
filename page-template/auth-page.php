<?php /*Template Name: Auth Page Template*/ ?>
<?php
$redirectTo = (get_option( 'tml_dashboard_slug' ))?home_url(get_option( 'tml_dashboard_slug' )):home_url('/wp-admin/');
if ( is_user_logged_in() ){
    wp_redirect( $redirectTo ); 
    exit;
}
?>
<?php get_header() ?>
<?php the_content() ?>
<?php get_footer() ?>