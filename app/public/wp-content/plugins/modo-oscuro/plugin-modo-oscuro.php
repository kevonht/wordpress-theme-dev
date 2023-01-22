<?php


//Plugin name: Modo Oscuro
//Description: Activa el modo oscuro en tu theme
//version: 1.0
//athor: Kevon Humphrey
//Author URI: https://kevondev.humphreysagency.com

function estilos_plugin(){
    
    $estilos_url = plugin_dir_url(__FILE__);

    wp_enqueue_style('modo_oscuro', $estilos_url.'/assets/css/estilos.css','', '1.0', 'all');

}

add_action( 'wp_enqueue_scripts', 'estilos_plugin');