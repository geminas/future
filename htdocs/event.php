<!DOCTYPE html>


<html>
<head>
    <meta charset="utf-8">
    <meta id="viewport" name="viewport" content="width=device-width">
    
        <?php
        include "metalinks.php";


$argin=processRequestArguments();
$eventid=$argin['eventid'];


$event=queryDB_row("select * from events where code='$eventid'");    
if (!isset($event['code']))
    header('Location: ./footprints.php');

    $imgcounter=1;
    $root="../";
    $folder="contents/event/";
?>
    
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- custom css-->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="screen">
        <link href="css/donghai.css" rel="stylesheet" type="text/css">
    <style>
        
        #featured-images img, #featured-video-container img, iframe {
            width: 100%;
            padding-bottom:20px;
        }
        
        #event-video {
            margin-bottom: 60px;
        }
        

        #event-BigNumber {
            line-height: 120px;
            font-size: 150px;
            font-weight: bold;
            font-family: 'Akkurat Pro','Source Han Sans CN', 'SourceHanSansCN-Bold', sans-serif;
            color: #57D9EA;
        }
        
        #event-NumberDate {
            float:right;
            font-size: 18px;
            font-weight: bold;
            font-family: 'Akkurat Pro','Source Han Sans CN', 'SourceHanSansCN-Bold', sans-serif;
            color: #57D9EA;
            line-height: 28px;
        }
        
        #event-ChineseTitle {
            font-size: 28px;
            font-weight: bold;
            font-family: 'Akkurat Pro','Source Han Sans CN', 'SourceHanSansCN-Bold', sans-serif;
            color: #282828;
            line-height: 40px;
        }

        #event-EnglishTitle {
            padding-top:20px;
            text-transform: uppercase;
            font-size: 28px;
            line-height: 36px;
            font-family: 'Akkurat Pro','Source Han Sans CN', 'SourceHanSansCN-Bold', sans-serif;
            color: #282828;
        }

        #event-infobox {

            font-size: 15px;
            line-height: 24px;
            font-family: 'Akkurat Pro','Source Han Sans CN', 'SourceHanSansCN-Bold', sans-serif;
            color: #282828;
        }

        #event-description {

            font-size: 12px;
            line-height: 24px;
            font-family: 'Akkurat Pro','Source Han Sans CN', 'SourceHanSansCN-Bold', sans-serif;
            color: #8a8a8d;
            text-align: justify;
        }        
    </style>
</head>

<body style="background-color:#939598; ">
<?php require "headermenu.php" ?>

<div class="container GDH-normalpadding" style="padding-top: 100px">
    <div class="row">
        
    
        <div class="col-md-7 col-md-push-5 eventmedia">
            <div id="featured-video-container">
<?php if ($event['youkuID']!='') { ?>
    <iframe src="<?php echo "http://player.youku.com/embed/".$event['youkuID']; ?>" id="featured-video" allowFullScreen="true" quality="high" width="660" height="371"></iframe>
<?php } else { ?>
    <img src="<?php printf("%s%s-%02d.jpg",$folder,$eventid,$imgcounter++) ?>" style="width:100%; height:auto;" alt="">
<?php } ?>

            </div>

            <div id="RightColumn">
                <div class="row" id="featured-images">
                    <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
                        <img src="<?php printf("%s%s-%02d.jpg",$folder,$eventid,$imgcounter++) ?>" alt="">
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
                        <img src="<?php printf("%s%s-%02d.jpg",$folder,$eventid,$imgcounter++) ?>" alt="">
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
                        <img src="<?php printf("%s%s-%02d.jpg",$folder,$eventid,$imgcounter++) ?>" alt="">
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
                        <img src="<?php printf("%s%s-%02d.jpg",$folder,$eventid,$imgcounter++) ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-5 col-md-pull-7">
            <div class="divide30 hidden-md hidden-lg"></div>
            <?php if ($event['number_zh-cn']!='') { ?>
            <div id="event-NumberDate"><?php echo $event['number_zh-cn']; ?><br><?php echo $event['date_string']; ?></div>
            <?php } ?>

            <div id="event-BigNumber"><?php echo $event['number']; ?></div>
            <div class="divide100p"></div>
            <div id="event-ChineseTitle"><?php echo $event['title_zh-cn']; ?></div>
            <div id="event-EnglishTitle"><?php echo $event['title_en']; ?></div>

            <div class="divide60p"></div>
            <div id="event-infobox">
                <?php if ($event['speaker_name']!='') { ?>
                    <strong>主讲</strong>/<?php echo $event['speaker_name']; ?><br>
                <?php } ?>
                
                <?php if ($event['date_string']!='') { ?>
                    <strong>时间</strong>/<?php echo $event['date_string']; ?><br>
                <?php } ?>
                
                <?php if ($event['address']!='') { ?>
                    <strong>地点</strong>/<?php echo $event['address']; ?><br>
                <?php } ?>
            </div>

            <div class="divide60p"></div>
            <div id="event-description">
            <?php echo $event['text_zh-cn']; ?>
            </div>
            
            <div class="divide30 hidden-md hidden-lg"></div>
            <div id="LeftColumn"></div>
        </div>
        
    </div>
    
</div>



<?php
$r=queryDB_row("select events_category.code as catCode from events inner join events_category on events_category.value=events.category where events.code='$eventid'");
if ($r['catCode']=='.lecture')
    require "footer_lectures.php";    
else
    require "footer.php";
?>

    <!--scripts and plugins -->
    <!--must need plugin jquery-->
    <script src="js/jquery.min.js"></script>
    <script src="js/donghai.js"></script>
    <!--bootstrap js plugin-->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    
    <script>
        $(window).resize(resizeHandler);
        
        $(document).ready(resizeHandler);
        
        function resizeHandler () {
            var w=$(window).width();
            if (w>991) {
                $("#featured-images").detach().appendTo("#RightColumn");
            } else {
                $("#featured-images").detach().appendTo("#LeftColumn");
            }
            
            $("#featured-video").attr("height", $("#featured-video-container").width()*9/16);
            $("#featured-video").attr("width", $("#featured-video-container").width());
            
        }
    </script>
    
</body>

</html>
