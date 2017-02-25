<?php

$map_locations       = get_sub_field('map_locations');
// var_dump($map_locations);

// array(2) { [0]=> array(5) { ["location_name"]=> string(22) "First Amazing Location" ["location_latitude"]=> string(9) "57.154319" ["location_longitude"]=> string(9) "-2.109757" ["location_image"]=> bool(false) ["location_description"]=> string(0) "" } [1]=> array(5) { ["location_name"]=> string(34) "Great Second Location on the canal" ["location_latitude"]=> string(9) "57.156978" ["location_longitude"]=> string(9) "-2.105519" ["location_image"]=> bool(false) ["location_description"]=> string(0) "" } }


?>

<div class="module">
    <section class="module__map" id="map"></section>
    <div class="module__map-info-container">
        <? foreach($map_locations as $map_location):
            $map_locations_name         = $map_location['location_name'];
            $map_location_latitude      = $map_location['location_latitude'];
            $map_location_longitude     = $map_location['location_longitude'];
            $map_location_image         = $map_location['location_image'];
            $map_location_description   = $map_location['location_description'];
        ?>
            <div class="module__map-info" data-name="<?= $map_locations_name ?>" data-lat="<?= $map_location_latitude ?>" data-lng="<?= $map_location_longitude ?>">        
            </div>
        <? endforeach; ?>
    </div>
</div>