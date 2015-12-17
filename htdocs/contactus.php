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

<div class="container" style="padding:30px">
    <div class="row tabs" font-family: 'Microsoft YaHei',"微软雅黑", 'Avenir Next',Avenir,'Helvetica Neue',Helvetica,'Lantinghei SC','Hiragino Sans GB',STHeiti,'WenQuanYi Micro Hei',SimSun,sans-serif;>
        <div class="col-sm-8 text-center col-sm-offset-2">
           <ul class="nav nav-tabs " style="font-size: 16px">
              <li><a href="/aboutus.php">关于我们</a></li>
              <li class=""><a href="/product.php">产品服务</a></li>
              <li><a href="/joinus.php">加入我们</a></li>
              <li class="active"><a href="#">联系我们</a></li>
            </ul>
        </div>
        <div class="col-sm-8 col-sm-offset-2 about-content" style="margin-top: 0px"> <br>
                <h4 class="t-h1">联系我们</h4>
                <div class="ctt-wrap">
                    <div style="font-size: 16px">
                        <p>地址：北京市朝阳区朝外大街甲6号万通中心D座803, 100020</p>
                        <p>电话：+86 10 58751688</p>
                        <p>Email：<a href="mailto:ff2016@futureforum.com.cn">ff2016@futureforum.com.cn</a></p>
                        <p>微博：@<a href="http://weibo.com/futureforum">未来论坛FutureForum</a></p>
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
