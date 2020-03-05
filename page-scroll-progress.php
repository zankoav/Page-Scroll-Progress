<?php
   /*
   Plugin Name: Page Scroll Progress
   Plugin URI: https://github.com/zankoav/Page-Scroll-Progress
   description: A plugin to create on the top side loading line witch always visible and fixed top
   Version: 2.0.0
   Author: Mr. Alexandr Zanko 
   Author URI: http://zankoav.com
   License: GPL2
   */

register_activation_hook( __FILE__, 'page_scroll_progress_activate' );

function page_scroll_progress_activate() {
    $lineColor = get_option('page-scroll-progress-line-color');
    $substratesColor = get_option('page-scroll-progress-substrates-color');
    $position = get_option('page-scroll-progress-position');
    if(!$lineColor){
        add_option( 'page-scroll-progress-line-color', '#00ccff' );
    }
    if(!$substratesColor){
        add_option( 'page-scroll-progress-substrates-color', '#cfcfcf' );
    }
    if(!$position){
        add_option( 'page-scroll-progress-position', 'top' );
    }
}

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

        $lineColor = get_option('page-scroll-progress-line-color');
        $substratesColor = get_option('page-scroll-progress-substrates-color');
        $position = get_option('page-scroll-progress-position');

        $jsVariables = "const lineColor = '$lineColor', substratesColor = '$substratesColor', position = '$position';\n";
        $jsContent = str_replace("//@variables", $jsVariables, $js);
        wp_register_script( 'page_loading_scripts', false );
        wp_enqueue_script( 'page_loading_scripts' );
        wp_add_inline_script( 'page_loading_scripts', $jsContent);
    }
    
});

function page_scroll_progress_menu_page() {
    add_menu_page(
        __( 'Scroll Progress', 'page-scroll-progress' ),
        'Scroll Progress',
        'manage_options',
        'page-scroll-progress/menu-page.php',
        '',
        plugins_url( 'page-scroll-progress/images/menu-icon.svg' ),
        81
    );
}
add_action( 'admin_menu', 'page_scroll_progress_menu_page' );