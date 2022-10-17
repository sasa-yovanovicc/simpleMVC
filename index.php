<?php
ob_start("ob_gzhandler");
require_once('conf.inc.php');
require_once('src/Autoload.php');

/* Intiate Request class */
use Core\Request;
 
$request = new Request($_SERVER, $_POST, $_GET, $_FILES);

/* detect class method adn parameters from requested URL */
try {
    $controller = $request->getController();
    $params =  $request->getGet();
    $method = $request->getMethod($controller);
 
    $controller = new $controller;

    $controller->$method($params);
} catch (Exception $e) {
    echo sprintf(
        'Erro Code: %s  Message: <b>%s</b> at %s line: %s',
        $e->getCode(),
        $e->getMessage(),
        $e->getFile(),
        $e->getLine()
    );
}
ob_end_flush();
?>