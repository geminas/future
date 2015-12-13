<!DOCTYPE html>


<html>
<head>
    <meta charset="utf-8">
    <meta id="viewport" name="viewport" content="width=device-width">
    
<?php
include "metalinks.php";

$newsRecommended=queryDB_array("
    select code,title from news
    where recommendation > 0 and status <> 0
    order by recommendation desc, publishTime desc
    limit 10;
");
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



                    
<div class="container" style="padding:30px;">
    <div class="row">
        <div class="col-sm-8">
            <div id="newslist"></div>
            <div style="text-align:center;"><button id="readmore" class="btn btn-default">读取中...</button></div>
        </div>
        <div class="col-sm-4">
            <h3 style="font-size:24px">推荐阅读</h3>
            <?php
                foreach($newsRecommended as $thumbitem) {
            ?>
            
            <div class="newsthumb">
                <a target="_blank" href="FFnews-<?php echo $thumbitem['code']; ?>.html">
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



<?php
    require "footer.php";
?>

    <!--scripts and plugins -->
    <!--must need plugin jquery-->
    <script src="js/jquery.min.js"></script>
    <script src="js/donghai.js"></script>
    <!--bootstrap js plugin-->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    
    
</body>
<script>

function createHeadline(item) {
    var headline=$("<div></div>").addClass("headline");
    var clickable=$("<a></a>",{'target':'_blank','href':"FFnews-"+item.code+".html"});
    $("<img>",{
        'src' : '<?php echo $folder;?>theme/'+item.code+'.jpg',
        'style' : "width:100%; padding-bottom:10px",
        'alt':''
    }).appendTo(clickable);
    
    $("<h2></h2>",{style:"font-size:32px"}).html(item.title).appendTo(clickable);
    
    headline.append(clickable);
    return headline;
}

function createNews(item) {
    var newsItem=$("<div></div>").addClass("row newsitem");
    var image=
        $("<div></div>").addClass("col-sm-4").html(
            $("<a></a>",{'target':'_blank','href':"FFnews-"+item.code+".html"}).html(
                $("<img>",{
                    'src' : '<?php echo $folder;?>theme/'+item.code+'.jpg',
                    'style' : "width:100%; padding-bottom:10px",
                    'alt':''
                })
        )).appendTo(newsItem);;
    var text=
        $("<div></div>").addClass("col-sm-8").html(
            $("<a></a>",{'target':'_blank','href':"FFnews-"+item.code+".html"}).html(
                $("<h4></h4>").html(item.title)
        )).appendTo(newsItem);;

                    
    $("<div></div>").addClass("news_abstract").html(item.abstract).appendTo(text);
    $("<div></div>").addClass("publishTime").html(item.publishTime).appendTo(text);
    
    return newsItem;
}

function loadNews() {
    $("#readmore").html("读取中...");
    var newsExist=$(".headline").length+$(".newsitem").length;
    
    $.ajax({
        type: 'POST',
        url: '~backend/apis/NewsItems.php',
        data: {offset:newsExist,limit:20},
        dataType: 'json',
        success: function (JSONresponse) {
        
            var newsCount=JSONresponse.data.newsCount.total;
            var newsRecent=JSONresponse.data.newsRecent;
            
            //NewsItems
            $.each(newsRecent, function (i,e) {
                if ($(".headline").length) {
                    $("#newslist").append(createNews(e));
                } else {
                    $("#newslist").append(createHeadline(e));
                }
                $("#newslist").append("<hr>");
            });
            
            //Button
            newsExist+=newsRecent.length;
            if (newsExist>=newsCount) {
                $("#readmore").html("没有更多文章了").off();
            } else {
                $("#readmore").html("还有"+(newsCount-newsExist)+"篇，点击加载更多");
            }
        }
    });
    return;
}

$(document).ready( function (){
    $("#readmore").click(loadNews);
    loadNews();
});

//$(document).ready(adaptiveContainer);
//$(window).resize(adaptiveContainer);
</script>

</html>
