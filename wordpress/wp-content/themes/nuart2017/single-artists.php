<?php
/**
 * The template for displaying all single artists and attachments
 *
 * @package WordPress
 * @subpackage Tortuga Labs - Nuart2017
 * @since Tortuga Labs - Nuart2017 1.0
 */

get_header(); ?>


<h1><?= the_title(); ?></h1>

<?include(locate_template('partials/_modules.php'));?>


<? get_footer(); ?>