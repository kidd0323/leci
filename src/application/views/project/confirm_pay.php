<link rel="stylesheet" type="text/css" href="./css/pay.css"/>
<link rel="stylesheet" href="./css/cishan.css" />

<style type="text/css">
.onebank {
	width:200px;
	display:inline-block;
}
.company {
	color: black;
	background: #D2EEF7;
	display: inline-block;
	height: 40px;
	width: 15px;
	vertical-align: -4.5px;
	border: 1px solid #DDD;
	margin-left: -1px;
	padding: 1px 0 0 3px;
	vertical-align: -3px	9;
	border-left: none;
	cursor: pointer;
	border-image: initial;
}
</style>

<div class="row-fluid">
	<div class="legend"><span>捐款项目:<?php echo $project->title; ?></span></div>
	<div class="contentMiddle">
		<fieldset>
			<p>您捐助的￥<?php echo ($money/100);?>元将直接支付给<?php echo $parent_fund;?>(<?php echo $oname;?>)
			</p>
		</fieldset>
		<form id="bankForm" method="post" action="index.php/project/submit_donate" class="form-horizontal">
			<input type="hidden" name="pid" value="<?php echo $pid;?>" />
			<input type="hidden" name="money" value="<?php echo ($money/100);?>" />
			<input type="hidden" name="anonymous" value="<?php echo $anonymous;?>" />
			<input type="hidden" name="invoice_id" value="<?php echo $invoice_id;?>" />
			<input type="hidden" name="bankName" value="<?php echo $bankName;?>" />
			<input type="hidden" name="phone" value="<?php echo $phone;?>">
			<input type="hidden" name="ip_address" value="127.0.0.1">
			<input type="hidden" name="name" value="<?php echo $name;?>">
			<div class="controls">
				<p>支付金额:<?php echo ($money/100);?>元</p>
			</div>
			<div class="controls">
				<p>付款方式:<span title="<?php echo $bankName;?>" class="bankicon <?php echo ($bankName);?>"><?php echo $bankName?></span></p>
			</div>
			<hr />
			<div class="form-actions">
				<input class="btn btn-success" type="submit" id="nextStep" value="去付款" />
				<span><a href="javascript:history.back(-1)">重新选择支付方式</a></span>
			</div>
		</form>
	</div>
</div>
