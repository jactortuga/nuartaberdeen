<?php

$map_center_lat = get_sub_field('map_center_latitude');
$map_center_lng = get_sub_field('map_center_longitude');
$map_locations  = get_sub_field('map_locations');

?>

<div class="module">
    <section class="module__map" id="map"></section>
    <div id="map-info" class="module__map-info-container" data-lat="<?= $map_center_lat ?>" data-lng="<?= $map_center_lng ?>">
        <? foreach($map_locations as $map_location):
            $map_locations_name         = $map_location['location_name'];
            $map_location_latitude      = $map_location['location_latitude'];
            $map_location_longitude     = $map_location['location_longitude'];
            $map_location_image         = $map_location['location_image'];
            $map_location_description   = $map_location['location_description'];
        ?>
            <div class="module__map-info" data-name="<?= $map_locations_name ?>" data-lat="<?= $map_location_latitude ?>" data-lng="<?= $map_location_longitude ?>" data-info="<?= $map_location_description ?>" data-image="<?= $map_location_image ?>">    
            </div>
        <? endforeach; ?>
    </div>
</div>