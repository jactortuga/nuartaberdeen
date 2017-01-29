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
    <footer>
        <div>
            <?= $footer_content_left ?>
        </div>
        <div>
            <?= $footer_content_right ?>
        </div>
    </footer>

</body>
</html>
