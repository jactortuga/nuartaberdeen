<?php

    $module_video   = get_sub_field('module_video');

    /*
    For lazyload plugin:
    wp_get_attachment_image($module_image_id, 'full', false, array( 'class' => 'lazyload' ))
    */

?>

<section>

    <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; height: auto; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'>
          <?= $module_video ?>
    </div>


</section>