<?php
namespace Core;

class Template
{
   private $template;
   private $vars;
   function load($filepath) {
      $this->template = $filepath;      
   }
   function replace($var, $content)
   {
      $this->vars[$var] = $content;
   }
   function publish()
   {
       extract($this->vars);
       include($this->template);
   }
}
?>