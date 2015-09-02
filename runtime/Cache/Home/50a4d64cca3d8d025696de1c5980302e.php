<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script type="text/javascript" src="http://h.yaolanimage.cn/assets/rev/lib/jquery-2.1.4.min.js"></script>

    
	<title>列表首页</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />

    
	<fisload:import name="static/style/new_common_2015.css"></fisload:import>

    
	<!--FIS整合css代码-->
	<!--[FIS_CSS_LINKS_HOOK]-->

    
	<fisload:import name="static/script/flexible.js?__inline" ></fisload:import>
	<fisload:import name="static/script/header_2015.js" ></fisload:import>
	<fisload:import name="static/script/display_login.js" ></fisload:import>

    <!--FIS整合js代码--><!--[FIS_JS_SCRIPT_HOOK]-->
    <!--统计代码-->
</head>
<body>
<!--统计代码-->


<div class="fake-body">
	<fisload:widget name="widget/common_header/common_header.html"></fisload:widget>

	<fisload:widget name="widget/header_ad/header_ad.html"></fisload:widget>

	<fisload:widget name="widget/list_big_search/list_big_search.html"></fisload:widget>

	<fisload:widget name="widget/struct_swipe_pic/struct_swipe_pic.html"></fisload:widget>

	<fisload:widget name="widget/struct_picleft/struct_picleft.html" title="测试标题"></fisload:widget>

	<fisload:widget name="widget/link_text_ad/link_text_ad_1.html"></fisload:widget>

	<fisload:widget name="widget/struct_information/struct_information.html"></fisload:widget>

	<fisload:widget name="widget/common_footer/common_footer.html"></fisload:widget>

</div>

<div class="bg-transparent"></div>
<div class="bg-black"></div>

<div class="common-box-user"></div>


<!-- 测试的用户的假数据 -->
<script type="text/javascript">
var login_userinfo = {username: "kkxkkx", userid: "52977198", birthdate: "2015-04-08", serverdate: "2015-08-13", userheadpic: "http://pic.service.yaolan.com/32/20150325/86/1427274546646_1_[model].jpg"};
var login_userinfo = {};
</script>
<!-- /测试的用户的假数据 -->



<!--统计代码-->
</body>
</html>