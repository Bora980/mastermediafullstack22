<?php
    // Carga una imagen y me la pone en una variable
    $miimagen = imagecreatefromjpeg("josevicente.jpg");
    $rgb = imagecolorat($miimagen, 1, 1);
    //echo $rgb;
    //echo "<br>";
    $r = ($rgb >> 16) & 0xFF;
    $g = ($rgb >> 8) & 0xFF;
    $b = $rgb & 0xFF;
    //echo $r."-".$g."-".$b;
    $rojo = imagecolorallocate($miimagen, 255, 0, 0);
    imagesetpixel($miimagen, 2,2, $rojo);
    // Muestro la imagen en pantalla
    //header('Content-Type: image/jpeg');
    imagejpeg($miimagen,"guardado.jpg");
    // Destruyo la imagen en la memoria
    imagedestroy($miimagen);
?>