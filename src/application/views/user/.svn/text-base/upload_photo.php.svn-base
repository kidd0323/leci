<link rel="stylesheet" href="./css/cishan.css" />
<form name="photo" enctype="multipart/form-data" 
	  method="POST" action="<?php echo site_url("user/crop_photo"); ?>" class="form-horizontal">
<div class="legend"><span>修改用户头像</span></div>
<div class="contentMiddle">
<fieldset>
<br />
<script type="text/javascript">
	$(function(){
		$("#file").click(function(){
			$("#photo_hint").hide();
		})
	})
</script>
<div class="control-group">
	<label class="control-label" for="file">头像文件:</label>
	<div class="controls">
		<input type="file" name="file" id="file" />
		<!--<span class="help-inline">*添加小于2M的JPG或者PNG图片，最大宽度(高度)为1024px</span>-->
		<span id="photo_hint" class="help-inline">*添加小于2M的JPG或者PNG图片，最大宽度(高度)为1024px，图片最佳比例1:1</span>
	</div>
</div>
<div class="form-actions">
	<input type='submit' name="submit" value='确认上传' class="btn btn-success"/>
	<a name="submitCancel" class="btn" href="index.php/user/info">取消</a>
</div>
</fieldset>
</div>
</form>