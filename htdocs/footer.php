<?php
$links1=queryDB_array("select * from links where type = 1");
$links2=queryDB_array("select * from links where type = 2");
$links3=queryDB_array("select * from links where type = 3");
$links4=queryDB_array("select * from links where type = 4");
$links5=queryDB_array("select * from links where type = 5");
$links6=queryDB_array("select * from links where type = 6");
?>

<div class="section">
    <div class="hpsection container GDH-normalpadding">
        <div class="row">
            <div class="col-sm-3" style="margin-bottom:40px">
                <div class="col-xs-12 col-sm-12" style="margin-bottom:40px">
                    <a href="http://www.futureforum.org.cn/" target="_blank"><img src="contents/logo-grey.png" style="width:100%; max-width:300px;"></a>
                </div>
                <div class="col-xs-12 col-sm-12" style="margin-bottom:40px">
                    <div style="background-color:black; width:100%; height:6px"></div>
                    <h3 class="FooterHeader">官方微信订阅号<br>WeChat Subscription</h3>
                    <div style="">
                        <img style="width:100%; max-width:300px" src="contents/wechat.png">
                    </div>
                </div>
            </div>
            <!--footer col-->
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-xs-6 col-sm-3">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12" font-family: 'Microsoft YaHei',"微软雅黑", 'Avenir Next',Avenir,'Helvetica Neue',Helvetica,'Lantinghei SC','Hiragino Sans GB',STHeiti,'WenQuanYi Micro Hei',SimSun,sans-serif;>
                                <div style="margin-bottom:10px">
                                    <div style="background-color:black; width:100%; height:6px"></div>
                                    <h3 class="FooterHeader" style="padding-bottom:5px">关于未来论坛<br>About FutureForum</h3>
                                    <a href="/aboutus.php" style="text-decoration:underline; color:blue; margin-left: 28px;">关于我们</a><br>
                                    <a href="/product.php" style="text-decoration:underline; color:blue; margin-left: 28px;">产品服务</a><br>
                                    <a href="/joinus.php" style="text-decoration:underline; color:blue; margin-left: 28px;">加入我们</a><br>
                                    <a href="/contactus.php" style="text-decoration:underline; color:blue; margin-left: 28px;">联系我们</a>
                                </div>
                                <div style="margin-bottom:10px">
                                    <div style="background-color:black; width:100%; height:6px"></div>
                                    <h3 class="FooterHeader">执行机构<br>Executive Agency</h3>
                                    <?php
                                        foreach ($links1 as $link) {
                                    ?>
                                        <?php 
                                            if ($link['isLink']=='1') {
                                        ?>
                                            <a href="<?php echo $link['href'];?>" target="_blank"><img style="width:100%; padding-bottom:5px" src="<?php echo "contents/" . $link['src'];?>"></a>
                                        <?php } 
                                            else if ($link['isLink']=='2') {
                                        ?>
                                            <a target="_blank"><img style="width:100%; padding-bottom:5px" src="<?php echo "contents/" . $link['src'];?>"></a>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div style="margin-bottom:10px">
                            <div style="background-color:black; width:100%; height:6px"></div>
                            <h3 class="FooterHeader">媒体支持<br>Media Support</h3>
                            <?php
                                foreach ($links2 as $link) {
                            ?>
                                <?php 
                                    if ($link['isLink']=='1') {
                                ?>
                                    <a href="<?php echo $link['href'];?>" target="_blank"><img style="width:100%; padding-bottom:5px" src="<?php echo "contents/" . $link['src'];?>"></a>
                                <?php } 
                                    else if ($link['isLink']=='2') {
                                ?>
                                    <a target="_blank"><img style="width:100%; padding-bottom:5px" src="<?php echo "contents/" . $link['src'];?>"></a>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <?php 
                            if (!empty($links3)) {
                         ?>ccc
                            <div style="margin-bottom:10px">
                                <div style="background-color:black; width:100%; height:6px"></div>
                                <h3 class="FooterHeader">合作伙伴<br>Partner</h3>
                                <?php
                                    foreach ($links3 as $link) {
                                ?>
                                    <?php 
                                        if ($link['isLink']=='1') {
                                    ?>
                                        <a href="<?php echo $link['href'];?>" target="_blank"><img style="width:100%; padding-bottom:5px" src="<?php echo "contents/" . $link['src'];?>"></a>
                                    <?php } 
                                        else if ($link['isLink']=='2') {
                                    ?>
                                        <a target="_blank"><img style="width:100%; padding-bottom:5px" src="<?php echo "contents/" . $link['src'];?>"></a>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <?php 
                            if (!empty($links4)) {
                         ?>
                            <div style="margin-bottom:10px">
                                <div style="background-color:black; width:100%; height:6px"></div>
                                <h3 class="FooterHeader">公益慈善合作<br>Philanthropic Partner</h3>
                                <?php
                                    foreach ($links4 as $link) {
                                ?>
                                    <?php 
                                        if ($link['isLink']=='1') {
                                    ?>
                                        <a href="<?php echo $link['href'];?>" target="_blank"><img style="width:100%; padding-bottom:5px" src="<?php echo "contents/" . $link['src'];?>"></a>
                                    <?php } 
                                        else if ($link['isLink']=='2') {
                                    ?>
                                        <a target="_blank"><img style="width:100%; padding-bottom:5px" src="<?php echo "contents/" . $link['src'];?>"></a>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <?php 
                            if (!empty($links5)) {
                         ?>
                            <div style="margin-bottom:10px">
                                <div style="background-color:black; width:100%; height:6px"></div>
                                <h3 class="FooterHeader">荣誉合作<br>Honorary Partner</h3>
                                <?php
                                    foreach ($links5 as $link) {
                                ?>
                                    <?php 
                                        if ($link['isLink']=='1') {
                                    ?>
                                        <a href="<?php echo $link['href'];?>" target="_blank"><img style="width:100%; padding-bottom:5px" src="<?php echo "contents/" . $link['src'];?>"></a>
                                    <?php } 
                                        else if ($link['isLink']=='2') {
                                    ?>
                                        <a target="_blank"><img style="width:100%; padding-bottom:5px" src="<?php echo "contents/" . $link['src'];?>"></a>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <?php 
                            if (!empty($links6)) {
                         ?>
                            <div style="margin-bottom:10px">
                                <div style="background-color:black; width:100%; height:6px"></div>
                                <h3 class="FooterHeader">特约合作<br>Contributing Partner</h3>
                                <?php
                                    foreach ($links6 as $link) {
                                ?>
                                    <?php 
                                        if ($link['isLink']=='1') {
                                    ?>
                                        <a href="<?php echo $link['href'];?>" target="_blank"><img style="width:100%; padding-bottom:5px" src="<?php echo "contents/" . $link['src'];?>"></a>
                                    <?php } 
                                        else if ($link['isLink']=='2') {
                                    ?>
                                        <a target="_blank"><img style="width:100%; padding-bottom:5px" src="<?php echo "contents/" . $link['src'];?>"></a>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        <?php } ?>
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