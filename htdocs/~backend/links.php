
<?php
$page_title="友情链接";
include ('includes/header.php');
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && $argin['formtype']!='links') {
//     $fileDefinitions=array(
//         array(
//             'formname' => 'FILE_slide',
//             'target' => 'revslider-'.$_POST['id'].'.jpg',
//             'width' => 1280,
//             'height' => 700
//         )
//     );
//     UploadFileFFV($fileDefinitions);
// }
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
            var heads=['序号','链接', '图片位置'];
            $.each(heads, function (i,value) {
                thead_tr.append($("<th></th>").text(value));
            });

            var tbody=$("<tbody></tbody>").appendTo(table);
            
            $.each(LinksData.links, function (i,value) {
                var tr=$("<tr></tr>").appendTo(tbody).click({id:i},popupSlides);
                $("<td></td>").text(value.id).appendTo(tr);
                $("<td></td>").text(value.href).appendTo(tr);
                $("<td></td>").text(value.src).appendTo(tr);
            });

            $("#links_list").append($("<button></button>").text("添加项目").addClass("btn btn-success").click(createNews));
        });
});


function popupSlides(event) {
    var formDesign = {
        formAttr: {id:"link_form", method:"POST", enctype:"multipart/form-data"},
        formItems: [
            {type: "input-hidden", name: "formtype", attr: {"readonly":true, "value":"links"}},
            {type: "input-hidden", name: "id", attr: {"readonly":true}},
           
            {type: "input-text", name: "href", caption:"链接"},
            {type: "input-text", name: "src", caption:"图片地址"},
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
    // $("<button></button>").text("删除本项").addClass("btn btn-danger form-control").click({id:HomepageData.slides[event.data.id].id},deleteLink)
    )));
     console.log(LinksData)
     console.log(event)
     formData($("#link_form"), LinksData.links[event.data.id] )
}

function deleteLink(event) {
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

