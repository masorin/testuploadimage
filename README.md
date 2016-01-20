# testuploadimage
test package
<?php

use TestAutoloadImage\Uploader\ImageUploader as ImageUploader;

header('Content-type: text/html; Charset=Utf-8');
ini_set('display_errors', '1');
error_reporting(E_ALL);

chdir(dirname(__DIR__));

require_once('../vendor/autoload.php');

// $imageUploader = new ImageUploader();
// $imageUploader->setValidTypeExtentions(['jpg', 'png', 'gif']);
// $imageUploader->startUploadImage();

// var_dump($imageUploader->getNotValidFiles(), $imageUploader->getSavedFiles());
