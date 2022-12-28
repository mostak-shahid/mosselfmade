<?php 
get_header();
//if (is_home()) {
    $page_id = get_option( 'page_for_posts' );
    $post   = get_post( $page_id );
    $blog_page_content =  apply_filters( 'the_content', $post->post_content );
//}
$newsletter_button_url = carbon_get_theme_option( 'mos-archive-newsletter-button-url' );

$term = get_queried_object();

?>

<?php echo $blog_page_content?>
<section class="blogWrapper">
    <div class="filterArea pb-5 isBgBorder mb-5">
        <div class="container-lg">
            <div class="row">
                <div class="col-xl-6">
                    <div class="filterLeft d-flex gap-3">
                        <div class="singleFilter custom-mos-select">
                            <?php $categories = mos_get_terms('category'); ?>
                            <select class="bg-transparent rounded-pill px-4 form-select postFilter"onchange="window.location.replace(this.value)">
                                <option value="0" selected="">All Categories</option>
                                <?php foreach($categories as $category) : ?>
                                <option value="<?php echo home_url().'/?s=&category='.$category['term_id'] ?>" <?php if (@$term && $term->term_id == $category['term_id']) echo 'selected'?>  ><?php echo $category['name'] ?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="singleFilter custom-mos-select">
                            <select class="bg-transparent rounded-pill px-4 form-select postFilter"onchange="window.location.replace(this.value)">
                                <option value="<?php echo home_url().'/?s=&time=' ?>0" selected="">Select One</option>
                                <option value="<?php echo home_url().'/?s=&time=' ?>week">Last 7 day's</option>
                                <option value="<?php echo home_url().'/?s=&time=' ?>month">Last Month</option>
                                <option value="<?php echo home_url().'/?s=&time=' ?>year">Last year</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3"></div>
                <div class="col-xl-3">
                    <div class="searchInput">
                        <?php get_search_form( true ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-lg">
        <?php if ( have_posts() ) :?>
        <div id="blogs" class="row">
            <?php while ( have_posts() ) : the_post(); ?>
            <div class="col-sm-6 col-lg-4 mb-4">
                <div class="item-wrapper h-100">
                    <div class="singleBlog isRadius16 d-flex flex-column justify-content-between">
                        <div class="content-part">
                            <?php 
                                if (has_post_thumbnail()) : 
                                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                                $featured_img_resized = aq_resize($featured_img_url, 350, 200, true);
                            ?>
                            <div class="blogImage">
                                <a class="text-decoration-none" href="<?php echo get_the_permalink() ?>">
                                    <img decoding="async" class="lazy-load-image lazyload img-fluid w-100" src="<?php echo $featured_img_resized?$featured_img_resized:$featured_img_url ?>" alt="<?php echo get_the_title() ?>" width="350px" height="200px" loading="lazy">
                                </a>
                            </div>
                            <?php endif?>
                            <div class="blogInfo">
                                <h3 class="blogTitle mb-2">
                                    <a class="text-decoration-none" href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a>
                                </h3>
                                <div class="blogDesc"><?php echo wp_trim_words( get_the_content(), 28, '...' )?></div>
                            </div>
                        </div>
                        <div class="link-part">
                            <a class="readMore d-flex align-items-center text-decoration-none" href="<?php echo get_the_permalink() ?>">
                                <span>Read More</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile;?>
        </div>
        <div class="blog-pagination-wrapper pagination-wrapper">
            <?php
                the_posts_pagination( array(
                    'show_all' => false,
                    'screen_reader_text' => " ",
                    'prev_text'          => 'Prev',
                    'next_text'          => 'Next',
                ) );
            ?>
        </div>
        <?php else : ?>
        <?php get_template_part( 'content', 'none' ); ?>
        <?php endif;?>
    </div>
</section>
<?php get_footer() ?>
