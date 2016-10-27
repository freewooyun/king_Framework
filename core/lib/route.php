<?php
//路由类文件
namespace core\lib;
// use core\lib\conf;

class route{
  public $controller;
  public $action;
  public function __construct(){
    //当是localhost执行下面
    $path = $_SERVER['REQUEST_URI'];
    if(isset($path) && $path!='/'){
      $patharr = explode('/',trim($path,'/'));
      if(isset($patharr[0])){
        $this->controller = $patharr[0];
      }
      unset($patharr[0]);
      if(isset($patharr[1])){
        $this->action = $patharr[1];
        unset($patharr[1]);
      }else{
        $this->action = conf::get('ACTION','route');
      }
      //获取URL上面的GET
      $count = count($patharr)+2;
      $i = 2;
      while($i < $count){
        if(isset($patharr[$i+1])){
          $_GET[$patharr[$i]] = $patharr[$i+1];
        }
          $i = $i+2;
      }
    }else{
      //当是localhost/index/index执行下面
      $this->controller = conf::get('CONTROLLER','route');
      $this->action = conf::get('ACTION','route');
    }
  }


}
