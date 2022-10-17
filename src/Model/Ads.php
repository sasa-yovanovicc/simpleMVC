<?php
namespace Model;

  class Ads {
    
    public $id;
    public $userid;
    public $title;

    public function __construct($id, $userid, $title) {
      $this->id      = $id;
      $this->userid  = $userid;
      $this->title   = $title;
    }

    public static function find($uid) {
      $list = [];

      $db = \Core\Db::getInstance();

      // if $uid provided create where part of SQL  
      $where = ($uid ? " WHERE userid=".intval($uid) : "");
      
      $req = $db->query('SELECT * FROM advertisements'.$where);
      
      // return data associative array 
      return $req->fetchAll();
    }
  }
?>