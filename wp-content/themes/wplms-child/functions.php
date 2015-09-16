<?php

function wplms_child_scripts() {
	//wp_enqueue_style( 'style-name', get_stylesheet_uri() );
	wp_enqueue_script( 'jquery.stick', get_stylesheet_directory_uri() . '/js/jquery.stick.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'wplms-child_scripts', get_stylesheet_directory_uri() . '/js/wplms-child_scripts.js', array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'wplms_child_scripts' );

?>