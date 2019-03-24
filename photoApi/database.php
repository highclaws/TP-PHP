<?php

function getGps($exifCoord, $hemi) {
  $degrees = count($exifCoord) > 0 ? gps2Num($exifCoord[0]) : 0;
  $minutes = count($exifCoord) > 1 ? gps2Num($exifCoord[1]) : 0;
  $seconds = count($exifCoord) > 2 ? gps2Num($exifCoord[2]) : 0;
  $flip = ($hemi == 'W' or $hemi == 'S') ? -1 : 1;
  return $flip * ($degrees + $minutes / 60 + $seconds / 3600);
}
function gps2Num($coordPart) {
  $parts = explode('/', $coordPart);
  if (count($parts) <= 0)
      return 0;
  if (count($parts) == 1)
      return $parts[0];
  return floatval($parts[0]) / floatval($parts[1]);
}


$rep = $_SERVER["argv"][1];
if ($rep == "")
 $rep ="./Images/";
$variable ="image";
foreach (glob($rep."*.jpg") as $filename) {

  $exif = exif_read_data($filename, 0, true);

  if (array_key_exists("GPS",$exif)) {
  //echo "OK\n";
 // echo "$filename\t";


  $latitude = getGps($exif["GPS"]["GPSLongitude"], $exif["GPS"]["GPSLongitudeRef"]);
  $longitude = getGps($exif["GPS"]["GPSLatitude"], $exif["GPS"]["GPSLatitudeRef"]);
  // echo "<p>fichier : "  + $filename +"("+$lon+")("+ $lat+")";
  $todosPedidos[] = array(
    
    "name" => $filename,
    "latitude"        => $latitude,
    "longitude"  => $longitude,
    "variable"  => $variable,

  );

  // print 'latitude :' +$latitude;
  // print 'longitude :'+$longitude;

  
}
  
 else {
//     echo "certain photo pas de geoNON\n";

 }
}
?>