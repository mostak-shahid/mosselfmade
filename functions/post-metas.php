<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
add_action('carbon_fields_register_fields', 'mos_post_meta_options');

function mos_post_meta_options() {
    Container::make('post_meta', 'Post Data')
    ->where('post_type', '=', 'case-study')
    ->add_fields(array(
        Field::make('text', 'mos_case_study_web_url', __('Web URL'))
        ->set_attribute( 'type', 'url' ),
        Field::make('text', 'mos_case_study_instagram_url', __('Instagram URL'))
        ->set_attribute( 'type', 'url' ),
    ));
    Container::make('post_meta', 'Post Data')
    ->where('post_type', '=', 'video')
    ->add_fields(array(
        Field::make('text', 'mos_video_embed_url', __('Embed URL'))
        ->set_attribute( 'type', 'url' ),
        Field::make('text', 'mos_video_embed_length', __('Video Length')),
    ));
    Container::make('post_meta', 'Page Data')
    ->where('post_type', '=', 'page')
    ->add_fields(array(
        Field::make( 'checkbox', 'mos_page_hide_header', __( 'Hide Header' ) )
        ->set_option_value( 'yes' ),
        Field::make( 'checkbox', 'mos_page_hide_footer', __( 'Hide Footer' ) )
        ->set_option_value( 'yes' ),
    ));
}