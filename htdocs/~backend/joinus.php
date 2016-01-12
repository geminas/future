<?php

//if(!isset($_POST['publish'])) $_POST['publish']=0;
//if(!isset($_POST['headline'])) $_POST['headline']=0;

$page_title="加入我们";
include ('includes/header.php');
?>

<script type="text/javascript" charset="utf-8" src="ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="ueditor/lang/zh-cn/zh-cn.js"></script>
<div id="aboutus_container" style="display:none"></div>
<script>

$(document).ready( function () {
    $(".menu_joinus").addClass("selected");
});

$(document).ready( function () {
   // pullNews();
   var table=$("<table></table>")
                .addClass("table")
                .addClass("table-hover")
                .appendTo("#links_list");
            var thead_tr=$("<tr></tr>").appendTo($("<thead></thead>").appendTo(table));
            var heads=['类型'];
            thead_tr.append($("<th></th>").text("heads"));

            var tbody=$("<tbody></tbody>").appendTo(table);
            
            var tr=$("<tr></tr>").appendTo(tbody).click({id:0},popupAbout);
                $("<td></td>").text("中文").appendTo(tr);
            var tr=$("<tr></tr>").appendTo(tbody).click({id:1},popupAbout);
                $("<td></td>").text("英文").appendTo(tr);
});

function popupAbout(event) {
    if (event.id == 0) {
        apiCall(
        'AboutGet',
        {id:3},
        function (data) {
            var formDesign = {
            formAttr: {id:"about_form", method:"POST", enctype:"multipart/form-data"},
            formItems: [
                {type: "input-hidden", name: "formtype", attr: {"readonly":true, "value":"aboutus"}},
                {type: "input-hidden", name: "id", attr: {"readonly":true, "value":"3"}},
                {type: "customHTML", name: "content", caption:"中文", option:{html:'<sc'+'ript id="editor"></scr'+'ipt>'}},
                {type: "button", option: {'caption': "提交"}}
                ],
            };

        $("#aboutus_container").html(createForm_bootstrap(formDesign)).prepend("<h3>加入我们</h3>").show();
        window.UEDITOR_CONFIG.initialContent=data.about.content;
        UE.getEditor('about_form__content');
        });
    } else {
        apiCall(
        'AboutGet',
        {id:3},
        function (data) {
            var formDesign = {
            formAttr: {id:"about_form", method:"POST", enctype:"multipart/form-data"},
            formItems: [
                {type: "input-hidden", name: "formtype", attr: {"readonly":true, "value":"aboutus"}},
                {type: "input-hidden", name: "id", attr: {"readonly":true, "value":"3"}},
                {type: "customHTML", name: "content", caption:"英文", option:{html:'<sc'+'ript id="editor"></scr'+'ipt>'}},
                {type: "button", option: {'caption': "提交"}}
                ],
            };

        $("#aboutus_container").html(createForm_bootstrap(formDesign)).prepend("<h3>加入我们</h3>").show();
        window.UEDITOR_CONFIG.initialContent=data.about.content;
        UE.getEditor('about_form__content');
        });
    }
}

</script>


<?php include ('includes/footer.php'); ?>

