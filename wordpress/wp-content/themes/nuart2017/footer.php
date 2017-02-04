<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Tortuga Labs - Nuart2017
 * @since Tortuga Labs - Nuart2017 1.0
 */


$footer_content_left    = get_field('footer_content_left', 'option');
$footer_content_right   = get_field('footer_content_right', 'option');
$facebook_link          = (get_field('facebook_link', 'option') ? get_field('facebook_link', 'option') : false);
$twitter_link           = (get_field('twitter_link', 'option') ? get_field('twitter_link', 'option') : false);
$instagram_link         = (get_field('instagram_link', 'option') ? get_field('instagram_link', 'option') : false);


wp_footer(); ?>

    </main>

    <footer class="site-footer">
        <h1 class="site-footer__title">Contact</h1>

        <section class="site-footer__contact">
            <div class="site-footer__column site-footer__column--left">
                <?= $footer_content_left ?>
            </div>
            <div class="site-footer__column site-footer__column--right">
                <?= $footer_content_right ?>
            </div>
        </section>

        <? if($facebook_link || $twitter_link || $instagram_link): ?>
            <nav class="site-footer__social-nav">
                <? if($facebook_link): ?>
                    <a href="<?= $facebook_link ?>" class="site-footer__social-link" target="_blank">
                        <img src="<?= bloginfo('template_url') ?>/assets/img/icons/svg/facebook.svg" class= "site-footer__social-icon">
                    </a>
                <? endif; ?>
                <? if($twitter_link): ?>
                    <a href="<?= $twitter_link ?>" class="site-footer__social-link" target="_blank">
                        <img src="<?= bloginfo('template_url') ?>/assets/img/icons/svg/twitter.svg" class=" site-footer__social-icon">
                    </a>
                <? endif; ?>
                <? if($instagram_link): ?>
                    <a href="<?= $instagram_link ?>" class="site-footer__social-link" target="_blank">
                        <img src="<?= bloginfo('template_url') ?>/assets/img/icons/svg/instagram.svg" class="site-footer__social-icon">
                    </a>
                <? endif; ?>
            </nav>
        <? endif; ?>

    </footer>

</body>
</html>
