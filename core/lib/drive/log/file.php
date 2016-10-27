<?php
//日志存到/log文件
namespace core\lib\drive\log;
use core\lib\conf;

class file{
  public $path;
  public function __construct(){
    $conf = conf::get('OPTION','log');
    $this->path = $conf['PATH'];
  }
  public function log($message,$file='log'){
    if(!is_dir($this->path.date('YmdH'))){
      mkdir($this->path.date('YmdH'),0777,true);
    }
    //加上date就是一个小时生成一个日志文件
    //PHP_EOL在不同的系统使用换行 FILE_APPEND接着写入
    return file_put_contents($this->path.date('YmdH').'/'.$file.'.php',json_encode($message).PHP_EOL,FILE_APPEND);

    //这里会出现刷新一次，出两条日志的情况（老师视频也是这样），原因是浏览器会请求ico文件，rewrite规则把它导到框架来处理了。
  }
}
