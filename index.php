<?php
//<<<<<<< HEAD
//<<<<<<< HEAD

// change the following paths if necessa
$yii=dirname(__FILE__).'/../yii/framework/yii.php';
//=======
//js
// change the following paths if necessary
//$yii=dirname(__FILE__).'/framework/yii.php';
//>>>>>>> 9f836ab3821172e569b8953af3d4cffecdb89eb5
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();
