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

<h1>Press Category Posts</h1>

<? foreach($module_press_list as $module_press):
    $module_press_id     = $module_press['ID'];
    $module_press_title  = get_the_title($module_press_id);
    $module_press_date   = get_the_date('d/m/y', $module_press_id);;
    $module_press_intro  = get_field('introduction', $module_press_id);
    $module_press_image  = get_post_thumbnail_id($module_press_id);
    $module_press_link   = get_the_permalink($module_press_id);
?>

    <h1><?= $module_press_title ?></h1>
    <h2><?= $module_press_date ?></h2>
    <div><?= $module_press_intro ?></div>
    <a href="<?= $module_press_link ?>"><?= $module_press_link ?></a>
    <?= wp_get_attachment_image($module_press_image, 'full'); ?>

<? endforeach; ?>

<?php get_footer(); ?>
