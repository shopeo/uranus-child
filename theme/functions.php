<?php

if ( ! function_exists( 'uranus_child_styles' ) ) {
	function uranus_child_styles() {
		$theme_version = wp_get_theme()->get( 'Version' );
		wp_enqueue_style( 'uranus-child-style', get_stylesheet_uri(), array( 'uranus-style' ), $theme_version );
		wp_style_add_data( 'uranus-child-style', 'rtl', 'replace' );
//		 Add print css
		wp_enqueue_style( 'uranus-child-print-style', get_stylesheet_directory_uri() . '/print.css', array(), $theme_version, 'print' );
	}
}

add_action( 'wp_enqueue_scripts', 'uranus_child_styles' );

if ( ! function_exists( 'uranus_child_scripts' ) ) {
	function uranus_child_scripts() {
		$theme_version = wp_get_theme()->get( 'Version' );
		wp_enqueue_script( 'uranus-child-script', get_stylesheet_directory_uri() . '/assets/js/app.js', array( 'jquery' ), $theme_version );
		wp_script_add_data( 'uranus-child-script', 'async', true );
	}
}

add_action( 'wp_enqueue_scripts', 'uranus_child_scripts' );

if ( ! function_exists( 'uranus_child_block_editor_styles' ) ) {
	function uranus_child_block_editor_styles() {
		wp_enqueue_style( 'uranus-child-block-editor-styles', get_theme_file_uri( '/assets/css/editor-block.css' ), array(), wp_get_theme()->get( 'Version' ), 'all' );
		wp_style_add_data( 'uranus-child-block-editor-styles', 'rtl', 'replace' );

		wp_enqueue_script( 'uranus-child-block-editor-script', get_theme_file_uri( '/assets/js/editor-script-block.js' ), array(
			'wp-blocks',
			'wp-dom'
		), wp_get_theme()->get( 'Version' ), true );
	}
}

add_action( 'enqueue_block_editor_assets', 'uranus_child_block_editor_styles', 1, 1 );


if ( ! function_exists( 'uranus_child_classic_editor_styles' ) ) {
	function uranus_child_classic_editor_styles() {
		$classic_editor_styles = array(
			'/assets/css/editor-classic.css',
		);

		add_editor_style( $classic_editor_styles );
	}
}

add_action( 'init', 'uranus_child_classic_editor_styles' );

if ( ! function_exists( 'uranus_child_customize_controls_enqueue_scripts' ) ) {
	function uranus_child_customize_controls_enqueue_scripts() {
		$theme_version = wp_get_theme()->get( 'Version' );
		wp_enqueue_script( 'uranus-child-customize', get_stylesheet_directory_uri() . '/assets/js/customize.js', array( 'jquery' ), $theme_version, false );
		wp_enqueue_script( 'uranus-child-customize-controls', get_stylesheet_directory_uri() . '/assets/js/customize-controls.js', array(
			'uranus-color-calculations',
			'customize-controls',
			'underscore',
			'jquery'
		), $theme_version, false );
	}
}

add_action( 'customize_controls_enqueue_scripts', 'uranus_child_customize_controls_enqueue_scripts' );

if ( ! function_exists( 'uranus_child_customize_preview_init' ) ) {
	function uranus_child_customize_preview_init() {
		$theme_version = wp_get_theme()->get( 'Version' );
		wp_enqueue_script( 'uranus-child-customize-preview', get_theme_file_uri( '/assets/js/customize-preview.js' ), array(
			'customize-preview',
			'customize-selective-refresh',
			'jquery'
		), $theme_version, true );
	}
}

add_action( 'customize_preview_init', 'uranus_child_customize_preview_init' );

if ( ! function_exists( 'uranus_child_rewrite_flush_child' ) ) {
	function uranus_child_rewrite_flush_child() {
		flush_rewrite_rules();
	}
}

add_action( 'after_switch_theme', 'uranus_child_rewrite_flush_child' );

if ( ! function_exists( 'uranus_child_theme_setup' ) ) {
	function uranus_child_theme_setup() {
		load_child_theme_textdomain( 'uranus-child', get_stylesheet_directory() . '/languages' );
	}
}

add_action( 'after_setup_theme', 'uranus_child_theme_setup' );
