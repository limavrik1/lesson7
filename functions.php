<?php
/**
 * Created by PhpStorm.
 * User: MAV
 * Date: 13.03.2017
 * Time: 15:58
 */

function renderCertificate($result)
{
    $im = imagecreatetruecolor(794, 1123);
    // RGB
    $backColor = imagecolorallocate($im, 255, 224, 221);
    $textColor = imagecolorallocate($im, 129, 15, 90);
    $fontFile = __DIR__ . '/fonts/FiraSans-Regular.ttf';
    $imBox = imagecreatefrompng(__DIR__ . '/images/certificate.png');
    imagefill($im, 0, 0, $backColor);
    imagecopy($im, $imBox, 10, 10, 0, 0, 256, 256);
    imagettftext($im, 25, 0, 30, 30, $textColor, $fontFile, $result);
    ob_start();
    imagepng($im);
    $image = ob_get_contents();
    var_dump($image);
    ob_end_clean();
    echo '<img src="data:image/png;base64,'.base64_encode($image).'" />';
    imagedestroy($im);
//    return $image;
}