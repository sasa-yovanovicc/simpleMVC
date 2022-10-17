<?php
namespace Controller;

use Core\Template;
use Model;

class Home extends AbstractController 
{
    public function __construct()
    {
        parent::__construct(new Template());
    }

    public function index() {
      $variables=array(
        'pagetitle'=>'Task app',
        'heading'=>'Welcome'
        );      
      

      // choose template
      $subtemplate = \Core\Util::getTemplate(__CLASS__,__FUNCTION__);

      return parent::getView($subtemplate,$variables); 
    }
  }
?>