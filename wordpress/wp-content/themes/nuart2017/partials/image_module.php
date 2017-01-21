<?php

    $module_image_id   = get_sub_field('module_image');

    /*
    For lazyload plugin:
    wp_get_attachment_image($module_image_id, 'full', false, array( 'class' => 'lazyload' ))
    */

?>

<section>

    <?= wp_get_attachment_image($module_image_id, 'full'); ?>

</section>