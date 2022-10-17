<?php
namespace Core;

use Exception;
 
class Request
{
    private $server;
    private $post;
    private $get;
    private $files;
 
    public function __construct(
        array $server = [],
        array $post = [],
        array $get = [],
        array $files = []
    ) {
        $this->server = $server;
        $this->post = $post;
        $this->get = $get;
        $this->files = $files;
    }
 
    public function getServer($index = null)
    {
        return !is_null($index) && isset($this->server[$index]) ? $this->server[$index] : $this->server;
    }

    public function getGet()
    {
        return $this->get;
    }

    /* similar as getGet() can be created method for POST, PUT, DELETE, FILES request */

    public function getController()
    {
        $urlParts = $this->getUrlParts();
         
        // return default controller if controller name is not set in URL
        if (!isset($urlParts[0])) {
            return APP_CONTROLLER_NAMESPACE.APP_DEFAULT_CONTROLLER;
        }
 
        // Controller name exists in system 
        if (class_exists(APP_CONTROLLER_NAMESPACE.$urlParts[0])) {
            return APP_CONTROLLER_NAMESPACE.$urlParts[0];
        }
 
        // Anything else
        http_response_code(404);
        throw new Exception(sprintf('Controller not found: [%s]', APP_CONTROLLER_NAMESPACE.$urlParts[0]), 404);
    }
 
    public function getMethod($controller)
    {
        $urlParts = $this->getUrlParts();
 
        // return default method
        if (!isset($urlParts[1])) {
            return APP_DEFAULT_CONTROLLER_METHOD.APP_CONTROLLER_METHOD_SUFFIX;
        }
 
        // If controller method name pattern is invalid
        if (!preg_match('/^[a-z\-]+$/', $urlParts[1])) {
            http_response_code(400);
            throw new Exception(sprintf('Invalid method: [%s]', $urlParts[1]), 400);
        }
 
        // If controller method exists in system then return it
        $method = $this->constructMethod($urlParts[1]);
        if (method_exists($controller, $method)) {
            return $method;
        }
 
        // Anything else
        http_response_code(404);
        throw new Exception(sprintf('Method cannot be found: [%s:%s]', $controller, $method), 404);
    }
 
    /* split URL to parts based on "/" as separator */
    private function getUrlParts()
    {
        // clean parameters form URL with parse_url and PHP_URL_PATH option
        // remove inner diretory from URL
        $url = str_replace(APP_INNER_DIRECTORY, null, parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));        
        $urlParts = explode('/', $url);
        $urlParts = array_filter($urlParts);
        $urlParts = array_values($urlParts);

        return $urlParts;
    }
 
    private function constructMethod($part)
    {
        $method = null;
 
        $parts = explode('-', $part);
        foreach ($parts as $part) {
            if (!$method) {
                $method = $part;
            } else {
                $method .= ucfirst($part);
            }
        }
 
        return $method.APP_CONTROLLER_METHOD_SUFFIX;
    }
}
?>