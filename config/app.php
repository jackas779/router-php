<?php
$pathFile = dirname($_SERVER['SCRIPT_NAME']);
$pathUri = str_replace('%20',' ', $_SERVER['REQUEST_URI']);

$uri = substr($pathUri,strlen($pathFile));

define('URL',$uri);