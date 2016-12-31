<?php
/*
* Author : Ali Aboussebaba
* Email : bewebdeveloper@gmail.com
* Website : http://www.bewebdeveloper.com
* Subject : Crop photo using PHP and jQuery
*/

// Target siz
$targ_w = $_POST['targ_w'];
$targ_h = $_POST['targ_h'];
// quality
$jpeg_quality = 90;
// photo path
$src = $_POST['photo_url'];
// create new jpeg image based on the target sizes
$img_r = imagecreatefromjpeg($src);
$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
// crop photo
imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'], $targ_w,$targ_h,$_POST['w'],$_POST['h']);
// create the physical photo
imagejpeg($dst_r,'src/Resources/images/photo.png',$jpeg_quality);
// display the  photo - "?time()" to force refresh by the browser
require_once "vendor/autoload.php";

use Logic\PinGenerator;

$pin = PinGenerator::getStripedPin("src/Resources/images/photo.png",[
    "rgb(100,100,100)",
    "rgb(200,200,200)",
]);
echo '<img src="data:image/jpg;base64,'.base64_encode($pin).'" alt="" />';

exit;
?>