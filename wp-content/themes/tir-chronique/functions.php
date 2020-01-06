<?php

// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );
// Définir la taille des images mises en avant
set_post_thumbnail_size( 2000, 400, true );

// Définir d'autres tailles d'images
add_image_size( 'products', 800, 600, false );
add_image_size( 'square', 256, 256, false );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );

function tirchronique_remove_menu_pages() {
	remove_menu_page( 'tools.php' );
	remove_menu_page( 'edit-comments.php' );
}

add_action( 'admin_menu', 'tirchronique_remove_menu_pages' );

function tirchronique_register_assets() {

	// Déclarer jQuery
	wp_deregister_script( 'jquery' ); // On annule l'inscription du jQuery de WP
	wp_enqueue_script( // On déclare une version plus moderne
		'jquery',
		'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js',
		false,
		'3.3.1',
		true
	);

	// Déclarer le JS
	wp_enqueue_script(
		'tirchronique',
		get_template_directory_uri() . '/js/script.js',
		array( 'jquery' ),
		'1.0',
		true
	);

	// Déclarer style.css à la racine du thème
	wp_enqueue_style(
		'tirchronique',
		get_stylesheet_uri(),
		array(),
		'1.0'
	);

	// Déclarer un autre fichier CSS
	wp_enqueue_style(
		'tirchronique',
		get_template_directory_uri() . '/css/main.css',
		array(),
		'1.0'
	);
}

add_action( 'wp_enqueue_scripts', 'tirchronique_register_assets' );

register_nav_menus( array(
	'main' => 'Menu Principal',
	'footer' => 'Bas de page',
) );