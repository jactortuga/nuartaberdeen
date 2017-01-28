<?php

$args = array(
    'post_type'         => 'artists',
    'post_status'       => 'publish',
    'posts_per_page'    => -1,
    'offset'            => 0,
    'orderby'           => 'title',
    'order'             => 'DESC',
);

$module_artists = get_posts($args);

?>

<section>

    <? foreach($module_artists as $module_artist):
        $module_artist_id       = $module_artist->ID;
        $module_artist_name     = get_the_title($module_artist_id);
        $module_artist_image    = get_post_thumbnail_id($module_artist_id);
        $module_artist_link     = get_the_permalink($module_artist_id);
    ?>

        <h1><?= $module_artist_name ?></h1>
        <a href="<?= $module_artist_link ?>"><?= $module_artist_link ?></a>
        <?= wp_get_attachment_image($module_artist_image, 'full'); ?>
    
    <? endforeach; ?>

</section>