<?php

require_once 'vendor/autoload.php';

// Check if web address is set
if(isset($_GET['text'])) {
    $renderer = new \BaconQrCode\Renderer\Image\Png();
    $renderer->setHeight($_GET['size']);
    $renderer->setWidth($_GET['size']);
    $writer = new \BaconQrCode\Writer($renderer);

    // delete old qr code image file
    if(!empty($_GET['image'])) {
        unlink($_GET['image']);
    }

    $fileName = $_GET['text'];
    
    $filePath = "assets/images/" . uniqid() . ".png";

    // create new qr code image
    $writer->writeFile($fileName, $filePath);

    if (file_exists($filePath)) {   
        echo $filePath;               
    }
}

