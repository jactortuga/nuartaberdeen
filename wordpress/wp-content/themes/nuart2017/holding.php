<?php
/*
Template Name: Holding
*/

/**
 * The custom holding page template
 *
 *
 * @package WordPress
 * @subpackage Tortuga Labs - Nuart2017
 * @since Tortuga Labs - Nuart2017 1.0
 */


get_header(); ?>

<? if (have_posts()) : while (have_posts()) : the_post();?>

<section class="module">
    <article class="module__article module__article--centered">
        <h1 class="module__article-title module__article-title--padding">Info</h1>
        <div class="module__text-wrapper module__text-wrapper--left">
            <? the_content() ?>
        </div>
    </article>
</section>

<?endwhile; endif;?>

<?php get_footer(); ?>