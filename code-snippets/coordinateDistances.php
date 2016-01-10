<?php
/*
 * Calculates as the crow flies distance between two sets of coordinates
 *
 * Returns distance in meters (or whatever units $earthRadius is defined in)
 *
 * Example argument format:
    $coord1 = array(
        'lat' => xx.xy,
        'lon' => -yy.yx
    );
    $coord2 = array(
        'lat' => xx.xy,
        'lon' => -yy.yx
    );
 * Read more at:
 * http://andrew.hedges.name/experiments/haversine/
 * http://www.movable-type.co.uk/scripts/latlong.html
 */
function distanceBetweenCoords ($coord1, $coord2) {
    $earthRadius = 6371000; // mean radius of earth: 6371 km -> 6371000 meters

    $lat1Rad = deg2rad($coord1['lat']);
    $lat2Rad = deg2rad($coord2['lat']);
    $latDiffRad = deg2rad($coord2['lat'] - $coord1['lat']);
    $longDiffRad = deg2rad($coord2['lon'] - $coord1['lon']);

    $a = (sin($latDiffRad/2) * sin($latDiffRad/2)) + cos($lat1Rad) * cos($lat2Rad) * (sin($longDiffRad/2) * sin($longDiffRad/2));
    $c = 2 * atan2(sqrt($a), sqrt(1-$a));

    $distance = $earthRadius * $c;

    return $distance;
}
