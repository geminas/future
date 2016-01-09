<!DOCTYPE html>


<html>
<head>
    <meta charset="utf-8">
    <meta id="viewport" name="viewport" content="width=device-width">
    
<?php
include "metalinks.php";
$argin=processRequestArguments();

$newsitem=queryDB_row("select `id`, `code`, `title`, DATE_FORMAT(`publishTime`,'%Y-%c-%e %k:%i') as `publishTime`, `editorValue`, `abstract`, `recommendation`, `author`, `status`, `keywords`, `meta-title`, `meta-keywords`, `meta-description` from news where id='{$argin['newsid']}' and status <> 0");


$newsRecommended=queryDB_array("
    select id,code,title from news
    where recommendation > 0 and status <> 0
    order by recommendation desc, publishTime desc
    limit 10;
");


if (!isset($newsitem['code'])) {
    header('Location: ./news.php');
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
<?php require "headermenu.php" ?>

<div class="container" style="padding:30px">
    <div class="row">
        <div class="col-sm-8">
            <h2 style="font-size:24px">
                <?php echo $newsitem['title'];?>
            </h2>
            <div class="author_publishTime">
                <span class="author"><strong><?php echo $newsitem['author'];?></strong></span>
                <span class="publishTime"><?php echo $newsitem['publishTime'];?></span>


                <div class="shareMod">
                <span class="shareBtn" id="shareBtn"><span class="titShareIcon">分享</span></span><ul><li class="menu-item" id="menu-item" style="display: none;"><div class="menu-wrap"><div class="menu"><div class="menu-bd">
                <a title="分享到微博" href="javascript:void(0)" id="tmblogbt" class="tmblog" bosszone="msWeibo" onclick="share2weibo.showPopup(this)"><b>微博</b></a>
                <a title="分享到空间" href="javascript:void(0)" onclick="share2qzone.showPopup(this)" class="tqzone" bosszone="msQzone"><b>空间</b></a>
                <a title="分享到微信" href="javascript:void(0);" onclick="pageShareWX()" class="tweixin" bosszone="msFriend"><b>微信</b></a>
                <a title="分享到新浪微博" href="javascript:void(0)" class="tsina" id="tsina" bosszone="msSina"><b>新浪微博</b></a>
                <a href="javascript:void(0)" title="分享到邮箱" onclick="share2qmail.showPopup(this)" class="tqmail" bosszone="msQmail"><b>邮箱</b></a>
                <a href="javascript:void(0)" title="分享到QQ好友" onclick="share2qq.showPopup(this)" class="qqpengyou" bosszone="tqq"><b>QQ好友</b></a>
                <a href="javascript:void(0)" title="分享到人人网" class="trenren" id="trenren" bosszone="msRenren"><b>人人网</b></a>
                <a href="javascript:void(0)" title="分享到开心网" class="tkaixin" id="tkaixin" bosszone="msKaixin"><b>开心网</b></a>
                </div></div></div></li></ul>
                </div>

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
                <a target="_blank" href="<?php echo "http://".$_SERVER['HTTP_HOST']."/"; ?>news/<?php echo $thumbitem['id']; ?>.html">
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


<div class="container" style="padding:30px">
    <div class="row">
        <div class="bdsharebuttonbox col-sm-8"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a></div>
        <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
    </div>
</div>

<div class="container" style="padding:30px">
    <div class="row">
    <!-- 多说评论框 start -->
    <div class="ds-thread col-sm-8" data-thread-key="<?php echo $newsitem['id'];?>" data-title="<?php echo $newsitem['title'];?>" data-url="<?php echo "http://".$_SERVER['HTTP_HOST']."/"; ?>news/<?php echo $newsitem['id']; ?>.html"></div>
    <!-- 多说评论框 end -->
    <!-- 多说公共JS代码 start (一个网页只需插入一次) -->
    <script type="text/javascript">
    var duoshuoQuery = {short_name:"futureforum"};
    (function() {
        var ds = document.createElement('script');
        ds.type = 'text/javascript';ds.async = true;
        ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
        ds.charset = 'UTF-8';
        (document.getElementsByTagName('head')[0] 
         || document.getElementsByTagName('body')[0]).appendChild(ds);
    })();
    </script>
    <!-- 多说公共JS代码 end -->
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
