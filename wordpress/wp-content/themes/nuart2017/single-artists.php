<?php
/**
 * The template for displaying all single artists and attachments
 *
 * @package WordPress
 * @subpackage Tortuga Labs - Nuart2017
 * @since Tortuga Labs - Nuart2017 1.0
 */

$artist_name      = get_the_title();
$artist_website   = get_field('artist_website');
$artist_gallery   = get_field('artist_gallery');
$artist_bio       = get_field('artist_bio');
$artist_video     = (get_field('artist_video') ? get_field('artist_video') : false);

get_header(); ?>


<div class="module">
    <section class="module__carousel-container">
        <?foreach($artist_gallery as $module_image):
            $module_image_id = $module_image['ID'];
        ?>
            <div class="module__carousel-slide">
                <?= wp_get_attachment_image($module_image_id, 'landscape', false, array('class' => 'module__carousel-image')); ?>
                
            </div>
        <?endforeach;?>
    </section>
</div>


<div class="module">
    <a href="<?= $artist_website ?>" class="module__link module__link--white" target="_blank">
        <h1 class="module__title module__title--single module__title--artist"><?= $artist_name ?></h1>
    </a>
    <article class="module__article module__article--centered">
        <div class="module__text-wrapper module__text-wrapper--left">
            <?= $artist_bio ?>
        </div>
    </article>
</div>

<? if($artist_video): ?>
    <div class="module">
        <section class="module__video-container">
            <?= $artist_video ?>
        </section>
    </div>
<? endif; ?>


<? get_footer(); ?>