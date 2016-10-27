<?php
namespace core\lib;
use core\lib\conf;

class log{
  static $class;
  //确定日志存储方式,方式在lib/drive/log里
  public static function init(){
    $drive = conf::get('DRIVE','log');
    $class = '\core\lib\drive\log\\'.$drive;
    self::$class = new $class;
  }

  public static function log($name,$file='log'){
    self::$class->log($name,$file);
  }
}
