<?php 
if (is_home()) $page_id = get_option( 'page_for_posts' );
elseif (is_front_page()) $page_id = get_option('page_on_front');
else $page_id = get_the_ID();

if (carbon_get_post_meta( $page_id, 'mos_page_hide_footer' ) != "yes") : ?>
   <footer class="footer">
    <div class="footer-logo text-center">
        <div class="wrapper">
            <a href="<?php echo home_url()?>">
                <?php if(carbon_get_theme_option( 'mos-logo' )): ?>
                <?php echo wp_get_attachment_image( carbon_get_theme_option( 'mos-logo' ), 'full', "", array( "class" => "loading-image" ) );  ?>
                <?php else: ?>
                <?php echo get_bloginfo('name')?>
                <?php endif?>
            </a>
        </div>
    </div>
    <div class="widgets">
        <div class="container">
            <div class="wrapper">
                <div class="row">
                    <?php if ( is_active_sidebar( "footer_1" ) ) : ?>
                    <div class="col-lg-3 col-lg-3 text-start text-sm-center text-lg-start">
                        <div class="contacts widgets-container-1">
                            <?php dynamic_sidebar( "footer_1" ); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="col-lg-9 mt-4 mt-sm-5 mt-lg-0 ">
                        <div class="row">
                            <?php if ( is_active_sidebar( "footer_2" ) ) : ?>
                            <div class="col-6 col-sm-3 mb-4 mb-sm-0">
                                <div class="contacts widgets-container-2">
                                    <?php dynamic_sidebar( "footer_2" ); ?>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if ( is_active_sidebar( "footer_3" ) ) : ?>
                            <div class="col-6 col-sm-3 mb-4 mb-sm-0">
                                <div class="contacts widgets-container-3">
                                    <?php dynamic_sidebar( "footer_3" ); ?>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if ( is_active_sidebar( "footer_4" ) ) : ?>
                            <div class="col-6 col-sm-3">
                                <div class="contacts widgets-container-4">
                                    <?php dynamic_sidebar( "footer_4" ); ?>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if ( is_active_sidebar( "footer_5" ) ) : ?>
                            <div class="col-6 col-sm-3">
                                <div class="contacts widgets-container-5">
                                    <?php dynamic_sidebar( "footer_5" ); ?>
                                </div>
                            </div>
                            <?php endif; ?>
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="wrapper">
                <div class="row align-items-center">
                    <div class="col-sm-6 text-center text-sm-start mb-3 mb-sm-0">
                        <div class="copyrightText">
                            <?php echo do_shortcode(carbon_get_theme_option( 'mos-footer-content' )); ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <?php $socials = carbon_get_theme_option( 'mos-contact-social-media' ) ?>
                        <?php if ($socials and sizeof($socials)) :?>
                        <div class="social">
                            <ul class="footer-social-list list-inline text-center text-sm-end mb-0">
                                <?php foreach($socials as $social) : ?>
                                <li class="list-inline-item">
                                    <a class="<?php echo sanitize_title($social['title'])?>-icon" href="<?php echo $social['link']?>" <?php if ($social['new-tab']) echo ' target="_blank"' ?>>
                                    <i class="fa fa-<?php echo sanitize_title($social['title'])?>"></i>
                                    </a>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                        <?php endif?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php endif?>
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl">
          <div class="modal-content">
              <div class="mos-modal-body">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  <div class="ratio ratio-16x9"><iframe src="" title="YouTube video" allowfullscreen></iframe></div>
              </div>
          </div>
      </div>
    </div>
<?php 
$btt_enable = carbon_get_theme_option('mos-back-to-top');
$btt_image = carbon_get_theme_option('mos-back-to-top-image');
$btt_background = carbon_get_theme_option('mos-back-to-top-background');
$btt_class = carbon_get_theme_option('mos-back-to-top-class');
if($btt_enable) :
?>    
<div id="btt-btn" class="scrollup <?php echo $btt_class ?>" onclick="backToTop()">
    <?php if ($btt_image): ?>
    <?php echo wp_get_attachment_image( $btt_image, 'full' );  ?>
    <?php else : ?>
    <i class="fa fa-angle-up"></i>
    <?php endif?>
</div>
<?php endif?>
<?php wp_footer();?>
<!--Theme Options CSS-->
<style>
    body {
        background-color: <?php echo carbon_get_theme_option('mos_body_bg') ? 'var(--mos-body-bg)' : 'var(--bs-body-bg)' ?>;
        color: <?php echo carbon_get_theme_option('mos_content_color') ? 'var(--mos-content-color)' : 'var(--bs-body-color)' ?>;
    }
    a {color: <?php echo carbon_get_theme_option('mos_link_color') ? carbon_get_theme_option('mos_link_color') : 'var(--bs-link-color)' ?>;}
    a:hover {color: <?php echo carbon_get_theme_option('mos_link_hover_color') ? carbon_get_theme_option('mos_link_hover_color') : 'var(--bs-link-hover-color)' ?>;}
    <?php $header_background=carbon_get_theme_option('mos-header-background');

    ?>.main-header {
        <?php if(carbon_get_theme_option('mos-header-content-color')): ?> color: <?php echo carbon_get_theme_option('mos-header-content-color') ?>; <?php endif?> <?php if(carbon_get_theme_option('mos-header-padding')): ?> padding: <?php echo carbon_get_theme_option('mos-header-padding') ?>; <?php endif?> <?php if(carbon_get_theme_option('mos-header-margin')): ?> margin: <?php echo carbon_get_theme_option('mos-header-margin') ?>; <?php endif?> <?php if(carbon_get_theme_option('mos-header-border')): ?> border: <?php echo carbon_get_theme_option('mos-header-border') ?>; <?php endif?> <?php if(@$header_background && sizeof($header_background)): ?> <?php foreach($header_background as $value): ?> <?php //var_dump($value) ?>
            <?php foreach($value as $key=> $val): ?> <?php if ($key !='background-image'&& $key !='_type'): ?> <?php echo $val? $key . ':'. $val . ';':''?> <?php elseif ($key=='background-image'): ?> <?php echo $val ? $key . ':url('. wp_get_attachment_url($val) . ');':''?> <?php endif?> <?php endforeach?> <?php endforeach?> <?php endif?>
    }

    <?php if(carbon_get_theme_option('mos-header-link-color')) : ?>.main-header a {
        color: <?php echo carbon_get_theme_option('mos-header-link-color') ?>
    }

    <?php endif?><?php if(carbon_get_theme_option('mos-header-link-color-hover')) : ?>.main-header a:hover {
        color: <?php echo carbon_get_theme_option('mos-header-link-color-hover') ?>
    }

    <?php endif?><?php $footer_background=carbon_get_theme_option('mos-footer-background');

    ?>.footer {
        <?php if(carbon_get_theme_option('mos-footer-content-color')): ?> color: <?php echo carbon_get_theme_option('mos-footer-content-color') ?>; <?php endif?> <?php if(carbon_get_theme_option('mos-footer-padding')): ?> padding: <?php echo carbon_get_theme_option('mos-footer-padding') ?>; <?php endif?> <?php if(carbon_get_theme_option('mos-footer-margin')): ?> margin: <?php echo carbon_get_theme_option('mos-footer-margin') ?>; <?php endif?> <?php if(carbon_get_theme_option('mos-footer-border')): ?> border: <?php echo carbon_get_theme_option('mos-footer-border') ?>; <?php endif?> <?php if(@$footer_background && sizeof($footer_background)): ?> <?php foreach($footer_background as $value): ?> <?php //var_dump($value) ?>
            <?php foreach($value as $key=> $val): ?> <?php if ($key !='background-image'&& $key !='_type'): ?> <?php echo $val? $key . ':'. $val . ';':''?> <?php elseif ($key=='background-image'): ?> <?php echo $val ? $key . ':url('. wp_get_attachment_url($val) . ');':''?> <?php endif?> <?php endforeach?> <?php endforeach?> <?php endif?>
    }

    <?php if(carbon_get_theme_option('mos-footer-link-color')) : ?>.footer a {
        color: <?php echo carbon_get_theme_option('mos-footer-link-color') ?>
    }

    <?php endif?><?php if(carbon_get_theme_option('mos-footer-link-color-hover')) : ?>.footer a:hover {
        color: <?php echo carbon_get_theme_option('mos-footer-link-color-hover') ?>
    }

    <?php endif?>    
</style>
    <?php if (carbon_get_theme_option( 'mos_plugin_wow' ) == 'on') : ?>
    <script>new WOW().init();</script>
    <?php endif?>
    <?php if (carbon_get_theme_option( 'mos_plugin_owlcarousel' ) == 'on') : ?>
    <script>
        jQuery(document).ready(function($) {
            $('body').find('.mos-owl-carousel').each(function( e ) {            
                var oc = $(this);
                var ocOptions = oc.data('carousel-options');
                var defaults = {
                    loop: true,
                    nav: false,
                    autoplay: true,
                }
                oc.owlCarousel($.extend(defaults, ocOptions));
            });
        });
    </script>
    <?php endif?>
    <?php if (carbon_get_theme_option( 'mos_plugin_slick' ) == 'on') : ?>
    <script>
        jQuery(document).ready(function($) {
            $('.mos-slick').slick();
        });
    </script>
    <?php endif?>

</body>
</html>
