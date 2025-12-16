<?php
/**
 * PJ Designs Theme Functions
 *
 * @package PJDesigns
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Theme Setup
 */
function pjdesigns_theme_setup() {
    // Add theme support
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    // Register navigation menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'pjdesigns' ),
    ) );
}
add_action( 'after_setup_theme', 'pjdesigns_theme_setup' );

/**
 * Enqueue Scripts and Styles
 */
function pjdesigns_enqueue_scripts() {
    // Enqueue Font Awesome
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), '6.5.1' );

    // Enqueue theme stylesheet
    wp_enqueue_style( 'pjdesigns-style', get_stylesheet_uri(), array(), '1.0.0' );

    // Enqueue theme scripts (will be added inline in footer.php)
}
add_action( 'wp_enqueue_scripts', 'pjdesigns_enqueue_scripts' );

/**
 * Register ACF Field Groups
 */
if( function_exists('acf_add_local_field_group') ):

/**
 * Hero Section Fields
 */
acf_add_local_field_group(array(
    'key' => 'group_hero_section',
    'title' => 'Hero Section',
    'fields' => array(
        array(
            'key' => 'field_hero_title',
            'label' => 'Hero Title',
            'name' => 'hero_title',
            'type' => 'text',
            'default_value' => 'Creative Design Solutions',
        ),
        array(
            'key' => 'field_hero_subtitle',
            'label' => 'Hero Subtitle',
            'name' => 'hero_subtitle',
            'type' => 'text',
            'default_value' => 'Transforming Ideas Into Stunning Visual Experiences',
        ),
        array(
            'key' => 'field_hero_tagline',
            'label' => 'Hero Tagline',
            'name' => 'hero_tagline',
            'type' => 'text',
            'default_value' => 'Since 2004',
        ),
        array(
            'key' => 'field_hero_button_text',
            'label' => 'Button Text',
            'name' => 'hero_button_text',
            'type' => 'text',
            'default_value' => 'Let\'s Work Together',
        ),
        array(
            'key' => 'field_hero_button_link',
            'label' => 'Button Link',
            'name' => 'hero_button_link',
            'type' => 'text',
            'default_value' => '#contact',
        ),
        array(
            'key' => 'field_hero_images',
            'label' => 'Hero Background Images',
            'name' => 'hero_images',
            'type' => 'repeater',
            'min' => 1,
            'max' => 4,
            'layout' => 'table',
            'button_label' => 'Add Image',
            'sub_fields' => array(
                array(
                    'key' => 'field_hero_image',
                    'label' => 'Background Image',
                    'name' => 'image',
                    'type' => 'image',
                    'return_format' => 'url',
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'default',
            ),
        ),
    ),
));

/**
 * About Section Fields
 */
acf_add_local_field_group(array(
    'key' => 'group_about_section',
    'title' => 'About Section',
    'fields' => array(
        array(
            'key' => 'field_about_title',
            'label' => 'Section Title',
            'name' => 'about_title',
            'type' => 'text',
            'default_value' => 'About PJ Designs',
        ),
        array(
            'key' => 'field_about_content',
            'label' => 'About Content',
            'name' => 'about_content',
            'type' => 'wysiwyg',
            'tabs' => 'all',
            'toolbar' => 'full',
            'media_upload' => 0,
        ),
        array(
            'key' => 'field_about_gallery',
            'label' => 'About Gallery Images',
            'name' => 'about_gallery',
            'type' => 'repeater',
            'min' => 3,
            'max' => 3,
            'layout' => 'table',
            'button_label' => 'Add Image',
            'sub_fields' => array(
                array(
                    'key' => 'field_about_gallery_image',
                    'label' => 'Image',
                    'name' => 'image',
                    'type' => 'image',
                    'return_format' => 'array',
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'default',
            ),
        ),
    ),
));

/**
 * Services Section Fields
 */
acf_add_local_field_group(array(
    'key' => 'group_services_section',
    'title' => 'Services Section',
    'fields' => array(
        array(
            'key' => 'field_services_title',
            'label' => 'Section Title',
            'name' => 'services_title',
            'type' => 'text',
            'default_value' => 'Our Services',
        ),
        array(
            'key' => 'field_services',
            'label' => 'Services',
            'name' => 'services',
            'type' => 'repeater',
            'min' => 1,
            'max' => 6,
            'layout' => 'row',
            'button_label' => 'Add Service',
            'sub_fields' => array(
                array(
                    'key' => 'field_service_title',
                    'label' => 'Service Title',
                    'name' => 'title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_service_description',
                    'label' => 'Service Description',
                    'name' => 'description',
                    'type' => 'textarea',
                ),
                array(
                    'key' => 'field_service_type',
                    'label' => 'Card Type',
                    'name' => 'card_type',
                    'type' => 'select',
                    'choices' => array(
                        'solid' => 'Solid Background with Foreground Image',
                        'background' => 'Background Image Only',
                    ),
                    'default_value' => 'solid',
                ),
                array(
                    'key' => 'field_service_image',
                    'label' => 'Service Image',
                    'name' => 'image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'instructions' => 'For "Solid Background" type: foreground image. For "Background Image" type: background image.',
                ),
                array(
                    'key' => 'field_service_bg_color',
                    'label' => 'Background Color',
                    'name' => 'bg_color',
                    'type' => 'select',
                    'choices' => array(
                        'primary' => 'Primary Color',
                        'accent' => 'Accent Color',
                    ),
                    'default_value' => 'primary',
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_service_type',
                                'operator' => '==',
                                'value' => 'solid',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'default',
            ),
        ),
    ),
));

/**
 * Brand Partners Section Fields
 */
acf_add_local_field_group(array(
    'key' => 'group_brands_section',
    'title' => 'Brand Partners Section',
    'fields' => array(
        array(
            'key' => 'field_brands_title',
            'label' => 'Section Title',
            'name' => 'brands_title',
            'type' => 'text',
            'default_value' => 'Featured Brand Partners',
        ),
        array(
            'key' => 'field_brands_intro',
            'label' => 'Introduction Text',
            'name' => 'brands_intro',
            'type' => 'textarea',
        ),
        array(
            'key' => 'field_brands',
            'label' => 'Brand Partners',
            'name' => 'brands',
            'type' => 'repeater',
            'min' => 1,
            'layout' => 'table',
            'button_label' => 'Add Brand',
            'sub_fields' => array(
                array(
                    'key' => 'field_brand_logo',
                    'label' => 'Brand Logo',
                    'name' => 'logo',
                    'type' => 'image',
                    'return_format' => 'array',
                ),
                array(
                    'key' => 'field_brand_tagline',
                    'label' => 'Brand Tagline',
                    'name' => 'tagline',
                    'type' => 'text',
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'default',
            ),
        ),
    ),
));

/**
 * Portfolio Section Fields
 */
acf_add_local_field_group(array(
    'key' => 'group_portfolio_section',
    'title' => 'Portfolio Section',
    'fields' => array(
        array(
            'key' => 'field_portfolio_title',
            'label' => 'Section Title',
            'name' => 'portfolio_title',
            'type' => 'text',
            'default_value' => 'Our Work',
        ),
        array(
            'key' => 'field_portfolio_images',
            'label' => 'Portfolio Images',
            'name' => 'portfolio_images',
            'type' => 'repeater',
            'min' => 1,
            'layout' => 'table',
            'button_label' => 'Add Image',
            'sub_fields' => array(
                array(
                    'key' => 'field_portfolio_image',
                    'label' => 'Image',
                    'name' => 'image',
                    'type' => 'image',
                    'return_format' => 'array',
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'default',
            ),
        ),
    ),
));

/**
 * Booking Section Fields
 */
acf_add_local_field_group(array(
    'key' => 'group_booking_section',
    'title' => 'Booking Section',
    'fields' => array(
        array(
            'key' => 'field_booking_title',
            'label' => 'Section Title',
            'name' => 'booking_title',
            'type' => 'text',
            'default_value' => 'Schedule a Consultation',
        ),
        array(
            'key' => 'field_booking_intro',
            'label' => 'Introduction Text',
            'name' => 'booking_intro',
            'type' => 'textarea',
        ),
        array(
            'key' => 'field_calendly_url',
            'label' => 'Calendly URL',
            'name' => 'calendly_url',
            'type' => 'url',
            'instructions' => 'Enter your Calendly scheduling page URL',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'default',
            ),
        ),
    ),
));

/**
 * Contact Section Fields
 */
acf_add_local_field_group(array(
    'key' => 'group_contact_section',
    'title' => 'Contact Section',
    'fields' => array(
        array(
            'key' => 'field_contact_title',
            'label' => 'Section Title',
            'name' => 'contact_title',
            'type' => 'text',
            'default_value' => 'Get In Touch',
        ),
        array(
            'key' => 'field_contact_heading',
            'label' => 'Contact Heading',
            'name' => 'contact_heading',
            'type' => 'text',
            'default_value' => 'Let\'s Create Something Amazing',
        ),
        array(
            'key' => 'field_contact_intro',
            'label' => 'Introduction Text',
            'name' => 'contact_intro',
            'type' => 'textarea',
        ),
        array(
            'key' => 'field_contact_email',
            'label' => 'Email Address',
            'name' => 'contact_email',
            'type' => 'email',
        ),
        array(
            'key' => 'field_contact_phone',
            'label' => 'Phone Number',
            'name' => 'contact_phone',
            'type' => 'text',
        ),
        array(
            'key' => 'field_contact_location',
            'label' => 'Location',
            'name' => 'contact_location',
            'type' => 'text',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'default',
            ),
        ),
    ),
));

/**
 * Logo Settings
 */
acf_add_local_field_group(array(
    'key' => 'group_logo_settings',
    'title' => 'Logo Settings',
    'fields' => array(
        array(
            'key' => 'field_logo_white',
            'label' => 'White Logo',
            'name' => 'logo_white',
            'type' => 'image',
            'return_format' => 'array',
            'instructions' => 'Logo for transparent header (white version)',
        ),
        array(
            'key' => 'field_logo_color',
            'label' => 'Color Logo',
            'name' => 'logo_color',
            'type' => 'image',
            'return_format' => 'array',
            'instructions' => 'Logo for scrolled header (color version)',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'theme-general-settings',
            ),
        ),
    ),
));

endif; // End ACF check

/**
 * Add ACF Options Page
 */
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

/**
 * Custom Navigation Walker (Optional - for more control)
 */
class PJ_Designs_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }
}
