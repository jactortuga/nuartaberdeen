<?php

$module_partners = get_sub_field('module_partners');

?>

<div id="partners" class="module">
    <h1 class="module__title module__title--single">Partners</h1>
    <section class="module__repeater module__repeater--partners">
        <? foreach($module_partners as $module_partner):
            $partner_name       = $module_partner['partner_name'];
            $partner_website    = $module_partner['partner_website'];
            $partner_logo       = $module_partner['partner_logo'];
        ?>
            <div class="module__repeater-item module__repeater-item--partner">
                <?= wp_get_attachment_image($partner_logo, 'full', false, array('class' => 'module__repeater-item-image module__repeater-item-image--partner')); ?>
                <article class="module__repeater-item-content module__repeater-item-content--partner">
                    <a href="<?= $partner_website ?>" class="module__repeater-item-link" target="_blank">
                        <h1 class="module__repeater-item-title"><?= $partner_name ?></h1>
                    </a>
                </article>
            </div>
        <? endforeach; ?>
    </section>
</div>