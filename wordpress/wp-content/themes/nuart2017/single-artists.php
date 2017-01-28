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
$artist_video     = get_field('artist_video');

get_header(); ?>


<h1><?= $artist_name ?></h1>
<h2><?= $artist_website ?></h2>

<section>

    <ul class="bxslider">

        <?foreach($artist_gallery as $module_image):
            $module_image_id = $module_image['ID'];
        ?>
    
            <li><?= wp_get_attachment_image($module_image_id, 'full'); ?></li>
    
        <?endforeach;?>

    </ul>

</section>


<section>

    <div><?= $artist_bio ?></div>

</section>


<section>

    <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; height: auto; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'>
          <?= $artist_video ?>
    </div>

</section>


<? get_footer(); ?>