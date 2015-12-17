
<?php
$page_title="首页";
include ('includes/header.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $argin['formtype']!='miscs') {
    $fileDefinitions=array(
        array(
            'formname' => 'FILE_slide',
            'target' => 'revslider-'.$_POST['id'].'.jpg',
            'width' => 1280,
            'height' => 700
        )
    );
    UploadFileFFV($fileDefinitions);
}

?>



<h2>首页</h2>

<div id="slide_form_container" class="popup"></div>

<h3>幻灯片</h3>
<div id="slides_list"></div>

<h3>其他内容-中文</h3>
<div id="misc_form_zh-cn_container"></div>
<h3>其他内容-英文</h3>
<div id="misc_form_en_container"></div>
                  
<script>
$(document).ready( function () {
    $(".menu_homepage").addClass("selected");
});

var HomepageData;

$(document).ready( function () {
    apiCall(
        'HomepageGet',
        {},
        function (data) {
            HomepageData=data;
            //Category
            var table=$("<table></table>")
                .addClass("table")
                .addClass("table-hover")
                .appendTo("#slides_list");
            var thead_tr=$("<tr></tr>").appendTo($("<thead></thead>").appendTo(table));
            var heads=['序号','中文大标题'];
            $.each(heads, function (i,value) {
                thead_tr.append($("<th></th>").text(value));
            });

            var tbody=$("<tbody></tbody>").appendTo(table);
            
            $.each(HomepageData.slides, function (i,value) {
                var tr=$("<tr></tr>").appendTo(tbody).click({id:i},popupSlides);
                $("<td></td>").text(value.sequence).appendTo(tr);
                $("<td></td>").text(value['bigtitle_zh-cn']).appendTo(tr);
            });
            
            
            //Miscs, zh-cn
            
            var formDesign = {
                formAttr: {id:"miscs_form_zh-cn", method:"POST"},
                formItems: [
                    {type: "input-hidden", name: "formtype", attr: {"readonly":true, "value":"miscs"}},
                    {type: "input-hidden", name: "language", attr: {"readonly":true, "value":"zh-cn"}},
                    ],
                };
            
            var itemData={};
            $.each(HomepageData.miscs, function (i,v) {
            
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
            $.each(HomepageData.miscs, function (i,v) {
            
                var item={type: v.type, caption: v.caption, name: v.id};
                if (v.type=="textarea") item['attr']={rows:5};
                formDesign.formItems.push(item);
                itemData[v.id]=v['en'];
            });
             
            formDesign.formItems.push({type: "button", option: {'caption': "提交"}});
            
            $("#misc_form_en_container")
                .html(createForm_bootstrap(formDesign))
            
            formData($("#miscs_form_en"), itemData)
            
            $("#slides_list").append($("<button></button>").text("添加幻灯片").addClass("btn btn-success").click(createSlide))
        });
});


function popupSlides(event) {
    var formDesign = {
        formAttr: {id:"slide_form", method:"POST", enctype:"multipart/form-data"},
        formItems: [
            {type: "input-hidden", name: "formtype", attr: {"readonly":true, "value":"homepage_slides"}},
            {type: "input-hidden", name: "id", attr: {"readonly":true}},
            {type: "input-text", name: "sequence", caption:"排序号"},
            {type: "input-text", name: "bigtitle_zh-cn", caption:"中文大标题"},
            {type: "input-text", name: "bigtitle_en", caption:"英文大标题"},
            {type: "textarea", name: "text_zh-cn", caption:"中文内容", attr:{ rows: 5}},
            {type: "textarea", name: "subtext_zh-cn", caption:"中文小字内容", attr:{ rows: 5}},
            {type: "img", name: "img_slide", caption: "背景图 1280*700", attr:{src: contents_folder+"revslider-"+HomepageData.slides[event.data.id].id+".jpg"}},
            {type: "input-file", name: "FILE_slide", caption:"替换背景图",attr:{accept:"image/*"}},
            {type: "input-text", name: "href", caption:"超链接"},
            {type: "button", option: {'caption': "提交"}}
            ],
        };
    
    $("#slide_form_container")
        .html(createForm_bootstrap(formDesign))
        .prepend("<h3>幻灯片</h3>")
        .bPopup({follow: [false,false]});
    
    $("#slide_form").append(
    $("<div></div>", {'class': 'form-group'}).append(
    $("<div></div>", {'class': 'col-sm-10 col-sm-offset-2'}).append(
    $("<button></button>").text("删除本项").addClass("btn btn-danger form-control").click({id:HomepageData.slides[event.data.id].id},deleteSlide)
    )));
    
    formData($("#slide_form"), HomepageData.slides[event.data.id] )
}

function deleteSlide(event) {
    event.stopPropagation();
    event.preventDefault();
    if(confirm("你确定要删除这个条目么？")) {
        apiCall(
            'SlideCD',
            {remove:event.data.id},
            function () {
                window.location.assign(window.location.href);
            }
        );
    };
}

function createSlide() {
    var code="";
    code=window.prompt("请输入活动代码，可参见已有活动格式，以后不可更改","");
    if (code!==null) {
        apiCall(
            'SlideCD',
            {create:code},
            function () {
                window.location.assign(window.location.href);
            }
        );
    }
}
</script>


<?php include ('includes/footer.php'); ?>

