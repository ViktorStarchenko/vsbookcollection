<?php
if (function_exists('acf_register_block_type_header_slider')) {
    add_action('acf/init', 'acf_register_block_type_header_slider');
}

function acf_register_block_type_header_slider() {
    acf_register_block_type(
        array(
            'name' => 'header_slider',
            'title' => __('Custom Header Slider'),
            'description' => __('Custom Header Slider'),
            'render_template' => 'template-parts/gutenberg-blocks/gutenberg-header-slider.php',
            'icon' => 'editor-paste-text',
            'keywords' => array('header_slider', 'product', 'post'),
        )
    );
}

if (function_exists('acf_register_block_type_books_list')) {
    add_action('acf/init', 'acf_register_block_type_books_list');
}

function acf_register_block_type_books_list() {
    acf_register_block_type(
        array(
            'name' => 'books_list',
            'title' => __('Custom Books List'),
            'description' => __('Custom Books List'),
            'render_template' => 'template-parts/gutenberg-blocks/gutenberg-books-list.php',
            'icon' => 'editor-paste-text',
            'keywords' => array('books_list', 'product', 'post'),
        )
    );
}

if (function_exists('acf_register_block_type_latest_books')) {
    add_action('acf/init', 'acf_register_block_type_latest_books');
}

function acf_register_block_type_latest_books() {
    acf_register_block_type(
        array(
            'name' => 'latest_books',
            'title' => __('Custom Latest Books'),
            'description' => __('Custom Latest Books'),
            'render_template' => 'template-parts/gutenberg-blocks/gutenberg-latest-books.php',
            'icon' => 'editor-paste-text',
            'keywords' => array('latest_books', 'product', 'post'),
        )
    );
}

if (function_exists('acf_register_block_type_books_filter')) {
    add_action('acf/init', 'acf_register_block_type_books_filter');
}

function acf_register_block_type_books_filter() {
    acf_register_block_type(
        array(
            'name' => 'books_filter',
            'title' => __('Custom Books Filter'),
            'description' => __('Custom Books Filter'),
            'render_template' => 'template-parts/gutenberg-blocks/gutenberg-books-filter.php',
            'icon' => 'editor-paste-text',
            'keywords' => array('books_filter', 'product', 'post'),
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
            'render_template' => 'template-parts/gt-blocks/gt-accordion.php',
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
            'render_template' => 'template-parts/gt-blocks/gt-image.php',
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
            'render_template' => 'template-parts/gt-blocks/gt-video.php',
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
            'render_template' => 'template-parts/gt-blocks/gt-gallery.php',
            'icon' => 'editor-paste-text',
            'keywords' => array('custom_gallery', 'product', 'post'),
        )
    );
}