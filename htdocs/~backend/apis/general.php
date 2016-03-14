<?php
//Compatibility: 20151016/standard.
//V3 series
require_once $_SERVER['DOCUMENT_ROOT']."/../app_config/FutureForumWWW.php";


//Debug
function print_r2($val){
    echo '<pre>';
    print_r($val);
    echo  '</pre>';
}

Date.prototype.Format = function(fmt)   
{ //author: meizz   
  var o = {   
    "M+" : this.getMonth()+1,                 //月份   
    "d+" : this.getDate(),                    //日   
    "h+" : this.getHours(),                   //小时   
    "m+" : this.getMinutes(),                 //分   
    "s+" : this.getSeconds(),                 //秒   
    "q+" : Math.floor((this.getMonth()+3)/3), //季度   
    "S"  : this.getMilliseconds()             //毫秒   
  };   
  if(/(y+)/.test(fmt))   
    fmt=fmt.replace(RegExp.$1, (this.getFullYear()+"").substr(4 - RegExp.$1.length));   
  for(var k in o)   
    if(new RegExp("("+ k +")").test(fmt))   
  fmt = fmt.replace(RegExp.$1, (RegExp.$1.length==1) ? (o[k]) : (("00"+ o[k]).substr((""+ o[k]).length)));   
  return fmt;   
}  

//Input processing and sanitization

function processRequestArguments() {
    $hacker=array("'","\"",";");
    //20151019, standard V3.
    $testing=false;
    if($testing) echo "Input arguments: <br>";
    
    $values = array();
    //Change $_REQUEST to $_POST or $_GET when needed.
    foreach ($_REQUEST as $key => $value) {
        //Add filtering and processing rules here.
        switch ($key) {
            default:
                str_replace($hacker,"",$value);
                $value=escape_string($value);
        }
        $values[$key]=$value;
        if($testing) echo "\t$key => $value<br>";
    }  
    return $values;
}

function UpdateFFV($argin) {
    if($argin['formtype']=='miscs') {
        foreach($argin as $key => $value) {
            if (substr($key,0,16)=='bdshare_firstime') continue;
            if (substr($key,0,5)=='__cfd') continue;
            if (substr($key,0,4)=='Hm_l') continue;
            if (substr($key,0,9)=='PHPSESSID') continue;
            if ($key=='formtype') continue;
            if ($key=='language') continue;
            if ($key=='id') continue;
            if (substr($key,1,5)=='FILE_') continue;
            
            queryDB("UPDATE `{$argin['formtype']}` SET `{$argin['language']}`='$value' WHERE `id`='$key';");
        }
    } else if ($argin['formtype']=='aboutus') {
        // echo "<pre>";
        $SetClause="";
        foreach($argin as $key => $value) {
            if (substr($key,0,16)=='bdshare_firstime') continue;
            if (substr($key,0,5)=='__cfd') continue;
            if (substr($key,0,4)=='Hm_l') continue;
            if (substr($key,0,9)=='PHPSESSID') continue;
            if ($key=='formtype') continue;
            if ($key=='language') continue;
            if ($key=='id') continue;

            if ($SetClause!='') $SetClause.=', ';

            $SetClause.="`$key`='$value'";
        }  

        queryDB("UPDATE `{$argin['formtype']}` SET " . $SetClause . " WHERE `id`='{$argin['id']}'");
    } else if ($argin['formtype']=='prize') {
        // echo "<pre>";
        $SetClause="";
        foreach($argin as $key => $value) {
            if (substr($key,0,16)=='bdshare_firstime') continue;
            if (substr($key,0,5)=='__cfd') continue;
            if (substr($key,0,4)=='Hm_l') continue;
            if (substr($key,0,9)=='PHPSESSID') continue;
            if ($key=='formtype') continue;
            if ($SetClause!='') $SetClause.=', ';

            $SetClause.="`$key`='$value'";
        }  

        queryDB("UPDATE `{$argin['formtype']}` SET " . $SetClause . " WHERE `language`='{$argin['language']}'");
    }  
    else if ($argin['formtype']=='news') {
        // echo "<pre>";
        $SetClause="";
        foreach($argin as $key => $value) {
            if (substr($key,0,16)=='bdshare_firstime') continue;
            if (substr($key,0,5)=='__cfd') continue;
            if (substr($key,0,4)=='Hm_l') continue;
            if (substr($key,0,9)=='PHPSESSID') continue;
            if ($key=='formtype') continue;
            if ($key=='language') continue;
            if ($key=='id') continue;
            if (substr($key,0,5)=='FILE_') continue;
            
            if ($SetClause!='') $SetClause.=', ';
            if ($key=='publishTime') {
                $newStatus=$argin["status"];
                if ($newStatus!=0) {
                    $tempStatus=queryDB_row("select * from news where id = '{$argin['id']}'");
                    $oldStatus=$tempStatus['status'];
                    if ($oldStatus==0) {
                        $time1 = date("Y-m-d H:i:s", time());
                        $SetClause.="`publishTime`='$time1'";
                        continue;
                    }
                }
            }

            $SetClause.="`$key`='$value'";
        }  

        queryDB("UPDATE `{$argin['formtype']}` SET " . $SetClause . " WHERE `id`='{$argin['id']}'");
    } else if ($argin['formtype']=='links') {
        $SetClause="";
        foreach($argin as $key => $value) {
            if (substr($key,0,16)=='bdshare_firstime') continue;
            if (substr($key,0,5)=='__cfd') continue;
            if (substr($key,0,4)=='Hm_l') continue;
            if (substr($key,0,9)=='PHPSESSID') continue;
            if ($key=='formtype') continue;
            if ($key=='language') continue;
            if ($key=='id') continue;
            if (substr($key,0,5)=='FILE_') continue;
            
            if ($SetClause!='') $SetClause.=', ';
            
            $SetClause.="`$key`='$value'";
        }  
        queryDB("UPDATE `{$argin['formtype']}` SET " . $SetClause . " WHERE `id`='{$argin['id']}'");
    } else if ($argin['formtype']=='events') {
        $SetClause="";
        foreach($argin as $key => $value) {
            if (substr($key,0,16)=='bdshare_firstime') continue;
            if (substr($key,0,5)=='__cfd') continue;
            if (substr($key,0,4)=='Hm_l') continue;
            if (substr($key,0,9)=='PHPSESSID') continue;
            if ($key=='formtype') continue;
            if ($key=='language') continue;
            if ($key=='id') continue;
            if (substr($key,0,5)=='FILE_') continue;
            
            if ($SetClause!='') $SetClause.=', ';
            
            $SetClause.="`$key`='$value'";
        }  

        queryDB("UPDATE `{$argin['formtype']}` SET " . $SetClause . " WHERE `id`='{$argin['id']}'");
    }
    else {
        $SetClause="";
        foreach($argin as $key => $value) {
            if (substr($key,0,16)=='bdshare_firstime') continue;
            if (substr($key,0,5)=='__cfd') continue;
            if (substr($key,0,4)=='Hm_l') continue;
            if (substr($key,0,9)=='PHPSESSID') continue;
            if ($key=='formtype') continue;
            if ($key=='language') continue;
            if ($key=='id') continue;
            if (substr($key,0,5)=='FILE_') continue;
            
            if ($SetClause!='') $SetClause.=', ';
            
            $SetClause.="`$key`='$value'";
        }  

        queryDB("UPDATE `{$argin['formtype']}` SET " . $SetClause . " WHERE `id`='{$argin['id']}'");
    }
    return 0;
}

function UploadFileFFV($fileDefinitions) {
    //$content
    //print_r2($_FILES);

    foreach($fileDefinitions as $fileDefinition){
        
        if (isset($_FILES[$fileDefinition['formname']]) && ($_FILES[$fileDefinition['formname']]['error']===0)) {
            $dest_file=CONTENT_FOLDER.$fileDefinition['target'];
            $src_file=$_FILES[$fileDefinition['formname']]['tmp_name'];

            list($width, $height) = getimagesize($src_file);
            $newwidth=$fileDefinition['width'];
            $newheight=$fileDefinition['height'];

            $desc_resource = imagecreatetruecolor($newwidth, $newheight);
            $src_resource = imagecreatefromjpeg($src_file);
            imagecopyresampled($desc_resource, $src_resource, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
            
            imagejpeg($desc_resource, $dest_file, 90);
        }
    }
}

function UploadFileFFVPNG($fileDefinitions) {
    //$content
    //print_r2($_FILES);

    foreach($fileDefinitions as $fileDefinition){
        
        if (isset($_FILES[$fileDefinition['formname']]) && ($_FILES[$fileDefinition['formname']]['error']===0)) {
            $dest_file=CONTENT_FOLDER.$fileDefinition['target'];
            $src_file=$_FILES[$fileDefinition['formname']]['tmp_name'];

            list($width, $height) = getimagesize($src_file);
            $newwidth=$fileDefinition['width'];
            $newheight=$fileDefinition['height'];

            $desc_resource = imagecreatetruecolor($newwidth, $newheight);
            $color=imagecolorallocate($desc_resource,255,255,255); 
            //3.设置透明 
            imagecolortransparent($desc_resource,$color); 
            imagefill($desc_resource,0,0,$color); 
            $src_resource = imagecreatefrompng($src_file);
            imagecopyresampled($desc_resource, $src_resource, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
            
            imagepng($desc_resource, $dest_file, 8);
        }
    }
}


//Database
function getWhereClause($argin, $where_filters) {
$where_clause='';
while($where_filter=array_shift($where_filters))
    if ($argin[$where_filter])
    {
        addWhereCondition($where_clause, "`$where_filter` = '{$argin[$where_filter]}' ");
    }
return $where_clause;
}

function addWhereCondition(&$where_clause, $condition) {
    if($where_clause=='')
        $where_clause.= 'WHERE ';
    else
        $where_clause.= 'AND ';
    $where_clause.= $condition;
}

function queryDB ($q) {
    // print_r($q);
    $result=accessDB($q);
    return $result['query'];
}

function escape_string($string) {
    $dbc = mysql_connect (DB_HOST, DB_USER, DB_PASSWORD);
    mysql_select_db(DB_NAME,$dbc);
    return mysql_real_escape_string($string,$dbc);
}

function accessDB($q) {
    // Make the connection:
    $dbc = mysql_connect (DB_HOST, DB_USER, DB_PASSWORD);
    mysql_select_db(DB_NAME,$dbc);
    $result=array();
    
    // If no connection could be made, trigger an error:
    if (!$dbc) {
        stopBecause('Could not connect to MySQL: ' . mysql_error(), 201);
    } else { // Otherwise, set the encoding:
        mysql_set_charset('utf8', $dbc);
    }

    // Make query
    $result['query'] = mysql_query($q, $dbc);
    $result['insert_id'] = mysql_insert_id($dbc);
    
    // Check and return
    if($result['query']===false) {
        $q=str_replace("\r\n", "", $q);
        stopBecause("DB query failed. $q", 202);
    }
    return $result;
}

function queryResultToArray($r) {
    $a=array();
    while($row=mysql_fetch_array($r, MYSQL_ASSOC)){
        $a[]=$row;
    }
    return $a;
}

function queryResultToRow($r) {
    return mysql_fetch_array($r, MYSQL_ASSOC);
}


function queryDB_array ($q){
    return queryResultToArray(queryDB($q));
}


function queryDB_row ($q) {
    return queryResultToRow(queryDB($q));
}

//Output
function produceOutputV3($output) {
    //Status: 0 is OK, all others are problems.
    //  >0 php system error number;
    //  <0 logical error;
    //  -1 is undefined logical error.
    if(!isset($output['status'])) $output['status']=0;
    
    //Data for client
    if(!isset($output['data'])) $output['data']=array();
    
    //Client side should prompt message to user
    if(!isset($output['message'])) $output['message']='';
    
    //Client side should redirect to this url after prompt (if any)
    if(!isset($output['redirection'])) $output['redirection']='';
    
    echo json_encode(array(
        'status'        =>  $output['status'],
        'data'          =>  $output['data'],
        'message'       =>  $output['message'],
        'redirection'   =>  $output['redirection']
    ));
}

//Error Handling
function stopBecause($errstr, $errno) {
    if (!isset($errno)) $errno=1; //will be printed in status as -1
    produceOutputV3(array('status'=>-$errno, 'message'=>$errstr));
    exit();
}

function error_handler($errno, $errstr) // This is intended only for api functions.
{
    if ($errno & E_USER_ERROR) {
        produceOutputV3(array('status'=>$errno, 'message'=>$errstr));
        exit();
    }
    return false;
}
set_error_handler("error_handler");
?>