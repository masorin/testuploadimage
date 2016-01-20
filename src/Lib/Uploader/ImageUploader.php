<?php

namespace TestAutoloadImage\Uploader;

use TestAutoloadImage\Uploader\IUploader;

// тестовый класс, по дефолту устанавливат типы валидных разширений файлов
// 1. проверяет разширение загружаемых файлов
// в зависимости от валидности файлов формирует:
// а). массивы с валидными и не валидными файлами
// б). массив с загруженными файлами
// 2. сохраняет файлы
// 3. просмотр парметров результатов загрузки

class ImageUploader implements IUploader
{
  // валидные типы разширений
  protected $_validTypeMime = [];
  // загруженные файлы
  protected $_uploadFiles   = [];
  // валидные файлы
  protected $_validFiles    = [];
  // не валидные файлы
  protected $_notValidFiles = [];
  // сохраненные файлы
  protected $_savedFiles    = [];
  // ошибки сохранения
  protected $_errorsSave    = [];
  
  function __construct()
  {
      $this->_validTypeMime   = $this->setDefaultValidTypeExtention();
  }
  
  // старт загрузки
  function startUploadImage()
  {
      $this->_uploadFiles = $this->uploadImage();
      $this->_validFiles  = $this->checkExtentionFile($this->_uploadFiles);
      $this->saveValidFile($this->_validFiles);
  }
  
  // установка по дефолту валидных расширений файлов
  function setDefaultValidTypeExtention()
  {
      return ['jpg', 'png', 'gif'];
  }
  
  // установка валидных расширений файлов
  function setValidTypeExtentions(array $validTypeExtention)
  {
      $this->_validTypeMime = $validTypeExtention;
      return true;
  }
  
  // загрузка файлов
  function uploadImage()
  {
      return ['1.png', '2.png', '3.gif', '4.doc', '5.text'];
  }
  
  // проверка расширений загруженных файлов
  function checkExtentionFile(array $arrayUploadFiles)
  {
      foreach($arrayUploadFiles as $uploadFile){
          if(!in_array(pathinfo($uploadFile)['extension'], $this->_validTypeMime)){
              $this->_notValidFiles[] = 'file with extention [' . $uploadFile . '] not uploaded';
          }else{
              $this->_validFiles[] = $uploadFile;
          }
      }
      return $this->_validFiles;
  }
  
  // сохранение валидных файлов
  function saveValidFile(array $validFiles)
  {
    foreach($validFiles as $file){
      // if (удачно)   $this->_savedFiles[] = $file;
      // if (!удачно)  $this->_errorsSave[] = $file;
      echo "file $file saved |";
    }
  }
  
  // просмотр не валидных файлов
  function getNotValidFiles()
  {
      return $this->_notValidFiles;
  }
  
  // просмотр сохраненных файлов
  function getSavedFiles()
  {
      $this->_savedFiles = $this->_validFiles;
      return $this->_savedFiles;
  }
 
}