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

$social_preview = get_field('social_share_image', 'option');

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta property="og:image" content="<?= $social_preview ?>">
<meta property="og:image:secure_url" content="<?= $social_preview ?>">
<meta name="author" content="Studio Bergini - Tortuga Labs">
<link rel="shortcut icon" href="<?= bloginfo('template_url') ?>/assets/img/favicon.ico">
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

    </header>

    <main class="site-main">