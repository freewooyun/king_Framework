<?php
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */

 define('KING',realpath('./'));
 define('CORE',KING.'/core');
 define('APP',KING.'/app');
 define('MODULE','app');

 define('DEBUG',true);
 if(DEBUG){
   ini_set('display_error','On');
 }else{
   ini_set('display_error','Off');
 }

 include(CORE.'/common/function.php');
 include(CORE.'/king.php');

 spl_autoload_register('\core\king::load');//当类不存在自动加载类

 \core\king::run();//静态方法不需要写new
