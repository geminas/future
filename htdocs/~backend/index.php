
<?php
$page_title="全局";
include ('includes/header.php');


?>



<h2>首页</h2>


<h3>中文</h3>
<div id="misc_form_zh-cn_container"></div>
<h3>英文</h3>
<div id="misc_form_en_container"></div>
                  
<script>
$(document).ready( function () {
    $(".menu_global").addClass("selected");
});

var GlobalData;

$(document).ready( function () {
    apiCall(
        'GlobalGet',
        {},
        function (data) {
            GlobalData=data;
            
            //Miscs, zh-cn
            
            var formDesign = {
                formAttr: {id:"miscs_form_zh-cn", method:"POST"},
                formItems: [
                    {type: "input-hidden", name: "formtype", attr: {"readonly":true, "value":"miscs"}},
                    {type: "input-hidden", name: "language", attr: {"readonly":true, "value":"zh-cn"}},
                    ],
                };
            
            var itemData={};
            $.each(GlobalData.miscs, function (i,v) {
            
                var item={type: v.type, caption: v.caption, name: v.id};
                if (v.type=="textarea") item['attr']={rows:5};
                formDesign.formItems.push(item);
                itemData[v.id]=v['zh-cn'];
            });
             
            formDesign.formItems.push({type: "button", option: {'caption': "提交"}});
            
            $("#misc_form_zh-cn_container")
                .html(createForm_bootstrap(formDesign))
            
            formData($("#miscs_form_zh-cn"), itemData)
            
            //miscs, en
            var formDesign = {
                formAttr: {id:"miscs_form_en", method:"POST"},
                formItems: [
                    {type: "input-hidden", name: "formtype", attr: {"readonly":true, "value":"miscs"}},
                    {type: "input-hidden", name: "language", attr: {"readonly":true, "value":"en"}},
                    ],
                };
            
            var itemData={};
            $.each(GlobalData.miscs, function (i,v) {
            
                var item={type: v.type, caption: v.caption, name: v.id};
                if (v.type=="textarea") item['attr']={rows:5};
                formDesign.formItems.push(item);
                itemData[v.id]=v['en'];
            });
             
            formDesign.formItems.push({type: "button", option: {'caption': "提交"}});
            
            $("#misc_form_en_container")
                .html(createForm_bootstrap(formDesign))
            
            formData($("#miscs_form_en"), itemData)
            
            
        });
});


function popupSlides(event) {
    var formDesign = {
        formAttr: {id:"slide_form", method:"POST"},
        formItems: [
            {type: "input-hidden", name: "formtype", attr: {"readonly":true, "value":"homepage_slides"}},
            {type: "input-hidden", name: "id", attr: {"readonly":true}},
            {type: "input-text", name: "sequence", caption:"排序号"},
            {type: "input-text", name: "bigtitle_zh-cn", caption:"中文大标题"},
            {type: "input-text", name: "bigtitle_en", caption:"英文大标题"},
            {type: "textarea", name: "text_zh-cn", caption:"中文内容", attr:{ rows: 5}},
            {type: "textarea", name: "subtext_zh-cn", caption:"中文小字内容", attr:{ rows: 5}},
            {type: "button", option: {'caption': "提交"}}
            ],
        };
    
    $("#slide_form_container")
        .html(createForm_bootstrap(formDesign))
        .prepend("<h3>幻灯片</h3>")
        .bPopup({follow: [false,false]});
    
    formData($("#slide_form"), GlobalData.slides[event.data.id] )
}


</script>


<?php include ('includes/footer.php'); ?>

