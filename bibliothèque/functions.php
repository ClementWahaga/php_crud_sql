<?php 

// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails',array(
    'height' => 480,
    'width'  => 720,) );
    

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );

function add_theme_scripts(){
    wp_enqueue_style( 'style',get_stylesheet_uri('style.css'));
   } 
add_action( 'wp_enqueue_scripts', 'add_theme_scripts','   wp_enqueue_style' );

function register_my_menu(){
  register_nav_menu( 'main-menu', 'Menu Principal' );
}
add_action( 'after_setup_theme', 'register_my_menu' );
if( function_exists('register_sidebar')){

  register_sidebar(array(
  'name' => 'sidebar',
  'before_widget' => '<div class="widget-sidebar">',
  'after_widget' => '</div>',
  'before_title' => '<div class="titre-module">',
  'after_title' => '</div>',
  ));
  
  }