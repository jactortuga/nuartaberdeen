<?php
/*
Template Name: Home
*/

/**
 * The home page template
 *
 *
 * @package WordPress
 * @subpackage Tortuga Labs - Nuart2017
 * @since Tortuga Labs - Nuart2017 1.0
 */


get_header(); ?>


<? if(have_posts()) : while(have_posts()) : the_post(); ?>

    <? include(locate_template('partials/_modules.php')); ?>

<? endwhile; endif; ?>


<? get_footer(); ?>