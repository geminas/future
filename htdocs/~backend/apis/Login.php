<?php
if (session_status() === PHP_SESSION_NONE){session_start();}


//20151016, V3 modified-FFW (API)

//*Initialization, Configuration, and Definition
require_once $_SERVER['DOCUMENT_ROOT']."/../app_config/FutureForumWWW.php";

//Include Modules
require_once 'general.php';

//Input argument processing

//Now do stuff
//When encounter errors, use stopBecause("", optional ERROR_NUMBER default -1);


//*JSON encoding and return
//defaults: 'status'=0, 'data'=array(), 'message'='', 'redirection'='';
produceOutputV3(array());
?>