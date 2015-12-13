
<?php
$page_title="足迹";
include ('includes/header.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $argin['formtype']!='miscs') {
    $fileDefinitions=array();
    
    for ($i=1; $i<=5; $i++) {
        $fileDefinitions[]=array(
            'formname' => sprintf('FILE_image%d',$i),
            'target' => sprintf('event/%s-%02d.jpg',$_POST['code'],$i),
            'width' => 1620,
            'height' => 1080
        );
    }
    $fileDefinitions[]=array(
        'formname' => 'FILE_thumb1',
        'target' => sprintf('eventthumb/%s.jpg',$_POST['code']),
        'width' => 450,
        'height' => 300
    );
    $fileDefinitions[]=array(
        'formname' => 'FILE_thumb2',
        'target' => sprintf('eventthumb_b/%s.jpg',$_POST['code']),
        'width' => 570,
        'height' => 600
    );
    
    UploadFileFFV($fileDefinitions);
}

?>



<h2>足迹</h2>

<div id="category_form_container" class="popup"></div>
<div id="events_form_container" class="popup"></div>

<h3>事件分类（点击修改）</h3>
<div id="category_list"></div>
<h3>事件信息（点击修改）</h3>
<div id="events_list"></div>


<h3>其他内容-中文</h3>
<div id="misc_form_zh-cn_container"></div>
<h3>其他内容-英文</h3>
<div id="misc_form_en_container"></div>
                    
<script>
$(document).ready( function () {
    $(".menu_footprints").addClass("selected");
});

var eventsData;

$(document).ready( function () {

    apiCall(
        'EventsGet',
        {},
        function (data) {
            eventsData=data;
            //Category
            var table=$("<table></table>")
                .addClass("table")
                .addClass("table-hover")
                .appendTo("#category_list");
            var thead_tr=$("<tr></tr>").appendTo($("<thead></thead>").appendTo(table));
            var heads=['代码','中文标题','英文标题'];
            $.each(heads, function (i,value) {
                thead_tr.append($("<th></th>").text(value));
            });

            var tbody=$("<tbody></tbody>").appendTo(table);
            
            $.each(eventsData.category, function (i,value) {
                var tr=$("<tr></tr>").appendTo(tbody).click({id:i},popupCategory);
                $("<td></td>").text(value.code).appendTo(tr);
                $("<td></td>").text(value['title_zh-cn']).appendTo(tr);
                $("<td></td>").text(value.title_en).appendTo(tr);
            });
            
            //Event list
            
            var table=$("<table></table>")
                .addClass("table")
                .addClass("table-hover")
                .appendTo("#events_list");
            var thead_tr=$("<tr></tr>").appendTo($("<thead></thead>").appendTo(table));
            var heads=['日期','分类','中文短名'];
            $.each(heads, function (i,value) {
                thead_tr.append($("<th></th>").text(value));
            });

            var tbody=$("<tbody></tbody>").appendTo(table);
            
            $.each(eventsData.events, function (i,value) {
                var tr=$("<tr></tr>").appendTo(tbody).click({id:i},popupEvent);
                $("<td></td>").text(value.date_string).appendTo(tr);
                $("<td></td>").text(value.category_title).appendTo(tr);
                $("<td></td>").text(value['name_zh-cn']).appendTo(tr);
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
            $.each(eventsData.miscs, function (i,v) {
            
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
            $.each(eventsData.miscs, function (i,v) {
            
                var item={type: v.type, caption: v.caption, name: v.id};
                if (v.type=="textarea") item['attr']={rows:5};
                formDesign.formItems.push(item);
                itemData[v.id]=v['en'];
            });
             
            formDesign.formItems.push({type: "button", option: {'caption': "提交"}});
            
            $("#misc_form_en_container")
                .html(createForm_bootstrap(formDesign))
            
            formData($("#miscs_form_en"), itemData)
            
            $("#events_list").append($("<button></button>").text("添加项目").addClass("btn btn-success").click(createEvent))
            
        });
});



function popupCategory(event) {
    
    var formDesign = {
        formAttr: {id:"category_form", method:"POST"},
        formItems: [
            {type: "input-hidden", name: "formtype", attr: {"readonly":true, "value":"events_category"}},
            {type: "input-hidden", name: "id", attr: {"readonly":true}},
            {type: "input-text", name: "code", caption:"代码",  attr: {"readonly":true}},
            {type: "input-text", name: "value", caption:"类别代码值", attr: {"readonly":true}},
            {type: "input-text", name: "title_zh-cn", caption:"中文标题"},
            {type: "input-text", name: "title_en", caption:"英文标题"},
            {type: "textarea", name: "note_zh-cn", caption:"中文说明", attr:{ rows: 5}},
            {type: "button", option: {'caption': "提交"}}
            ],
        };
    
    $("#category_form_container")
        .html(createForm_bootstrap(formDesign))
        .prepend("<h3>活动分类详情</h3>")
        .bPopup({follow: [false,false]});
    
    
    formData($("#category_form"), eventsData.category[event.data.id] )
}

function popupEvent(event) {
    var formDesign = {
        formAttr: {id:"events_form", method:"POST", enctype:"multipart/form-data"},
        formItems: [
            {type: "input-hidden", name: "formtype", attr: {"readonly":true, "value":"events"}},
            {type: "input-hidden", name: "id", attr: {"readonly":true}},
            {type: "input-text", name: "code", caption:"代码",  attr: {"readonly":true}},
            {type: "input-text", name: "category", caption:"类别代码"},

            {type: "input-text", name: "name_zh-cn", caption:"中文短名"},
            {type: "input-text", name: "title_zh-cn", caption:"中文标题"},
            {type: "input-text", name: "title_en", caption:"英文标题"},
            
            {type: "input-text", name: "number", caption:"活动序号-数字"},
            {type: "input-text", name: "number_zh-cn", caption:"活动序号-汉字"},
            {type: "input-text", name: "number_en", caption:"活动序号-英语"},

            {type: "input-text", name: "speaker_name", caption:"主讲人"},
            {type: "input-text", name: "date_string", caption:"日期"},
            {type: "input-text", name: "address", caption:"活动地点"},

            {type: "textarea", name: "text_zh-cn", caption:"中文长说明", attr:{ rows: 8}},
            
            {type: "input-text", name: "youkuID", caption:"优酷视频ID"},
            {type: "input-text", name: "sequence", caption:"排序参考号"},

            {type: "img", name: "img_image1", caption: "配图1 1620*1080", attr:{src: contents_folder+"event/"+eventsData.events[event.data.id].code+"-01.jpg"}},
            {type: "input-file", name: "FILE_image1", caption:"配图1替换:",attr:{accept:"image/*"}},

            {type: "img", name: "img_image2", caption: "配图2 1620*1080", attr:{src: contents_folder+"event/"+eventsData.events[event.data.id].code+"-02.jpg"}},
            {type: "input-file", name: "FILE_image2", caption:"配图2替换:",attr:{accept:"image/*"}},

            {type: "img", name: "img_image3", caption: "配图3 1620*1080", attr:{src: contents_folder+"event/"+eventsData.events[event.data.id].code+"-03.jpg"}},
            {type: "input-file", name: "FILE_image3", caption:"配图3替换:",attr:{accept:"image/*"}},

            {type: "img", name: "img_image4", caption: "配图4 1620*1080", attr:{src: contents_folder+"event/"+eventsData.events[event.data.id].code+"-04.jpg"}},
            {type: "input-file", name: "FILE_image4", caption:"配图4替换:",attr:{accept:"image/*"}},

            {type: "img", name: "img_image5", caption: "配图5 1620*1080", attr:{src: contents_folder+"event/"+eventsData.events[event.data.id].code+"-05.jpg"}},
            {type: "input-file", name: "FILE_image5", caption:"配图5替换:",attr:{accept:"image/*"}},

            {type: "img", name: "img_thumb1", caption: "小图1 450*300", attr:{src: contents_folder+"eventthumb/"+eventsData.events[event.data.id].code+".jpg"}},
            {type: "input-file", name: "FILE_thumb1", caption:"小图1替换:",attr:{accept:"image/*"}},
            
            {type: "img", name: "img_thumb2", caption: "小图2 570*600", attr:{src: contents_folder+"eventthumb_b/"+eventsData.events[event.data.id].code+".jpg"}},
            {type: "input-file", name: "FILE_thumb2", caption:"小图2替换:",attr:{accept:"image/*"}},
            
            {type: "input-text", name: "meta-title", caption:"meta-title"},
            {type: "input-text", name: "meta-keywords", caption:"meta-keywords"},
            {type: "input-text", name: "meta-description", caption:"meta-description"},
            {type: "button", option: {'caption': "提交"}}
            ],
        };
    
    $("#events_form_container")
        .html(createForm_bootstrap(formDesign))

        .prepend("<h3>活动详情</h3>")

        .bPopup({follow: [false,false]});
    
    $("#events_form").append(
    $("<div></div>", {'class': 'form-group'}).append(
    $("<div></div>", {'class': 'col-sm-10 col-sm-offset-2'}).append(
    $("<button></button>").text("删除本项").addClass("btn btn-danger form-control").click({id:eventsData.events[event.data.id].id},deleteEvent)
    )));
    
    formData($("#events_form"), eventsData.events[event.data.id] )
}

function deleteEvent(event) {
    event.stopPropagation();
    event.preventDefault();
    if(confirm("你确定要删除这个条目么？")) {
        apiCall(
            'EventCD',
            {remove:event.data.id},
            function () {
                window.location.assign(window.location.href);
            }
        );
    };
}

function createEvent() {
    var code="";
    code=window.prompt("请输入活动代码，可参见已有活动格式，以后不可更改","");
    if (code!==null) {
        apiCall(
            'EventCD',
            {create:code},
            function () {
                window.location.assign(window.location.href);
            }
        );
    }
}

</script>




<?php include ('includes/footer.php'); ?>

