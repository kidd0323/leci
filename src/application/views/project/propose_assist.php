<link rel="stylesheet" href="./css/cishan.css" />
<link type="text/css" href="./css/ui-lightness/jquery-ui-1.8.20.custom.css" rel="stylesheet" />

<script type="text/javascript" src="./js/city.js"></script>
<script type="text/javascript" src="./js/jquery-propose-assist.js"></script>
<script type="text/javascript" src="./js/jquery-ui-1.8.20.custom.min.js"></script>
<script type="text/javascript" src="js/datepicker_zh.js"></script>


<script language="javascript" type="text/javascript">
	 function cProvinceChange() {
		var province = $('#cProvince').find('option:selected').text();
		var cityJson = findChildren(cnProvincialData, province);
		var cityString = '';
		for (var i = 0; i < cityJson.length; ++i) {
			for (var item in cityJson[i]) {
				cityString += '<option value="' + (i+1) + '" >' + item + '</option>';
			}
		}
		$('#cCity').html(cityString).val(1);
		var city = $('#cCity').find('option:selected').text();
		var districtJson = findChildren(cityJson, city);
		var districtString = '';
		for (var k = 0; k < districtJson.length; ++k) {
			districtString += '<option value="' + (k+1) + '" >' + districtJson[k] + '</option>';
		}
		$('#cDistrict').html(districtString).val(1);
	}
	function cCityChange() {
		var province = $('#cProvince').find('option:selected').text();
		var cityJson = findChildren(cnProvincialData, province);
		var city = $('#cCity').find('option:selected').text();
		var districtJson = findChildren(cityJson, city);
		var districtString = '';
		for (var k = 0; k < districtJson.length; ++k) {
			districtString += '<option value="' + (k+1) + '" >' + districtJson[k] + '</option>';
		}
		$('#cDistrict').html(districtString).val(1);
	}

	$(function(){
			var date = new Date();
			date.setDate(date.getDate()+1);	// 明天
			var minDate = date.getFullYear() + "-" + (date.getMonth()+1) + "-" + date.getDate();
			$( "#finishDate" ).datepicker({
					dateFormat: "yy-mm-dd",
					inline: true,
					minDate:minDate
			});
		
			$('#province').bind('change',provinceChange);
			$('#city').bind('change',cityChange);
			
			$('#cProvince').bind('change',cProvinceChange);
			$('#cCity').bind('change',cCityChange);
			<?php if($detail_info): ?>
				var province = '<?php echo $detail_info->province_name; ?>';
				var city = '<?php echo $detail_info->city_name; ?>';
				$('#cProvince').val('<?php echo $detail_info->province; ?>');
				
				var cityJson = findChildren(cnProvincialData, province);
				var cityString = '';
				for (var i = 0; i < cityJson.length; ++i) {
					for (var item in cityJson[i]) {
						cityString += '<option value="' + (i+1) + '" >' + item + '</option>';
					}
				}
				$('#cCity').html(cityString).val('<?php echo $detail_info->city; ?>');
				
				var districtJson = findChildren(cityJson, city);
				var districtString = '';
				for (var k = 0; k < districtJson.length; ++k) {
					districtString += '<option value="' + (k+1) + '" >' + districtJson[k] + '</option>';
				}
				$('#cDistrict').html(districtString).val('<?php echo $detail_info->district; ?>');
			<?php endif; ?>
	});
</script>
<style>
body {font-size:12px}
td {text-align:center}
h1 {font-size:26px;}
h4 {font-size:16px;}
em {color:#999; margin:0 10px; font-size:11px; display:block}
</style>
<script type="text/javascript">  
	function test(){
		result=judge();
		return result;
	}
</script>



<fieldset class="control-group error">
<?php $errors = validation_errors(); ?>
<?php if($errors && $errors != ""): ?>
<div class="alert alert-error">
  <h4 class="alert-heading">错误!</h4>
  <?php echo $errors; ?>
</div>
<?php endif;?>
</fieldset>
<div class="legend"><span>发布求助</span></div>
<div class="contentMiddle">
<form action="<?php echo site_url("project/submit_propose_assist"); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal" onSubmit="return test();">
<fieldset>
<div class="control-group">
	<label class="control-label" for="title"><span style="color:red;">*</span>标题:</label>
	<div class="control">
		<select class="span2" name="cid">
			<option value="1">儿童成长</option>
			<option value="2">支教助学</option>
			<option value="3">医疗救助</option>
			<option value="4">动物保护</option>
			<option value="5">环境保护</option>
			<option value="6">其它</option>
		</select>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input class="span3" id="projectTitle" type="text" name="title"/>
		<span id="spnTitle" class="spnInit"></span>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="assist_object"><span style="color:red;">*</span>救助对象:</label>
	<div class="control">
		<input class="span5" id="assistName"type="text" name="assist_object"/>
		<span id="spnName" class="spnInit"></span>
	</div>
</div>


<div class="control-group">
	<label class="control-label" for="short_description"><span style="color:red;">*</span>简要描述（推荐语）:</label>
	<div class="control">
		<input class="span5" id="shortDes" type="text" name="short_description"></input>
		<span id="spnShortdes" class="spnInit"></span>
	</div>
</div>
	
<div class="control-group">	
	<label class="control-label" for="description"><span style="color:red;">*</span>项目介绍:</label>
	<div class="control">
		<textarea class="span5" id="Description" rows="10" class="input-xlarge" name="description"></textarea>
		<span id="spnDes" class="spnInit"></span>
	</div>
</div>
	
<div class="control-group">	
	<label class="control-label" for="application"><span style="color:red;">*</span>相关证明:</label>
	<div class="control">
		<input class="input-file" id="file" type="file" name="application_file"/> <br />
	</div>
</div>

<div class="control-group">	
	<label class="control-label" for="region"><span style="color:red;">*</span>所在地区:</label>
	<div class="control">
		<select class="span2" id="province" name="province">
			<option value="1">北京</option>
			<option value="2">天津</option>
			<option value="3">河北</option>
			<option value="4">山西</option>
			<option value="5">内蒙古</option>
			<option value="6">辽宁</option>
			<option value="7">吉林</option>
			<option value="8">黑龙江</option>
			<option value="9">上海</option>
			<option value="10">江苏</option>
			<option value="11">浙江</option>
			<option value="12">安徽</option>
			<option value="13">福建</option>
			<option value="14">江西</option>
			<option value="15">山东</option>
			<option value="16">河南</option>
			<option value="17">湖北</option>
			<option value="18">湖南</option>
			<option value="19">广东</option>
			<option value="20">广西</option>
			<option value="21">海南</option>
			<option value="22">重庆</option>
			<option value="23">四川</option>
			<option value="24">贵州</option>
			<option value="25">云南</option>
			<option value="26">西藏</option>
			<option value="27">陕西</option>
			<option value="28">甘肃</option>
			<option value="29">青海</option>
			<option value="30">宁夏</option>
			<option value="31">新疆</option>
		</select>
		<select  class="span2" id="city" name="city">
			<option value="1">北京</option>
		</select>
		<select  class="span2" id="district" name="district">
			<option value="1">东城区</option><option value="2">西城区</option><option value="3">崇文区</option><option value="4">宣武区</option><option value="5">朝阳区</option><option value="6">丰台区</option><option value="7">石景山区</option><option value="8">海淀区</option><option value="9">门头沟区</option><option value="10">房山区</option><option value="11">通州区</option><option value="12">顺义区</option><option value="13">昌平区</option><option value="14">大兴区</option><option value="15">怀柔区</option><option value="16">平谷区</option><option value="17">密云县</option><option value="18">延庆县</option>
		</select>
	</div>
</div>
<div class="control-group">	
	<label class="control-label" for="end_time"><span style="color:red;">*</span>结束时间:</label>
	<div class="control">
		<input  class="span5" id="finishDate" type="text" name="end_time"/>
		<span id="spnFinishtime" class="spnInit">(*请注意选择今天之后的日期)</span> <br />
	</div>
</div>
<hr />
<h3>相关图片(至少一张,最多五张)</h3>
<!--<div class="legend"><span>相关图片(至少一张,最多五张)</span></div>-->
<div class="control-group">
	<label class="control-label" for="pic1"><span style="color:red;">*</span>图片1:</label>
	<div class="control"><input id="file" class="input-file" type="file" name="pic1" />
	<img id="img"  style="visibility:hidden" height="50px" width="50px" /></div>
</div>
<div class="control-group">
	<label class="control-label" for="pic2">图片2:</label>
	<div class="control"><input id="file" class="input-file" type="file" name="pic2" />
	<img id="img2"  style="visibility:hidden" height="50px" width="50px" /></div>
</div>
<div class="control-group">
	<label class="control-label" for="pic3">图片3:</label>
	<div class="control"><input id="file" class="input-file" type="file" name="pic3" />
	<img id="img3"  style="visibility:hidden" height="50px" width="50px" />	</div>
</div>
<div class="control-group">
	<label class="control-label" for="pic4">图片4:</label>
	<div class="control"><input id="file" class="input-file" type="file" name="pic4" />
	<img id="img4"  style="visibility:hidden" height="50px" width="50px" /></div>
</div>
<div class="control-group">
	<label class="control-label" for="pic5">图片5:</label>
	<div class="control"><input id="file" class="input-file" type="file" name="pic5" />
	<img id="img5"  style="visibility:hidden" height="50px" width="50px" />	</div>
</div>
<hr />

<h3>求助类型（至少选择一项）</h3>
<!--<div class="legend"><span>求助类型（至少选择一项）</span></div>-->
<div class="control-group">	
	<div class="control">
		<label class="checkbox"><input id="myBox1" type="checkbox" name="donate" /><strong>捐款</strong></label>
	</div>
</div>
<div class="control-group">		
	<label class="control-label" for="target_money"><span style="color:red;">*</span>目标金额:</label>
	<div class="control">
		<input id="targetMoney" type="text" name="target_money" />	
		<span id="spnMoney" class="spnInit"></span>
	</div>
</div>
<div class="control-group">	
	<label class="control-label" for="bank_name"><span style="color:red;">*</span>开户银行:</label>
	<div class="control">
		<input id="bankName" type="text" name="bank_name" />
		<span id="spnBank" class="spnInit"></span>
	</div>
</div>
<div class="control-group">	
	<label class="control-label" for="account_id"><span style="color:red;">*</span>银行账号:</label>
	<div class="control">
		<input id="bankID" type="text" name="account_id" oncopy="return false;" oncut="return false;"/>
		<span id="spnBankid" class="spnInit"></span>
	</div>
</div>
<div class="control-group">	
	<label class="control-label" for="account_id"><span style="color:red;">*</span>银行账号再次输入:</label>
	<div class="control">
		<input id="bankID2" type="text" name="account_id2" onpaste="return false"/>
		<span id="spnBankid2" class="spnInit"></span>
	</div>
</div>

<div class="control-group">	
	<label class="control-label" for="account_name"><span style="color:red;">*</span>银行账号名:</label>
	<div class="control">
		<input id="bankIDName" type="text" name="account_name" />
		<span id="spnBankidname" class="spnInit"></span>
	</div>
</div>	


<div class="control-group">
	<div class="control">
		<label class="checkbox"><input id="myBox2" type="checkbox" name="item" /><strong>捐物</strong></label>
	</div>
</div>
<div class="control-group">	
	<label class="control-label" for="receiver"><span style="color:red;">*</span>收件人姓名:</label>
	<div class="control">
		<input id="Receiver" type="text" name="receiver" />
		<span id="spnReceiver" class="spnInit"></span>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="address"><span style="color:red;">*</span>收件人地址:</label>
	<div class="control">
		<input id="Address" type="text" name="address" />
		<span id="spnAddress" class="spnInit"></span>
	</div>
</div>	
<div class="control-group">	
	<label class="control-label" for="zip_code"><span style="color:red;">*</span>邮政编码:</label>
	<div class="control">
		<input id="postCode" type="text" name="zip_code" />
		<span id="spnPostcode" class="spnInit"></span>
	</div>
</div>
<div class="control-group">	
	<label class="control-label" for="phone"><span style="color:red;">*</span>联系电话:</label>
	<div class="control">
		<input id="Tel" type="text" name="phone" />
		<span id="spnTel" class="spnInit"></span>
	</div>
</div>	

<div class="control-group">
	<div class="control">
		<label class="checkbox"><input id="myBox3" type="checkbox" name="volunteer" /><strong>募集志愿者</strong></label>
	</div>
</div>	
<div class="control-group">	
	<label class="control-label" for="number"><span style="color:red;">*</span>募集人数:</label>
	<div class="control">
		<input id="volunteerNum" type="text" name="number" />
		<span id="spnVolunteernum" class="spnInit"></span>
	</div>
</div>


<!-- 和用户资料修改页面一致 -->
<h3>联系人信息</h3>
<!--<div class="legend"><span>联系人信息</span></div>-->
<?php if($detail_info): ?>
	<p>您在此页面的修改将同步修改您<a href="<?php echo site_url("user/info"); ?>" target="_blank">个人资料页面</a>的联系人信息!</p>
<?php else:?>
	<p>您尚未填写联系人资料，请如实填写.</p>
<?php endif;?>
<div class="control-group">	
	<label class="control-label" for="c_realname"><span style="color:red;">*</span>姓名:</label>
	<div class="control">
		<input id="realName" type="text" name="c_realname" <?php if($detail_info) echo 'value="'. $detail_info->realname .'"'; ?>/>
		<span id="spnRealname" class="spnInit"></span>
	</div>
</div>	
<div class="control-group">	
	<label class="control-label" for="c_phone"><span style="color:red;">*</span>手机:</label>
	<div class="control">
		<input id="cellPhone" type="text" name="c_phone" 
		<?php if($detail_info) echo 'value="'. $detail_info->phone .'"'; ?>/>
		<span id="spnCellphone" class="spnInit"></span>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="c_idcard"><span style="color:red;">*</span>身份证号:</label>
	<div class="control">
		<input id="identityCard" type="text" name="c_idcard" 
		<?php if($detail_info) echo 'value="'. $detail_info->idcard .'"'; ?>/>
		<span id="spnIdentitycard" class="spnInit"></span>
	</div>
</div>
<div class="control-group">	
	<label class="control-label" for="c_address"><span style="color:red;">*</span>联系地址:</label>
	<div class="control">
		<select id="cProvince" class="span2" name="c_province">
			<option value="1">北京</option>
			<option value="2">天津</option>
			<option value="3">河北</option>
			<option value="4">山西</option>
			<option value="5">内蒙古</option>
			<option value="6">辽宁</option>
			<option value="7">吉林</option>
			<option value="8">黑龙江</option>
			<option value="9">上海</option>
			<option value="10">江苏</option>
			<option value="11">浙江</option>
			<option value="12">安徽</option>
			<option value="13">福建</option>
			<option value="14">江西</option>
			<option value="15">山东</option>
			<option value="16">河南</option>
			<option value="17">湖北</option>
			<option value="18">湖南</option>
			<option value="19">广东</option>
			<option value="20">广西</option>
			<option value="21">海南</option>
			<option value="22">重庆</option>
			<option value="23">四川</option>
			<option value="24">贵州</option>
			<option value="25">云南</option>
			<option value="26">西藏</option>
			<option value="27">陕西</option>
			<option value="28">甘肃</option>
			<option value="29">青海</option>
			<option value="30">宁夏</option>
			<option value="31">新疆</option>
		</select>
		<select id="cCity" class="span2" name="c_city">
			<option value="1">北京</option>
		</select>
		<select id="cDistrict" class="span2" name="c_district">
			<option value="1">东城区</option><option value="2">西城区</option><option value="3">崇文区</option><option value="4">宣武区</option><option value="5">朝阳区</option><option value="6">丰台区</option><option value="7">石景山区</option><option value="8">海淀区</option><option value="9">门头沟区</option><option value="10">房山区</option><option value="11">通州区</option><option value="12">顺义区</option><option value="13">昌平区</option><option value="14">大兴区</option><option value="15">怀柔区</option><option value="16">平谷区</option><option value="17">密云县</option><option value="18">延庆县</option>
		</select>
	</div>
</div>
	
<div class="form-actions">
	<input id="submit_button" class="btn btn-success" type="submit" value="发布求助"/>
</div>
</fieldset>
</div>
</form>