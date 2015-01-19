<link rel="stylesheet" href="./css/cishan.css" />
<style type="text/css">
.profilePane .name{
	font-size: 16px;
	color: #053e8d;
	padding: 5px;
}
.profilePane .value{
	font-size: 16px;
	color: grey;
	padding: 5px;
}
a:hover{
	cursor:pointer;
}
</style>
<script type="text/javascript" src="./js/city.js"></script>
<script type="text/javascript" src="./js/jquery-user.js"></script>
<script type="text/javascript">
	/* datepicker by qiangrw */
	$(function() {
		var c1=false,c2=false,c3=false;
		c1=<?php
			echo $_GET['status1'];
		?>;
		c2=<?php
			echo $_GET['status2'];
		?>;
		c3=<?php
			echo $_GET['status3'];
		?>;

		if (!c1)
			$("#assist_info").hide();
		if (!c2)
			$("#volunteer_info").hide();
		if (!c3)
			$("#history_info").hide();
		
		$("#help1").click(function (){
			if (!c1){
				$("#assist_info").show();
				c1=true;
			}
			else{
				$("#assist_info").hide();
				c1=false;
			}
		})
		$("#help2").click(function (){
			if (!c2){
				$("#volunteer_info").show();
				c2=true;
			}
			else{
				$("#volunteer_info").hide();
				c2=false;
			}
		})
		$("#help3").click(function (){
			if (!c3){
				$("#history_info").show();
				c3=true;
			}
			else{
				$("#history_info").hide();
				c3=false;
			}
		})
		
	});
</script>


<div id="help1">
	<a name="propose_assist_info">如何发布求助信息</a> 
</div>
<div id="assist_info" class="contentMiddle">
	用户在导航点击“求助”后即可看到需要填写的基本信息。其中项目信息需要求助人如实填写求助基本情况，所需求助类型、求助资源需求、求助图片等，求助人信息需要填写微博发布人的个人信息、求助帐户等，此部分信息将作为核实信息留存并不对外公布。用户将信息如实填写后即可发布。
</div>
<br/>
<div  id="help2">
	<a name="volunteer">如何成为公益志愿者</a> 
</div>
<div id="volunteer_info" class="contentMiddle">
	用户进入项目详情页面，选择申请志愿者选项卡，填写姓名、联系方式等信息。此部分信息将作为核实信息留存并不对外公布。通过项目发起人审核后即可发布志愿者反馈。
</div>
<br/>
<div  id="help3">
	<a name="history">我的捐赠记录那里可以查到</a> 
</div>
<div id="history_info" class="contentMiddle">
	用户在导航点击“我的公益”后进入捐赠、支持、发起的项目页面，其中捐助过的项目里可以看到捐款明细。
</div>




