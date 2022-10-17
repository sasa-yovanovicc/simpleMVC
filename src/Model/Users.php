<?php
namespace Model;

  class Users {
    
    public $id;
    public $name;

    public function __construct($id, $name) {
      $this->id      = $id;
      $this->name  = $name;
    }

    public static function find($uid) {
      $list = [];
      
      $db = \Core\Db::getInstance();

      // if $uid provided create where part of SQL
      $where = ($uid ? " WHERE id=".intval($uid) : "");
      
      $req = $db->query('SELECT * FROM users'.$where);

      // return data associative array 
      return $req->fetchAll();
    }
  }
?>