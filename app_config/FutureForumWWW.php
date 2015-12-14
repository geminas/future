<?php 

// Adjust the time zone for PHP 5.1 and greater:
date_default_timezone_set ('PRC');

// Database credentials
if(!defined('DB_USER'))
{
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', 'xinmeng@123456');
DEFINE ('DB_HOST', '127.0.0.1:3306');
DEFINE ('DB_NAME', 'futureforum');
}

DEFINE ("CONTENT_FOLDER", 'F:\\xampp183\\htdocs\\future\\htdocs\\contents\\');
?>

