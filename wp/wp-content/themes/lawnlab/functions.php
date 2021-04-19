<?php

add_filter('show_admin_bar', '__return_false');

add_action('wp_enqueue_scripts', function() {
	list($src, $version) = get_asset_url('js/main.js', true);
	wp_enqueue_script('main', $src, ['jquery'], $version, true);
});

add_action('acf/init', function() {
	if (function_exists('acf_add_options_page')) {
		acf_add_options_page([
			'page_title' => 'Home',
			'menu_title' => 'Home',
			'menu_slug'  => 'home',
			'capability' => 'edit_others_posts',
			'position'   => 4,
			'icon_url'   => 'dashicons-admin-home'
		]);
	}
});

add_filter('acf/settings/load_json', function($path) {
	return get_stylesheet_directory() . '/acf';
});

add_filter('acf/settings/save_json', function($path) {
	return get_stylesheet_directory() . '/acf';
});

add_action('after_setup_theme', function() {
	add_theme_support('post-thumbnails');
	add_theme_support('title-tag');
	add_theme_support('html5', ['search-form', 'gallery', 'caption', 'style', 'script']);
});

add_filter('img_caption_shortcode_width', '__return_false');

function image_url($id, $size = 'large') {
	list($url) = wp_get_attachment_image_src($id, $size);
	return $url;
}

function asset_url($file) {
	echo get_asset_url($file);
}

function get_asset_url($file, $return_version = false) {
	$url  = get_stylesheet_directory_uri() . "/$file";
	$path = get_stylesheet_directory() . "/$file";
	$ver  = filemtime($path);
	if ($return_version) {
		return [$url, $ver];
	} else {
		return "$url?$ver";
	}
}
