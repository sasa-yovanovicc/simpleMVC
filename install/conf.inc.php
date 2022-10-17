<?php
namespace Config;

ini_set('display_startup_errors',1);
ini_set('display_errors','1');
error_reporting(1);
error_reporting(E_ALL);

// CHANGE THIS depends of your test configruation
define('APP_NAME', 'Rabit TEST');
define('APP_DOMAIN', '_APP_DOMAIN_');   
define('APP_INNER_DIRECTORY', '/_APP_INNER_DIRECTORY_');
define('APP_ROOT', __DIR__);

define('DB_HOST', '_DB_HOST_');           
define('DB_NAME', '_DB_NAME_');           
define('DB_USER', '_DB_USER_');           
define('DB_PASS', '_DB_PASS_');           

define('APP_CONTROLLER_NAMESPACE', 'Controller\\');
define('APP_DEFAULT_CONTROLLER', 'Home');
define('APP_DEFAULT_CONTROLLER_METHOD', 'index');
define('APP_CONTROLLER_METHOD_SUFFIX', '');

?>