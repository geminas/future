
<?php
$page_title="行动";
include ('includes/header.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $argin['formtype']!='miscs') {
    $fileDefinitions=array(
        array(
            'formname' => 'FILE_image',
            'target' => 'action/'.$_POST['code'].'.jpg',
            'width' => 960,
            'height' => 507
        )
    );
    UploadFileFFV($fileDefinitions);
}

?>



<h2>行动</h2>

<div id="action_form_container" class="popup"></div>

<h3>清单</h3>
<div id="action_list"></div>




                    
<script>
$(document).ready( function () {
    $(".menu_action").addClass("selected");
});

var ActionData;

$(document).ready( function () {
    apiCall(
        'ActionGet',
        {},
        function (data) {
            ActionData=data;
            //Category
            var table=$("<table></table>")
                .addClass("table")
                .addClass("table-hover")
                .appendTo("#action_list");
            var thead_tr=$("<tr></tr>").appendTo($("<thead></thead>").appendTo(table));
            var heads=['代码','中文标题'];
            $.each(heads, function (i,value) {
                thead_tr.append($("<th></th>").text(value));
            });

            var tbody=$("<tbody></tbody>").appendTo(table);
            
            $.each(ActionData.actions, function (i,value) {
                var tr=$("<tr></tr>").appendTo(tbody).click({id:i},popupAction);
                $("<td></td>").text(value.code).appendTo(tr);
                $("<td></td>").text(value['name_zh-cn']).appendTo(tr);
            });
            
        });
});


function popupAction(event) {
    var formDesign = {
        formAttr: {id:"action_form", method:"POST", enctype:"multipart/form-data"},
        formItems: [
            {type: "input-hidden", name: "formtype", attr: {"readonly":true, "value":"actions"}},
            {type: "input-hidden", name: "id", attr: {"readonly":true}},
            {type: "input-text", name: "code", caption:"代码",  attr: {"readonly":true}},
            {type: "input-text", name: "name_zh-cn", caption:"中文名"},
            {type: "input-text", name: "name_en", caption:"英文名"},
            {type: "input-text", name: "subtitle_zh-cn", caption:"中文副标题"},
            {type: "textarea", name: "text_zh-cn", caption:"中文长说明", attr:{ rows: 5}},
            {type: "img", name: "img_image", caption: "首页主题图 960*507", attr:{src: contents_folder+"action/"+ActionData.actions[event.data.id].code+".jpg"}},
            {type: "input-file", name: "FILE_image", caption:"替换首页主题图",attr:{accept:"image/*"}},

            {type: "button", option: {'caption': "提交"}}
            ],
        };
    
    $("#action_form_container")
        .html(createForm_bootstrap(formDesign))
        .prepend("<h3>行动详情</h3>")
        .bPopup({follow: [false,false]});
    
    formData($("#action_form"), ActionData.actions[event.data.id] )
}
</script>


<?php include ('includes/footer.php'); ?>

