<?php
//header('Access-Control-Allow-Origin: http://www.baidu.com'); //设置http://www.baidu.com允许跨域访问
//header('Access-Control-Allow-Headers: X-Requested-With,X_Requested_With'); //设置允许的跨域header
date_default_timezone_set("Asia/chongqing");
error_reporting(E_ERROR);
header("Content-Type: text/html; charset=utf-8");

$tempCont = preg_replace("/\/\*[\s\S]+?\*\//", "", file_get_contents("config.json"));
$tempCont = sprintf($tempCont);
// $tempCont = '{ "imageActionName": "uploadimage", "imageFieldName": "upfile", "imageMaxSize": 2048000, "imageAllowFiles": [".png", ".jpg", ".jpeg", ".gif", ".bmp"], "imageCompressEnable": true, "imageCompressBorder": 1600, "imageInsertAlign": "none", "imageUrlPrefix": "", "imagePathFormat": "/contents/news/image/{yyyy}{mm}{dd}/{time}{rand:6}", "scrawlActionName": "uploadscrawl", "scrawlFieldName": "upfile", "scrawlPathFormat": "/contents/news/image/{yyyy}{mm}{dd}/{time}{rand:6}", "scrawlMaxSize": 2048000, "scrawlUrlPrefix": "", "scrawlInsertAlign": "none", "snapscreenActionName": "uploadimage", "snapscreenPathFormat": "/contents/news/image/{yyyy}{mm}{dd}/{time}{rand:6}", "snapscreenUrlPrefix": "", "snapscreenInsertAlign": "none", "catcherLocalDomain": ["127.0.0.1", "localhost", "img.baidu.com"], "catcherActionName": "catchimage", "catcherFieldName": "source", "catcherPathFormat": "/contents/news/image/{yyyy}{mm}{dd}/{time}{rand:6}", "catcherUrlPrefix": "", "catcherMaxSize": 2048000, "catcherAllowFiles": [".png", ".jpg", ".jpeg", ".gif", ".bmp"], "videoActionName": "uploadvideo", "videoFieldName": "upfile", "videoPathFormat": "/contents/news/video/{yyyy}{mm}{dd}/{time}{rand:6}", "videoUrlPrefix": "", "videoMaxSize": 102400000, "videoAllowFiles": [ ".flv", ".swf", ".mkv", ".avi", ".rm", ".rmvb", ".mpeg", ".mpg", ".ogg", ".ogv", ".mov", ".wmv", ".mp4", ".webm", ".mp3", ".wav", ".mid"], "fileActionName": "uploadfile", "fileFieldName": "upfile", "filePathFormat": "/contents/news/file/{yyyy}{mm}{dd}/{time}{rand:6}", "fileUrlPrefix": "", "fileMaxSize": 51200000, "fileAllowFiles": [ ".png", ".jpg", ".jpeg", ".gif", ".bmp", ".flv", ".swf", ".mkv", ".avi", ".rm", ".rmvb", ".mpeg", ".mpg", ".ogg", ".ogv", ".mov", ".wmv", ".mp4", ".webm", ".mp3", ".wav", ".mid", ".rar", ".zip", ".tar", ".gz", ".7z", ".bz2", ".cab", ".iso", ".doc", ".docx", ".xls", ".xlsx", ".ppt", ".pptx", ".pdf", ".txt", ".md", ".xml" ], "imageManagerActionName": "listimage", "imageManagerListPath": "/contents/news/image/", "imageManagerListSize": 20, "imageManagerUrlPrefix": "", "imageManagerInsertAlign": "none", "imageManagerAllowFiles": [".png", ".jpg", ".jpeg", ".gif", ".bmp"], "fileManagerActionName": "listfile", "fileManagerListPath": "/contents/news/file/", "fileManagerUrlPrefix": "", "fileManagerListSize": 20, "fileManagerAllowFiles": [ ".png", ".jpg", ".jpeg", ".gif", ".bmp", ".flv", ".swf", ".mkv", ".avi", ".rm", ".rmvb", ".mpeg", ".mpg", ".ogg", ".ogv", ".mov", ".wmv", ".mp4", ".webm", ".mp3", ".wav", ".mid", ".rar", ".zip", ".tar", ".gz", ".7z", ".bz2", ".cab", ".iso", ".doc", ".docx", ".xls", ".xlsx", ".ppt", ".pptx", ".pdf", ".txt", ".md", ".xml" ] }';
$CONFIG = json_encode($tempCont, true);
$action = $_GET['action'];

switch ($action) {
    case 'config':
        $result =  json_decode($CONFIG);
        break;

    /* 上传图片 */
    case 'uploadimage':
    /* 上传涂鸦 */
    case 'uploadscrawl':
    /* 上传视频 */
    case 'uploadvideo':
    /* 上传文件 */
    case 'uploadfile':
        $result = include("action_upload.php");
        break;

    /* 列出图片 */
    case 'listimage':
        $result = include("action_list.php");
        break;
    /* 列出文件 */
    case 'listfile':
        $result = include("action_list.php");
        break;

    /* 抓取远程文件 */
    case 'catchimage':
        $result = include("action_crawler.php");
        break;

    default:
        $result = json_encode(array(
            'state'=> '请求地址出错'
        ));
        break;
}

/* 输出结果 */
if (isset($_GET["callback"])) {
    if (preg_match("/^[\w_]+$/", $_GET["callback"])) {
        echo htmlspecialchars($_GET["callback"]) . '(' . $result . ')';
    } else {
        echo json_encode(array(
            'state'=> 'callback参数不合法'
        ));
    }
} else {
    echo $result;
}