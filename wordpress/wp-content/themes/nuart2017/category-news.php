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


<h1>News Category Posts</h1>

<? foreach($module_news_list as $module_news):
    $module_news_id     = $module_news['ID'];
    $module_news_title  = get_the_title($module_news_id);
    $module_news_date   = get_the_date('d/m/y', $module_news_id);;
    $module_news_intro  = get_field('introduction', $module_news_id);
    $module_news_image  = get_post_thumbnail_id($module_news_id);
    $module_news_link   = get_the_permalink($module_news_id);
?>

    <h1><?= $module_news_title ?></h1>
    <h2><?= $module_news_date ?></h2>
    <div><?= $module_news_intro ?></div>
    <a href="<?= $module_news_link ?>"><?= $module_news_link ?></a>
    <?= wp_get_attachment_image($module_news_image, 'full'); ?>

<? endforeach; ?>


<?php get_footer(); ?>