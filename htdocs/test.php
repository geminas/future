<html>
<head>
    <title>用mouseover事件和mouseout事件时间做下拉菜单</title>
    <style type="text/css">
        #sumlist{
            float: left;
            margin-top:100px;
            margin-left:200px;
            width: 160px;
            background-color: #f46317;
            list-style-type: none;
        }
        .ul{
            float: left;
            margin-left: -40px;
            width: 200px;
            height:30px;
            line-height: 30px;
            text-indent: 20px;
            background-color: orange;
        }
        .ul:hover{
            background-color: #f46317;
        }
        .li{
            display: none;
            margin-top: -30px;
            width: 160px;
            margin-left: -40px;
        }
        .li li{
            float: left;
            margin-left:200px;
            width: 200px;
            height:30px;
            background-color: #dbdbdb;
            list-style-type: none;
        }
        .li li:hover{
            background-color: #f4a561;
        }
    </style>
</head>
<body>
<ul id='sumlist'>
    <li onmouseover="openlist(0)" class="ul" onmouseout="closelist(0)">
        <label>菜单</label>
        <ul class="li">
            <li>新建</li>
            <li>打开</li>
            <li>保存</li>
            <li>另存为</li>
        </ul>
    </li>
    <li onmouseover="openlist(1)" class="ul" onmouseout="closelist(1)">
        <label>编辑</label>
        <ul class="li">
            <li>复制</li>
            <li>删除</li>
            <li>剪切</li>
            <li>粘贴</li>
            <li>撤销</li>
        </ul>
    </li>
    <li onmouseover="openlist(2)" class="ul" onmouseout="closelist(2)">
        <label>查看</label>
        <ul class="li" >
            <li>状态栏</li>
            <li>超大图标</li>
            <li>详细信息</li>
            <li>平铺</li>
            <li>刷新</li>
        </ul>
    </li>
    <li onmouseover="openlist(3)" class="ul" onmouseout="closelist(3)">
        <label>帮助</label>
        <ul class="li" >
            <li>查看帮助</li>
            <li>关于***</li>
            <li>这***合法吗 </li>
        </ul>
    </li>
    <li onmouseover="openlist(4)" class="ul" onmouseout="closelist(4)">
        <label>工具</label>
        <ul class="li" >
            <li>打开同步中心</li>
            <li>文件夹选项</li>
        </ul>
    </li>
</ul>
<script type="text/javascript">
    //为了节省代码暂时把通过class获得对象弄成一个方法
    function $(eve){
        return document.getElementsByClassName(eve);
    }
    var t=null;
    //打开下拉菜单
    function openlist(i){
        var objdiv=$("li");
        objdiv[i].style.display="block";
    }
    //关闭下拉菜单
    function closelist(i){
        var objdiv=$("li");
        objdiv[i].style.display="none";
    }
</script>
</body>
</html>