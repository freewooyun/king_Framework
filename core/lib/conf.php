<?php
namespace core\lib;

class conf{
  static public $conf = [];
  static public function get($name,$file){
    if(isset(self::$conf[$file])){
      return self::$conf[$file][$name];
    }else{
      $path = KING.'/core/config/'.$file.'.php';
      if(is_file($path)){
        $conf = include $path;//Array ( [CONTROLLER] => index [ACTION] => index )
        if(isset($conf[$name])){
          self::$conf[$file] = $conf;
          return $conf[$name];
        }else{
          throw new \Exception('没有这个配置项'.$name);
        }
      }else{
        throw new \Exception('找不到配置文件'.$file);
      }
    }
  }

  static public function all($file){
    if(isset(self::$conf[$file])){
      return self::$conf[$file];
    }else{
      $path = KING.'/core/config/'.$file.'.php';
      if(is_file($path)){
        $conf = include $path;//Array ( [CONTROLLER] => index [ACTION] => index )
        self::$conf[$file] = $conf;
        return $conf;
      }else{
        throw new \Exception('找不到配置文件'.$file);
      }
    }
  }
}
