<?php
/**
 * Created by PhpStorm.
 * User: MAV
 * Date: 13.03.2017
 * Time: 15:58
 */

//ini_set('display_errors', false);

function renderCertificate($testName,$fio,$result,$total)
{
    $im = imagecreatetruecolor(794, 1123);
    // RGB
    $backColor = imagecolorallocate($im, 255, 224, 221);
    $textColor = imagecolorallocate($im, 129, 15, 90);
    $fontFile = __DIR__ . '/fonts/FONT.TTF';
    $imBox = imagecreatefrompng(__DIR__ . '/images/certificate.png');
    imagefill($im, 0, 0, $backColor);
    imagecopy($im, $imBox, 0, 0, 0, 0, 794, 1123);
    if (imagettftext($im, 45, 0, 265, 375, $textColor, $fontFile, $fio) == false){
//        die('Font Error');
        exit(0);
    }
    imagettftext($im, 30, 0, 270, 455, $textColor, $fontFile, 'Прошел тест');
    imagettftext($im, 25, 0, 180, 515, $textColor, $fontFile, $testName);
    imagettftext($im, 30, 0, 290, 625, $textColor, $fontFile, 'Результат');
    imagettftext($im, 25, 0, 340, 685, $textColor, $fontFile, $result .' из '. $total );
//    imagettftext($im, 25, 0, 150, 300, $textColor, $fontFile, $total);
//    imagepng($im,"file.png");
//    var_dump($imBox);
//    echo '</br>';

    ob_start();
    imagepng($im);
    $image = ob_get_contents();
//    var_dump($image);
    ob_end_clean();
//    echo '<img src="data:image/png;base64,'.base64_encode($image).'" />';
    imagedestroy($im);
    return $image;
}