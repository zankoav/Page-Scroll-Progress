<?php
   /*
   Plugin Name: Page Scroll Progress
   Plugin URI: http://zankoav.com
   description: A plugin to create on the top side loading line witch always visible and fixed top
   Version: 1.0.0
   Author: Mr. Alexandr Zanko 
   Author URI: http://zankoav.com
   License: GPL2
   */


add_action( 'wp_enqueue_scripts', function(){

    $plugin_path = plugin_dir_path( __FILE__ );
    $css_path = $plugin_path . 'page-scroll-progress.css';
    $js_path = $plugin_path . 'page-scroll-progress.js';

    if(file_exists($css_path) and file_exists($js_path)){
        $css = file_get_contents($css_path); 
        wp_register_style( 'page_loading_style', false );
        wp_enqueue_style( 'page_loading_style' );
        wp_add_inline_style( 'page_loading_style', $css );

        $js = file_get_contents($js_path);
        wp_register_script( 'page_loading_scripts', false );
        wp_enqueue_script( 'page_loading_scripts' );
        wp_add_inline_script( 'page_loading_scripts', $js );
    }
    
});