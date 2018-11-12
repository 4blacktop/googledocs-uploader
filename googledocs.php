<?php
// скрипт загружает файл пользователя в google docs
// http://air-sim.ru/images/air.jpg

// запускаем таймер выполнения скрипта
set_time_limit(600);
ini_set('memory_limit', '512M');
$mtime = microtime(true);
echo "<pre>";

// Use ClientLogin to authenticate to Google Docs
$user = 'user@gmail.com';
$pass = 'pass';

// подключаем библиотеки
require_once 'Zend/Loader.php';
Zend_Loader::loadClass('Zend_Gdata');
Zend_Loader::loadClass('Zend_Gdata_Query');
Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
Zend_Loader::loadClass('Zend_Gdata_Docs');
$service = Zend_Gdata_Docs::AUTH_SERVICE_NAME; 


$httpClient = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, $service);
$docs = new Zend_Gdata_Docs($httpClient);
// Actually upload the file, the second parameter here is the document title
// $newDocumentEntry = $docs->uploadFile('air.jpg', 'air-sim.jpg',null, Zend_Gdata_Docs::DOCUMENTS_LIST_FEED_URI);
// $newDocumentEntry = $docs->uploadFile('air.jpg');
$newDocumentEntry = $docs->uploadFile('air.jpg');
print_r($newDocumentEntry);
 
 
// подсчитываем время работы
$timer = round((microtime(true) - $mtime) * 1, 2);
echo "<br /><br />Время работы скрипта: " . $timer . " с.";
echo "<br />Задержки: " . ($sumpause/1000000) . " с.";
echo "</pre>";
?>