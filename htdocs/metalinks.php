<?php

//*Initialization, Configuration, and Definition
require_once $_SERVER['DOCUMENT_ROOT']."/../app_config/FutureForumWWW.php";
//Include Modules
require_once 'general.php';

$argin=processRequestArguments();


$metas=array('title'=>'','keywords'=>'','description'=>'');

//Global Values
$meta_global=queryDB_array("select * from miscs where groupcode='global' order by sequence asc");

foreach ($meta_global as $value) {
    if(in_array($value['caption'],array_keys($metas)))
        $metas[$value['caption']]=$value['zh-cn'];
}

//Page specific values
$page=explode(".",basename($_SERVER['PHP_SELF']));
//$code_name=array('
switch($page[0]) {
    case 'footprints':
    case 'people':
    case 'news':
        $meta_specific=queryDB_array("select * from miscs where groupcode='$page[0]' order by sequence asc");
        foreach ($meta_specific as $value) {
            if(in_array($value['caption'],array_keys($metas)) && $value['zh-cn']!='')
                $metas[$value['caption']]=$value['zh-cn'];
        }
        break;
    case 'event':
        $meta_specific=queryDB_row("
            select * from events where id = {$argin['eventid']}
        ");

        $metas['title']=$meta_specific['title_zh-cn'];
        
        break;
    case 'newsitem':
        $meta_specific=queryDB_row("
            select * from news where code = {$argin['newsid']}
        ");
        
        $metas['title']=$meta_specific['title'];
        
        break;
        
    default:
}

//Write it down
echo "<title>{$metas['title']}</title>";
echo "<meta name=\"keywords\" content=\"{$metas['keywords']}\">\n";
echo "<meta name=\"description\" content=\"{$metas['description']}\">\n";

?>