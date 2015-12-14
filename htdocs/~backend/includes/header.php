<?php

//*Initialization, Configuration, and Definition
require_once $_SERVER['DOCUMENT_ROOT']."/../app_config/FutureForumWWW.php";

//Include Modules
require_once 'apis/general.php';

//Input argument processing
$argin=processRequestArguments();
$statement="";

//Now do stuff
//When encounter errors, use stopBecause("", optional ERROR_NUMBER default -1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //print_r2($argin);

    UpdateFFV($argin);
    $statement="已成功更新内容";
}


// Start output buffering:
ob_start();


// Initialize a session:

// Check for a $page_title value:
if (!isset($page_title)) {
	$page_title = '未来论坛官网后台';
} else {
    $page_title = '未来论坛官网后台 | '. $page_title; 
}

?>

<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $page_title; ?></title>
    <!--
acceler, a free CSS web template by ZyPOP (zypopwebtemplates.com/)
Download: http://zypopwebtemplates.com/
License: Creative Commons Attribution
//-->
    <link rel="stylesheet" href="includes/layout.css">
    <link rel="stylesheet" href="includes/dropzone/dropzone.css">
    <link href="includes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="includes/jquery/jquery.min.js"></script>
    <script src="includes/dropzone/dropzone.js"></script>
    <script src="includes/general.js"></script>
    <script src="includes/jquery/jquery.bpopup.min.js"></script>
    <script src="includes/bootstrap/js/bootstrap.min.js"></script>
    
    
    
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>
<body>
    <div id="container">
        <header>
            <div class="width">
                <h1><a href="index.php">未来论坛官网后台</a></h1>
            </div>
            <div class="clear"></div>
        </header>
        <div id="body" class="width">
            <section id="content" class="two-column with-right-sidebar" style="padding:50px;">
<?php
if ($statement!='') {
    echo "<div id='messageBox'  class='alert alert-success' role='alert'>$statement</div>";
}
?>
<!-- End of Header -->