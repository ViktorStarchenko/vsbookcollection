<?php
if (function_exists('acf_register_block_type_posts_list')) {
    add_action('acf/init', 'acf_register_block_type_posts_list');
}

function acf_register_block_type_posts_list() {
    acf_register_block_type(
        array(
            'name' => 'custom_posts_list',
            'title' => __('Custom Posts List'),
            'description' => __('Custom Posts List'),
            'render_template' => 'template-parts/gutenberg-blocks/gutenberg-posts-list.php',
            'icon' => 'editor-paste-text',
            'keywords' => array('posts_list', 'product', 'post'),
        )
    );
}

if (function_exists('acf_register_block_type_header_slider')) {
    add_action('acf/init', 'acf_register_block_type_header_slider');
}

function acf_register_block_type_header_slider() {
    acf_register_block_type(
        array(
            'name' => 'custom_header_slider',
            'title' => __('Custom Header Slider'),
            'description' => __('Custom Header Slider'),
            'render_template' => 'template-parts/gutenberg-blocks/gt-header-slider.php',
            'icon' => 'editor-paste-text',
            'keywords' => array('custom_accordion', 'product', 'post'),
        )
    );
}


if (function_exists('acf_register_block_type_accordion')) {
    add_action('acf/init', 'acf_register_block_type_accordion');
}

function acf_register_block_type_accordion() {
    acf_register_block_type(
        array(
            'name' => 'custom_accordion',
            'title' => __('Custom Accordion'),
            'description' => __('Custom Accordion Block'),
            'render_template' => 'template-parts/gutenberg-blocks/gt-accordion.php',
            'icon' => 'editor-paste-text',
            'keywords' => array('custom_accordion', 'product', 'post'),
        )
    );
}



if (function_exists('acf_register_block_type_image')) {
    add_action('acf/init', 'acf_register_block_type_image');
}

function acf_register_block_type_image() {
    acf_register_block_type(
        array(
            'name' => 'custom_image',
            'title' => __('Custom Image'),
            'description' => __('Custom Image Block'),
            'render_template' => 'template-parts/gutenberg-blocks/gt-image.php',
            'icon' => 'editor-paste-text',
            'keywords' => array('custom_image', 'product', 'post'),
        )
    );
}

if (function_exists('acf_register_block_type_video')) {
    add_action('acf/init', 'acf_register_block_type_video');
}

function acf_register_block_type_video() {
    acf_register_block_type(
        array(
            'name' => 'custom_video',
            'title' => __('Custom Video'),
            'description' => __('Custom Video Block'),
            'render_template' => 'template-parts/gutenberg-blocks/gt-video.php',
            'icon' => 'editor-paste-text',
            'keywords' => array('custom_video', 'product', 'post'),
        )
    );
}

if (function_exists('acf_register_block_type_gallery')) {
    add_action('acf/init', 'acf_register_block_type_gallery');
}

function acf_register_block_type_gallery() {
    acf_register_block_type(
        array(
            'name' => 'custom_gallery',
            'title' => __('Custom Gallery'),
            'description' => __('Custom Gallery Block'),
            'render_template' => 'template-parts/gutenberg-blocks/gt-gallery.php',
            'icon' => 'editor-paste-text',
            'keywords' => array('custom_gallery', 'product', 'post'),
        )
    );
}