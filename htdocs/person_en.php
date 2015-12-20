<?php

require_once $_SERVER['DOCUMENT_ROOT']."/../app_config/FutureForumWWW.php";
//Include Modules
require_once '~backend/apis/general_en.php';

$people=queryDB_array("select
    `name_en` as `chinesename`,
    `code` as `latinized`,
    `category` as `groupcode`,
    `name_en` as `englishname`,
    `desc1_en` as `title1`,
    `desc2_en` as `title2`,
    `note_en` as `desc`,
    `quote_en` as `quote`
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
