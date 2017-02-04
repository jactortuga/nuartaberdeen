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

$information   = get_field('information');

get_header(); ?>

<? if (have_posts()) : while (have_posts()) : the_post();?>

<div class="module">
    <article class="module__article module__article--centered">
        <h1 class="module__article-title module__article-title--padding">Info</h1>
        <div class="module__text-wrapper module__text-wrapper--left">
            <?= $information ?>
        </div>
    </article>
</div>

<div class="module">
    <h1 class="module__title module__title--single">Artists</h1>
    <section class="module__repeater module__repeater--artists">
        <? if(have_rows('artists')): ?>
            <? while(have_rows('artists')) : the_row();
                $name       = get_sub_field('name');
                $bio        = get_sub_field('bio');
                $website    = get_sub_field('website');
                $image      = get_sub_field('image');
            ?>
                <div class="module__repeater-item">
                    <?= wp_get_attachment_image($image, 'full', false, array('class' => 'module__repeater-item-image')); ?>
                    <article class="module__repeater-item-content">
                        <a href="<?= $website ?>" class="module__repeater-item-link" target="_blank">
                            <h1 class="module__repeater-item-title"><?= $name ?></h1>
                        </a>
                        <p class="module__repeater-item-text"><?= $bio ?></p>
                    </article>
                </div>
            <? endwhile; ?>
        <? endif; ?>
    </section>
</div>

<div class="modulex">
    Sponsors Here
</div>

<?endwhile; endif;?>