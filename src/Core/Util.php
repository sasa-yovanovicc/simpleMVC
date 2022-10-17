<?php
namespace Core;

  class Util {    

    private function __construct() {}

    private function __clone() {}

    // found template by class and method name    
    public static function getTemplate($class, $method=false) {
        
        $folder = substr(strrchr($class, "\\"), 1);
        if ($method!=false) {
            $filename=$method;
        }
        else {
            $filename="index";
        }
        $template = 'src/View/'.$folder.'/'.$filename.'.php';
        return $template;
    }
  }

?>