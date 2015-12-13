
<?php
$page_title="人物";
include ('includes/header.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $argin['formtype']!='miscs') {
    $fileDefinitions=array(
        array(
            'formname' => 'FILE_head',
            'target' => 'vip_thumbs/'.$_POST['code'].'.jpg',
            'width' => 283,
            'height' => 425
        )
    );
    UploadFileFFV($fileDefinitions);
}

?>



<h2>人物</h2>

<div id="category_form_container" class="popup"></div>
<div id="people_form_container" class="popup"></div>

<h3>VIP分类（点击修改）</h3>
<div id="category_list"></div>
<h3>VIP信息（点击修改）</h3>
<div id="people_list"></div>

<h3>其他内容-中文</h3>
<div id="misc_form_zh-cn_container"></div>
<h3>其他内容-英文</h3>
<div id="misc_form_en_container"></div>

                    
<script>
$(document).ready( function () {
    $(".menu_people").addClass("selected");
});

var PeopleData;

$(document).ready( function () {
    apiCall(
        'PeopleGet',
        {},
        function (data) {
            PeopleData=data;
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
            
            $.each(PeopleData.category, function (i,value) {
                var tr=$("<tr></tr>").appendTo(tbody).click({id:i},popupCategory);
                $("<td></td>").text(value.code).appendTo(tr);
                $("<td></td>").text(value['title_zh-cn']).appendTo(tr);
                $("<td></td>").text(value.title_en).appendTo(tr);
            });
            
            //Person
            var table=$("<table></table>")
                .addClass("table")
                .addClass("table-hover")
                .appendTo("#people_list");
            var thead_tr=$("<tr></tr>").appendTo($("<thead></thead>").appendTo(table));
            var heads=['代码','中文名','英文名'];
            $.each(heads, function (i,value) {
                thead_tr.append($("<th></th>").text(value));
            });

            var tbody=$("<tbody></tbody>").appendTo(table);
            
            $.each(PeopleData.people, function (i,value) {
                var tr=$("<tr></tr>").appendTo(tbody).click({id:i},popupPerson);
                $("<td></td>").text(value.code).appendTo(tr);
                $("<td></td>").text(value['name_zh-cn']).appendTo(tr);
                $("<td></td>").text(value.name_en).appendTo(tr);
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
            $.each(PeopleData.miscs, function (i,v) {
            
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
            $.each(PeopleData.miscs, function (i,v) {
            
                var item={type: v.type, caption: v.caption, name: v.id};
                if (v.type=="textarea") item['attr']={rows:5};
                formDesign.formItems.push(item);
                itemData[v.id]=v['en'];
            });
             
            formDesign.formItems.push({type: "button", option: {'caption': "提交"}});
            
            $("#misc_form_en_container")
                .html(createForm_bootstrap(formDesign))
            
            formData($("#miscs_form_en"), itemData)
            
            $("#people_list").append($("<button></button>").text("添加人物").addClass("btn btn-success").click(createPerson))
            
        });
});

function popupCategory(event) {
    
    var formDesign = {
        formAttr: {id:"category_form", method:"POST"},
        formItems: [
            {type: "input-hidden", name: "formtype", attr: {"readonly":true, "value":"people_category"}},
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
        .prepend("<h3>人物分类详情</h3>")
        .bPopup({follow: [false,false]});
    
    formData($("#category_form"), PeopleData.category[event.data.id] )
}

function popupPerson(event) {
    var formDesign = {
        formAttr: {id:"people_form", method:"POST", enctype:"multipart/form-data"},
        formItems: [
            {type: "input-hidden", name: "formtype", attr: {"readonly":true, "value":"people"}},
            {type: "input-hidden", name: "id", attr: {"readonly":true}},
            {type: "input-text", name: "code", caption:"代码",  attr: {"readonly":true}},
            {type: "input-text", name: "category", caption:"类别代码"},
            {type: "input-text", name: "name_zh-cn", caption:"中文名"},
            {type: "input-text", name: "name_en", caption:"英文名"},
            {type: "input-text", name: "desc1_zh-cn", caption:"中文短说明第1行"},
            {type: "input-text", name: "desc2_zh-cn", caption:"中文短说明第2行"},
            {type: "textarea", name: "note_zh-cn", caption:"中文长说明", attr:{ rows: 5}},
            {type: "textarea", name: "quote_zh-cn", caption:"引言", attr:{ rows: 5}},
            {type: "img", name: "img", caption: "头像 283*425", attr:{src: contents_folder+"vip_thumbs/"+PeopleData.people[event.data.id].code+".jpg"}},
            {type: "input-file", name: "FILE_head", caption: "替换", attr:{accept:"image/*"}},
            {type: "button", option: {'caption': "提交"}}
            ],
        };
    
    $("#people_form_container")
        .html(createForm_bootstrap(formDesign))
        .prepend("<h3>人物个人详情</h3>")
        .bPopup({follow: [false,false]});
    
    $("#people_form").append(
    $("<div></div>", {'class': 'form-group'}).append(
    $("<div></div>", {'class': 'col-sm-10 col-sm-offset-2'}).append(
    $("<button></button>").text("删除本项").addClass("btn btn-danger form-control").click({id:PeopleData.people[event.data.id].id},deletePerson)
    )));
    
    formData($("#people_form"), PeopleData.people[event.data.id] )
}

function deletePerson(event) {
    event.stopPropagation();
    event.preventDefault();
    if(confirm("你确定要删除这个条目么？")) {
        apiCall(
            'PersonCD',
            {remove:event.data.id},
            function () {
                window.location.assign(window.location.href);
            }
        );
    };
}

function createPerson() {
    var code=window.prompt("请输入VIP代码，可参见当前VIP格式，以后不可更改","");
    if (code!==null) {
        apiCall(
            'PersonCD',
            {create:code},
            function () {
                window.location.assign(window.location.href);
            }
        );
    }
}


</script>


<?php include ('includes/footer.php'); ?>

