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
$header_class   = ($header_type == 'image' ? '--image' : '--video');
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

    <header class="site-header site-header<?= $header_class ?>">

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

        <figure class="site-header__logo-container site-header__logo-container<?= $header_class ?>" style="background-image: url('<?= $header_image ?>')">
            
            <? if(!$header_image && $header_video):?>
                <div class='site-header__video-container'>
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