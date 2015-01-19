<link rel="stylesheet" href="./css/cishan.css" />
<script type="text/javascript" src="./js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="./js/ckeditor/adapters/jquery.js"></script>
<script language="javascript" type="text/javascript">	 
	 $(function() {
		 $('#Description').ckeditor(function(){},{skin : 'kama', toolbar : 'Basic', language : 'zh-cn', resize_maxWidth : 910});
	 })
</script>

<?php if($error_msg && $error_msg != ""): ?>
<div class="alert alert-error">
  <h4 class="alert-heading">错误!</h4>
  <?php echo $error_msg; ?>
</div>
<?php endif;?>

<form action="<?php echo site_url("project/submit_post_vfeedback/$pid"); ?>" method="POST" enctype="multipart/form-data"  class="form-horizontal">
	<div class="legend"><a href="<?php echo site_url("project/info/$pid"); ?>"><?php echo $project_info->title; ?></a> > 志愿者发布反馈</div>
	<div class="contentMiddle">
	<fieldset>
	<br />
	<label for="feedback_content">*进展:<span id="spnDes" class="spnInit"></span></label>
	<textarea class="span8" id="Description" name="fb_content"></textarea>
	<br />
	<br />
	<label for="pic">*相关图片（最多5张）:</label>
	<input id="file" type="file" name="fb_pic1" /> 
	<img id="img"  style="visibility:hidden" height="50px" width="50px" /><br /><br />
	
	<input id="file" type="file" name="fb_pic2" /> 
	<img id="img2"  style="visibility:hidden" height="50px" width="50px" /><br /><br />
	
	<input id="file" type="file" name="fb_pic3" /> 
	<img id="img3"  style="visibility:hidden" height="50px" width="50px" /><br /><br />
	
	<input id="file" type="file" name="fb_pic4" /> 
	<img id="img4"  style="visibility:hidden" height="50px" width="50px" /><br /><br />
	
	<input id="file" type="file" name="fb_pic5" /> 
	<img id="img5"  style="visibility:hidden" height="50px" width="50px" /><br /><br />
	
	<div class="form-actions">
		<input id="submit_button" class="btn btn-success" type="submit" value="发起进展" />
	</div>
	</fieldset>
	</div>
</form>
