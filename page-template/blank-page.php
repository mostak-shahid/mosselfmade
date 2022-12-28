<?php /*Template Name: Blank Page Template*/ ?>
<?php 
if (is_home()) $page_id = get_option( 'page_for_posts' );
elseif (is_front_page()) $page_id = get_option('page_on_front');
else $page_id = get_the_ID();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en-US"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en-US"> <![endif]-->
<!--[if gt IE 8]><!-->
<!--<![endif]-->
<!--[if gte IE 9] <style type="text/css"> .gradient {filter: none;}</style><![endif]-->
<!--[if !IE]><html lang="en"><![endif]-->
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
    <![endif]-->
    <style>
        :root {
            --mos-body-bg: <?php echo carbon_get_theme_option('mos_body_bg')?carbon_get_theme_option('mos_body_bg'):'#fff'?>;
            --mos-primary-color: <?php echo carbon_get_theme_option('mos_primary_color')?carbon_get_theme_option('mos_primary_color'):'#00f5eb'?>;
            --mos-secondary-color: <?php echo carbon_get_theme_option('mos_secondary_color')?carbon_get_theme_option('mos_secondary_color'):'#21fff6'?>;
            --mos-content-color: <?php echo carbon_get_theme_option('mos_content_color')?carbon_get_theme_option('mos_content_color'):'#212529'?>;
        }

    </style>
    <?php wp_head(); ?>
    <script>
        function hideLoader() {
            console.log(0);
            document.getElementById("page-loader").style.display = "none";
            //document.getElementById("page-loader").classList.add("d-none");
        }

    </script>
</head>

<body <?php body_class(); ?> <?php if (carbon_get_theme_option( 'mos-page-loader' ) == 'on') : ?> onload='document.getElementById("page-loader").classList.add("d-none")' <?php endif?>>
    <?php if (carbon_get_theme_option( 'mos-page-loader' ) == 'on') : ?>
    <div id="page-loader" class="se-pre-con position-fixed top-0 start-0 bottom-0 end-0 d-flex justify-content-center align-items-center <?php echo carbon_get_theme_option( 'mos-page-loader-class' )?>" <?php if (carbon_get_theme_option( 'mos-page-loader-background' )) echo 'style="background-color:'.carbon_get_theme_option( 'mos-page-loader-background' ).'"' ?>>
        <?php if(carbon_get_theme_option( 'mos-page-loader-image' )): ?>
        <?php echo wp_get_attachment_image( carbon_get_theme_option( 'mos-page-loader-image' ), 'full', "", array( "class" => "loading-image" ) );  ?>
        <div class="rotating-border"></div>
        <?php else: ?>
        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
        <?php endif?>
    </div>
    <?php endif; ?>
    
<?php the_content() ?>

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