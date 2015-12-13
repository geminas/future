<?php
//20151016, V3 modified-FFW (API)

//*Initialization, Configuration, and Definition
require_once $_SERVER['DOCUMENT_ROOT']."/../app_config/FutureForumWWW.php";

//Include Modules
require_once 'general.php';

//Input argument processing
$argin=processRequestArguments();

//Now do stuff
//When encounter errors, use stopBecause("", optional ERROR_NUMBER default -1);

if (session_status() === PHP_SESSION_NONE){session_start();}
if (!isset($_SESSION['user_id'])) {
	stopBecause("登录信息有误！",1);
}


$people_category=queryDB_array("select * from people_category");
$people=queryDB_array("select * from people");
$miscs=queryDB_array("select * from miscs where groupcode='people' order by sequence asc ");

//*JSON encoding and return
//defaults: 'status'=0, 'data'=array(), 'message'='', 'redirection'='';
produceOutputV3(array('data'=>array('category'=>$people_category, 'people'=>$people, 'miscs' => $miscs)));
?>