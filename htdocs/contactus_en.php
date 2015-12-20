<!DOCTYPE html>


<html>
<head>
    <meta charset="utf-8">
    <meta id="viewport" name="viewport" content="width=device-width">
    <?php
        include "metalinks_en.php";
    ?>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap_1200.css" rel="stylesheet">
    <!-- custom css-->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="screen">
    <link href="css/donghai.css" rel="stylesheet" type="text/css">


    
</head>

<body style="background-color:#939598; ">
<?php require "headermenu_en.php" ?>
<?php

$aboutDb=queryDB_row("select * from aboutus where id=4");
?>

<div class="container" style="padding:30px">
    <div class="row tabs" font-family: 'Microsoft YaHei',"微软雅黑", 'Avenir Next',Avenir,'Helvetica Neue',Helvetica,'Lantinghei SC','Hiragino Sans GB',STHeiti,'WenQuanYi Micro Hei',SimSun,sans-serif;>
        <div class="col-sm-8 text-center col-sm-offset-2">
           <ul class="nav nav-tabs " style="font-size: 16px">
              <li><a href="/aboutus_en.php">关于我们</a></li>
              <li class=""><a href="/product_en.php">产品服务</a></li>
              <li><a href="/joinus_en.php">加入我们</a></li>
              <li class="active"><a href="#">联系我们</a></li>
            </ul>
        </div>
        <div class="col-sm-8 col-sm-offset-2 about-content" style="margin-top: 0px"> <br>
                <h4 class="t-h1"><?php echo $aboutDb['title'] ?></h4>
                <div class="ctt-wrap">
                    <div style="font-size: 16px">
                        <?php echo $aboutDb['content'] ?>
                    </div>
                </div>
        </div>
    </div>
</div>



<?php
    require "footer_en.php";
?>

    <!--scripts and plugins -->
    <!--must need plugin jquery-->
    <script src="js/jquery.min.js"></script>
    <script src="js/donghai.js"></script>
    <!--bootstrap js plugin-->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    
    <script>
        //$(document).ready(adaptiveContainer);
        //$(window).resize(adaptiveContainer);
        

    </script>
    
</body>

</html>
