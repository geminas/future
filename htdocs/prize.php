<!DOCTYPE html>


<html>
<head>
    <meta charset="utf-8">
    <meta id="viewport" name="viewport" content="width=device-width">
    <?php
        include "metalinks.php";
    ?>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap_1200.css" rel="stylesheet">
    <!-- custom css-->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="screen">
    <link href="css/donghai.css" rel="stylesheet" type="text/css">


    
</head>

<body style="background-color:#939598; ">
<?php require "headermenu.php" ?>
<?php

$prizeDb=queryDB_row("select * from prize where language = 1");
?>

<div class="container" style="padding:30px">
    <div class="row tabs" font-family: 'Microsoft YaHei',"微软雅黑", 'Avenir Next',Avenir,'Helvetica Neue',Helvetica,'Lantinghei SC','Hiragino Sans GB',STHeiti,'WenQuanYi Micro Hei',SimSun,sans-serif;>
        <div class="col-sm-8 col-sm-offset-2 about-content" style="margin-top: 0px"> <br>
                <h4 class="t-h1">未来科学大奖</h4>
                <div class="ctt-wrap">
                    <div style="font-size: 16px">
                        <?php echo $prizeDb['editorValue'] ?>
                    </div>
                </div>
        </div>
    </div>
</div>



<?php
    require "footer.php";
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
