<?php

print_r("metalinksmetalinksmetalinksmetalinks1");

//*Initialization, Configuration, and Definition
require_once $_SERVER['DOCUMENT_ROOT']."/../app_config/FutureForumWWW.php";

print_r("metalinksmetalinksmetalinksmetalinks2");

//Include Modules
require_once 'general.php';

print_r("metalinksmetalinksmetalinksmetalinks3");

$argin=processRequestArguments();


$metas=array('title'=>'','keywords'=>'','description'=>'');

print_r("metalinksmetalinksmetalinksmetalinks4");

//Global Values
$meta_global=queryDB_array("select * from miscs where groupcode='global' order by sequence asc");

foreach ($meta_global as $value) {
    if(in_array($value['caption'],array_keys($metas)))
        $metas[$value['caption']]=$value['zh-cn'];
}

print_r("metalinksmetalinksmetalinksmetalinks5");

//Page specific values
$page=explode(".",basename($_SERVER['PHP_SELF']))[0];

//$code_name=array('
switch($page) {
    case 'footprints':
    case 'people':
    case 'news':
        $meta_specific=queryDB_array("select * from miscs where groupcode='$page' order by sequence asc");
        foreach ($meta_specific as $value) {
            if(in_array($value['caption'],array_keys($metas)) && $value['zh-cn']!='')
                $metas[$value['caption']]=$value['zh-cn'];
        }
        break;
    case 'event':
    case 'newsitem':
        $db_name=array('event'=>'events', 'newsitem'=>'news');
        $db_code=array('event'=>'eventid', 'newsitem'=>'newsid');
        $meta_specific=queryDB_row("
            select `meta-title`,`meta-keywords`,`meta-description` from `{$db_name[$page]}`
            where `code`='{$argin[$db_code[$page]]}'
        ");
        foreach ($metas as $key=>$value) {
            if($meta_specific['meta-'.$key]!='') $metas[$key]=$meta_specific['meta-'.$key];
        }
        
        break;
        
    default:
}

print_r("metalinksmetalinksmetalinksmetalinks6");

//Write it down
echo "<title>{$metas['title']}</title>";
echo "<meta name=\"keywords\" content=\"{$metas['keywords']}\">\n";
echo "<meta name=\"description\" content=\"{$metas['description']}\">\n";

?>