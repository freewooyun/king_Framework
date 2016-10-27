<?php
namespace app\controller;
use core\lib;

class indexController extends \core\king{
  public function index(){
    // new \core\lib\model;

    $temp = \core\lib\conf::get('CONTROLLER','route');
    $temp = \core\lib\conf::get('ACTION','route');

    // $data = 'Hello world';
    // $this->assign('data',$data);
    // $this->display('index.html');
  }

}
