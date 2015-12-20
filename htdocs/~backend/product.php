<?php

//if(!isset($_POST['publish'])) $_POST['publish']=0;
//if(!isset($_POST['headline'])) $_POST['headline']=0;

$page_title="产品服务";
include ('includes/header.php');
?>

<script type="text/javascript" charset="utf-8" src="ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="ueditor/lang/zh-cn/zh-cn.js"></script>
    


<div id="aboutus_container" style="display:none"></div>


                    
<script>


$(document).ready( function () {
   // pullNews();
    apiCall(
        'AboutGet',
        {id:2},
        function (data) {
            console.log(data)
             var formDesign = {
            formAttr: {id:"about_form", method:"POST", enctype:"multipart/form-data"},
            formItems: [
            {type: "input-hidden", name: "formtype", attr: {"readonly":true, "value":"aboutus"}},
            {type: "input-hidden", name: "id", attr: {"readonly":true, "value":"2"}},
                {type: "customHTML", name: "content", caption:"正文", option:{html:'<sc'+'ript id="editor"></scr'+'ipt>'}},
                {type: "button", option: {'caption': "提交"}}
                ],
            };

            $("#aboutus_container")
        .html(createForm_bootstrap(formDesign))
        .prepend("<h3>产品服务</h3>")
        .show();
            window.UEDITOR_CONFIG.initialContent=data.about.content;    
        UE.getEditor('about_form__content');

        });
});


</script>


<?php include ('includes/footer.php'); ?>

