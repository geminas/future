<?php
//*Initialization, Configuration, and Definition
require_once $_SERVER['DOCUMENT_ROOT']."/../app_config/FutureForumWWW.php";

//Include Modules
require_once 'general_en.php';
$argin=processRequestArguments();

$metas=array('title'=>'','keywords'=>'','description'=>'');

//Global Values
$meta_global=queryDB_array("select * from miscs where groupcode='global' order by sequence asc");

foreach ($meta_global as $value) {
    if(in_array($value['caption'],array_keys($metas)))
        $metas[$value['caption']]=$value['en'];
}

//Page specific values
$page=explode(".",basename($_SERVER['PHP_SELF']))[0];

//$code_name=array('
switch($page) {
    case 'footprints':
    case 'people':
    case 'news':
        $meta_specific=queryDB_array("select * from miscs where groupcode='$page' order by sequence asc");
        foreach ($meta_specific as $value) {
            if(in_array($value['caption'],array_keys($metas)) && $value['en']!='')
                $metas[$value['caption']]=$value['en'];
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

//Write it down
echo "<title>{$metas['title']}</title>";
echo "<meta name=\"keywords\" content=\"{$metas['keywords']}\">\n";
echo "<meta name=\"description\" content=\"{$metas['description']}\">\n";

?>