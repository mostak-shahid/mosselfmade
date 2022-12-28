<?php
use Carbon_Fields\Block;
use Carbon_Fields\Field;
add_action('carbon_fields_register_fields', 'mos_gutenberg_blocks');

function mos_gutenberg_blocks() {
    global $animations;
    $animation_options = [''=>'Select Animation'];
    foreach($animations as $key => $value) {
        //echo $key;
        if ($key != 'Back exits' && $key != 'Bouncing exits' && $key != 'Fading exits' && $key != 'Rotating exits' && $key != 'Zooming exits' && $key != 'Sliding exits') {
            foreach($value as $animation) {
                $animation_options[$animation] = $animation;
            }
        }
    }
    
    /*
    //Base Block start
    Block::make(__('Base Block'))
    ->set_icon( 'align-pull-left' )
    ->add_tab(__('Content'), array(
        Field::make('text', 'mos_block_title', __('Title')),
   ))
    ->add_tab(__('Style'), array(
        Field::make('text', 'mos_block_wrapper_class', __('Wrapper Class')),
        Field::make('text', 'mos_block_title_class', __('Title Class')),
   )) 
    ->add_tab(__('Advanced'), array(
        Field::make('textarea', 'mos_block_style', __('Style'))
        ->set_help_text('Please write your custom css without style tag'),
        Field::make('textarea', 'mos_block_script', __('Script'))
        ->set_help_text('Please write your custom script without script tag'),
   ))  
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
    ?>
        <div class="mos-block-wrapper <?php echo @$fields['mos_block_wrapper_class']; ?> <?php echo @$attributes['className']; ?>"> 
        <div class="title <?php echo @$fields['mos_block_title_class']; ?>"><?php echo $fields['mos_block_title'] ?></div>
        </div>
        <?php if(@$fields['mos_block_style']) : ?>
        <style><?php echo $fields['mos_block_style']; ?></style>
        <?php endif?>
        <?php if(@$fields['mos_block_script']) : ?>
        <script><?php echo $fields['mos_block_script']; ?></script>
        <?php endif?>
    <?php
    }); 
    //Base Block end
    */
    //Section Title Block start
    Block::make(__('Section Title Block'))
    ->set_icon( 'heading' )
    ->add_tab(__('Content'), array(
        Field::make('text', 'mos_sec_subtitle', __('Sub Title')),
        Field::make('text', 'mos_sec_title', __('Main Title')),
        Field::make('rich_text', 'mos_sec_desc', __('Intro')),
        Field::make('text', 'mos_sec_button_title', __('Button Title')),
        Field::make('text', 'mos_sec_button_url', __('Button URL')),
        Field::make('image', 'mos_sec_image', __('Image')),
   ))
    ->add_tab(__('Style'), array(
        Field::make('select', 'mos_sec_text_align', __('Text Alignment'))
        ->set_options(array(
            'text-start' => 'Left',
            'text-center' => 'Center',
            'text-end' => 'Right',
       )),
        Field::make('text', 'mos_sec_class', __('Section Class')),
        Field::make('text', 'mos_sec_subtitle_class', __('Sub Title Class')),
        Field::make('text', 'mos_sec_title_class', __('Main Title Class')),
        Field::make('text', 'mos_sec_intro_class', __('Intro Class')),
        Field::make('text', 'mos_sec_button_class', __('Button Class')),
        Field::make('text', 'mos_sec_image_class', __('Button Class')),
   ))  
    ->add_tab(__('Advanced'), array(
        Field::make('textarea', 'mos_sec_style', __('Style'))
        ->set_help_text('Please write your custom css without style tag'),
        Field::make('textarea', 'mos_sec_script', __('Script'))
        ->set_help_text('Please write your custom script without script tag'),
   ))        
        
    /*->add_fields(array(
        Field::make('text', 'mos_sec_subtitle', __('Section Name')),
        Field::make('text', 'mos_sec_title', __('Section TagLine')),
        Field::make('text', 'mos_sec_desc', __('Section Intro')),
   ))*/
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
        ?>
<div class="section-heading <?php echo @$fields['mos_sec_text_align']; ?> <?php echo @$fields['mos_sec_class']; ?> <?php echo @$attributes['className']; ?>">
    <div class="text-part">
    <?php if(@$fields['mos_sec_subtitle']) : ?><div class="sub-title d-inline-block <?php echo @$fields['mos_sec_subtitle_class']; ?>"><?php echo do_shortcode($fields['mos_sec_subtitle']); ?></div><?php endif?>
    
    <?php if(@$fields['mos_sec_title']) : ?><h2 class="title <?php echo @$fields['mos_sec_title_class']; ?>"><?php echo do_shortcode($fields['mos_sec_title']); ?></h2><?php endif?>
    
    <?php if(@$fields['mos_sec_desc']) : ?><div class="intro <?php echo @$fields['mos_sec_intro_class']; ?>"><?php echo do_shortcode($fields['mos_sec_desc']); ?></div><?php endif?>
    
    <?php if(@$fields['mos_sec_button_title'] && @$fields['mos_sec_button_url']) : ?>
    <div class="is-layout-flex wp-block-buttons <?php echo @$fields['mos_sec_button_class']; ?>">
        <div class="wp-block-button">
            <a href="<?php echo do_shortcode($fields['mos_sec_button_url'])?>" class="wp-block-button__link wp-element-button"><?php echo do_shortcode($fields['mos_sec_button_title'])?></a>
        </div>
    </div>
    <?php endif?>
    </div>    
    <?php if(@$fields['mos_sec_image']) : ?>
        <div class="img-part <?php echo @$fields['mos_sec_image_class']; ?> wow <?php echo @$fields['mos_sec_image_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_sec_image_animation_delay'] ?>ms">
            <?php echo wp_get_attachment_image($fields['mos_sec_image'], "full", "", array("class" => "img-fluid"));  ?>
        </div>
    <?php endif?>   
</div>
<?php if(@$fields['mos_sec_style']) : ?>
<style><?php echo $fields['mos_sec_style']; ?></style>
<?php endif?>
<?php if(@$fields['mos_sec_script']) : ?>
<script><?php echo $fields['mos_sec_script']; ?></script>
<?php endif?>
        <?php
    }); 
    //Section Title Block end    
    //Media Block start
    Block::make(__('Media Block'))
    ->set_icon( 'align-pull-left' )
    ->add_tab(__('Content'), array(
        Field::make('separator', 'mos_media_block_content_separator', __('Content')),
        Field::make('text', 'mos_media_block_subtitle', __('Subtitle')),
        Field::make('text', 'mos_media_block_title', __('Title')),
        Field::make('rich_text', 'mos_media_block_intro', __('Intro')),
        Field::make('text', 'mos_media_block_btn_url', __('Button URL')),
        Field::make('text', 'mos_media_block_btn_title', __('Button Title')),
        Field::make('separator', 'mos_media_block_media_separator', __('Media')),
        Field::make('image', 'mos_media_block_image', __('Image')),
        Field::make('image', 'mos_media_block_image_hover', __('Hover Image')),
        Field::make('text', 'mos_media_block_icon', __('Icon')),
        Field::make('textarea', 'mos_media_block_svg', __('SVG Code')),
   ))
    ->add_tab(__('Style'), array(
        Field::make('multiselect', 'mos_media_block_set_1', __('Block One'))
        ->add_options(array(
            'subtitle' => 'Subtitle',
            'title' => 'Title',
            'intro' => 'Intro',
            'btn' => 'Button',
            'image' => 'Image',
            'icon' => 'Icon',
            'svg' => 'SVG Code',
       )),
        Field::make('multiselect', 'mos_media_block_set_2', __('Block Two'))
        ->add_options(array(
            'subtitle' => 'Subtitle',
            'title' => 'Title',
            'intro' => 'Intro',
            'btn' => 'Button',
            'image' => 'Image',
            'icon' => 'Icon',
            'svg' => 'SVG Code',
       )),
        Field::make('text', 'mos_media_block_wrapper_class', __('Wrapper Class')),
        Field::make('text', 'mos_media_block_subtitle_class', __('Subtitle Class')),
        Field::make('text', 'mos_media_block_title_class', __('Title Class')),
        Field::make('text', 'mos_media_block_intro_class', __('Intro Class')),
        Field::make('text', 'mos_media_block_btn_class', __('Button Class')),
        Field::make('text', 'mos_media_block_image_class', __('Image Class')),
        Field::make('text', 'mos_media_block_icon_class', __('Icon Class')),
        Field::make('text', 'mos_media_block_svg_class', __('SVG Class')),
   )) 
    ->add_tab(__('Advanced'), array(
        Field::make('textarea', 'mos_media_block_style', __('Style'))
        ->set_help_text('Please write your custom css without style tag'),
        Field::make('textarea', 'mos_media_block_script', __('Script'))
        ->set_help_text('Please write your custom script without script tag'),
   ))  
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
    ?>
        <div class="mos-media-block-wrapper position-relative <?php echo @$fields['mos_media_block_wrapper_class']; ?> <?php echo @$attributes['className']; ?>">             
            <?php generate_media_block_layout(@$fields['mos_media_block_set_1'], $fields)?>
            <?php generate_media_block_layout(@$fields['mos_media_block_set_2'], $fields)?>
            <?php if (@$fields['mos_media_block_btn_url']) : ?>
                <a href="<?php echo do_shortcode($fields['mos_media_block_btn_url']) ?>" class="hidden-link">Read more about <?php echo (@$fields['mos_media_block_title'])?$fields['mos_media_block_title']:'this' ?></a>
            <?php endif?>
        </div>
        <?php if(@$fields['mos_media_block_style']) : ?>
        <style><?php echo $fields['mos_media_block_style']; ?></style>
        <?php endif?>
        <?php if(@$fields['mos_media_block_script']) : ?>
        <script><?php echo $fields['mos_media_block_script']; ?></script>
        <?php endif?>
    <?php
    }); 
    //Media Block end
    //Testimonials Block start
    Block::make(__('Testimonials Block'))
    ->set_icon( 'admin-comments' )
    ->add_tab(__('Content'), array(
        Field::make('complex', 'mos_testimonials_block_items', __('Testimonials'))
        ->add_fields(array(
            Field::make('text', 'name', __('Name'))
            ->set_required( true ),
            Field::make('text', 'designation', __('Designation')),
            Field::make('text', 'title', __('Title')),
            Field::make('rich_text', 'intro', __('Intro')),
            Field::make('text', 'rating', __('Rating'))
            ->set_attribute( 'type', 'number' )
            ->set_attribute( 'min', '1' )
            ->set_attribute( 'max', '5' )
            ->set_default_value(5),
            Field::make('image', 'image', __('Image')),
        ))
        ->set_header_template('
            <% if (name) { %>
                <%- name %> <%- designation ? "(" + designation + ")" : "" %>
            <% } %>
        ')
        ->set_collapsed(true),
   ))
    ->add_tab(__('Style'), array(
        Field::make('text', 'mos_testimonials_block_wrapper_class', __('Wrapper Class')),
        Field::make('text', 'mos_testimonials_block_title_class', __('Title Class')),
   )) 
    ->add_tab(__('Advanced'), array(
        Field::make('textarea', 'mos_testimonials_block_style', __('Style'))
        ->set_help_text('Please write your custom css without style tag'),
        Field::make('textarea', 'mos_testimonials_block_script', __('Script'))
        ->set_help_text('Please write your custom script without script tag'),
   ))  
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
        if (@$fields['mos_testimonials_block_items'] && sizeof($fields['mos_testimonials_block_items'])) :
    ?>
        <div class="mos-testimonials-block-wrapper <?php echo @$fields['mos_testimonials_block_wrapper_class']; ?> <?php echo @$attributes['className']; ?>"> 
<!--            <div class="title <?php //echo @$fields['mos_testimonials_block_title_class']; ?>"><?php //echo $fields['mos_testimonials_block_title'] ?></div>-->
            <div class="mos-slick" data-slick='{
                "slidesToShow": 3, 
                "slidesToScroll": 1, 
                "infinite": true, 
                "autoplay": true, 
                "autoplaySpeed": 2000, 
                "speed": 2000, 
                "pauseOnHover": true,            
                "responsive": [
                {
                    "breakpoint": 768,
                    "settings": {
                        "arrows": false,
                        "slidesToShow": 2,
                        "dots": true
                    }
                },
                {
                    "breakpoint": 480,
                    "settings": {
                        "arrows": false,
                        "slidesToShow": 1,
                        "dots": true
                    }
                }
                ]     
            
            }'>
            <?php foreach($fields['mos_testimonials_block_items'] as $item) : ?>
            <div class="item item-<?php echo $item['_id'] ?> h-100">
                <div class="wrapper d-flex flex-column justify-content-between h-100">
                    <div class="block-one">
                        <?php if ($item['image']) : ?>
                        <div class="part-img"><?php echo wp_get_attachment_image( $item['image'], 'full', '', array( "class" => "img-responsive img-fluid"));  ?></div>                    
                        <?php endif?>
                        <?php if ($item['title']) : ?>
                        <h4 class="part-title"><?php echo do_shortcode($item['title']);  ?></h4>                   
                        <?php endif?>
                        <?php if ($item['intro']) : ?>
                        <div class="part-intro"><?php echo do_shortcode($item['intro']);  ?></div>                   
                        <?php endif?>
                    </div>
                    <div class="block-two">
                        <?php if ($item['rating']) : ?>
                        <div class="part-rating">
                        <?php for ($x = 0; $x < $item['rating']; $x++) : ?>
                            <img src="<?php echo get_template_directory_uri() ?>/images/star.svg" alt="" class="star" width="21" height="20">
                        <?php endfor; ?>
                        </div>                   
                        <?php endif?> 
                        <?php if ($item['name']) : ?>
                        <h4 class="part-name"><?php echo $item['name'];  ?></h4>                   
                        <?php endif?> 
                        <?php if ($item['designation']) : ?>
                        <div class="part-designation"><?php echo $item['designation'];  ?></div>                   
                        <?php endif?>                    
                    </div>
                </div>
            </div>
            <?php endforeach?>
           </div>
            
        </div>
        <?php if(@$fields['mos_testimonials_block_style']) : ?>
        <style><?php echo $fields['mos_testimonials_block_style']; ?></style>
        <?php endif?>
        <?php if(@$fields['mos_testimonials_block_script']) : ?>
        <script><?php echo $fields['mos_testimonials_block_script']; ?></script>
        <?php endif?>
    <?php
        endif;
    }); 
    //Testimonials Block end
    //Case Study Slider start
    Block::make(__('Case Study Slider'))
    ->set_icon( 'images-alt2' )
    ->add_tab(__('Content'), array(
        Field::make('association', 'mos_case_study_slider_posts', __('Association'))
        ->set_required(true)
        ->set_types(array(
            array(
                'type'      => 'post',
                'post_type' => 'case-study',
            )
        ))
   ))
    ->add_tab(__('Style'), array(
        Field::make('text', 'mos_case_study_slider_wrapper_class', __('Wrapper Class')),
   )) 
    ->add_tab(__('Advanced'), array(
        Field::make('textarea', 'mos_block_style', __('Style'))
        ->set_help_text('Please write your custom css without style tag'),
        Field::make('textarea', 'mos_block_script', __('Script'))
        ->set_help_text('Please write your custom script without script tag'),
   ))  
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
        if (@$fields['mos_case_study_slider_posts'] && sizeof($fields['mos_case_study_slider_posts'])) :
    ?>
        <div class="mos-case-study-slider-block-wrapper <?php echo @$fields['mos_case_study_slider_wrapper_class']; ?> <?php echo @$attributes['className']; ?>">
            <div class="mos-slick" data-slick='{
                "slidesToShow": 3, 
                "slidesToScroll": 1, 
                "infinite": true, 
                "autoplay": true, 
                "autoplaySpeed": 2000, 
                "speed": 2000, 
                "pauseOnHover": true,            
                "responsive": [
                {
                    "breakpoint": 768,
                    "settings": {
                        "arrows": false,
                        "slidesToShow": 2,
                        "dots": true
                    }
                },
                {
                    "breakpoint": 480,
                    "settings": {
                        "arrows": false,
                        "slidesToShow": 1,
                        "dots": true
                    }
                }
                ]     
            
            }'> 
            <?php foreach($fields['mos_case_study_slider_posts'] as $post) : ?>
                <?php 
                $content_post = get_post($post['id']);
                $content = $content_post->post_content;
                $content = apply_filters('the_content', $content);
                $content = str_replace(']]>', ']]&gt;', $content);
                $categories = get_the_terms($post['id'],'case-study-category');
        
                $web_url = carbon_get_post_meta($post['id'],'mos_case_study_web_url');
                $instagram_url = carbon_get_post_meta($post['id'],'mos_case_study_instagram_url');
        
                $author_id = get_post_field( 'post_author', $post['id'] );
                $author_name = get_the_author_meta('display_name',$author_id);
//                $author_description = get_the_author_meta('description',$author_id);
                $author_image = carbon_get_user_meta( $author_id, 'mos_profile_image' );
//                $author_designation = carbon_get_user_meta( $author_id, 'mos_profile_designation' );
//                $author_linkedin = carbon_get_user_meta( $author_id, 'mos_profile_linkedin' );
                ?>
                <div class="item item-<?php echo $post['id'] ?> h-100">
                    <div class="wrapper d-flex flex-column justify-content-between h-100">
                        <div class="block-one">
                            <?php if(has_post_thumbnail($post['id'])) : 
                                $attachment_image = wp_get_attachment_url(get_post_thumbnail_id($post['id']));
                                ?>
                                <div class="part-image">
                                    <img src="<?php echo aq_resize($attachment_image, 460, 270, true) ?>" alt="<?php echo get_the_title($post['id']) ?>" width="460" height="270">
                                    <?php if($categories && sizeof($categories)) : ?>
                                        <ul class="list-inline case-study-categories">
                                        <?php foreach($categories as $category) : ?>
                                            <li class="list-inline-item"><?php echo $category->name ?></li>
                                        <?php endforeach?>
                                        </ul>
                                    <?php endif?>
                                    <?php if ($author_image) : ?>
                                    <img class="case-study-author rounded-circle" src="<?php echo aq_resize($author_image, 66,66,true) ?>" alt="<?php echo $author_name ?>" width="66" height="66">
                                    <?php endif?>
                                </div>
                            <?php endif;?>
                            <div class="part-content">
                                <div class="d-flex justify-content-between align-items-center mb-10">
                                    <h3 class="part-title mb-0"><?php echo get_the_title($post['id']) ?></h3>
                                    <div class="buttons d-flex gap-3">
                                        <?php if ($web_url) : ?>
                                        <a href="<?php echo do_shortcode($web_url) ?>" class="d-block"><img src="<?php echo get_template_directory_uri() ?>/images/case-study-web.svg" alt="<?php echo get_the_title($post['id']) ?>-web" width="32" height="32"></a>
                                        <?php endif?>
                                        <?php if ($instagram_url) : ?>
                                        <a href="<?php echo do_shortcode($instagram_url) ?>" class="d-block"><img src="<?php echo get_template_directory_uri() ?>/images/case-study-instagram.svg" alt="<?php echo get_the_title($post['id']) ?>-instagram" width="32" height="32"></a> 
                                        <?php endif?>
                                    </div>
                                </div>
                                <div class="part-intro">
                                    <?php echo wp_trim_words( $content, 4, '' );?>
                                </div>
                            </div>
                        </div>
                        <div class="block-two">
                            <div class="is-layout-flex wp-block-buttons <?php echo @$fields['mos_media_block_btn_class']; ?>">
                                <div class="wp-block-button w-100">
                                    <a href="<?php echo get_the_permalink($post['id']) ?>" class="wp-block-button__link">Learn more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach?>
            </div>
        </div>
        <?php if(@$fields['mos_block_style']) : ?>
        <style><?php echo $fields['mos_block_style']; ?></style>
        <?php endif?>
        <?php if(@$fields['mos_block_script']) : ?>
        <script><?php echo $fields['mos_block_script']; ?></script>
        <?php endif?>
    <?php
        endif;
    }); 
    //Case Study Slider end
    //Videos Block start
    Block::make(__('Videos Block'))
    ->set_icon( 'video-alt' )
    ->add_tab(__('Content'), array(
        Field::make('association', 'mos_video_slider_posts', __('Association'))
        ->set_required(true)
        ->set_types(array(
            array(
                'type'      => 'post',
                'post_type' => 'video',
            )
        )),
   ))
    ->add_tab(__('Style'), array(
        Field::make('text', 'mos_video_wrapper_class', __('Wrapper Class')),
   )) 
    ->add_tab(__('Advanced'), array(
        Field::make('textarea', 'mos_video_style', __('Style'))
        ->set_help_text('Please write your custom css without style tag'),
        Field::make('textarea', 'mos_video_script', __('Script'))
        ->set_help_text('Please write your custom script without script tag'),
   ))  
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
        if (@$fields['mos_video_slider_posts'] && sizeof($fields['mos_video_slider_posts'])) :
    ?>
        <div class="mos-videos-block-wrapper <?php echo @$fields['mos_video_wrapper_class']; ?> <?php echo @$attributes['className']; ?>">              
            <div class="mos-slick" data-slick='{
                "slidesToShow": 3, 
                "slidesToScroll": 1, 
                "infinite": true, 
                "autoplay": true, 
                "autoplaySpeed": 2000, 
                "speed": 2000, 
                "pauseOnHover": true,            
                "responsive": [
                {
                    "breakpoint": 768,
                    "settings": {
                        "arrows": false,
                        "slidesToShow": 2,
                        "dots": true
                    }
                },
                {
                    "breakpoint": 480,
                    "settings": {
                        "arrows": false,
                        "slidesToShow": 1,
                        "dots": true
                    }
                }
                ]     
            
            }'> 
            <?php foreach($fields['mos_video_slider_posts'] as $post) : ?>
                <?php 
                $content_post = get_post($post['id']);
                $content = $content_post->post_content;
                $content = apply_filters('the_content', $content);
                $content = str_replace(']]>', ']]&gt;', $content);
                $categories = get_the_terms($post['id'],'video_category');
        
                $embed_url = carbon_get_post_meta($post['id'],'mos_video_embed_url');
                $embed_length = carbon_get_post_meta($post['id'],'mos_video_embed_length');
        
                $author_id = get_post_field( 'post_author', $post['id'] );
                $author_name = get_the_author_meta('display_name',$author_id);
//                $author_description = get_the_author_meta('description',$author_id);
                $author_image = carbon_get_user_meta( $author_id, 'mos_profile_image' );
                $author_designation = carbon_get_user_meta( $author_id, 'mos_profile_designation' );
//                $author_linkedin = carbon_get_user_meta( $author_id, 'mos_profile_linkedin' );
                ?>
                <div class="item item-<?php echo $post['id'] ?> h-100">
                    <div class="wrapper d-flex flex-column justify-content-between h-100">
                        <div class="block-one">
                        
                            <?php if(has_post_thumbnail($post['id'])) : 
                                $attachment_image = wp_get_attachment_url(get_post_thumbnail_id($post['id']));
                                ?>
                                <div class="part-image">
                                    <img src="<?php echo aq_resize($attachment_image, 430, 270, true) ?>" alt="<?php echo get_the_title($post['id']) ?>" width="430" height="270" >
                                    <?php if($embed_length) : ?>
                                    <div class="embed-length">
                                        <img src="<?php echo get_template_directory_uri() ?>/images/video-icon.svg" alt="<?php echo get_the_title($post['id']) ?> - Video Icon" width="16" height="16">
                                        <span><?php echo $embed_length ?></span>
                                    </div>
                                    <?php endif?>
                                </div>
                            <?php endif;?>
                                <div class="part-text">
                                    <div class="part-cetegories">                                    
                                        <?php if($categories && sizeof($categories)) : ?>
                                            <ul class="list-inline video-categories">
                                            <?php foreach($categories as $category) : ?>
                                                <li class="list-inline-item"><?php echo $category->name ?></li>
                                            <?php endforeach?>
                                            </ul>
                                        <?php endif?>
                                    </div>
                                    <?php if ($embed_url) : ?>
                                    <h4 class="video-title mb-0" data-bs-toggle="modal" data-bs-target="#videoModal" data-bs-whatever="<?php echo $embed_url ?>"><?php echo get_the_title($post['id']) ?></h4>
                                    <?php else : ?>
                                    <h4 class="video-title mb-0"><?php echo get_the_title($post['id']) ?></h4>
                                    <?php endif?>
                                </div>
                        </div>
                        <div class="block-two">
                            <div class="d-flex align-items-center gap-2">
                                <?php if ($author_image) : ?>
                                <img class="video-author rounded-circle" src="<?php echo aq_resize($author_image, 50,50,true) ?>" alt="<?php echo $author_name ?>" width="50" height="50">
                                <?php endif?>
                                <div class="part-user-meta">
                                    <div class="author-name"><?php echo $author_name ?></div>
                                    <div class="author-designation"><?php echo $author_designation ?></div>
                                </div>
                            </div>
                                    
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
            </div>
        </div>
        <?php if(@$fields['mos_video_style']) : ?>
        <style><?php echo $fields['mos_video_style']; ?></style>
        <?php endif?>
        <?php if(@$fields['mos_video_script']) : ?>
        <script><?php echo $fields['mos_video_script']; ?></script>
        <?php endif?>
    <?php
        endif;
    }); 
    //Videos Block end
    //Image Slider Block start
    Block::make(__('Image Slider Block'))
    ->set_icon( 'images-alt' )
    ->add_tab(__('Content'), array(
        Field::make('complex', 'mos_images_slider_block_items', __('Images'))
        ->add_fields(array(
            Field::make('image', 'image', __('Image'))
            ->set_required( true ),
        ))
        ->set_collapsed(true),
   ))
    ->add_tab(__('Style'), array(
        Field::make('text', 'mos_images_slider_block_wrapper_class', __('Wrapper Class')),
   )) 
    ->add_tab(__('Advanced'), array(
        Field::make('textarea', 'mos_images_slider_block_style', __('Style'))
        ->set_help_text('Please write your custom css without style tag'),
        Field::make('textarea', 'mos_images_slider_block_script', __('Script'))
        ->set_help_text('Please write your custom script without script tag'),
   ))  
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
        if (@$fields['mos_images_slider_block_items'] && sizeof($fields['mos_images_slider_block_items'])) :
    ?>
        <div class="mos-images-slider-block-wrapper <?php echo @$fields['mos_images_slider_block_wrapper_class']; ?> <?php echo @$attributes['className']; ?>"> 
            <div class="mos-slick" data-slick='{
                "slidesToShow": 6, 
                "slidesToScroll": 1, 
                "infinite": true, 
                "autoplay": true, 
                "autoplaySpeed": 2000, 
                "speed": 2000, 
                "pauseOnHover": true,  
                "dots": false,
                "arrows": false,          
                "responsive": [
                {
                    "breakpoint": 768,
                    "settings": {
                        "slidesToShow": 3,
                        "dots": true
                    }
                },
                {
                    "breakpoint": 480,
                    "settings": {
                        "slidesToShow": 3,
                        "dots": true
                    }
                }
                ]     
            
            }'>
            <?php foreach($fields['mos_images_slider_block_items'] as $item) : ?>
                <?php if ($item['image']) : ?>
                    <div class="item item-<?php echo $item['_id'] ?> h-100">
                        <div class="wrapper d-flex flex-column justify-content-center h-100">
                            <?php echo wp_get_attachment_image( $item['image'], 'full', '', array( "class" => "img-responsive img-fluid"));  ?>
                        </div>
                    </div>
                <?php endif?>
            <?php endforeach?>
           </div>
        </div>
        <?php if(@$fields['mos_images_slider_block_style']) : ?>
        <style><?php echo $fields['mos_images_slider_block_style']; ?></style>
        <?php endif?>
        <?php if(@$fields['mos_images_slider_block_script']) : ?>
        <script><?php echo $fields['mos_images_slider_block_script']; ?></script>
        <?php endif?>
    <?php
        endif;
    }); 
    //Image Slider Block end
    //Card Slider Block start
    Block::make(__('Card Slider Block'))
    ->set_icon( 'align-pull-left' )
    ->add_tab(__('Content'), array(
        
        Field::make('complex', 'mos_card_slider_block_items', __('Cards'))
        ->add_fields(array(
            Field::make('text', 'title', __('Title'))
            ->set_required( true ),
            Field::make('rich_text', 'intro', __('Intro')),
            Field::make('text', 'url', __('Link'))
            ->set_attribute( 'type', 'url' ),
            Field::make('image', 'image', __('Image')),
        ))
        ->set_header_template('
            <% if (title) { %>
                <%- title %>
            <% } %>
        ')
        ->set_collapsed(true),
   ))
    ->add_tab(__('Style'), array(
        Field::make('text', 'mos_card_slider_block_wrapper_class', __('Wrapper Class')),
   )) 
    ->add_tab(__('Advanced'), array(
        Field::make('textarea', 'mos_card_slider_block_style', __('Style'))
        ->set_help_text('Please write your custom css without style tag'),
        Field::make('textarea', 'mos_card_slider_block_script', __('Script'))
        ->set_help_text('Please write your custom script without script tag'),
   ))  
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
        if (@$fields['mos_card_slider_block_items'] && sizeof($fields['mos_card_slider_block_items'])) :
    ?>
        <div class="mos-card-slider-block-wrapper <?php echo @$fields['mos_card_slider_block_wrapper_class']; ?> <?php echo @$attributes['className']; ?>"> 
<div class="mos-slick" data-slick='{
                "slidesToShow": 4, 
                "slidesToScroll": 1,
                "infinite": true, 
                "autoplay": true, 
                "autoplaySpeed": 2000, 
                "speed": 2000, 
                "pauseOnHover": true,            
                "responsive": [
                {
                    "breakpoint": 992,
                    "settings": {
                        "slidesToShow": 2
                    }
                },
                {
                    "breakpoint": 480,
                    "settings": {
                        "slidesToShow": 1
                    }
                }
                ]     
            
            }'>
            <?php foreach($fields['mos_card_slider_block_items'] as $item) : ?>
            <div class="item item-card-slider smooth item-<?php echo $item['_id'] ?> h-100">
                <div class="wrapper d-flex flex-column justify-content-between h-100">
                    <div class="block-one">
                        <?php if ($item['image']) : ?>
                        <div class="part-img"><?php echo wp_get_attachment_image( $item['image'], 'full', '', array( "class" => "img-responsive img-fluid"));  ?></div>                    
                        <?php endif?>
                        <?php if ($item['title']) : ?>
                        <h3 class="part-title"><?php echo do_shortcode($item['title']);  ?></h3>                   
                        <?php endif?>
                        <?php if ($item['intro']) : ?>
                        <div class="part-intro"><?php echo do_shortcode($item['intro']);  ?></div>                   
                        <?php endif?>
                    </div>
                </div>
            </div>
            <?php endforeach?>
           </div>
        </div>
        <?php if(@$fields['mos_card_slider_block_style']) : ?>
        <style><?php echo $fields['mos_card_slider_block_style']; ?></style>
        <?php endif?>
        <?php if(@$fields['mos_card_slider_block_script']) : ?>
        <script><?php echo $fields['mos_card_slider_block_script']; ?></script>
        <?php endif?>
    <?php
        endif;
    }); 
    //Card Slider Block end
}
function generate_media_block_layout($data, $fields){
    if($data && sizeof($data)) {
        foreach($data as $item) : 
            if ($item == 'subtitle') :    
                ?>
                <div class="subtitle <?php echo @$fields['mos_media_block_subtitle_class']; ?>"><?php echo @$fields['mos_media_block_subtitle'] ?></div>
                <?php
            elseif ($item == 'title') : ?>
                <div class="title <?php echo @$fields['mos_media_block_title_class']; ?>"><?php echo @$fields['mos_media_block_title'] ?></div>
                <?php
            elseif ($item == 'intro') : ?>
                <div class="intro <?php echo @$fields['mos_media_block_intro_class']; ?>"><?php echo do_shortcode(@$fields['mos_media_block_intro']) ?></div>
                <?php
            elseif ($item == 'btn') : ?>
                <?php if (@$fields['mos_media_block_btn_title']) : ?>
                    <div class="is-layout-flex wp-block-buttons  <?php echo @$fields['mos_media_block_btn_class']; ?>">
                        <div class="wp-block-button">
                            <span class="wp-block-button__link"><?php echo $fields['mos_media_block_btn_title'] ?></span>
                        </div>
                    </div>
                <?php endif?>
                <?php
            elseif ($item == 'image') : ?>
                <?php if (@$fields['mos_media_block_image']) : ?>
                    <div class="image <?php echo @$fields['mos_media_block_image_class']; ?>">
                        <?php echo wp_get_attachment_image( $fields['mos_media_block_image'], 'full', '', array( "class" => "img-responsive img-fluid", "data-hover_image" => wp_get_attachment_url(@$fields['mos_media_block_image_hover']) ) );  ?>
                    </div>
                <?php endif  ?>
                <?php
            elseif ($item == 'icon') : ?>
                <div class="icon <?php echo @$fields['mos_media_block_icon_class']; ?>">
                    <i class="<?php echo @$fields['mos_media_block_icon'] ?>"></i></div>
                <?php
            elseif ($item == 'svg') : ?>
                <div class="svg <?php echo @$fields['mos_media_block_svg_class']; ?>"><?php echo @$fields['mos_media_block_svg'] ?></div>
                <?php
            endif;
        endforeach;
    }
}