<?php
$links=queryDB_array("select * from links");
?>

<div class="section">
    <div class="hpsection container GDH-normalpadding">
        <div class="row">
            <div class="col-md-3" style="margin-bottom:40px">
                <a href="http://www.futureforum.org.cn/" target="_blank"><img src="contents/logo-grey.png" style="width: 170px;"></a>
            </div>
            <!--footer col-->
            <div class="col-md-9">
                <div class="row">
                    <div class="col-xs-12 col-sm-3">
                        <div class="row">
                            <div class="col-xs-6 col-sm-12" style="margin-bottom:15px" font-family: 'Microsoft YaHei',"微软雅黑", 'Avenir Next',Avenir,'Helvetica Neue',Helvetica,'Lantinghei SC','Hiragino Sans GB',STHeiti,'WenQuanYi Micro Hei',SimSun,sans-serif;>
                                <div style="background-color:black; width:100%; height:6px"></div>

                                <h3 class="FooterHeader" style="padding-bottom:5px">关于未来论坛<br>About FutureForum</h3>
                                        <a href="/aboutus.php" style="text-decoration:underline; color:blue; margin-left: 28px;">关于我们</a><br>
                                        <a href="/product.php" style="text-decoration:underline; color:blue; margin-left: 28px;">产品服务</a><br>
                                        <a href="/joinus.php" style="text-decoration:underline; color:blue; margin-left: 28px;">加入我们</a><br>
                                        <a href="/contactus.php" style="text-decoration:underline; color:blue; margin-left: 28px;">联系我们</a>
                            </div>
                            <div class="col-xs-6 col-sm-12" style="margin-bottom:40px">
                                <div style="background-color:black; width:100%; height:6px"></div>
                                <h3 class="FooterHeader">官方微信订阅号<br>WeChat Subscription</h3>
                                <div style="text-align: right">
                                    <img style="width:100%" src="contents/wechat.png">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div style="margin-bottom:40px">
                            <div>
                                <div style="background-color:black; width:100%; height:6px"></div>
                                <h3 class="FooterHeader">战略合作媒体<br>Media Coalition</h3>
                                <?php
                                foreach ($links as $link) {
                                ?>
                                    <a href="<?php echo $link['href'];?>" target="_blank"><img style="width:100%; padding-bottom:5px" src="<?php echo "contents/" . $link['src'];?>"></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div style="margin-bottom:40px">
                            <div style="background-color:black; width:100%; height:6px"></div>
                            <h3 class="FooterHeader">战略支持<br>Sponsor</h3>
                            <a href="http://www.infiniti.com.cn" target="_blank"><img style="width:100%; padding-bottom:5px" src="contents/sponsors/infiniti.png"></a>
                        </div>
                        <div style="margin-bottom:40px">
                            <div style="background-color:black; width:100%; height:6px"></div>
                            <h3 class="FooterHeader">执行机构<br>Executive Agency</h3>
                            <a href="http://www.alliance.com.cn/" target="_blank"><img style="width:100%; padding-bottom:5px" src="contents/sponsors/xinmeng.png"></a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div style="margin-bottom:40px">
                            <div>
                                <div style="background-color:black; width:100%; height:6px"></div>
                                <h3 class="FooterHeader">合作伙伴<br>Partnership</h3>
                                <?php
                                foreach ($links as $link) {
                                ?>
                                    <a href="<?php echo $link['href'];?>" target="_blank"><img style="width:100%; padding-bottom:5px" src="<?php echo "contents/" . $link['src'];?>"></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer col-->
        </div>
    </div>
</div>

<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?d69c5103b2c83bb5753b39638f7cd54d";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>