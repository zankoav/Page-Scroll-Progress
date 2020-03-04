<?php 
if( ! defined('WP_UNINSTALL_PLUGIN') )
	exit;

delete_option('page-scroll-progress-line-color');
delete_option('page-scroll-progress-substrates-color');
delete_option('page-scroll-progress-position');