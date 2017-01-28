<?php

$module_gallery  = get_sub_field('module_gallery');

/*
For lazyload plugin:
wp_get_attachment_image($module_image_id, 'full', false, array( 'class' => 'lazyload' ))
<?= wp_get_attachment_image($module_image_id, 'full'); ?>
*/

?>

<section>

    <ul class="bxslider">

        <? foreach($module_gallery as $module_image):
            $module_image_id = $module_image['ID'];
        ?>
    
            <li><?= wp_get_attachment_image($module_image_id, 'full'); ?></li>
    
        <? endforeach; ?>

    </ul>

</section>