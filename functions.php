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
 * Using ACF Free Version - No Repeaters or Options Pages
 */
if( function_exists('acf_add_local_field_group') ):

/**
 * Logo Settings Fields (moved to homepage)
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
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'default',
            ),
        ),
    ),
));

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
            'key' => 'field_hero_image_1',
            'label' => 'Hero Background Image 1',
            'name' => 'hero_image_1',
            'type' => 'image',
            'return_format' => 'url',
        ),
        array(
            'key' => 'field_hero_image_2',
            'label' => 'Hero Background Image 2',
            'name' => 'hero_image_2',
            'type' => 'image',
            'return_format' => 'url',
        ),
        array(
            'key' => 'field_hero_image_3',
            'label' => 'Hero Background Image 3',
            'name' => 'hero_image_3',
            'type' => 'image',
            'return_format' => 'url',
        ),
        array(
            'key' => 'field_hero_image_4',
            'label' => 'Hero Background Image 4',
            'name' => 'hero_image_4',
            'type' => 'image',
            'return_format' => 'url',
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
        // Brand 1
        array(
            'key' => 'field_brand_1_logo',
            'label' => 'Brand 1 Logo',
            'name' => 'brand_1_logo',
            'type' => 'image',
            'return_format' => 'array',
        ),
        array(
            'key' => 'field_brand_1_tagline',
            'label' => 'Brand 1 Tagline',
            'name' => 'brand_1_tagline',
            'type' => 'text',
        ),
        // Brand 2
        array(
            'key' => 'field_brand_2_logo',
            'label' => 'Brand 2 Logo',
            'name' => 'brand_2_logo',
            'type' => 'image',
            'return_format' => 'array',
        ),
        array(
            'key' => 'field_brand_2_tagline',
            'label' => 'Brand 2 Tagline',
            'name' => 'brand_2_tagline',
            'type' => 'text',
        ),
        // Brand 3
        array(
            'key' => 'field_brand_3_logo',
            'label' => 'Brand 3 Logo',
            'name' => 'brand_3_logo',
            'type' => 'image',
            'return_format' => 'array',
        ),
        array(
            'key' => 'field_brand_3_tagline',
            'label' => 'Brand 3 Tagline',
            'name' => 'brand_3_tagline',
            'type' => 'text',
        ),
        // Brand 4
        array(
            'key' => 'field_brand_4_logo',
            'label' => 'Brand 4 Logo',
            'name' => 'brand_4_logo',
            'type' => 'image',
            'return_format' => 'array',
        ),
        array(
            'key' => 'field_brand_4_tagline',
            'label' => 'Brand 4 Tagline',
            'name' => 'brand_4_tagline',
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
            'key' => 'field_about_image_1',
            'label' => 'About Image 1',
            'name' => 'about_image_1',
            'type' => 'image',
            'return_format' => 'array',
        ),
        array(
            'key' => 'field_about_image_2',
            'label' => 'About Image 2',
            'name' => 'about_image_2',
            'type' => 'image',
            'return_format' => 'array',
        ),
        array(
            'key' => 'field_about_image_3',
            'label' => 'About Image 3',
            'name' => 'about_image_3',
            'type' => 'image',
            'return_format' => 'array',
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
 * Services Section Fields (6 individual services)
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

        // Service 1
        array(
            'key' => 'field_service_1_title',
            'label' => 'Service 1 Title',
            'name' => 'service_1_title',
            'type' => 'text',
        ),
        array(
            'key' => 'field_service_1_description',
            'label' => 'Service 1 Description',
            'name' => 'service_1_description',
            'type' => 'textarea',
        ),
        array(
            'key' => 'field_service_1_type',
            'label' => 'Service 1 Card Type',
            'name' => 'service_1_type',
            'type' => 'select',
            'choices' => array(
                'solid' => 'Solid Background with Foreground Image',
                'background' => 'Background Image Only',
            ),
            'default_value' => 'solid',
        ),
        array(
            'key' => 'field_service_1_image',
            'label' => 'Service 1 Image',
            'name' => 'service_1_image',
            'type' => 'image',
            'return_format' => 'array',
        ),
        array(
            'key' => 'field_service_1_bg_color',
            'label' => 'Service 1 Background Color',
            'name' => 'service_1_bg_color',
            'type' => 'select',
            'choices' => array(
                'primary' => 'Primary Color',
                'accent' => 'Accent Color',
            ),
            'default_value' => 'primary',
        ),

        // Service 2
        array(
            'key' => 'field_service_2_title',
            'label' => 'Service 2 Title',
            'name' => 'service_2_title',
            'type' => 'text',
        ),
        array(
            'key' => 'field_service_2_description',
            'label' => 'Service 2 Description',
            'name' => 'service_2_description',
            'type' => 'textarea',
        ),
        array(
            'key' => 'field_service_2_type',
            'label' => 'Service 2 Card Type',
            'name' => 'service_2_type',
            'type' => 'select',
            'choices' => array(
                'solid' => 'Solid Background with Foreground Image',
                'background' => 'Background Image Only',
            ),
            'default_value' => 'solid',
        ),
        array(
            'key' => 'field_service_2_image',
            'label' => 'Service 2 Image',
            'name' => 'service_2_image',
            'type' => 'image',
            'return_format' => 'array',
        ),
        array(
            'key' => 'field_service_2_bg_color',
            'label' => 'Service 2 Background Color',
            'name' => 'service_2_bg_color',
            'type' => 'select',
            'choices' => array(
                'primary' => 'Primary Color',
                'accent' => 'Accent Color',
            ),
            'default_value' => 'primary',
        ),

        // Service 3
        array(
            'key' => 'field_service_3_title',
            'label' => 'Service 3 Title',
            'name' => 'service_3_title',
            'type' => 'text',
        ),
        array(
            'key' => 'field_service_3_description',
            'label' => 'Service 3 Description',
            'name' => 'service_3_description',
            'type' => 'textarea',
        ),
        array(
            'key' => 'field_service_3_type',
            'label' => 'Service 3 Card Type',
            'name' => 'service_3_type',
            'type' => 'select',
            'choices' => array(
                'solid' => 'Solid Background with Foreground Image',
                'background' => 'Background Image Only',
            ),
            'default_value' => 'solid',
        ),
        array(
            'key' => 'field_service_3_image',
            'label' => 'Service 3 Image',
            'name' => 'service_3_image',
            'type' => 'image',
            'return_format' => 'array',
        ),
        array(
            'key' => 'field_service_3_bg_color',
            'label' => 'Service 3 Background Color',
            'name' => 'service_3_bg_color',
            'type' => 'select',
            'choices' => array(
                'primary' => 'Primary Color',
                'accent' => 'Accent Color',
            ),
            'default_value' => 'primary',
        ),

        // Service 4
        array(
            'key' => 'field_service_4_title',
            'label' => 'Service 4 Title',
            'name' => 'service_4_title',
            'type' => 'text',
        ),
        array(
            'key' => 'field_service_4_description',
            'label' => 'Service 4 Description',
            'name' => 'service_4_description',
            'type' => 'textarea',
        ),
        array(
            'key' => 'field_service_4_type',
            'label' => 'Service 4 Card Type',
            'name' => 'service_4_type',
            'type' => 'select',
            'choices' => array(
                'solid' => 'Solid Background with Foreground Image',
                'background' => 'Background Image Only',
            ),
            'default_value' => 'solid',
        ),
        array(
            'key' => 'field_service_4_image',
            'label' => 'Service 4 Image',
            'name' => 'service_4_image',
            'type' => 'image',
            'return_format' => 'array',
        ),
        array(
            'key' => 'field_service_4_bg_color',
            'label' => 'Service 4 Background Color',
            'name' => 'service_4_bg_color',
            'type' => 'select',
            'choices' => array(
                'primary' => 'Primary Color',
                'accent' => 'Accent Color',
            ),
            'default_value' => 'primary',
        ),

        // Service 5
        array(
            'key' => 'field_service_5_title',
            'label' => 'Service 5 Title',
            'name' => 'service_5_title',
            'type' => 'text',
        ),
        array(
            'key' => 'field_service_5_description',
            'label' => 'Service 5 Description',
            'name' => 'service_5_description',
            'type' => 'textarea',
        ),
        array(
            'key' => 'field_service_5_type',
            'label' => 'Service 5 Card Type',
            'name' => 'service_5_type',
            'type' => 'select',
            'choices' => array(
                'solid' => 'Solid Background with Foreground Image',
                'background' => 'Background Image Only',
            ),
            'default_value' => 'solid',
        ),
        array(
            'key' => 'field_service_5_image',
            'label' => 'Service 5 Image',
            'name' => 'service_5_image',
            'type' => 'image',
            'return_format' => 'array',
        ),
        array(
            'key' => 'field_service_5_bg_color',
            'label' => 'Service 5 Background Color',
            'name' => 'service_5_bg_color',
            'type' => 'select',
            'choices' => array(
                'primary' => 'Primary Color',
                'accent' => 'Accent Color',
            ),
            'default_value' => 'primary',
        ),

        // Service 6
        array(
            'key' => 'field_service_6_title',
            'label' => 'Service 6 Title',
            'name' => 'service_6_title',
            'type' => 'text',
        ),
        array(
            'key' => 'field_service_6_description',
            'label' => 'Service 6 Description',
            'name' => 'service_6_description',
            'type' => 'textarea',
        ),
        array(
            'key' => 'field_service_6_type',
            'label' => 'Service 6 Card Type',
            'name' => 'service_6_type',
            'type' => 'select',
            'choices' => array(
                'solid' => 'Solid Background with Foreground Image',
                'background' => 'Background Image Only',
            ),
            'default_value' => 'solid',
        ),
        array(
            'key' => 'field_service_6_image',
            'label' => 'Service 6 Image',
            'name' => 'service_6_image',
            'type' => 'image',
            'return_format' => 'array',
        ),
        array(
            'key' => 'field_service_6_bg_color',
            'label' => 'Service 6 Background Color',
            'name' => 'service_6_bg_color',
            'type' => 'select',
            'choices' => array(
                'primary' => 'Primary Color',
                'accent' => 'Accent Color',
            ),
            'default_value' => 'primary',
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
 * Portfolio Section Fields (12 individual images)
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
            'key' => 'field_portfolio_image_1',
            'label' => 'Portfolio Image 1',
            'name' => 'portfolio_image_1',
            'type' => 'image',
            'return_format' => 'array',
        ),
        array(
            'key' => 'field_portfolio_image_2',
            'label' => 'Portfolio Image 2',
            'name' => 'portfolio_image_2',
            'type' => 'image',
            'return_format' => 'array',
        ),
        array(
            'key' => 'field_portfolio_image_3',
            'label' => 'Portfolio Image 3',
            'name' => 'portfolio_image_3',
            'type' => 'image',
            'return_format' => 'array',
        ),
        array(
            'key' => 'field_portfolio_image_4',
            'label' => 'Portfolio Image 4',
            'name' => 'portfolio_image_4',
            'type' => 'image',
            'return_format' => 'array',
        ),
        array(
            'key' => 'field_portfolio_image_5',
            'label' => 'Portfolio Image 5',
            'name' => 'portfolio_image_5',
            'type' => 'image',
            'return_format' => 'array',
        ),
        array(
            'key' => 'field_portfolio_image_6',
            'label' => 'Portfolio Image 6',
            'name' => 'portfolio_image_6',
            'type' => 'image',
            'return_format' => 'array',
        ),
        array(
            'key' => 'field_portfolio_image_7',
            'label' => 'Portfolio Image 7',
            'name' => 'portfolio_image_7',
            'type' => 'image',
            'return_format' => 'array',
        ),
        array(
            'key' => 'field_portfolio_image_8',
            'label' => 'Portfolio Image 8',
            'name' => 'portfolio_image_8',
            'type' => 'image',
            'return_format' => 'array',
        ),
        array(
            'key' => 'field_portfolio_image_9',
            'label' => 'Portfolio Image 9',
            'name' => 'portfolio_image_9',
            'type' => 'image',
            'return_format' => 'array',
        ),
        array(
            'key' => 'field_portfolio_image_10',
            'label' => 'Portfolio Image 10',
            'name' => 'portfolio_image_10',
            'type' => 'image',
            'return_format' => 'array',
        ),
        array(
            'key' => 'field_portfolio_image_11',
            'label' => 'Portfolio Image 11',
            'name' => 'portfolio_image_11',
            'type' => 'image',
            'return_format' => 'array',
        ),
        array(
            'key' => 'field_portfolio_image_12',
            'label' => 'Portfolio Image 12',
            'name' => 'portfolio_image_12',
            'type' => 'image',
            'return_format' => 'array',
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

endif; // End ACF check

/**
 * Custom Navigation Walker (Optional - for more control)
 */
class PJ_Designs_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }
}
