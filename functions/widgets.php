<?php
//Add widgets area
function mosselfmade_widgets_init(){
	register_sidebar(array(
		'id' => 'sidebar',
		'name' => __('Sidebar for Post', 'mosselfmade'),
		//'description' => __('Add widgets here to appear in your Left SideBar', 'mosselfmade'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		'after_widget' => '</div>'
	));	
	register_sidebar(array(
		'id' => 'sidebar-page',
		'name' => __('Sidebar for Page', 'mosselfmade'),
		//'description' => __('Add widgets here to appear in your Left SideBar', 'mosselfmade'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		'after_widget' => '</div>'
	));
	register_sidebar(array(
		'id' => 'sidebar-shop',
		'name' => __('Sidebar for Shop', 'mosselfmade'),
		//'description' => __('Add widgets here to appear in your Left SideBar', 'mosselfmade'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		'after_widget' => '</div>'
	));	
	register_sidebar(array(
		'id' => 'footer_1',
		'name' => __('Footer Widget 1', 'mosselfmade'),
		'description' => __('Add widgets here to appear in your Footer Widget 1', 'mosselfmade'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
		'after_widget' => '</div>'
	));	
	register_sidebar(array(
		'id' => 'footer_2',
		'name' => __('Footer Widget 2', 'mosselfmade'),
		'description' => __('Add widgets here to appear in your Footer Widget 2', 'mosselfmade'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
		'after_widget' => '</div>'
	));	
	register_sidebar(array(
		'id' => 'footer_3',
		'name' => __('Footer Widget 3', 'mosselfmade'),
		'description' => __('Add widgets here to appear in your Footer Widget 3', 'mosselfmade'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
		'after_widget' => '</div>'
	));	
	register_sidebar(array(
		'id' => 'footer_4',
		'name' => __('Footer Widget 4', 'mosselfmade'),
		'description' => __('Add widgets here to appear in your Footer Widget 4', 'mosselfmade'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
		'after_widget' => '</div>'
	));	
	register_sidebar(array(
		'id' => 'footer_5',
		'name' => __('Footer Widget 5', 'mosselfmade'),
		'description' => __('Add widgets here to appear in your Footer Widget 4', 'mosselfmade'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
		'after_widget' => '</div>'
	));		

}
add_action('widgets_init', 'mosselfmade_widgets_init');
