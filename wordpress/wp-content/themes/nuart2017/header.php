<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Tortuga Labs - Nuart2017
 * @since Tortuga Labs - Nuart2017 1.0
 */

$header_type    = get_field('header_type', 'option');
$header_image   = ($header_type == 'image' ? get_field('header_image', 'option') : false);
$header_video   = ($header_type == 'video' ? get_field('header_video', 'option') : false);
$header_logo    = (get_field('header_logo', 'option') ? get_field('header_logo', 'option') : false);
$header_info    = get_field('header_info', 'option');

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="author" content="Jac Prada - Tortuga Labs">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script>(function(){document.documentElement.className='js'})();</script>
	
	<?php wp_head(); ?>

	<?include(locate_template('partials/favicons.php'));?>
</head>

<body <?php body_class(); ?>>

    <header class="site-header">

        <?
            $custom_menu = array(
                'menu'              => 'primary',
                'container'         => 'nav', 
                'container_class'   => 'site-header__nav', 
                'echo'              => false,
                'fallback_cb'       => false,
                'items_wrap'        => '%3$s',
                'depth'             => 0
            );
            echo strip_tags(wp_nav_menu($custom_menu), '<nav><a>');
        ?>

        <figure class="site-header__logo-container" style="background-image: url('<?= $header_image ?>')">
            <? if(!$header_image && $header_video):?>
                <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; height: auto; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style>

                <div class='embed-container'>
                      <?= $header_video ?>
                </div>
            <? endif; ?>

            <? if($header_logo): ?>
                <?= wp_get_attachment_image($header_logo, 'full', false, array('class' => 'site-header__logo-image')); ?>
            <? endif; ?>

            <figcaption class="site-header__logo-caption"><?= $header_info ?></figcaption>
        </figure>

    </header>

    <main>