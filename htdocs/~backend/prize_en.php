<?php

//if(!isset($_POST['publish'])) $_POST['publish']=0;
//if(!isset($_POST['headline'])) $_POST['headline']=0;

$page_title="科学大奖英文版";
include ('includes/header.php');
?>
<script type="text/javascript" charset="utf-8" src="ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="ueditor/lang/zh-cn/zh-cn.js"></script>
<div id="prize_container" style="display:none"></div>
<script>

$(document).ready( function () {
    $(".menu_prize_en").addClass("selected");
});

$(document).ready( function () {
   // pullNews();
    apiCall(
        'PrizeGet',
        {language:2},
        function (data) {
            console.log(data)
             var formDesign = {
            formAttr: {id:"prize_form", method:"POST", enctype:"multipart/form-data"},
            formItems: [
            {type: "input-hidden", name: "formtype", attr: {"readonly":true, "value":"prize"}},
            {type: "input-hidden", name: "language", attr: {"readonly":true, "value":2}},
                {type: "customHTML", name: "editorValue", caption:"正文", option:{html:'<sc'+'ript id="editor"></scr'+'ipt>'}},
                {type: "button", option: {'caption': "提交"}}
                ],
            };

            $("#prize_container")
        .html(createForm_bootstrap(formDesign))
        .prepend("<h3>科学大奖英文版</h3>")
        .show();
        window.UEDITOR_CONFIG.initialContent=data.prize.editorValue;    
        UE.getEditor('prize_form__editorValue');

        });
});


</script>


<?php include ('includes/footer.php'); ?>