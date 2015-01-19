<link rel="stylesheet" type="text/css" href="./css/pay.css"/>
<link rel="stylesheet" href="./css/cishan.css" />
<script type="text/javascript">
	$(function() {
		$('#selectOtherBank').click(function() {
			$('#moreBankPane').show();
			$('#nextStep').hide();
		});
		$('#cancelMoreBank').click(function(){
			$('#moreBankPane').hide();
			$('#nextStep').show();
		});
	});
</script>

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
#selectOtherBank:hover{
	cursor: pointer;
}
#moreBankPane {
	position: absolute;
	border: 1px solid black;
	width: 920px;
	margin: auto auto;
	top: 220px;
	border-image: initial;
}
</style>


<div class="row-fluid">
	<div class="legend"><span>捐款给"<?php echo $project->title; ?>"项目</span></div>
	<div class="contentMiddle">
	<fieldset>
	<p>
		您捐助的￥<?php echo ($money/100);?>元将直接支付给<?php echo $parent_fund;?>(<?php echo $oname;?>)
		<span><a href="javascript:history.back(-1)">重新选择捐助金额</a></span>
	</p>

	
	<form id="bankForm" method="post"  action="<?php echo site_url("project/confirm_pay"); ?>" class="form-inline">

	<input type="hidden" name="pid" value="<?php echo $pid;?>">
	<input type="hidden" name="money" value="<?php echo ($money/100);?>">
	<input type="hidden" name="anonymous" value="<?php echo $anonymous;?>">
	<input type="hidden" name="invoice_id" value="<?php echo $invoice_id;?>">
	<input type="hidden" name="phone" value="<?php echo $phone;?>">
	<input type="hidden" name="name" value="<?php echo $name;?>">

	<br />
	<p><b>选择付款的银行卡(需要开通网上银行)</b>
	<span style="float:right">由<a href="http://www.alipay.com" target="_blank">支付宝</a>提供支持</span>
	</p>
	<div class="onebank">
	<input id="ui_alipay" name="bankName" type="radio" value="zfbye" class="radio_inp2" checked="">
	<span class="bankicon Alipay" title="支付宝">支付宝</span>
	</div>

	<hr />
	<div class="onebank">
	<input id="ui_icbc" name="bankName" type="radio" banktitle="bankicon ICBC" value="icbc" class="radio_inp2">
	<span class="bankicon ICBC" title="中国工商银行">bankicon ICBC</span>
	</div>
	
	<div class="onebank">
	<input id="ui_cmb" class="CMB" name="bankName" type="radio" banktitle="bankicon CMB" value="cmb"></input>
	<span class="bankicon CMB" title="招商银行">CMB</span>
	
	</div><div class="onebank">
	<input id="ui_abc" name="bankName" type="radio" banktitle="bankicon ABC" value="abc" class="radio_inp2">
	<span class="bankicon ABC" title="中国农业银行">bankicon ABC</span>
	
	</div><div class="onebank">
	<input id="ui_ccb" name="bankName" type="radio" banktitle="bankicon CCB" value="ccb" class="radio_inp2">
	<span class="bankicon CCB" title="中国建设银行">bankicon CCB</span>
	</div>
	<br /><br />
	<div class="onebank">
	<input id="ui_boc" name="bankName" type="radio" banktitle="bankicon BOC" value="boc" class="radio_inp2">
	<span class="bankicon BOC" title="中国银行">bankicon BOC</span>
	</div><div class="onebank">
	<input id="ui_spdb" name="bankName" type="radio" banktitle="bankicon SPDB" value="spdb" class="radio_inp2">
	<span class="bankicon SPDB" title="浦发银行">bankicon SPDB</span>
	</div><div class="onebank">
	<input id="ui_bcom" name="bankName" type="radio" banktitle="bankicon COMM" value="bcom" class="radio_inp2">
	<span class="bankicon COMM" title="交通银行">bankicon COMM</span>
	</div><div class="onebank">
	<input id="ui_cmbc" name="bankName" type="radio" banktitle="bankicon CMBC" value="cmbc" class="radio_inp2">
	<span class="bankicon CMBC" title="中国民生银行">bankicon CMBC</span>
	</div>
	
	<br /><br />
	<div class="onebank">
	<input id="ui_sdb" name="bankName" type="radio" banktitle="bankicon SZDB" value="sdb" class="radio_inp2">
	<span class="bankicon SZDB" title="深圳发展银行">bankicon SZDB</span>
	</div><div class="onebank">
	<input id="ui_gdb" name="bankName" type="radio" banktitle="bankicon CGB" value="gdb" class="radio_inp2">
	<span class="bankicon CGB" title="广东发展银行">bankicon CGB</span>
	</div><div class="onebank">
	<input id="ui_citic" name="bankName" type="radio" banktitle="bankicon CITIC" value="citic" class="radio_inp2">
	<span class="bankicon CITIC" title="中信银行">bankicon CITIC</span>
	</div><div class="onebank">
	<input id="ui_cib" name="bankName" type="radio" banktitle="bankicon CIB" value="cib" class="radio_inp2">
	<span class="bankicon CIB" title="兴业银行">bankicon CIB</span>
	</div>
	
	<a id="selectOtherBank">其他银行»</a>
	<hr />

	
	<!-- 其他银行 -->
	<div id="moreBankPane" style="display:none">
	<div id="data" class="layer_bank contentMiddle">
		<div class="onebank">
		<input id="xui_ceb" node-type="bank" name="bankName" type="radio" title="中国光大银行" value="ceb" class="radio_inp2">
		<span class="bankicon CEB" title="中国光大银行">中国光大银行</span>
		</div><div class="onebank">
		<input id="xui_nbcb" node-type="bank" name="bankName" type="radio" title="宁波银行" value="nbcb" class="radio_inp2">
		<span class="bankicon NBB" title="宁波银行">宁波银行</span>
		</div><div class="onebank">
		<input id="xui_pab" node-type="bank" name="bankName" type="radio" title="平安银行" value="pab" class="radio_inp2">
		<span class="bankicon SPABANK" title="平安银行">平安银行</span>
		</div><div class="onebank">
		<input id="xui_shb" node-type="bank" name="bankName" type="radio" title="上海银行" value="shb" class="radio_inp2">
		<span class="bankicon SHB" title="上海银行">上海银行</span>
		</div>
		<br /><br />
		
		<div class="onebank">
		<input id="xui_bjrcb" node-type="bank" name="bankName" type="radio" title="北京农村商业银行" value="bjrcb" class="radio_inp2">
		<span class="bankicon BJRCB" title="北京农村商业银行">北京农村商业银行</span>
		</div><div class="onebank">
		<input id="xui_spdbb2b" node-type="bank" name="bankName" type="radio" title="浦发银行（企业银行）" value="spdbb2b" class="radio_inp2">
		<span class="bankicon SPDB" title="浦发银行（企业银行）">浦发银行（企业银行）</span>
		<span class="company">企业</span>
		</div><div class="onebank">
		<input id="xui_ccbbtb" node-type="bank" name="bankName" type="radio" title="中国建设银行（企业银行）" value="ccbbtb" class="radio_inp2">
		<span class="bankicon CCB" title="中国建设银行（企业银行）">中国建设银行（企业银行）</span>
		<span class="company">企业</span>
		</div><div class="onebank">
		<input id="xui_abcbtb" node-type="bank" name="bankName" type="radio" title="中国农业银行（企业银行）" value="abcbtb" class="radio_inp2">
		<span class="bankicon ABC" title="中国农业银行（企业银行）">中国农业银行（企业银行）</span>
		<span class="company">企业</span>
		</div>
		<br /><br />
		<div class="onebank">
		<input id="xui_icbcbtb" node-type="bank" name="bankName" type="radio" title="中国工商银行（企业银行）" value="icbcbtb" class="radio_inp2">
		<span class="bankicon ICBC" title="中国工商银行（企业银行）">中国工商银行（企业银行）</span>
		<span class="company">企业</span>
		</div>
		<br /><br />
		<input class="btn btn-success" type="submit" id="nextStep1" value="下一步" />
		<a id="cancelMoreBank" class="btn btn-inverse">取消</a>
	</div>
	</div>
	<div class="form-actions">
		<input class="btn btn-success" type="submit" id="nextStep" value="下一步" />
	</div>
	</form>
	</fieldset>
	</div>
</div>	<!-- end for row-fluid -->
