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

$footer_title           = get_field('footer_title', 'option');
$footer_content_left    = (get_field('footer_content_left', 'option') ? get_field('footer_content_left', 'option') : false);
$footer_content_right   = (get_field('footer_content_right', 'option') ? get_field('footer_content_right', 'option') : false);
$mail_address           = (get_field('mail_address', 'option') ? get_field('mail_address', 'option') : false);
$facebook_link          = (get_field('facebook_link', 'option') ? get_field('facebook_link', 'option') : false);
$twitter_link           = (get_field('twitter_link', 'option') ? get_field('twitter_link', 'option') : false);
$instagram_link         = (get_field('instagram_link', 'option') ? get_field('instagram_link', 'option') : false);


wp_footer(); ?>

    </main>

    <footer class="site-footer">
        <h1 class="site-footer__title"><?= $footer_title ?></h1>

        <? if($footer_content_left || $footer_content_right): ?>
            <section class="site-footer__contact">
                <? if($footer_content_left): ?>
                    <div class="site-footer__column site-footer__column--left">
                        <?= $footer_content_left ?>
                    </div>
                <? endif; ?>
                <? if($footer_content_right): ?>
                    <div class="site-footer__column site-footer__column--right">
                        <?= $footer_content_right ?>
                    </div>
                <? endif; ?>
            </section>
        <? endif; ?>

        <? if($mail_address || $facebook_link || $twitter_link || $instagram_link): ?>
            <nav class="site-footer__social-nav">
                <? if($mail_address): ?>
                    <a href="mailto:<?= $mail_address ?>" class="site-footer__social-link" target="_blank">
                        <img src="<?= bloginfo('template_url') ?>/assets/img/icons/svg/mail.svg" class= "site-footer__social-icon">
                    </a>
                <? endif; ?>
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

    <section class="site-credits">
        <p class="site-credits__text">2017 — Design by <a href="http://studiobergini.eu/" target="_blank" class="site-credits__link">Studio Bergini</a> — Code by <a href="mailto:info@tortugalabs.io" target="_blank" class="site-credits__link">Tortuga Labs</a></p>
    </section>

</body>
</html>
