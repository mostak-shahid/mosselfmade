<?php 
add_filter('manage_case-study_posts_columns', function($columns) {
    
//    var_dump($columns);
//    unset($columns['date']);    
    $column['cb'] = '<input type="checkbox" />';
    $column['title'] = 'Title';
    $column['case-study-category'] = 'Categories';
    $column['case-study-tag'] = 'Tags';
    $column['author'] = 'Author';
    $column['date'] = 'Date';

    return $column;
	//return array_merge($columns, ['case-study_category' => __('Categories', 'textdomain')]);
});
 
add_action('manage_case-study_posts_custom_column', function($column_key, $post_id) {
	if ($column_key == 'case-study-category') {
		$terms_string = '';        
        $term_obj_list = get_the_terms( $post_id, 'case-study-category' );
        $terms_string = ($term_obj_list)?join(', ', wp_list_pluck($term_obj_list, 'name')):'';        
        echo $terms_string;
	}
	if ($column_key == 'case-study-tag') {
		$terms_string = '';        
        $term_obj_list = get_the_terms( $post_id, 'case-study-tag' );
        $terms_string = ($term_obj_list)?join(', ', wp_list_pluck($term_obj_list, 'name')):'';        
        echo $terms_string;
	}
}, 10, 2);
add_filter('manage_video_posts_columns', function($columns) {
    
//    var_dump($columns);
//    unset($columns['date']);    
    $column['cb'] = '<input type="checkbox" />';
    $column['title'] = 'Title';
    $column['video_category'] = 'Categories';
    $column['video_tag'] = 'Tags';
    $column['author'] = 'Author';
    $column['date'] = 'Date';

    return $column;
	//return array_merge($columns, ['video_category' => __('Categories', 'textdomain')]);
});
 
add_action('manage_video_posts_custom_column', function($column_key, $post_id) {
	if ($column_key == 'video_category') {
		$terms_string = '';        
        $term_obj_list = get_the_terms( $post_id, 'video_category' );
        $terms_string = ($term_obj_list)?join(', ', wp_list_pluck($term_obj_list, 'name')):'';        
        echo $terms_string;
	}
	if ($column_key == 'video_tag') {
		$terms_string = '';        
        $term_obj_list = get_the_terms( $post_id, 'video_tag' );
        $terms_string = ($term_obj_list)?join(', ', wp_list_pluck($term_obj_list, 'name')):'';        
        echo $terms_string;
	}
}, 10, 2);

add_filter('manage_post_posts_columns', function($columns) {
	return array_merge($columns, ['image' => __('Image', 'textdomain')]);
});
 
add_action('manage_post_posts_custom_column', function($column_key, $post_id) {
	if ($column_key == 'image') {
		if (has_post_thumbnail()) {
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID());
            $featured_img_resized = aq_resize($featured_img_url, 100, 100, true);
            echo '<img class="post-grid-featured_img" src="'.$featured_img_url.'">';
        }
	}
}, 10, 2);