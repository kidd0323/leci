$(document).ready(function(){
    //various variable for validation
    var enterprise_name_ok = false;
    var project_id_ok = false;
    var money_ok = false;
    var phone_num_ok = false;
    var transfer_no_ok = false;
    var confirm_transfer_no_ok = false;
    var choice = false;
    var bill_no_ok = false;
    var confirm_bill_no_ok = false;

    function chk_enterprise_name_ok() {
        enterprise_name_ok = false;
        var enterprise_name = $.trim($("#enterprise_name").val());
        // chinese is a must
        var pattern = /^[\u4e00-\u9fa5]+$/;
        
        //if enterprise_name is empty, return 0
        if (enterprise_name == ""){
            return 0;
        }
        // length limitation
        else if (enterprise_name.length < 2 || enterprise_name > 32){
            return -1;
        }

        return 1;
    }

    function chk_project_id_ok(){
        project_id_ok = false;
        var project_id = $.trim($("#pid").val());
        //positive integer pattern
        var pattern = /^[1-9]\d*$/;

        //if pid is empty, return 0
        if (project_id == ""){
            return 0;
        }
        else if (! pattern.test(project_id)){
            return -1;
        }
        else{
            return 1;
        }
    }

    function chk_money_ok(){
       money_ok = false;
       var money = $.trim($("#money").val());
       //two digit number
       var pattern = /^\d*(\.\d{1,2})?$/;

       //if money is empty
       if (money == ""){
           return 0;
       }
       else if (pattern.test(money)){
           money_ok = true;
           return 1;
       }

       return -1;
    }

    function chk_phone_num_ok(){
        phone_num_ok = false;
        var phone_num = $.trim($("#phone").val());
        //phone pattern
        var pattern = /^(13[1-9]|15[7-9]|15[0-2]|18[6-8])[0-9]{8}$/;

        //if phone number is empty
        if (phone_num == ""){
            return 0;
        }
        else if (pattern.test(phone_num)){
            phone_num_ok = true;
            return 1;
        }

        return -1;
    }
    
    function chk_transfer_no_ok(){
        transfer_no_ok = false;
        var transfer_no = $.trim($("#transfer_no").val());
        //transfer number pattern
        pattern = /^[\d\w]+$/;

        //if transfer_no is empty
        if (transfer_no == ""){
            return 0;
        }
        else if (pattern.test(transfer_no)){
            transfer_no_ok = true;
            return 1;
        }

        return -1;
    }

    function chk_confirm_transfer_no_ok(){
        confirm_transfer_no_ok = false;
        var transfer_no = $.trim($("#transfer_no").val());
        var confirm_transfer_no = $.trim($("#confirm_transfer_no").val());

        //if transfer_no is empty
        if (confirm_transfer_no == ""){
            return 0;
        }
        else if (transfer_no == ""){
            return -2;
        }
        else if (transfer_no == confirm_transfer_no){
            confirm_transfer_no_ok = true;
            return 1;
        }

        return -1;
    }

    function chk_bill_no_ok(){
        bill_no_ok = false;
        var bill_no = $.trim($("#bill_no").val());
        var confirm_bill_no = $.trim($("#confirm_bill_no").val());
        var method = $.trim($("input[name='method']:checked").val());
        //bill number pattern
        pattern = /^[0-9]{16,19}$/;

        if (method == 2){
            return -2;
        }
        else if (bill_no == ""){
            return 0;
        }
        else if (! pattern.test(bill_no))
        {
            return -1;
        }

        return 1;
    }

    function chk_confirm_bill_no_ok(){
        confirm_bill_no_ok = false;
        var bill_no = $.trim($("#bill_no").val());
        var confirm_bill_no = $.trim($("#confirm_bill_no").val());

        if (confirm_bill_no == ""){
            return 0;
        }
        else if (bill_no == ""){
            return -2;
        }
        else if (bill_no == confirm_bill_no){
            confirm_bill_no_ok = true;
            return 1;
        }

        return -1;
    }

    function chk_all_condition(){
        var indicate = enterprise_name_ok && project_id_ok && money_ok && phone_num_ok && transfer_no_ok && confirm_transfer_no_ok; 
        if (! choice){
            return indicate;
        }

        return indicate && bill_no_ok && confirm_bill_no_ok;
    }
    
    $("#enterprise_name").bind("focus", function(){
        var ret = chk_enterprise_name_ok();
        if (ret == 0){
            $("#en_tip").html("请输入企业名称").show();
            $("#en_err_msg").hide();
        }
        return false;
    });

    $('#enterprise_name').bind("blur", function(){
        var ret = chk_enterprise_name_ok();
        var e_name = $.trim($("#enterprise_name").val());

        if (ret == -1){
            $("#en_err_msg").html("企业名称长度必须在2~32之间").show();
            $("#en_tip").hide();
        }
        else if (ret == 0){
            $("#en_err_msg").hide();
            $("#en_tip").hide();
        }
        else{
            $.post(
                "index.php/admin/check_enterprise_name",
                {enterprise_name: e_name},
                function(data){
                    if (data == 0){
                        $("#en_err_msg").html("该用户不是企业用户，请管理员先进行审核").show();
                        $("#en_tip").hide();
                    }
                    else if (data == -1){
                        $("#en_err_msg").html("该用户名尚未注册!").show();
                        $("#en_tip").hide();
                    }
                    else{
                        $("#en_err_msg").hide();
                        $("#en_tip").hide();
                    }
                }
            );
        }

        return false;
    });

    $("#money").bind("focus", function(){
        var ret = chk_money_ok();
        if (ret == 0){
            $("#money_tip").html("请输入捐助金额,可精确到两位小数").show();
            $("#money_err_msg").hide();
        }

        return false;
    });

    $("#money").bind("blur", function(){
        var ret = chk_money_ok();
        if (ret == -1){
            $("#money_tip").hide();
            $("#money_err_msg").html("请输入合法的金额").show();
        }
        else{
            $("#money_tip").hide();
            $("#money_err_msg").hide();
        }

        return false;
    });

    $("#phone").bind("focus", function(){
        var ret = chk_phone_num_ok();
        if (ret == 0){
            $("#phone_tip").html("请输入手机号").show();
            $("#phone_err_msg").hide();
        }

        return false;
    });

    $("#phone").bind("blur", function(){
        var ret = chk_phone_num_ok();
        if (ret == -1){
            $("#phone_tip").hide();
            $("#phone_err_msg").html("请输入合法的手机号").show();
        }
        else{
            $("#phone_tip").hide();
            $("#phone_err_msg").hide();
        }
        
        return false;
    });

    $("#transfer_no").bind("focus", function(){
        var ret = chk_transfer_no_ok();
        if (ret == 0){
            $("#tn_tip").html("请输入转账单号或支票单号").show();
            $("#tn_err_msg").hide();
        }

        return false;
    });

    $("#transfer_no").bind("blur", function(){
        var ret = chk_transfer_no_ok();
        if (ret == -1){
            $("#tn_tip").hide();
            $("#tn_err_msg").html("请输入合法的转账单号或支票单号").show();
        }
        else{
            $("#tn_tip").hide();
            $("#tn_err_msg").hide();
        }

        return false;
    });

    $("#confirm_transfer_no").bind("focus", function(){
        var ret = chk_confirm_transfer_no_ok();
        if (ret == 0){
            $("#ctn_tip").html("请再次输入转账单号或支票单号").show();
            $("#ctn_err_msg").hide();
        }

        return false;
    });

    $("#confirm_transfer_no").bind("blur", function(){
        var ret = chk_confirm_transfer_no_ok();
        if (ret == -2){
            $("#ctn_tip").hide();
            $("#ctn_err_msg").html("请先输入转账单号").show();
        }
        else if (ret == -1){
            $("#ctn_tip").hide();
            $("#ctn_err_msg").html("两次输入不一致，请检查后重新输入").show();
        }
        else{
            $("#ctn_tip").hide();
            $("#ctn_err_msg").hide();
        }

        return false;
    });

    $("#bill_no").bind("focus", function(){
        var ret = chk_bill_no_ok();
        if (ret == 0){
            $("#bn_tip").html("请输入转账账号").show();
            $("#bn_err_msg").hide();
        }

        return false;
    });

    $("#bill_no").bind("blur", function(){
        var ret = chk_bill_no_ok();
        if (ret == -1){
            $("#bn_tip").hide();
            $("#bn_err_msg").html("请输入合法的转账账号").show();
        }
        else{
            $("#bn_tip").hide();
            $("#bn_err_msg").hide();
        }

        return false;
    });

    $("#confirm_bill_no").bind("focus", function(){
        var ret = chk_confirm_bill_no_ok();
        if (ret == 0){
            $("#cbn_tip").html("请再次输入转账账号").show();
            $("#cbn_err_msg").hide();
        }

        return false;
    });

    $("#confirm_bill_no").bind("blur", function(){
        var ret = chk_confirm_bill_no_ok();
        if (ret == -2){
            $("#cbn_tip").hide();
            $("#cbn_err_msg").html("请先输入转账账号").show();
        }
        else if (ret == -1){
            $("#cbn_tip").hide();
            $("#cbn_err_msg").html("两次输入不一致，请检查后重新输入").show();
        }
        else{
            $("#cbn_tip").hide();
            $("#cbn_err_msg").hide();
        }

        return false;
    });

    $("#pid").bind("focus", function(){
        var ret = chk_project_id_ok();
        if (ret == 0){
            $("#project_msg").hide();
            $("#project_tip").html("请输入项目ID").show();
        }
    });

    $("#pid").bind("blur", function(){
        project_id_ok = false;
        var ret = chk_project_id_ok();  
        var project_id = $.trim($("#pid").val());
        if (ret == -1){
            $("#project_tip").hide();
            $("#project_msg").html("请输入数字").show();
        }
        else if (ret == 0){
            $("#project_tip").hide();
            $("#project_msg").hide();
        }
        else{
            $.post(
                "index.php/admin/get_project_name_by_pid",            
                {pid: project_id},
                function(data){
                    if (data != "0"){
                        project_id_ok = true;
                        $("#project_tip").hide();
                        $("#project_msg").html("项目名称:" + data).show();
                    }
                    else{
                        $("#project_tip").hide();
                        $("#project_msg").html("该PID对应的项目不合法或该项目不包含捐款选项").show();
                    }
                }
            );
        }

        return false;
    });

    $("input[name='method']").bind("change", function(){
        var is_selected =$("input[name='method']:checked").val();
        if (is_selected == 2){
            choice = false;
            $("#bill_no").attr('disabled', 'true');
            $("#confirm_bill_no").attr('disabled', 'true');
            $("#bill_no").val("");
            $("#confirm_bill_no").val("");
        }                                   
        else{
            choice = true;
            $("#bill_no").removeAttr('disabled');
            $("#confirm_bill_no").removeAttr('disabled');
        }
    });
})
