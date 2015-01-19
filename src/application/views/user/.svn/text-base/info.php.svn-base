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
</style>
<script type="text/javascript" src="./js/city.js"></script>
<script type="text/javascript" src="./js/jquery-user.js"></script>
<script type="text/javascript">	
	$(function(){
		$('#province').bind('change',provinceChange);
		$('#city').bind('change',cityChange);
		
		<?php if( $detail_info->province != 0) : ?>
		//地区信息获取
		var province = '<?php echo $detail_info->province_name; ?>';
		var city = '<?php echo $detail_info->city_name; ?>';
		$('#province').val('<?php echo $detail_info->province; ?>');
		
		var cityJson = findChildren(cnProvincialData, province);
		var cityString = '';
		for (var i = 0; i < cityJson.length; ++i) {
			for (var item in cityJson[i]) {
				cityString += '<option value="' + (i+1) + '" >' + item + '</option>';
			}
		}
		
		$('#city').html(cityString).val('<?php echo $detail_info->city; ?>').bind('change',cityChange);
		
		var districtJson = findChildren(cityJson, city);
		var districtString = '';
		for (var k = 0; k < districtJson.length; ++k) {
			districtString += '<option value="' + (k+1) + '" >' + districtJson[k] + '</option>';
		}
		$('#district').html(districtString).val('<?php echo $detail_info->district; ?>');
		<?php endif; ?>
		
		
		
	});

	
</script>
<div class="subnav">
  <ul class="nav nav-pills rightColumn">
	<li class="active"><a href="<?php echo site_url("user/info"); ?>">用户资料</a></li>
	<li><a href="<?php echo site_url("user/change_password"); ?>">修改密码</a></li>
  </ul>
</div>

<div class="legend"><span>基本资料</span></div>
<div class="contentMiddle">
<div class="row-fluid">
<div class="span2 columns">
	<a class="thumbnail" href="<?php echo site_url("user/upload_photo"); ?>" alt="修改用户头像" title="修改用户头像">
		<img src="./uploads/user/<?php echo $detail_info->photo."?rand=".time(); ?>" width="150" height="150" alt="修改头像" />
	</a>
</div>
<div class="span10 columns profilePane">
		<br /><br />
		<span class="name">昵称:</span>
		<span class="value">
			<?php echo $user_info->nickname; ?>
		</span>
		<br />
		<span class="name">邮箱:</span>
		<span class="value">
		<?php echo $user_info->email; ?>
		</span>
		<br />
</div>
</div>
</div>

<br />
<?php if($detail_info != NULL): ?>
<div  class="form-horizontal">
<div class="legend"><span>联系人资料</span></div>
<div class="contentMiddle">
<fieldset>
<br />

<div class="control-group">
	<label class="control-label">真实姓名:</label>
	<div class="controls">
	<input id="realName" type="text" name="c_realname" value="<?php echo $detail_info->realname; ?>" /> 
	<span id="spnRealname" class="spnInit"></span>
	</div>
</div>
<div class="control-group">
	<label class="control-label">联系方式:</label>
	<div class="controls">
	<input id="Tel" type="text" name="c_phone" value="<?php echo $detail_info->phone; ?>" />
	<span id="spnTel" class="spnInit"></span>
	</div>
</div>
<div class="control-group">
	<label class="control-label">身份证号:</label>
	<div class="controls">
	<input id="identityCard" type="text" name="c_idcard" value="<?php echo $detail_info->idcard; ?>" />	
	<span id="spnIdentitycard" class="spnInit"></span>
	</div>
</div>
<div class="control-group">
	<label class="control-label">地址:</label>
	<div class="controls">
	
	
	<select id="province" class="span2" name="c_province" value="0">
	<?php if ($detail_info->province == 0): ?>
		<option value="0">请选择省</option>
	<?php endif; ?>
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
	
	<select id="city" class="span2" name="c_city" />
		<option value="0">请选择市</option>
	</select>
	<select id="district" class="span2" name="c_district"/>
		<option value="0">请选择地区</option><span id="spnRegion class="spnInit"></span>
	</select>
	</div>
</div>
<input id="get_uid" type="hidden" name="uid" value="<?php echo $user_info->uid; ?>" />
<div class="form-actions">
	<button id="submit_info_button" class="btn btn-success" type="submit" name="submit" value="修改资料">修改资料</button>
</div>
</fieldset>
</div>
</div>
<?php endif; ?>
