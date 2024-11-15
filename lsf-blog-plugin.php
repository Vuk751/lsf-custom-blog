<?php
/*
Plugin Name: LSF Blog Plugin
Plugin URI: https://github.com/Vuk751/lsf-custom-blog
GitHub Plugin https://github.com/Vuk751/lsf-custom-blog
Description: Custom blog functionality for LSF
Version: 1.0.1
Author: Vuk Knežević
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


require 'plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/Vuk751/lsf-custom-blog/',
	__FILE__,
	'unique-plugin-or-theme-slug'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');

// Include the functions file
require_once plugin_dir_path(__FILE__) . 'lsf-blog-functions.php';

// Register the custom template
function lsf_blog_add_template_to_select($post_templates) {
    $post_templates['lsf-single-blog.php'] = __('LSF Single Blog Template', 'lsf-blog-plugin');
    return $post_templates;
}
add_filter('theme_post_templates', 'lsf_blog_add_template_to_select');

// Use the custom template when selected
function lsf_blog_use_custom_template($template) {
    if (is_singular('post')) {
        $post_template = get_post_meta(get_the_ID(), '_wp_page_template', true);
        if ('lsf-single-blog.php' === basename($post_template)) {
            $template = plugin_dir_path(__FILE__) . 'lsf-single-blog.php';
        }
    }
    return $template;
}
add_filter('single_template', 'lsf_blog_use_custom_template');
