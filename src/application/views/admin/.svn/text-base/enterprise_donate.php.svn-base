<script type="text/javascript" src="./js/jquery-enterprise.js"></script>
<form class="form-horizontal" action="index.php/admin/submit_insert_enterprise_donate" method="POST">
<div class="control-group">
    <label class="control-label" for="enterprise_name">企业名称</label>
    <div class="controls">
        <input type="text" id="enterprise_name" name="enterprise_name" autofocus="autofocus" />
        <label class="help-inline" id="en_tip"></label>
        <label class="help-inline" id="en_err_msg"></label>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="project_id">项目ID</label>
    <div class="controls">
        <input class="donate_info" id="pid" type="text" name="project_id" />
        <label class="help-inline" id="project_tip"></label>
        <label class="help-inline" id="project_msg"></label>
    </div>
   
</div>
<div class="control-group">
    <label class="control-label" for="money">金额</label>
    <div class="controls">
        <input type="text" id="money"  name="money" />
        <label class="help-inline" id="money_tip"></label>
        <label class="help-inline" id="money_err_msg"></label>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="phone">联系电话</label>
    <div class="controls">
        <input type="text" id="phone" name="phone" />
        <label class="help-inline" id="phone_tip"></label>
        <label class="help-inline" id="phone_err_msg"></label>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="method">捐款方式</label>
    <div class="controls">
        <label class="radio">
            <input type="radio" id="check" name="method" value="2" checked />支票
        </label>
        <label class="radio">
            <input type="radio" id="bill" name="method" value="1" />转账
        </label>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="number">转账单号/支票号</label>
    <div class="controls">
        <input type="text" id="transfer_no"  name="number" />
        <label class="help-inline" id="tn_tip"></label>
        <label class="help-inline" id="tn_err_msg"></label>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="confirm_number">确认转账单号/支票号</label>
    <div class="controls">
        <input type="text" id="confirm_transfer_no"  name="confirm_number" />
        <label class="help-inline" id="ctn_tip"></label>
        <label class="help-inline" id="ctn_err_msg"></label>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="bank">所属银行</label>
    <div class="controls">
        <select name="bank" />
            <option value="ICBCBTB">中国工商银行(B2B)</option>
            <option value="ABCBTB">中国农业银行(B2B)</option>
            <option value="CCBBTB">中国建设银行(B2B)</option>
            <option value="SPDBBTB">上海浦东发展银行(B2B)</option>
            <option value="BOCB2C">中国银行</option>
            <option value="ICBCB2C">中国工商银行</option>
            <option value="CMB">招商银行</option>
            <option value="CCB">中国建设银行</option>
            <option value="ABC">中国农业银行</option>
            <option value="SPDB">上海浦东发展银行</option>
            <option value="CIB">兴业银行</option>
            <option value="GDB">广东发展银行</option>
            <option value="SDB">深圳发展银行</option>
            <option value="CMBC">中国民生银行</option>
            <option value="COMM">交通银行</option>
            <option value="CITIC">中信银行</option>
            <option value="HZCBB2C">杭州银行</option>
            <option value="CEBBANK">中国光大银行</option>
            <option value="SHBANK">上海银行</option>
            <option value="NBBANK">宁波银行</option>
            <option value="SPABANK">平安银行</option>
            <option value="BJRCB">北京农村商业银行</option>
            <option value="FDB">富滇银行</option>
            <option value="POSTGC">中国邮政储蓄银行</option>
            <option value="abc1003">visa</option>
            <option value="abc1004">master</option>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="bill_no">转账账号</label>
    <div class="controls">
        <input type="text" id="bill_no" name="bill_no" disabled />
        <label class="help-inline" id="bn_tip"></label>
        <label class="help-inline" id="bn_err_msg"></label>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="confirm_bill_no">确认转账账号</label>
    <div class="controls">
        <input type="text" id="confirm_bill_no" name="confirm_bill_no" disabled />
        <label class="help-inline" id="cbn_tip"></label>
        <label class="help-inline" id="cbn_err_msg"></label>
    </div>
</div>
<div class="control-group">
    <div class="controls">
        <p><?php echo $error_msg; ?></p>
    </div>
</div>
<div class="control-group">
    <div class="controls">
        <input type="submit" id="submit_donate" class="btn-primary" value="添加企业捐款" />
    </div>
</div>
</form>

