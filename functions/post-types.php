<?php
function mos_custom_post_types() {
	/**
	 * Post Type: Videos.
	 */
	$labels = [
		"name" => esc_html__( "Videos", "mosselfmade" ),
		"singular_name" => esc_html__( "Video", "mosselfmade" ),
	];
	$args = [
		"label" => esc_html__( "Videos", "mosselfmade" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "video", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];
	register_post_type( "video", $args );
	/**
	 * Post Type: Case Studies.
	 */
	$labels = [
		"name" => esc_html__( "Case Studies", "mosselfmade" ),
		"singular_name" => esc_html__( "Case Study", "mosselfmade" ),
	];
	$args = [
		"label" => esc_html__( "Case Studies", "mosselfmade" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "case-study", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];
	register_post_type( "case-study", $args );
}
add_action( 'init', 'mos_custom_post_types' );


function mos_custom_taxonomy() {
	/**
	 * Taxonomy: Categories.
	 */
	$labels = [
		"name" => esc_html__( "Categories", "mosselfmade" ),
		"singular_name" => esc_html__( "Category", "mosselfmade" ),
	];	
	$args = [
		"label" => esc_html__( "Categories", "mosselfmade" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'video_category', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "video_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "video_category", [ "video" ], $args );
	/**
	 * Taxonomy: Tags.
	 */
	$labels = [
		"name" => esc_html__( "Tags", "mosselfmade" ),
		"singular_name" => esc_html__( "Tag", "mosselfmade" ),
	];	
	$args = [
		"label" => esc_html__( "Tags", "mosselfmade" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'video_tag', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "video_tag",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "video_tag", [ "video" ], $args );
	/**
	 * Taxonomy: Categories.
	 */
	$labels = [
		"name" => esc_html__( "Categories", "mosselfmade" ),
		"singular_name" => esc_html__( "Category", "mosselfmade" ),
	];	
	$args = [
		"label" => esc_html__( "Categories", "mosselfmade" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'case-study-category', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "case-study-category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "case-study-category", [ "case-study" ], $args );
	/**
	 * Taxonomy: Tags.
	 */
	$labels = [
		"name" => esc_html__( "Tags", "mosselfmade" ),
		"singular_name" => esc_html__( "Tag", "mosselfmade" ),
	];	
	$args = [
		"label" => esc_html__( "Tags", "mosselfmade" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'case-study-tag', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "case-study-tag",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "case-study-tag", [ "case-study" ], $args );
}
add_action( 'init', 'mos_custom_taxonomy' );
add_action( 'after_switch_theme', 'flush_rewrite_rules' );
