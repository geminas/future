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

if(!isset($argin['offset'])) $argin['offset']=0;
if(!isset($argin['limit'])) $argin['limit']=15;

$newsRecent=queryDB_array("
    select code,author,abstract,title, DATE_FORMAT(publishTime,'%Y-%c-%e %k:%i') as publishTime from news
    where status <> 0
    order by status desc, publishTime desc
    limit {$argin['offset']} , {$argin['limit']};
");

$newsCount=queryDB_row("select count(*) as total from news where status <> 0");

//*JSON encoding and return
//defaults: 'status'=0, 'data'=array(), 'message'='', 'redirection'='';
produceOutputV3(array('data'=>array('newsRecent'=>$newsRecent, 'newsCount'=>$newsCount)));
?>