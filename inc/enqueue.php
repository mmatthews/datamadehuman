<?php

add_action( 'wp_enqueue_scripts', 'custom_scripts' );
function custom_scripts() {

    // Axios
    //wp_enqueue_script( 'axios', 'https://unpkg.com/axios/dist/axios.min.js', array(), '0.0.1', false );

    // Selectric
    //wp_enqueue_script( 'selectric', get_stylesheet_directory_uri() . '/vendor/selectric/jquery.selectric.js', array('jquery'), '0.0.1', false );
    
    // SimpleParallax
    wp_enqueue_script( 'simple', get_stylesheet_directory_uri() . '/vendor/simple-parallax/simple-parallax.min.js', array('jquery'), '0.0.1', false );

    // Scrollama
    wp_enqueue_script( 'scrollama', get_stylesheet_directory_uri() . '/vendor/scrollama/scrollama.min.js', array(), '0.0.1', false );    
    
    // Swiper
    wp_enqueue_style( 'swiper', get_stylesheet_directory_uri() . "/vendor/swiper/swiper.min.css", array(), '0.0.1', 'all');
    wp_enqueue_script( 'swiper', get_stylesheet_directory_uri() . '/vendor/swiper/swiper.min.js', array(), '0.0.1', false );
  

    // Papa Parse
    //wp_enqueue_script( 'papa', get_stylesheet_directory_uri() . '/vendor/papa-parse/papaparse.min.js', array(), '0.0.1', false );

    // AOS
    //wp_enqueue_style( 'aos', get_stylesheet_directory_uri() . "/vendor/aos/aos.css", array(), '0.0.1', 'all');
    //wp_enqueue_script( 'aos', get_stylesheet_directory_uri() . '/vendor/aos/aos.js', array(), '0.0.1', false );    


    wp_enqueue_style( 'main', get_stylesheet_directory_uri() . "/dist/css/main.css", array(), filemtime( get_stylesheet_directory() . '/dist/css/main.css' ), 'all');
    wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/dist/js/main.min.js', array('jquery'), filemtime( get_stylesheet_directory() . '/dist/js/main.min.js' ), true );

}
