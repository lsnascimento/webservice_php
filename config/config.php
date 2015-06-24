<?php

define('SITE_URL' , 'http://' . $_SERVER['HTTP_HOST'] . '/wssif');

define('SITE_PATH'   	  , realpath(dirname(__FILE__)) . '\..');
define('SYSTEM_PATH' 	  , SITE_PATH . '\system');
define('APPLICATION_PATH' , SITE_PATH . '\Application');
define('CONTROLLER_PATH'  , APPLICATION_PATH . '\Controller');
define('MODEL_PATH'		  , APPLICATION_PATH . '\Model');

define('ROOT_PATH' , realpath(dirname(__FILE__)) . '\..\\');

define('PREFIX_MODEL' , 'Model_');

define('DB_TYPE' , 'mysql');
define('DB_HOST' , 'localhost');
define('DB_NAME' , 'nome_do_banco');
define('DB_USER' , 'root');
define('DB_PASS' , '');