<?php
/**
 * Theme setup and customization functions.
 *
 * - Adds theme support for post thumbnails, post formats, WooCommerce, and product gallery features.
 * - Registers primary and secondary navigation menus.
 * - Removes <br> tags from Contact Form 7 forms and disables automatic <p> tag wrapping.
 * - Replaces the default excerpt meta box with a TinyMCE (WYSIWYG) editor for excerpts.
 * - Saves a list of active plugins (including network-activated plugins in multisite) to a file named 'plugin.txt' in the theme directory.
 *
 * Hooks and Filters:
 * - after_setup_theme: Initializes theme features and menus.
 * - wpcf7_form_elements: Filters Contact Form 7 form HTML to remove <br> tags.
 * - wpcf7_autop_or_not: Disables automatic <p> tag wrapping in Contact Form 7 forms.
 * - add_meta_boxes: Replaces the excerpt meta box with a WYSIWYG editor.
 * - admin_init: Saves the list of active plugins to a file.
 */

if (! function_exists('theme_setup')) :
    function theme_setup_setup()
    {
        add_theme_support('post-thumbnails');
        add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video'));
        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');

        register_nav_menus(array(
            'primary' => __('Primary Menu', 'theme_setup'),
            'secondary' => __('Secondary Menu', 'theme_setup'),
        ));
    }
    add_action('after_setup_theme', 'theme_setup_setup');
endif;

function remove_br_from_cf7_form($form)
{

    $form = str_replace('<br>', '', $form);
    $form = str_replace('<br />', '', $form);
    return $form;
}
add_filter('wpcf7_form_elements', 'remove_br_from_cf7_form');

// disable wrapper of cf7 p tag
add_filter('wpcf7_autop_or_not', '__return_false');

// Enable TinyMCE (WYSIWYG) editor for excerpts
function wysiwyg_excerpt_meta_box()
{
    remove_meta_box('postexcerpt', null, 'normal');
    add_meta_box(
        'postexcerpt',
        __('Excerpt'),
        'wysiwyg_excerpt_meta_box_callback',
        null,
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'wysiwyg_excerpt_meta_box');

function wysiwyg_excerpt_meta_box_callback($post)
{
    $excerpt = get_the_excerpt($post);
    wp_editor(
        $excerpt,
        'excerpt',
        array(
            'textarea_rows' => 10,
            'media_buttons' => false,
            'teeny'         => true,
        )
    );
}


function save_active_plugins_list() {
    $active_plugins = get_option('active_plugins');
    if (is_multisite()) {
        $network_plugins = get_site_option('active_sitewide_plugins');
        if ($network_plugins && is_array($network_plugins)) {
            $active_plugins = array_merge($active_plugins, array_keys($network_plugins));
        }
    }
    $plugin_names = array();
    foreach ($active_plugins as $plugin_file) {
        $plugin_data = get_plugin_data(WP_PLUGIN_DIR . '/' . $plugin_file, false, false);
        $plugin_names[] = $plugin_data['Name'] ?? $plugin_file;
    }
    $output = implode(PHP_EOL, $plugin_names);
    $file = get_template_directory() . '/plugin.txt';
    file_put_contents($file, $output);
}
add_action('admin_init', 'save_active_plugins_list');