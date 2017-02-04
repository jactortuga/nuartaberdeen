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


$footer_content_left   = get_field('footer_content_left', 'option');
$footer_content_right  = get_field('footer_content_right', 'option');

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
    </footer>

</body>
</html>
