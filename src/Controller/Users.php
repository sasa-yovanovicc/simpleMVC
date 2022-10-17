<?php
namespace Controller;

use Core\Template;
use Model;
 
class Users extends AbstractController 
{
    public function __construct()
    {
        parent::__construct(new Template());
    }
  
    public function index() {
      $variables=array(
        'pagetitle'=>'Users',
        'heading'=>'Users'
        );      
      // if exist GET parameter uid, set $uid value otherwise false
      $uid = (isset($_GET['uid']) ? $_GET['uid'] : false );

      // find data 
      $users = Model\Users::find($uid);

      // choose template
      $subtemplate = \Core\Util::getTemplate(__CLASS__,__FUNCTION__);

      return parent::getView($subtemplate,$variables,$users); 
    }
}  
?>  