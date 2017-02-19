<?php
/**
 * The news category template file
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
    'category_name'     => 'news',
    'posts_per_page'    => -1,
    'orderby'           => 'post_date',
    'order'             => 'DESC',
    'suppress_filters'  => true
);

$module_news_list = wp_get_recent_posts($args);

get_header(); ?>

<div class="module">
    <h1 class="module__title module__title--single module__title--alt">News</h1>
    <section class="module__posts">
        <? foreach($module_news_list as $module_news):
        $module_news_id     = $module_news['ID'];
        $module_news_title  = get_the_title($module_news_id);
        $module_news_date   = get_the_date('d/m/y', $module_news_id);;
        $module_news_intro  = (get_field('introduction', $module_news_id) ? get_field('introduction', $module_news_id) : false);
        $module_news_image  = get_post_thumbnail_id($module_news_id);
        $module_news_link   = get_the_permalink($module_news_id);
        ?>
            <div class="module__posts-item">
                <div class="module__posts-item-image-container">
                    <?= wp_get_attachment_image($module_news_image, 'full', false, array('class' => 'module__posts-item-image')); ?>
                </div>
                <div class="module__posts-item-content">
                    <h1 class="module__posts-item-title"><?= $module_news_title ?></h1>
                    <? if($module_news_intro):?>
                        <div class="module__posts-item-intro module__posts-item-intro--news"><?= $module_news_intro ?></div>
                    <? endif; ?>
                </div>
                <div class="module__posts-item-overlay">
                    <a href="<?= $module_news_link ?>" class="module__posts-item-link">Read More</a>
                </div>
            </div>
        <? endforeach; ?>
    </section>
</div>

<div class="module">
    <div class="module__divider module__divider--white"></div>
</div>

<?php get_footer(); ?>