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


$events_category=queryDB_array("select * from events_category");
$events=queryDB_array("select 
    events.id as id,
    events.code as code,
    category,number,
    `number_zh-cn`,
    number_en,
    `name_zh-cn`,
    `name_en`,
    events.`title_zh-cn` as `title_zh-cn`,
    events.title_en as title_en,
    speaker_name,
    speaker_name_en,
    `meta-title`,
    `meta-keywords`,
    `meta-description`,
    date_string, date_string_en, address, address_en, `text_zh-cn`, `text_en`, youkuID, sequence,
    events_category.`title_zh-cn` as category_title
    from events inner join events_category on events_category.value=events.category
    order by sequence asc");
$miscs=queryDB_array("select * from miscs where groupcode='footprint' order by sequence asc ");

//*JSON encoding and return
//defaults: 'status'=0, 'data'=array(), 'message'='', 'redirection'='';
produceOutputV3(array('data'=>array('category'=>$events_category, 'events'=>$events, 'miscs'=>$miscs)));
?>