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

if (isset($argin['remove'])) {
    queryDB("DELETE FROM `aboutus` WHERE id='{$argin['remove']}'");
}

if (isset($argin['create'])) {
    queryDB("INSERT INTO `aboutus` (`tabtitle`, `title`,`content` )
    VALUES ('{$argin['tabtitle']}', '{$argin['title']}',, '{$argin['content']}',)");
}

if (isset($argin['update'])) {
    queryDB("UPDATE `aboutus` SET (`content` )
    VALUES ('{$argin['content']}')");
}

//*JSON encoding and return
//defaults: 'status'=0, 'data'=array(), 'message'='', 'redirection'='';
produceOutputV3(array());
?>