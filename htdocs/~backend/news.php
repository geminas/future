<?php

//if(!isset($_POST['publish'])) $_POST['publish']=0;
//if(!isset($_POST['headline'])) $_POST['headline']=0;

$page_title="资讯动态";
include ('includes/header.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $argin['formtype']!='miscs') {
    $fileDefinitions=array();
    
    $fileDefinitions[]=array(
        'formname' => 'FILE_theme',
        'target' => sprintf('news/theme/%s.jpg',$_POST['code']),
        'width' => 800,
        'height' => 400
    );

    
    UploadFileFFV($fileDefinitions);
}

?>

<script type="text/javascript" charset="utf-8" src="ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="ueditor/lang/zh-cn/zh-cn.js"></script>
    


<div id="news_form_container" style="display:none"></div>

<div id="news_normal_content">
<h2>资讯动态</h2>


<h3>清单</h3>
<div id="news_list"></div>

<h3>其他内容-中文</h3>
<div id="misc_form_zh-cn_container"></div>
<h3>其他内容-英文</h3>
<div id="misc_form_en_container"></div>
</div>

                    
<script>

CurrentOffset=0;
PageItems=20;

$(document).ready( function () {
    $(".menu_news").addClass("selected");
});

var newsData;
function pullNews() {
    apiCall(
        'NewsGet',
        {offset:CurrentOffset,limit:PageItems+1},
        function (data) {
            newsData=data;
            //News list
            var table=$("<table></table>")
                .addClass("table")
                .addClass("table-hover")
            $("#news_list").html(table);
            var thead_tr=$("<tr></tr>").appendTo($("<thead></thead>").appendTo(table));
            var heads=['日期','标题','状态'];
            $.each(heads, function (i,value) {
                thead_tr.append($("<th></th>").text(value));
            });

            var tbody=$("<tbody></tbody>").appendTo(table);
            var statusString=['未发布','已发布','置顶'];
            $.each(newsData.news, function (i,value) {
                if (i<PageItems) {
                var tr=$("<tr></tr>").appendTo(tbody).click({id:i},popupNews);
                $("<td></td>").text(value.publishTime).appendTo(tr);
                $("<td></td>").text(value.title).appendTo(tr);
                $("<td></td>").text(statusString[value.status]).appendTo(tr);
                }
            });
            
            if(CurrentOffset>0) {
            $("#news_list").append($("<button></button>",{id:'nextPage'}).text("上一页").addClass("btn btn-primary").click(
                function () {
                    CurrentOffset-=PageItems; pullNews();
                }
            ));
            $("#news_list").append("   ");
            }
            
            if(newsData.news.length>PageItems) {
            $("#news_list").append($("<button></button>",{id:'prevPage'}).text("下一页").addClass("btn btn-primary").click(
                function () {
                    CurrentOffset+=PageItems; pullNews();
                }
            ));
            }
            
            
            $("#news_list").prepend("<br><br>");
            $("#news_list").prepend($("<button></button>").text("添加项目").addClass("btn btn-success").click(createNews));
            
    });
}


$(document).ready( function () {
    pullNews();
    apiCall(
        'NewsGet',
        {},
        function (data) {

            
            //Miscs, zh-cn
            
            var formDesign = {
                formAttr: {id:"miscs_form_zh-cn", method:"POST"},
                formItems: [
                    {type: "input-hidden", name: "formtype", attr: {"readonly":true, "value":"miscs"}},
                    {type: "input-hidden", name: "language", attr: {"readonly":true, "value":"zh-cn"}},
                    ],
                };
            
            var itemData={};
            $.each(data.miscs, function (i,v) {
            
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
            $.each(data.miscs, function (i,v) {
            
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


function popupNews(event) {
    var formDesign = {
        formAttr: {id:"news_form", method:"POST", enctype:"multipart/form-data"},
        formItems: [
            {type: "input-hidden", name: "formtype", attr: {"readonly":true, "value":"news"}},
            {type: "input-hidden", name: "id", attr: {"readonly":true}},
            {type: "input-hidden", name: "code", attr: {"readonly":true}},

            {type: "input-text", name: "title", caption:"标题"},
            {type: "input-text", name: "publishTime", caption:"发布时间", attr: {"readonly":true}},
            {type: "input-text", name: "author", caption:"作者"},
            
            {type: "input-text", name: "recommendation", caption:"推荐指数"},
            {type: "input-text", name: "keywords", caption:"标签 逗号分隔"},
            {type: "textarea", name: "abstract", caption:"摘要", attr:{ rows: 5}},
            {type: "img", name: "img_theme", caption: "主题图 800*400", attr:{src: contents_folder+"news/theme/"+newsData.news[event.data.id].code+".jpg"}},
            
            {type: "input-file", name: "FILE_theme", caption:"主题图替换:", attr:{accept:"image/*"}},
            {type: "customHTML", name: "editorValue", caption:"正文", option:{html:'<sc'+'ript id="editor"></scr'+'ipt>'}},
            {type: "select", name: "status", caption: "发布状态", options: [
                {caption: "未发布", attr: {value:0} },
                {caption: "一般发布", attr: {value:1} },
                {caption: "置顶发布", attr: {value:2} },
            ]},
            {type: "input-text", name: "meta-title", caption:"title"},
            {type: "input-text", name: "meta-keywords", caption:"keywords"},
            {type: "input-text", name: "meta-description", caption:"desc"},
            {type: "button", option: {'caption': "提交"}}
            ],
        };


        // .bPopup({
        //     follow: [false,false],
        //     onClose: function () {UE.getEditor('news_form__editorValue').destroy();}
        // });
    
    
    $("#news_form_container")
        .html(createForm_bootstrap(formDesign))
        .prepend("<h3>新闻编辑</h3>")
        .show();
        
        
    window.UEDITOR_CONFIG.initialContent=newsData.news[event.data.id].editorValue;    
    UE.getEditor('news_form__editorValue');
    $("#news_form__status").off();
    $("#news_form__status").change(function () {
        var d=new Date();
        var str=
            d.getFullYear()+"-"+
            (d.getMonth()+1)+"-"+
            d.getDate()+" "+
            d.getHours()+":"+
            d.getMinutes()+":"+
            d.getSeconds();
    
        if($("#news_form__status").val()>0) $("#news_form__publishTime").val(str);
    });
    
    $("#news_form").append(
    $("<div></div>", {'class': 'form-group'}).append(
    $("<div></div>", {'class': 'col-sm-10 col-sm-offset-2'}).append(
    $("<button></button>").text("删除本项").addClass("btn btn-danger form-control").click({id:newsData.news[event.data.id].id},deleteNews)
    )));
    
    formData($("#news_form"), newsData.news[event.data.id]);
    
        

    $("#news_normal_content").hide();
}

function deleteNews(event) {
    event.stopPropagation();
    event.preventDefault();
    if(confirm("你确定要删除这个条目么？")) {
        apiCall(
            'NewsCD',
            {remove:event.data.id},
            function () {
                window.location.assign(window.location.href);
            }
        );
    };
}

function createNews() {
    apiCall(
        'NewsCD',
        {create:new Date().getTime()},
        function () {
            window.location.assign(window.location.href);
        }
    );
}


</script>


<?php include ('includes/footer.php'); ?>

