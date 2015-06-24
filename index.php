<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST');

require_once 'config/config.php';

set_include_path(
	CONTROLLER_PATH . PATH_SEPARATOR .
	SYSTEM_PATH . PATH_SEPARATOR .
	get_include_path()
);

require_once 'system/Autoloader.php';

$objLoader = new Autoloader();

$urlParser = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$url = explode('/',$urlParser);
$url = array_filter($url);

unset($url[1]);

$classe = ucfirst(array_shift($url));
$metodo = array_shift($url);
$args   = $url;

if (class_exists($classe)){
	$index = new Index($classe, $metodo, $args);
	Common::request_method($index);
}else{
	die('Error - Não foi possível realizar a pesquisa...');
}