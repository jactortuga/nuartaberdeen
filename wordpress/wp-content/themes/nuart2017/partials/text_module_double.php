<?php

$module_title_one   = get_sub_field('module_title_one');
$module_content_one = get_sub_field('module_content_one');
$module_title_two   = get_sub_field('module_title_two');
$module_content_two = get_sub_field('module_content_two');

?>

<section>

    <h1><?= $module_title_one ?></h1>
    
    <div><?= $module_content_one ?></div>

    <h1><?= $module_title_two ?></h1>
    
    <div><?= $module_content_two ?></div>

</section>