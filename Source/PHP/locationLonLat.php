<?php
function FindCP($location)
{
    //Explode location until the lon and lat are found;
    $lonLatPart = explode("(", $location);
    $lonPart = explode(",", $lonLatPart[1]);
    $latPart = explode(")", $lonPart[1]);
    $latPart2 = explode(" ", $latPart[0]);

    $lon = $lonPart[0];
    $lat = $latPart2[1];
    $cp = $lon."~".$lat;

    return $cp;
}

function FindLon($location)
{
    $lonLatPart = explode("(", $location);
    $lonPart = explode(",", $lonLatPart[1]);
    $latPart = explode(")", $lonPart[1]);

    $lon = $lonPart[0];

    return $lon;
}

function FindLat($location)
{
    $lonLatPart = explode("(", $location);
    $lonPart = explode(",", $lonLatPart[1]);
    $latPart = explode(")", $lonPart[1]);
    $latPart2 = explode(" ", $latPart[0]);

    $lat = $latPart2[1];

    return $lat;
}
?>
