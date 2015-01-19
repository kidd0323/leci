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
				$('#submitBtn').attr('disabled',false);
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
						window.location.href="index.php/user/info/"; 
					}
				}
			);
	});
});