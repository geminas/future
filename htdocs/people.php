<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta id="viewport" name="viewport" content="width=device-width">
    
    <?php
        include "metalinks.php";
    ?>

        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
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

        <link href="css/donghai.css" rel="stylesheet" type="text/css">
</head>

<body>

        
        
    <!--navigation -->
    <!-- Static navbar -->

    <?php require "headermenu.php";
    $people=queryDB_array("select * from people"); reset($people);
    $miscs=queryDB_array("select * from miscs where groupcode='people' order by sequence asc ");
    $people_category=queryDB_array("select * from people_category order by value asc")
    ?>



        <div class="container">
        <div class="row">
        <div class="GDH-topimage" style="background-image: url('contents/people.jpg');">
                    <h2 style="color:black"><?php echo findmisc('people-bigtitle');?><br><?php echo findmisc('people-bigtitle','en');?></h2>
                    <div class="cyanbar" style="width:90px; height:4px"></div>
                    <div class="divide30"></div>
                    <p style="color:black"><?php echo findmisc('people-text');?></p>
                </div>
                
        </div>
        </div>
        
        <div class="container GDH-normalpadding xsNoLRPadding">
                <div class="portfolio-cube">

                <div id="filters-container" class="cbp-l-filters-button">
                    <?php 
                        foreach($people_category as $category) {
                        echo '<div data-filter="'.$category['code'].'" class="cbp-filter-item">';
                        echo '    '.$category['title_zh-cn'].'<div class="cbp-filter-counter"></div>';
                        echo '</div>';
                        }
                    ?>
                </div>
                

                
                <div id="result-container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="cyanbar hidden-xs" style="width:100%; height:8px"></div>
                        <div class="category-infobox title">
                            <?php echo $people_category[1]['title_zh-cn'];?><br>
                            <?php echo $people_category[1]['title_en'];?>
                        </div>
                        
                        <div class="category-infobox content">
                            <?php echo $people_category[1]['note_zh-cn'];?>
                        </div>
                        
                    </div>
                    <div class="col-sm-7 col-sm-offset-1">
                        <div id="grid-container" class="cbp">
                            <?php
                            reset($people);
                            while (list($number, $person) = each($people)) {
                                $person['group']='';
                                foreach($people_category as $category) {
                                    if($person['category'] & $category['value'])
                                        $person['group'].=$category['code'];
                                }
                            
                            
                            $person['group']=str_replace(array("."),"",$person['group']);
                                
                            ?>
                            <div class="cbp-item <?php echo $person['group']; ?>">
                                <div class="cbp-caption">
                                    <div class="cbp-caption-defaultWrap">
                                        <div class="row" style="margin:0">
                                            <div class="col-xs-6 col-sm-12" style="padding:0">
                                                <img src="contents/vip_thumbs/<?php echo $person['code']; ?>.jpg" alt="">
                                            </div>
                                            <div class="col-xs-6 hidden-sm hidden-md hidden-lg cbp-caption-infobox" style="padding-left: 5%">
                                                <div class="cbp-caption-title"><?php echo $person['name_zh-cn']; ?></div>
                                                <div class="cbp-caption-subtitle"><?php echo $person['name_en']; ?></div>
                                                <div class="cbp-caption-desc">
                                                    <?php echo $person['desc1_zh-cn']; ?><br>
                                                    <?php echo $person['desc2_zh-cn']; ?><br>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="cbp-caption-activeWrap hidden-xs">
                                        <div class="cbp-caption-infobox">
                                            <div class="cbp-caption-title"><?php echo $person['name_zh-cn']; ?></div>
                                            <div class="cbp-caption-subtitle"><?php echo $person['name_en']; ?></div>
                                            <div class="cbp-caption-desc">
                                                <?php echo $person['desc1_zh-cn']; ?><br>
                                                <?php echo $person['desc2_zh-cn']; ?><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <?php } ?>
                        
                        </div>
                    </div>
                </div>
                </div>
                </div>

        </div>
            
        <?php require "footer.php" ?>
            
            
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
        <script src="rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>
        <script src="js/revolution-custom.js" type="text/javascript"></script>
        <!--cube portfolio plugin-->
        <script src="cubeportfolio/js/jquery.cubeportfolio.min.js" type="text/javascript"></script>
        <script src="js/cube-portfolio.js" type="text/javascript"></script>
        <script src="bxslider/jquery.bxslider.min.js"></script>
        <script src="js/donghai.js"></script>
        <script>
        $(document).ready( function () {$("div[data-filter='.founder']").addClass("cbp-filter-item-active");});
        
        cubeready=false;
        windowSize=-1;
        
        jQuery(".cbp-filter-item").on('click', function() {
            if ($(this).hasClass("cbp-filter-item-active")) return 0;
            if (cubeready===false) return 0;
             
            cubeready=false;
            
            var title;
            var content;
            
            switch ($(this).attr("data-filter")) {
            <?php
            foreach($people_category as $category) {
            echo '    case "'. str_replace(array("\n","\r"),"",$category['code']).'":'."\n";
            echo '        title="'.
                str_replace(array("\n","\r"),"",$category['title_zh-cn']) . '<br>' .
                str_replace(array("\n","\r"),"",$category['title_en']) . '";'."\n";
            echo '        content= "'. str_replace(array("\n","\r"),"",$category['note_zh-cn']) .'";'."\n";
            echo '        break;'."\n";
            }
            ?>                   
            }
            
            $(".category-infobox").removeClass("fadeIn animated");

            setTimeout(function () {
                $(".category-infobox.title").html(title);
                $(".category-infobox.content").html(content);
                $(".category-infobox").addClass("fadeIn animated");
            }, 100);
            
            return 0;
        });

        $(document).ready(function() {
            $(".cbp-filter-item-active").trigger("click");
            resizer();
            return 0;
        });

        $(window).resize(resizer);
        
        function resizer()
        {
            
            var currentWindowSize;
            currentWindowSize=($(".container").width()>=720);
            if (windowSize===currentWindowSize) return 0;
            if (windowSize!==-1) jQuery("#grid-container").cubeportfolio('destroy');
            windowSize=currentWindowSize;     
            
            
            setTimeout(function () {
                if (windowSize) {
                    initcube([{
                            width: 1100,
                            cols: 4
                        }, {
                            width: 800,
                            cols: 4
                        }, {
                            width: 500,
                            cols: 3
                        }, {
                            width: 321,
                            cols: 2
                        }, {
                            width: 320,
                            cols: 1
                        }]);
                } else {
                    initcube([{
                            width: 320,
                            cols: 1
                        }]);
                }
                }, 500);
                
            return 0;
        }
        
        function initcube(mediaQueriesValues) {
            $('#grid-container').cubeportfolio({
                filters: '#filters-container',
                layoutMode: 'grid',
                defaultFilter: '.founder',
                animationType: 'quicksand',
                gapHorizontal: 15,
                gapVertical: 15,
                gridAdjustment: 'responsive',
                mediaQueries: mediaQueriesValues,
                caption: 'fadeIn',
                displayType: 'sequentially',
                displayTypeSpeed: 80,

                // lightbox
                lightboxDelegate: '.cbp-lightbox',
                lightboxGallery: true,
                lightboxTitleSrc: 'data-title',
                lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',

                // singlePage popup
                singlePageDelegate: '.cbp-singlePage',
                singlePageDeeplinking: true,
                singlePageStickyNavigation: true,
                singlePageCounter: '<div class="cbp-popup-singlePage-counter">{{current}} of {{total}}</div>',
                singlePageCallback: function(url, element) {
                    // to update singlePage content use the following method: this.updateSinglePage(yourContent)
                    var t = this;

                    $.ajax({
                            url: url,
                            type: 'GET',
                            dataType: 'html',
                            timeout: 10000
                        })
                        .done(function(result) {
                            t.updateSinglePage(result);
                        })
                        .fail(function() {
                            t.updateSinglePage('AJAX Error! Please refresh the page!');
                        });
                },
            });
    
        }
        
        jQuery("#grid-container").on('initComplete.cbp', function() {
            cubeready=true;
        });
        
        jQuery("#grid-container").on('filterComplete.cbp', function() {
            cubeready=true;
        });     

            
            
        </script>
        
    </body>
</html>
