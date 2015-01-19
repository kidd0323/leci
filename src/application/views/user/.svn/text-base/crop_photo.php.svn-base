<link type="text/css" href="css/imgareaselect-animated.css" rel="stylesheet" />
<link rel="stylesheet" href="./css/cishan.css" />

<script type="text/javascript" src="js/jquery.imgareaselect.min.js"></script>
<script type="text/javascript" src="js/jquery.imgareaselect.pack.js"></script>
<!--<script type="text/javascript" src="js/user_crop_photo.js"></script>-->
<script type="text/javascript">

$(function(){
	// edit by qiangrw
	$('#userPhoto').imgAreaSelect(
		{ 	maxWidth: 1024, 
			maxHeight: 1024, 
			minWidth:150,
			mimHeight:150,
			aspectRatio: '1:1',
			handles: true ,
			onSelectEnd: function (img, selection) {
				$('input[name=x1]').val(selection.x1);
				$('input[name=y1]').val(selection.y1);
				$('input[name=x2]').val(selection.x2);
				$('input[name=y2]').val(selection.y2);
				//$('#submitBtn').attr('disabled',false);
			}
		}
	);
	$('#submitBtn').bind('click', function(){
		$.post(
				"index.php/user/submit_crop_photo", {
					x1: $('#x1').val(), 
					x2: $('#x2').val(), 
					y1: $('#y1').val(), 
					y2: $('#y2').val(),
					full_path: $('#full_path').val(),
					photo: $('#photo').val()
				},
				function(data) {
					if (data <= 0) {
						alert("截取头像失败,请稍后再试");
					}
					else {
						window.location.href="<?php echo site_url("user/info"); ?>"; 
					}
				}
			);
	});
});
</script>

<div name="photo" class="form-horizontal">
<div class="legend"><span>截取用户头像</span></div>
<div class="contentMiddle">
<fieldset>
<p>请在大头像中拖动鼠标选取小头像</p>
<input type="hidden" id="x1" name="x1" value="" />
<input type="hidden" id="x2" name="x2" value="" />
<input type="hidden" id="y1" name="y1" value="" />
<input type="hidden" id="y2" name="y2" value="" />
<input type="hidden" id="full_path" name="full_path" value="<?php echo $full_path; ?>" />
<input type="hidden" id="photo" name="photo" value="<?php echo $pic; ?>" />

<div class="control-group">
	<img id="userPhoto" src="./uploads/user/<?php echo $pic."?rand=".time(); ?>" alt="" />
</div>
<div class="form-actions">
	<button id="submitBtn" type='submit' name="submit" value='确认' class="btn btn-success">确认截取</button>
</div>
</fieldset>
</div>
</div>