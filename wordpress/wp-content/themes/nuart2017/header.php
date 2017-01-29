<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Tortuga Labs - Nuart2017
 * @since Tortuga Labs - Nuart2017 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="author" content="Jac Prada - Tortuga Labs">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script>(function(){document.documentElement.className='js'})();</script>
	
	<?php wp_head(); ?>

	<?include(locate_template('partials/favicons.php'));?>
</head>

<body <?php body_class(); ?>>

  <h1>This is Nuart</h1>
  <!-- <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?> -->

	<main>