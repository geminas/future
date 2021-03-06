<!DOCTYPE html>


<html>
<head>
    <meta charset="utf-8">
    <meta id="viewport" name="viewport" content="width=device-width">
    
<?php
include "metalinks_en.php";
$argin=processRequestArguments();

$newsitem=queryDB_row("select `id`, `code`, `title`, DATE_FORMAT(`publishTime`,'%Y-%m-%d %H:%i:%s') as `publishTime`, `editorValue`, `abstract`, `recommendation`, `author`, `status`, `keywords`, `meta-title`, `meta-keywords`, `meta-description` from news where id='{$argin['newsid']}' and status <> 0");


$newsRecommended=queryDB_array("
    select id,code,title from news
    where recommendation > 0 and status <> 0
    order by recommendation desc, publishTime desc
    limit 10;
");


if (!isset($newsitem['code'])) {
    header('Location: ./news_en.php');
}

$folder="contents/news/";

?>
    
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap_1200.css" rel="stylesheet">
    <!-- custom css-->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="screen">
    <link href="css/donghai.css" rel="stylesheet" type="text/css">


    
</head>

<body style="background-color:#939598; ">
<?php require "headermenu_en.php" ?>

<div class="container" style="padding:30px">
    <div class="row">
        <div class="col-sm-8">
            <h2 style="font-size:24px">
                <?php echo $newsitem['title'];?>
            </h2>
            <div class="author_publishTime" font-family: 'Microsoft YaHei',"微软雅黑", 'Avenir Next',Avenir,'Helvetica Neue',Helvetica,'Lantinghei SC','Hiragino Sans GB',STHeiti,'WenQuanYi Micro Hei',SimSun,sans-serif;>
                <span class="author"><?php echo $newsitem['author'];?>   </span>
                <span class="publishTime"><?php echo $newsitem['publishTime'];?></span>
            </div>
            <div class="abstract">
                <?php echo $newsitem['abstract'];?>
            </div>
            <div class="newstext">
                <?php echo $newsitem['editorValue'];?>
            </div>
            <div class="keywords">
                <strong>标签</strong>
                <?php
                $ready=str_replace('，', ',', $newsitem['keywords']);
                $keywords=explode(",", $ready);
                foreach ($keywords as $keyword) 
                    echo '<span class="label label-primary">'. trim($keyword) .'</span> ';
                    
                ?>
            </div>
        </div>
        <div class="col-sm-4">
            <h3 style="font-size:24px">推荐阅读</h3>
            <?php
                foreach($newsRecommended as $thumbitem) {
            ?>
            
            <div class="newsthumb">
                <a target="_blank" href="<?php echo "http://".$_SERVER['HTTP_HOST']."/"; ?>newsitem_en/<?php echo $thumbitem['id']; ?>.html">
                <h4 class="recommend_title">
                <?php
                    echo $thumbitem['title'];
                ?>
                </h4>
                <img src="<?php printf("%stheme/%s.jpg",$folder,$thumbitem['code']) ?>" alt="" style="width:100%">
                </a>
                <hr>
            </div>
            
            <?php
                }
            ?>
        </div>
    </div>
</div>


<!-- UY BEGIN -->

<div class="container" style="padding:30px">
    <div class="row">
        <div id="uyan_frame" class="col-sm-8"></div>
        <script type="text/javascript" src="http://v2.uyan.cc/code/uyan.js?uid=2078754"></script>
    </div>
</div>
<!-- UY END -->

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
