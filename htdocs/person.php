<?php

require_once $_SERVER['DOCUMENT_ROOT']."/../app_config/FutureForumWWW.php";
//Include Modules
require_once '~backend/apis/general.php';

$people=queryDB_array("select
    `name_zh-cn` as `chinesename`,
    `code` as `latinized`,
    `category` as `groupcode`,
    `name_en` as `englishname`,
    `desc1_zh-cn` as `title1`,
    `desc2_zh-cn` as `title2`,
    `note_zh-cn` as `desc`,
    `quote_zh-cn` as `quote`
    from `people`");

$category=queryDB_array("select * from people_category");

for($i=0;$i<count($people);$i++) {
    $people[$i]['group']="";
    for($j=0;$j<count($category);$j++) {
        if($people[$i]['groupcode'] & $category[$j]['value'])
            $people[$i]['group'].=$category[$j]['code'];
    }
    $people[$i]['group']=trim(str_replace("."," ",$people[$i]['group']));
}

//print_r2($people);

$i=rand(0,count($people)-1);
$j=$i;
while(($j=rand(0,count($people)-1))==$i);

echo json_encode(array($people[$i], $people[$j]));

?>
