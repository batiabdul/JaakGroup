<?php
// We handle all error on APP and send to Error_log.txt file...
include 'Errors/Error_config.php';
const DEFAULT_APP = 'Frontend';
// If the app is not valide, we'll change the defaut application that would take care of the 404 error...
if (!isset($_GET['app']) || !file_exists(__DIR__.'/App/'.$_GET['app'])) {$_GET['app'] = DEFAULT_APP;}
// We start to include the classe that permit us to save our autoload...
require 'Autoload.php';
Autoload::loadClass();
Autoload::allAutoload();
// We just need to deduce the name of the class and instantiate...
$appClass = $_GET['app'].'Application';
$app = new $appClass;
$app->run();
