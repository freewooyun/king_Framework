<?php
namespace core\lib;
// use core\lib\conf;

class model extends \PDO{
  public function __construct(){
    $data = conf::all('database');
    try{
      parent::__construct($data['DSN'],$data['USERNAME'],$data['PASSWD']);
    }catch(\PDOException $e){
      print_r($e->getMessage());
    }
  }
}
