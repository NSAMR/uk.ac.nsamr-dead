<?php
$zoom = get_assan_theme_options('map_zoom');
$map_height = get_assan_theme_options('map_height');
$latitude = get_assan_theme_options('map_latitude');
$longitude = get_assan_theme_options('map_longitude');
$type = get_assan_theme_options('map_type');
$map_popuptext = get_assan_theme_options('footer_layout');
$map_draggable = get_assan_theme_options('map_draggable');
$map_scrollwheel = get_assan_theme_options('map_scrollwheel');
$size = 'style="width: 100%; height: ' . $map_height . 'px;"';
?> 
<div id="googlemapwrap" <?php echo $size; ?>></div>
<script>
    function assan_map_initialize() {
        var myLatlng = new google.maps.LatLng(<?php echo $latitude ?>, <?php echo $longitude ?>);
        var mapProp = {
            center: myLatlng,
            zoom: <?php echo $zoom ?>,
            scrollwheel: false,
            draggable: false,
            mapTypeId: google.maps.MapTypeId.<?php echo $type ?>
        };
        var map = new google.maps.Map(document.getElementById("googlemapwrap"), mapProp);

        var contentString = '<?php echo $map_popuptext; ?>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: '<?php echo $map_popuptext; ?>'
        });
        google.maps.event.addListener(marker, 'click', function () {
            infowindow.open(map, marker);
        });
    }
    google.maps.event.addDomListener(window, 'load', assan_map_initialize);
</script>