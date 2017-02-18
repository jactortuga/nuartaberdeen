<?php

$module_title   = get_sub_field('module_title');
$module_artists = get_sub_field('module_artists');

?>


<div id="artists" class="module">
    <h1 class="module__title module__title--single"><?= $module_title ?></h1>
    <section class="module__repeater module__repeater--artists">
        <? foreach($module_artists as $module_artist):
            $module_artist_id       = $module_artist->ID;
            $module_artist_name     = get_the_title($module_artist_id);
            $module_artist_image    = get_post_thumbnail_id($module_artist_id);
            $module_artist_link     = get_the_permalink($module_artist_id);
        ?>
            <div class="module__repeater-item module__repeater-item--artist">
                <?= wp_get_attachment_image($module_artist_image, 'full', false, array('class' => 'module__repeater-item-image module__repeater-item-image--artist')); ?>
                <article class="module__repeater-item-content module__repeater-item-content--artist">
                    <a href="<?= $module_artist_link ?>" class="module__repeater-item-link">
                        <h1 class="module__repeater-item-title"><?= $module_artist_name ?></h1>
                    </a>
                </article>
            </div>
        <? endforeach; ?>
    </section>
</div>