<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'mos_theme_options');
function mos_theme_options() {
    $basic_options_container = Container::make('theme_options', __('Theme Options'))
    ->set_icon('dashicons-admin-customizer')
    ->add_fields(array(
        Field::make('image', 'mos-logo', __('Logo'))
        ->set_default_value(get_template_directory_uri() . '/assets/img/logo.svg'),
        Field::make('header_scripts', 'crb_header_script', __('Header Script')),
        Field::make('footer_scripts', 'crb_footer_script', __('Footer Script')),
    ));

    Container::make('theme_options', __('Color scheme'))
    ->set_page_parent($basic_options_container) // reference to a top level container
    ->add_fields(array(
        Field::make('color', 'mos_body_bg', 'Body Background')
        //->set_palette(array('#FF0000', '#00FF00', '#0000FF'))
        ->set_alpha_enabled(true)
        ->set_help_text('Pick the color for body background, by default it is set to #ffffff. You can use this color in your css with var(--mos-body-bg)')
        ->set_default_value('#ffffff'),
        
        Field::make('color', 'mos_primary_color', 'Primary Color')
        ->set_help_text('Pick the primary color, by default it is set to #00f5eb. You can use this color in your css with var(--mos-primary-color)')
        ->set_default_value('#00f5eb'),
        
        Field::make('color', 'mos_secondary_color', 'Secondary Color')
        ->set_help_text('Pick the secondary color, by default it is set to #21fff6. You can use this color in your css with var(--mos-secondary-color)')
        ->set_default_value('#21fff6'),
        
        Field::make('color', 'mos_content_color', 'Content Color')
        ->set_help_text('Pick the content color, by default it is set to #212529. You can use this color in your css with var(--mos-content-color)')
        ->set_default_value('#212529'),
        Field::make('color', 'mos_link_color', 'Link Color')
        ->set_help_text('Pick the link color, by default it is set to #015ea5.')
        ->set_default_value('#015ea5'),
        Field::make('color', 'mos_link_hover_color', 'Link Hover Color')
        ->set_help_text('Pick the link hover color, by default it is set to #0a58ca.')
        ->set_default_value('#0a58ca'),
    ));
    
    Container::make('theme_options', __('Theme Resourcess'))
    ->set_page_parent($basic_options_container) // reference to a top level container
    ->add_fields(array(                 

        Field::make('radio', 'mos_plugin_bootstrap', __('Bootsrap'))
        ->set_options(array(
            'bootstrap-bundle' => 'Bundle CSS',
            'seperated-files' => 'Seperated Files',
            'off' => 'Disabled',
        ))
        ->set_default_value('bootstrap-bundle'),
        
        Field::make('multiselect', 'mos_plugin_bootstrap_seperated_files', __('Files'))
        ->set_options(array(
            'bootstrap-reboot' => 'Reboot CSS',
            'bootstrap-grid' => 'Grid CSS',
            'bootstrap-utilities' => 'Utilities CSS',
        ))
        ->set_required(true)
        ->set_conditional_logic(array(
            'relation' => 'AND', // Optional, defaults to "AND"
            array(
                'field' => 'mos_plugin_bootstrap',
                'value' => 'seperated-files', // Optional, defaults to "". Should be an array if "IN" or "NOT IN" operators are used.
                'compare' => '=', // Optional, defaults to "=". Available operators: =, <, >, <=, >=, IN, NOT IN
            )
        )),

        Field::make('radio', 'mos_plugin_jquery', __('Jquery'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value('on'),

        Field::make('radio', 'mos_plugin_fontawesome', __('Font Awesome'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value('on'),         

        Field::make('radio', 'mos_plugin_fancybox', __('Fancybox'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value(['off']),

        Field::make('radio', 'mos_plugin_isotop', __('Isotop'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value('off'),

        Field::make('radio', 'mos_plugin_card_slider', __('Card Slider'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value(['off']),
        Field::make('radio', 'mos_plugin_jpages', __('jPages'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value(['off']),
        Field::make('radio', 'mos_plugin_lazyload', __('Lazy Load'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value(['off']),
        Field::make('radio', 'mos_plugin_table_shrinker', __('Table Shrinker'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value(['off']),
        Field::make('radio', 'mos_plugin_owlcarousel', __('Owl Carousel'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value(['off']),
        Field::make('radio', 'mos_plugin_slick', __('Slick Slider'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value(['off']),
        Field::make('radio', 'mos_plugin_wow', __('Wow'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value(['off']),
        Field::make('radio', 'mos_plugin_animate', __('Animate CSS'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value(['off']),
        Field::make('radio', 'mos_plugin_jflip', __('Jquery Flip'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value(['off']),  
        Field::make('complex', 'mos_plugin_additional', __('Additional Assets'))
        ->add_fields(array(
            Field::make('select', 'type', __('Asset Type'))
            ->set_options(array(
                'style' => 'CSS',
                'script' => 'Script',
            )),
            Field::make('select', 'from', __('From'))
            ->set_options(array(
                'parent' => 'Parent Theme',
                'child' => 'Child Theme',
                'outside' => 'CDN/Outside',
            )),
            Field::make('text', 'source', __('Source')),
        )),
    ));
    Container::make('theme_options', __('Contact Info'))
    ->set_page_parent($basic_options_container) // reference to a top level container
    ->add_fields(array(
        Field::make('complex', 'mos-contact-phone', __('Phone'))
        ->add_fields(array(
            Field::make('text', 'title', __('Title')),
            Field::make('text', 'number', __('Phone Number')),
        ))
        ->set_header_template('
            <% if (title) { %>
                <%- title %> <%- number ? "(" + number + ")" : "" %>
            <% } %>
        ')
        ->set_collapsed(true),
        Field::make('complex', 'mos-contact-email', __('Email'))
        ->add_fields(array(
            Field::make('text', 'title', __('Title')),
            Field::make('text', 'email', __('Email Address')),
        ))
        ->set_header_template('
            <% if (title) { %>
                <%- title %> <%- email ? "(" + email + ")" : "" %>
            <% } %>
        ')
        ->set_collapsed(true),
        Field::make('complex', 'mos-contact-business-hours', __('Business Hours'))
        ->add_fields(array(
            Field::make('text', 'title', __('Title')),
            Field::make('text', 'hours', __('Business Hours')),
        ))
        ->set_header_template('
            <% if (title) { %>
                <%- title %> <%- hours ? "(" + hours + ")" : "" %>
            <% } %>
        ')
        ->set_collapsed(true),
        Field::make('complex', 'mos-contact-contact-address', __('Contact Address'))
        ->add_fields(array(
            Field::make('text', 'title', __('Title')),
            Field::make('text', 'address', __('Address')),
            Field::make('text', 'link', __('Map Link')),
        ))
        ->set_header_template('
            <% if (title) { %>
                <%- title %>
            <% } %>
        ')
        ->set_collapsed(true),
        Field::make('complex', 'mos-contact-social-media', __('Social Media'))
        ->add_fields(array(
            Field::make('text', 'title', __('Title')),
            Field::make('text', 'link', __('Link')),
            Field::make('checkbox', 'new-tab', __('Open in new tab'))
            ->set_option_value('no'),
        ))        
        ->set_header_template('
            <% if (title) { %>
                <%- title %> <%- link ? "(" + link + ")" : "" %>
            <% } %>
        ')
        ->set_collapsed(true),
    ));
    Container::make('theme_options', __('Back to Top'))
    ->set_page_parent($basic_options_container) // reference to a top level container
    ->add_fields(array(
        Field::make('radio', 'mos-back-to-top', __('Back to top option'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value(['on']),
        Field::make('image', 'mos-back-to-top-image', __('Back to top image')),
        Field::make('text', 'mos-back-to-top-class', __('Back to top class')),
    ));
    Container::make('theme_options', __('Page Loader'))
    ->set_page_parent($basic_options_container) // reference to a top level container
    ->add_fields(array(
        Field::make('radio', 'mos-page-loader', __('Page loader option'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value(['on']),
        Field::make('image', 'mos-page-loader-image', __('Page loader image')),
        Field::make('color', 'mos-page-loader-background', 'Page loader background')
        ->set_alpha_enabled(true),
        Field::make('text', 'mos-page-loader-class', __('Page loader class')),
    ));

    Container::make('theme_options', __('Header Section'))
    ->set_page_parent($basic_options_container) // reference to a top level container
    ->add_fields(array(
        Field::make('text', 'mos-header-padding', __('Padding')),
        Field::make('text', 'mos-header-margin', __('Margin')),
        Field::make('text', 'mos-header-border', __('Border')),
        Field::make('text', 'mos-header-class', __('Class')),
        Field::make('color', 'mos-header-content-color', __('Content Color')),
        Field::make('color', 'mos-header-link-color', __('Links Color')),
        Field::make('color', 'mos-header-link-color-hover', __('Hover Color')),
        Field::make('complex', 'mos-header-background', __('Background'))
        ->set_max(1)
        ->set_collapsed(true)
        ->add_fields(array(
            Field::make('color', 'background-color', __('Background Color')),
            Field::make('image', 'background-image', __('Background Image')),
            Field::make('select', 'background-position', __('Background Position'))
            ->set_options(array(
                'top left' => 'Top Left',
                'top center' => 'Top Center',
                'top right' => 'Top Right',
                'center left' => 'Center Left',
                'center center' => 'Center Center',
                'center right' => 'Center Right',
                'bottom left' => 'Bottom left',
                'bottom center' => 'Bottom Center',
                'bottom right' => 'Bottom Right',
            ))
            ->set_default_value(['top left']),
            Field::make('select', 'background-size', __('Background Size'))
            ->set_options(array(
                'cover' => 'cover',
                'contain' => 'contain',
                'auto' => 'auto',
                'inherit' => 'inherit',
                'initial' => 'initial',
                'revert' => 'revert',
                'revert-layer' => 'revert-layer',
                'unset' => 'unset',
            ))
            ->set_default_value(['cover']),
            //background-repeat: repeat|repeat-x|repeat-y|no-repeat|initial|inherit;
            Field::make('select', 'background-repeat', __('Background Repeat'))
            ->set_options(array(
                'repeat' => 'repeat',
                'repeat-x' => 'repeat-x',
                'repeat-y' => 'repeat-y',
                'no-repeat' => 'no-repeat',
                'initial' => 'initial',
                'inherit' => 'inherit',
            ))
            ->set_default_value(['scroll']),
            Field::make('select', 'background-attachment', __('Background Attachment'))
            ->set_options(array(
                'scroll' => 'Scroll',
                'fixed' => 'Fixed',
            ))
            ->set_default_value(['scroll']),
        )),
    ));
    Container::make('theme_options', __('Footer Section'))
    ->set_page_parent($basic_options_container) // reference to a top level container
    ->add_fields(array(
        Field::make('text', 'mos-footer-padding', __('Padding')),
        Field::make('text', 'mos-footer-margin', __('Margin')),
        Field::make('text', 'mos-footer-border', __('Border')),
        Field::make('text', 'mos-footer-class', __('Class')),
        Field::make('color', 'mos-footer-content-color', __('Content Color')),
        Field::make('color', 'mos-footer-link-color', __('Links Color')),
        Field::make('color', 'mos-footer-link-color-hover', __('Hover Color')),
        Field::make('rich_text', 'mos-footer-content', __('Copyright')),
        Field::make('complex', 'mos-footer-background', __('Background'))
        ->set_max(1)
        ->set_collapsed(true)
        ->add_fields(array(
            Field::make('color', 'background-color', __('Background Color')),
            Field::make('image', 'background-image', __('Background Image')),
            Field::make('select', 'background-position', __('Background Position'))
            ->set_options(array(
                'top left' => 'Top Left',
                'top center' => 'Top Center',
                'top right' => 'Top Right',
                'center left' => 'Center Left',
                'center center' => 'Center Center',
                'center right' => 'Center Right',
                'bottom left' => 'Bottom left',
                'bottom center' => 'Bottom Center',
                'bottom right' => 'Bottom Right',
            ))
            ->set_default_value(['top left']),
            Field::make('select', 'background-size', __('Background Size'))
            ->set_options(array(
                'cover' => 'cover',
                'contain' => 'contain',
                'auto' => 'auto',
                'inherit' => 'inherit',
                'initial' => 'initial',
                'revert' => 'revert',
                'revert-layer' => 'revert-layer',
                'unset' => 'unset',
            ))
            ->set_default_value(['cover']),
            //background-repeat: repeat|repeat-x|repeat-y|no-repeat|initial|inherit;
            Field::make('select', 'background-repeat', __('Background Repeat'))
            ->set_options(array(
                'repeat' => 'repeat',
                'repeat-x' => 'repeat-x',
                'repeat-y' => 'repeat-y',
                'no-repeat' => 'no-repeat',
                'initial' => 'initial',
                'inherit' => 'inherit',
            ))
            ->set_default_value(['scroll']),
            Field::make('select', 'background-attachment', __('Background Attachment'))
            ->set_options(array(
                'scroll' => 'Scroll',
                'fixed' => 'Fixed',
            ))
            ->set_default_value(['scroll']),
        )),
    ));
}
