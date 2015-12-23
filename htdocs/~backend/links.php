
<?php
$page_title="友情链接";
include ('includes/header.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $argin['formtype']!='miscs') {
    $fileDefinitions=array();
    $fileDefinitions[]=array(
        'formname' => 'FILE_theme',
        'target' => sprintf('sponsors/%s.png',$_POST['code']),
        'width' => 300,
        'height' => 100
    );
    UploadFileFFVPNG($fileDefinitions);
}
?>

<h2>友情链接</h2>

<div id="link_form_container" class="popup"></div>

<h3>战略合作媒体</h3>
<div id="links_list"></div>

<script>
$(document).ready( function () {
    $(".menu_links").addClass("selected");
});

var LinksData;

$(document).ready( function () {
    apiCall(
        'LinksGet',
        {},
        function (data) {
            LinksData=data;
            console.log(data);

            //Category
            var table=$("<table></table>")
                .addClass("table")
                .addClass("table-hover")
                .appendTo("#links_list");
            var thead_tr=$("<tr></tr>").appendTo($("<thead></thead>").appendTo(table));
            var heads=['类型', '链接'];
            $.each(heads, function (i,value) {
                thead_tr.append($("<th></th>").text(value));
            });

            var tbody=$("<tbody></tbody>").appendTo(table);
            
            $.each(LinksData.links, function (i,value) {
                var tr=$("<tr></tr>").appendTo(tbody).click({id:i},popupSlides);
                $("<td></td>").text(value.type).appendTo(tr);
                $("<td></td>").text(value.href).appendTo(tr);
            });

            $("#links_list").append($("<button></button>").text("添加项目").addClass("btn btn-success").click(createLinks));
        });
});


function popupSlides(event) {
    var formDesign = {
        formAttr: {id:"link_form", method:"POST", enctype:"multipart/form-data"},
        formItems: [
            {type: "input-hidden", name: "formtype", attr: {"readonly":true, "value":"links"}},
            {type: "input-hidden", name: "id", attr: {"readonly":true}},
            {type: "input-hidden", name: "code", attr: {"readonly":true}},

            {type: "select", name: "type", caption: "类型", options: [
                {caption: "战略合作媒体", attr: {value:1} },
                {caption: "战略支持", attr: {value:2} },
                {caption: "执行机构", attr: {value:3} },
                {caption: "合作伙伴", attr: {value:4} },
            ]},
           
            {type: "input-text", name: "href", caption:"链接"},
            {type: "img", name: "img_theme", caption: "主题图 300*100", attr:{src: contents_folder+LinksData.links[event.data.id].src}},
            
            {type: "input-file", name: "FILE_theme", caption:"主题图替换:", attr:{accept:"image/*"}},
            {type: "button", option: {'caption': "提交"}}
            ],
        };
    
    $("#link_form_container")
        .html(createForm_bootstrap(formDesign))
        .prepend("<h3>幻灯片</h3>")
        .bPopup({follow: [false,false]});
    
    $("#link_form").append(
    $("<div></div>", {'class': 'form-group'}).append(
    $("<div></div>", {'class': 'col-sm-10 col-sm-offset-2'}).append(
    $("<button></button>").text("删除本项").addClass("btn btn-danger form-control").click({id:LinksData.links[event.data.id].id},deleteLink)
    )));
     formData($("#link_form"), LinksData.links[event.data.id] )
}

function deleteLink(event) {
    event.stopPropagation();
    event.preventDefault();
    if(confirm("你确定要删除这个条目么？")) {
        apiCall(
            'LinksCD',
            {remove:event.data.id},
            function () {
                window.location.assign(window.location.href);
            }
        );
    };
}


function createLinks() {
    apiCall(
        'LinksCD',
        {create:new Date().getTime()},
        function () {
            window.location.assign(window.location.href);
        }
    );
}

</script>


<?php include ('includes/footer.php'); ?>

