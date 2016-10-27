<?php
//框架核心文件
namespace core;

class king{
  public static $classMap = array();
  public $assign;

  //自动加载控制器
  public static function run(){

    //启动日志类,确定存储类型
    \core\lib\log::init();
    //写入日志
    // \core\lib\log::log();

    //自动加载控制器
    $route = new \core\lib\route();
    $controller = $route->controller;
    $action = $route->action;

    //记录到日志
    \core\lib\log::log('controller:'.$controller.PHP_EOL.'action:'.$action);

    $file = APP.'/controller/'.$controller.'Controller.php';
    if(is_file($file)){
      include($file);
      $controllerFile = '\\'.MODULE.'\controller\\'.$controller.'Controller';
      $c = new $controllerFile;
      $c->index();
    }else{
      throw new \Exception('找不到控制器'.$controller);
    }
  }


  //自动加载类库
  //作用:加载类必须先include，自动include类文件
  public static function load($class){
    if(isset($classMap[$class])){
      return true;
    }else{
      $class = str_replace('\\','/',$class);
      $file = KING.'/'.$class.'.php';
      if(is_file($file)){
        include($file);
        self::$classMap[$class] = $class;
      }else{
        return false;
      }
    }
  }

  //视图传参
  public function assign($name,$data){
    $this->assign[$name] = $data;
  }
  //引用视图文件
  public function display($file){
    $file = APP.'/view/'.$file;
    if(is_file($file)){
      extract($this->assign);//将数组里的值,变为以键为变量名的值,例如打散后 $title='title';$data='lalala';
      include($file);
    }
  }

}
