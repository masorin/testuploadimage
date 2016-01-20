<?php
use TestAutoloadImage\Uploader\ImageUploader as ImageUploader;

class TestImageUploader extends PHPUnit_Framework_TestCase
{
    // установка по дефолту валидных расширений
    function testSetDefaultTypeExt()
    {
        $imageUploader = new ImageUploader();
        $this->assertTrue(is_array($imageUploader->setDefaultValidTypeExtention()) === true);
    }
    
    // проверка на валидность загруженных файлов
    function testCheckExtentionFile()
    {
        $imageUploader = new ImageUploader();
        $inputParam = ['1.png', '2.png', '3.gif', '4.doc', '5.text'];
        $this->assertTrue(is_array($imageUploader->checkExtentionFile($inputParam)) === true);
    }
    
    // установка валидных расширений файлов
    function testCheckSetValidTypeExt()
    {
        $imageUploader = new ImageUploader();
        $inputParam = ['jpg', 'png', 'gif'];
        $this->assertTrue(is_array($imageUploader->setDefaultValidTypeExtention()) === true);
    }
}