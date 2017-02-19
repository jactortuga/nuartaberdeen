<?php
/**
 * The press category template file
 *
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Tortuga Labs - Nuart2017
 * @since Tortuga Labs - Nuart2017 1.0
 */

$args = array(
    'post_type'         => 'post',
    'post_status'       => 'publish',
    'category_name'     => 'press',
    'posts_per_page'    => -1,
    'orderby'           => 'post_date',
    'order'             => 'DESC',
    'suppress_filters'  => true 
);

$module_press_list = wp_get_recent_posts($args);

get_header(); ?>

<div class="module">
    <h1 class="module__title module__title--single module__title--alt">Press</h1>
    <section class="module__posts">
        <? foreach($module_press_list as $module_press):
            $module_press_id     = $module_press['ID'];
            $module_press_title  = get_the_title($module_press_id);
            $module_press_date   = get_the_date('d/m/y', $module_press_id);;
            $module_press_intro  = (get_field('introduction', $module_press_id) ? get_field('introduction', $module_press_id) : false);
            $module_press_image  = get_post_thumbnail_id($module_press_id);
            $module_press_link   = get_the_permalink($module_press_id);
        ?>
            <div class="module__posts-item">
                <div class="module__posts-item-image-container">
                    <?= wp_get_attachment_image($module_press_image, 'full', false, array('class' => 'module__posts-item-image')); ?>
                </div>
                <div class="module__posts-item-content">
                    <? if($module_press_intro):?>
                        <div class="module__posts-item-intro module__posts-item-intro--press"><?= $module_press_intro ?></div>
                    <? endif; ?>
                    <p class="module__posts-item-date"><?= $module_press_date ?></p>
                </div>
                <div class="module__posts-item-overlay">
                    <a href="<?= $module_press_link ?>" class="module__posts-item-link">Read More</a>
                </div>
            </div>
        <? endforeach; ?>
    </section>
</div>

<div class="module">
    <div class="module__divider module__divider--white"></div>
</div>

<?php get_footer(); ?>
