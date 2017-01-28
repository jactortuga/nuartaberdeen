<?php

$module_video   = get_sub_field('module_video');

preg_match('/src="(.+?)"/', $module_video, $matches);
$src = $matches[1];

$params = array(
    'autoplay'      => 1,
    'loop'          => 1,
    'byline'        => 0,
    'title'         => 0,
    'portrait'      => 0,
    'color'         => 'red',
);

$new_src = add_query_arg($params, $src);
$module_video = str_replace($src, $new_src, $module_video);
$attributes = 'frameborder="0"';
$module_video = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $module_video);


/*
For lazyload plugin:
wp_get_attachment_image($module_image_id, 'full', false, array( 'class' => 'lazyload' ))
*/

?>

<section>

    <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; height: auto; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style>

    <div class='embed-container'>
          <?= $module_video ?>
    </div>


</section>