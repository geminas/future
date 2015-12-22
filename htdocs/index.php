<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta id="viewport" name="viewport" content="width=device-width">
    
    <?php
        include "metalinks.php";
    ?>
    
     <meta name="baidu-site-verification" content="PBM2DzZIRr" />

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- custom css-->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="screen">

    <!-- font awesome for icons -->
    <link href="font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- flex slider css -->
    <link href="css/flexslider.css" rel="stylesheet" type="text/css" media="screen">
    <!-- animated css  -->
    <link href="css/animate.css" rel="stylesheet" type="text/css" media="screen">
    <!--Revolution slider css-->
    <link href="rs-plugin/css/settings.css" rel="stylesheet" type="text/css" media="screen">
    <link href="css/rev-style.css" rel="stylesheet" type="text/css" media="screen">
    <!--google fonts
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        -->
    <!--owl carousel css-->
    <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="screen">
    <link href="css/owl.theme.css" rel="stylesheet" type="text/css" media="screen">
    <!--mega menu -->
    <link href="css/yamm.css" rel="stylesheet" type="text/css">
    <!--cube css-->
    <link href="cubeportfolio/css/cubeportfolio.min.css" rel="stylesheet" type="text/css">
    <!-- bxSlider CSS file -->
    <link href="bxslider/jquery.bxslider.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    <link rel="stylesheet" type="text/css" href="fullPage.js-master/jquery.fullPage.css" />
    <link href="css/donghai.css" rel="stylesheet" type="text/css">

</head>

<body>
<?php

$slides=queryDB_array("select * from homepage_slides order by sequence asc");
$miscs=queryDB_array("select * from miscs where groupcode='homepage' order by sequence asc ");
?>
        
    <!--navigation -->
    <!-- Static navbar -->

    <div id="fullpage">
    <?php require "headermenu.php" ?>
        <!--rev slider start-->

        
        <div class="section">
        <div class="container hpsection" style="background-color: #F2F2F2">
            <div class="row">
                <div class="tp-banner-container" style="margin-top:0; margin-bottom:0">
                    <div class="tp-banner-boxed">
                        <ul>
                            <?php
                            foreach ($slides as $slide) {
                            ?>
                            <li data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="<?php echo $slide['bigtitle_zh-cn'];?>">
                                <!-- MAIN IMAGE -->
                                <img src="contents/revslider-<?php echo $slide['id'];?>.jpg" alt="darkblurbg" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                                <div class="caption HPTitle revslidercaption sft" data-x="50" data-y="60" data-speed="1000" data-start="1000" data-easing="easeOutExpo">
                                    <a href="<?php echo $slide['href'];?>" style="color:white" target="_blank"><?php echo $slide['bigtitle_zh-cn'];?></a>
                                </div>

                                <div class="caption HPTitle revslidercaption sft" data-x="50" data-y="145" data-speed="1000" data-start="1000" data-easing="easeOutExpo">
                                    <a href="<?php echo $slide['href'];?>" style="color:white" target="_blank"><?php echo $slide['bigtitle_en'];?></a>
                                </div>



                                <!-- <div class="caption cyanbar sft" data-x="50" data-y="345" data-speed="1000" data-start="1000" data-easing="easeOutExpo">
                                </div> -->


                                <div class="caption HPSubtitle revslidercaption sfl" data-x="50" data-y="470" data-speed="1000" data-start="1800" data-easing="easeOutExpo">
                                    <a href="<?php echo $slide['href'];?>" style="color:white" target="_blank"><?php echo $slide['text_zh-cn'];?></a>
                                </div>

                                <div class="caption HPText revslidercaption sfl" data-x="50" data-y="565" data-speed="1000" data-start="1800" data-easing="easeOutExpo">
                                    <a href="<?php echo $slide['href'];?>" style="color:white" target="_blank"><?php echo $slide['subtext_zh-cn'];?></a>
                                </div>
                            </li>
                            <?php } ?>
                            
                        </ul>
                    </div>
                </div>
                <!--full width banner-->
                <!--revolution end-->
            </div>
        </div>
        </div>


        <!-- Future People-->
        <div class="section" id="people">
        <div class="container hpsection GDH-normalpadding">
            <div class="row">
                <div class="col-sm-6">
                    <h2 class="HPSectionTitle"><?php echo findmisc('homepage-people-title');?><br><?php echo findmisc('homepage-people-title','en');?></h2>
                    <div class="cyanbar" style="width:90px; height:4px"></div>
                    <div style="width: 100%; padding-bottom: 5.1%"></div>
                    <p class="HPText"><?php echo findmisc('homepage-people-note');?></p>
                    <div class="gdhbutton buttonblack">
                        <a href="people.php"><?php echo findmisc('homepage-people-button');?></a>
                    </div>
                </div>
                <div class="col-sm-5 peopleright col-sm-offset-1">
                    <div class="hidden-sm hidden-md hidden-lg" style="width:100%; height:2px; margin: 5% 0; background-color:#aaaaaa"></div>
                    <div class="peopleinfobox" id="vip1">
                        <div class="vip-quote HPNotes">
                            
                        </div>
                        <div class="vip-image">
                            <img src="contents/vip_thumbs/blank.jpg" >
                        </div>
                        <div class="vip-detail">
                            <p class="HPNotes vip-name"></p>
                            <p class="HP12 vip-desc"></p>
                        </div>
                    </div>
                    <div id="vipbar" style="width:100%; height:2px; margin: 5% 0; background-color:#aaaaaa"></div>
                    <div class="peopleinfobox" id="vip2">
                        <div class="vip-quote HPNotes">
                            
                        </div>
                        <div class="vip-image">
                            <img src="contents/vip_thumbs/blank.jpg" >
                        </div>
                        <div class="vip-detail">
                            <p class="HPNotes vip-name"></p>
                            <p class="HP12 vip-desc"></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
        <!-- Future People Ends -->

<!-- Future Action-->
        <div class="section" id="action">
        <div class="container hpsection GDH-normalpadding">
            <div class="row">

                <div class="col-sm-6">
                    <h2 class="HPSectionTitle"><?php echo findmisc('homepage-action-title');?><br><?php echo findmisc('homepage-action-title','en');?></h2>
                    <div class="cyanbar" style="width:90px; height:4px"></div>
                    <div style="width: 100%; padding-bottom: 5.1%"></div>
                    <p class="HPText" style="width: 80%; text-align:justify"><?php echo findmisc('homepage-action-note');?>

                </div>

                <div class="col-sm-6">
                    <ul class="bxslider" id="actionslider" style="padding:0; -webkit-animation-delay: 0.5s; position:relative">
                        <?php $actions=queryDB_array("select * from actions"); reset($actions); while (list($number, $action)=each($actions)) { ?>
                        <li>
                            <div class="work-wrap">
                                <div>
                                    <img src="contents/action/<?php echo $action['code']; ?>.jpg" />
                                </div>
                                <div class="img-overlay">
                                    <div class="inner-overlay">
                                        <h2><?php echo $action['name_zh-cn']; ?><br><?php echo $action['name_en']; ?></h2>
                                        <p class="HPText">
                                            <?php echo $action[ 'subtitle_zh-cn']; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        </div>
        <!-- Future Action Ends -->
<!-- Future Footprints -->
        <div class="section" id="footprint">
        <div class="container hpsection GDH-normalpadding">
            <div>
                <div class="row">
                    <div class="col-sm-6">
                        <h2 class="HPSectionTitle"><?php echo findmisc('homepage-footprint-title');?><br><?php echo findmisc('homepage-footprint-title','en');?></h2>
                    </div>

                    <div class="col-sm-4 col-sm-offset-2">
                        <p class="HPText"><?php echo findmisc('homepage-footprint-note');?></p>
                    </div>
                </div>
                <div style="width: 100%; padding-bottom: 3%"></div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="gdhbutton buttonblack" style="margin:0;">
                            <a href="footprints.php"><?php echo findmisc('homepage-footprint-button');?></a>
                        </div>
                    </div>
                </div>

                <div style="width: 100%; padding-bottom: 4%"></div>

                <div class="row" style="margin:0">
                    <!--owl carousel start-->
                    <div id="featured-work" style="">
                        <?php $events=queryDB_array("select * from events"); reset($events); while (list($number, $event)=each($events)) { ?>
                        <div class="item">
                            <div class="work-wrap">
                                <div>
                                    <img src="contents/eventthumb_b/<?php echo $event['code']; ?>.jpg" class="img-responsive" style="padding:1px">
                                </div>
                                <div class="img-overlay">
                                    <div class="inner-overlay" style="padding: 8.3%;">
                                        
                                        <div style="height:2px; background-color:#57D9EA; width:100%; margin-bottom: 8%"></div>
                                        
                                        <div class="HPSubtitle" style="color:white">
                                        <?php echo $event['name_zh-cn']; ?></div>
                                        <div class="HPNotes" style="color:white">
                                        <?php echo $event['date_string']; ?>
                                        </div>
                                        
                                        <div class="gdhbutton buttonwhite">
                                            <a href="FFevent-<?php echo $event['code']; ?>.html">MORE</a>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!--img-overlay-->
                            </div>
                            <!--work-image-wrap end-->
                        </div>
                        <!--owl item end-->
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!--featured-work-end-->
        
    <?php require "footer.php" ?>
        <!--default footer end here-->

    </div>
    <!--FULL PAGE ENDs-->


    <!--scripts and plugins -->
    <!--must need plugin jquery-->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate.min.js"></script>
    <!--bootstrap js plugin-->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!--easing plugin for smooth scroll-->
    <script src="js/jquery.easing.1.3.min.js" type="text/javascript"></script>
    <!--sticky header-->
    <script type="text/javascript" src="js/jquery.sticky.js"></script>
    <!--flex slider plugin-->
    <script src="js/jquery.flexslider-min.js" type="text/javascript"></script>
    <!--parallax background plugin-->
    <script src="js/jquery.stellar.min.js" type="text/javascript"></script>
    <!--digit countdown plugin-->
    <script src="js/waypoints.min.js"></script>
    <!--digit countdown plugin-->
    <script src="js/jquery.counterup.min.js" type="text/javascript"></script>
    <!--on scroll animation-->
    <script src="js/wow.min.js" type="text/javascript"></script>
    <!--owl carousel slider-->
    <script src="js/owl.carousel.min.js" type="text/javascript"></script>
    <!--popup js-->
    <script src="js/jquery.magnific-popup.min.js" type="text/javascript"></script>
    <!--you tube player-->
    <script src="js/jquery.mb.YTPlayer.min.js" type="text/javascript"></script>
    <!--customizable plugin edit according to your needs-->
    <script src="js/custom.js" type="text/javascript"></script>

    <!--revolution slider plugins-->
    <script src="rs-plugin/js/jquery.themepunch.tools.min.js" type="text/javascript"></script>
    <script src="rs-plugin/js/jquery.themepunch.revolution.js" type="text/javascript"></script>
    <script src="js/revolution-custom.js" type="text/javascript"></script>
    <!--cube portfolio plugin-->
    <script src="cubeportfolio/js/jquery.cubeportfolio.min.js" type="text/javascript"></script>
    <script src="js/cube-portfolio.js" type="text/javascript"></script>
    <script src="bxslider/jquery.bxslider.min.js"></script>
    <script src="js/donghai.js"></script>

</body>
    
    <script>
        //bx slider
        
        $(document).ready(function () {
            bxslider=$('.bxslider').bxSlider({
                mode: 'vertical',
                slideMargin: 2,
                minSlides: 2,
                pager: false
                });
            setInterval(bxslider.goToNextSlide, 8000);
        });

        $(document).ready(function() {
            setInterval(updatevip, 8000);
            w=$(window).width();
            h=$(window).height();
            $("#vip1 *").fadeOut(100);
            $("#vip2 *").fadeOut(100);
            //sleep(100);
            
            if (false) { //Desktop w>768
                if ((w/h)>1.6) { //Desktop and wide
                    changezoom(h/800);
                    $("#headl").addClass("navbar-fixed-top");
                    initFullPage();
                    $("#fp-nav").hide();
                    $("#fp-nav").show("slow");
                    $(".peopleright").removeClass("col-sm-offset-1");
                } else { //Desktop and narrow
                    //changezoom(w/1280);
                }
            }
                
            
                      
            
            updatevip();

            
        });
        
        function changezoom(ratio) {
            $("body").css("zoom",ratio);
        }
        
        function initFullPage() {
            $('#fullpage').fullpage({
                navigation: true,
                navigationPosition: 'right',
                navigationTooltips: [
                    '首页<br>home',
                    '未来·人物<br>Future·People',
                    '未来·行动<br>Future·Action',
                    '未来·足迹<br>Future·Footprints',
                    '联系我们<br>Contact Us',
                    ],
                showActiveTooltip: true,

                //controlArrows: true,

                resize: false,
                verticalCentered: false,
                paddingTop: '100px',
                fixedElements: '#headl',
                responsiveWidth: 0,
                responsiveHeight: 0,
                afterRender: function () {}, 
                afterLoad: function (anchorLink, index) {
    
                },
                
                onLeave: function (index, nextIndex, direction) {
                
                    switch(index) {
                        case 2:
                            $("#vip1").removeClass("fadeIn animated");
                            $("#vip2").removeClass("fadeIn animated");
                            break;
                        case 3:
                            $("#actionslider").removeClass("fadeIn animated");
                            $(".bx-controls-direction").hide("slow");
                            break;
                        case 4:
                            $("#featured-work").removeClass("rollIn animated");
                            $("#featured-work").addClass("rollOut animated");
                            break;
                        case 5:
                            $("#fp-nav").show("slow");
                            break;
                    };
                    
                    switch(nextIndex) {
                        case 2:
                            $("#vip1").addClass("fadeIn animated");
                            $("#vip2").addClass("fadeIn animated");
                            break;
                        case 3:
                            $("#actionslider").addClass("fadeIn animated");
                            $(".bx-controls-direction").show("slow");
                            break;
                        case 4:
                            $("#featured-work").removeClass("rollOut animated");
                            $("#featured-work").addClass("rollIn animated");
                            break;
                        case 5:
                            $("#fp-nav").hide("slow");
                            break;
                    };
                }
            });
        }
        
        function updatevip()
        {
    
            $.ajax({
                type: 'POST',
                url: 'person.php',
                dataType: 'json',
                success: function (JSONresponse) {
                    $("#vip1 *").fadeOut(1000);
                    $("#vipbar").delay(50).fadeOut(1000);
                    $("#vip2 *").delay(100).fadeOut(1000);
                    
                    setTimeout(function () {
                    $("#vip1 .vip-quote").html(JSONresponse[0].quote);
                    $("#vip1 .vip-name").html(JSONresponse[0].chinesename + " " + JSONresponse[0].englishname);
                    $("#vip1 .vip-desc").html(JSONresponse[0].desc);
                    $("#vip1 img").attr("src","contents/vip_thumbs/"+JSONresponse[0].latinized+".jpg");

                    $("#vip2 .vip-quote").html(JSONresponse[1].quote);
                    $("#vip2 .vip-name").html(JSONresponse[1].chinesename + " " + JSONresponse[1].englishname);
                    $("#vip2 .vip-desc").html(JSONresponse[1].desc);
                    $("#vip2 img").attr("src","contents/vip_thumbs/"+JSONresponse[1].latinized+".jpg");
                    $("#vip1 *").fadeIn(1000);
                    $("#vipbar").delay(50).fadeIn(1000);
                    $("#vip2 *").delay(100).fadeIn(1000);
                    }, 1100);
                }
            });
            
            
        }
        

    </script>
</html>
