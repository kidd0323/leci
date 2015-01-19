
<script type="text/javascript">
	//日期选择器
    function HS_DateAdd(interval,number,date){
    number = parseInt(number);
    if (typeof(date)=="string"){var date = new Date(date.split("-")[0],date.split("-")[1],date.split("-")[2])}
    if (typeof(date)=="object"){var date = date}
    switch(interval){
    case "y":return new Date(date.getFullYear()+number,date.getMonth(),date.getDate()); break;
    case "m":return new Date(date.getFullYear(),date.getMonth()+number,checkDate(date.getFullYear(),date.getMonth()+number,date.getDate())); break;
    case "d":return new Date(date.getFullYear(),date.getMonth(),date.getDate()+number); break;
    case "w":return new Date(date.getFullYear(),date.getMonth(),7*number+date.getDate()); break;
    }
    }
    function checkDate(year,month,date){
    var enddate = ["31","28","31","30","31","30","31","31","30","31","30","31"];
    var returnDate = "";
    if (year%4==0){enddate[1]="29"}
    if (date>enddate[month]){returnDate = enddate[month]}else{returnDate = date}
    return returnDate;
    }
    function WeekDay(date){
    var theDate;
    if (typeof(date)=="string"){theDate = new Date(date.split("-")[0],date.split("-")[1],date.split("-")[2]);}
    if (typeof(date)=="object"){theDate = date}
    return theDate.getDay();
    }
    function HS_calender(){
    var lis = "";
    var style = "";
    style +="<style type='text/css'>";
    style +=".calender { width:170px; height:auto; font-size:12px; margin-right:14px; background:url(calenderbg.gif) no-repeat right center #fff; border:1px solid #397EAE; padding:1px}";
    style +=".calender ul {list-style-type:none; margin:0; padding:0;}";
    style +=".calender .day { background-color:#EDF5FF; height:20px;}";
    style +=".calender .day li,.calender .date li{ float:left; width:14%; height:20px; line-height:20px; text-align:center}";
    style +=".calender li a { text-decoration:none; font-family:Tahoma; font-size:11px; color:#333}";
    style +=".calender li a:hover { color:#f30; text-decoration:underline}";
    style +=".calender li a.hasArticle {font-weight:bold; color:#f60 !important}";
    style +=".lastMonthDate, .nextMonthDate {color:#bbb;font-size:11px}";
    style +=".selectThisYear a, .selectThisMonth a{text-decoration:none; margin:0 2px; color:#000; font-weight:bold}";
    style +=".calender .LastMonth, .calender .NextMonth{ text-decoration:none; color:#000; font-size:18px; font-weight:bold; line-height:16px;}";
    style +=".calender .LastMonth { float:left;}";
    style +=".calender .NextMonth { float:right;}";
    style +=".calenderBody {clear:both}";
    style +=".calenderTitle {text-align:center;height:20px; line-height:20px; clear:both}";
    style +=".today { background-color:#ffffaa;border:1px solid #f60; padding:2px}";
    style +=".today a { color:#f30; }";
    style +=".calenderBottom {clear:both; border-top:1px solid #ddd; padding: 3px 0; text-align:left}";
    style +=".calenderBottom a {text-decoration:none; margin:2px !important; font-weight:bold; color:#000}";
    style +=".calenderBottom a.closeCalender{float:right}";
    style +=".closeCalenderBox {float:right; border:1px solid #000; background:#fff; font-size:9px; width:11px; height:11px; line-height:11px; text-align:center;overflow:hidden; font-weight:normal !important}";
    style +="</style>";
    var now;
    if (typeof(arguments[0])=="string"){
    selectDate = arguments[0].split("-");
    var year = selectDate[0];
    var month = parseInt(selectDate[1])-1+"";
    var date = selectDate[2];
    now = new Date(year,month,date);
    }else if (typeof(arguments[0])=="object"){
    now = arguments[0];
    }
    var lastMonthEndDate = HS_DateAdd("d","-1",now.getFullYear()+"-"+now.getMonth()+"-01").getDate();
    var lastMonthDate = WeekDay(now.getFullYear()+"-"+now.getMonth()+"-01");
    var thisMonthLastDate = HS_DateAdd("d","-1",now.getFullYear()+"-"+(parseInt(now.getMonth())+1).toString()+"-01");
    var thisMonthEndDate = thisMonthLastDate.getDate();
    var thisMonthEndDay = thisMonthLastDate.getDay();

    var todayObj = new Date();
    today = todayObj.getFullYear()+"-"+todayObj.getMonth()+"-"+todayObj.getDate();
    for (i=0; i<lastMonthDate; i++){  // Last Month's Date
    lis = "<li class='lastMonthDate'>"+lastMonthEndDate+"</li>" + lis;
    lastMonthEndDate--;
    }
    for (i=1; i<=thisMonthEndDate; i++){ // Current Month's Date
    if(today == now.getFullYear()+"-"+now.getMonth()+"-"+i){
    var todayString = now.getFullYear()+"-"+(parseInt(now.getMonth())+1).toString()+"-"+i;
    lis += "<li><a href=javascript:void(0) class='today' onclick='_selectThisDay(this)' title='"+now.getFullYear()+"-"+(parseInt(now.getMonth())+1)+"-"+i+"'>"+i+"</a></li>";
    }else{
    lis += "<li><a href=javascript:void(0) onclick='_selectThisDay(this)' title='"+now.getFullYear()+"-"+(parseInt(now.getMonth())+1)+"-"+i+"'>"+i+"</a></li>";
    }
    }
    var j=1;
    for (i=thisMonthEndDay; i<6; i++){  // Next Month's Date
    lis += "<li class='nextMonthDate'>"+j+"</li>";
    j++;
    }
    lis += style;
    var CalenderTitle = "<a href='javascript:void(0)' class='NextMonth' onclick=HS_calender(HS_DateAdd('m',1,'"+now.getFullYear()+"-"+now.getMonth()+"-"+now.getDate()+"'),this) title='Next Month'>&raquo;</a>";
    CalenderTitle += "<a href='javascript:void(0)' class='LastMonth' onclick=HS_calender(HS_DateAdd('m',-1,'"+now.getFullYear()+"-"+now.getMonth()+"-"+now.getDate()+"'),this) title='Previous Month'>&laquo;</a>";
    CalenderTitle += "<span class='selectThisYear'><a href='javascript:void(0)' onclick='CalenderselectYear(this)' title='Click here to select other year' >"+now.getFullYear()+"</a></span>年<span class='selectThisMonth'><a href='javascript:void(0)' onclick='CalenderselectMonth(this)' title='Click here to select other month'>"+(parseInt(now.getMonth())+1).toString()+"</a></span>月";
    if (arguments.length>1){
    arguments[1].parentNode.parentNode.getElementsByTagName("ul")[1].innerHTML = lis;
    arguments[1].parentNode.innerHTML = CalenderTitle;
    }else{
    var CalenderBox = style+"<div class='calender'><div class='calenderTitle'>"+CalenderTitle+"</div><div class='calenderBody'><ul class='day'><li>日</li><li>一</li><li>二</li><li>三</li><li>四</li><li>五</li><li>六</li></ul><ul class='date' id='thisMonthDate'>"+lis+"</ul></div><div class='calenderBottom'><a href='javascript:void(0)' class='closeCalender' onclick='closeCalender(this)'>×</a><span><span><a href=javascript:void(0) onclick='_selectThisDay(this)' title='"+todayString+"'>今天</a></span></span></div></div>";
    return CalenderBox;
    }
    }
    function _selectThisDay(d){
    var boxObj = d.parentNode.parentNode.parentNode.parentNode.parentNode;
    boxObj.targetObj.value = d.title;
    boxObj.parentNode.removeChild(boxObj);
    }
    function closeCalender(d){
    var boxObj = d.parentNode.parentNode.parentNode;
    boxObj.parentNode.removeChild(boxObj);
    }
    function CalenderselectYear(obj){
    var opt = "";
    var thisYear = obj.innerHTML;
    for (i=1970; i<=2020; i++){
    if (i==thisYear){
    opt += "<option value="+i+" selected>"+i+"</option>";
    }else{
    opt += "<option value="+i+">"+i+"</option>";
    }
    }
    opt = "<select onblur='selectThisYear(this)' onchange='selectThisYear(this)' style='font-size:11px'>"+opt+"</select>";
    obj.parentNode.innerHTML = opt;
    }
    function selectThisYear(obj){
    HS_calender(obj.value+"-"+obj.parentNode.parentNode.getElementsByTagName("span")[1].getElementsByTagName("a")[0].innerHTML+"-1",obj.parentNode);
    }
    function CalenderselectMonth(obj){
    var opt = "";
    var thisMonth = obj.innerHTML;
    for (i=1; i<=12; i++){
    if (i==thisMonth){
    opt += "<option value="+i+" selected>"+i+"</option>";
    }else{
    opt += "<option value="+i+">"+i+"</option>";
    }
    }
    opt = "<select onblur='selectThisMonth(this)' onchange='selectThisMonth(this)' style='font-size:11px'>"+opt+"</select>";
    obj.parentNode.innerHTML = opt;
    }
    function selectThisMonth(obj){
    HS_calender(obj.parentNode.parentNode.getElementsByTagName("span")[0].getElementsByTagName("a")[0].innerHTML+"-"+obj.value+"-1",obj.parentNode);
    }
    function HS_setDate(inputObj){
    var calenderObj = document.createElement("span");
    calenderObj.innerHTML = HS_calender(new Date());
    calenderObj.style.position = "absolute";
    calenderObj.targetObj = inputObj;
    inputObj.parentNode.insertBefore(calenderObj,inputObj.nextSibling);
    }
</script>

<script>
$(function() {
    $('a.grouped_elements').fancybox({
        'transitionIn': 'none',
        'transitionOut':'none',
        'titlePosition':'over',
        'titleFormat' : function(title, currentArray, currentIndex, currentOpts){
            return '<span id="fancybox-title-over">Image' + (currentIndex + 1) + '/' + currentArray.length + ' ' + title + '</span>';
        }
    });
});
</script>
<script type="text/javascript" src="./js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="./js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="./js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

<style>
body {font-size:12px}
td {text-align:center}
h1 {font-size:26px;}
h4 {font-size:16px;}
em {color:#999; margin:0 10px; font-size:11px; display:block}
</style>

<form action="index.php/admin/submit_get_project_info" method="POST">
    <p>
        按时间
        开始日期：
        <input type="text" name="begin_date" onclick="HS_setDate(this)" />
        结束日期：
        <input type="text" name="end_date" onclick="HS_setDate(this)" />
    </p>
    <p>
        按分类：
        <select name="category">
            <option value="0">全部求助项目</option>
            <option value="1">儿童成长</option>
            <option value="2">支教助学</option>
            <option value="3">医疗救助</option>
            <option value="4">动物保护</option>
            <option value="5">环境保护</option>
            <option value="6">其他</option>
        </select>
    </p>
    <p>
        按项目名称：
        <input type="text" name="project_name" />
    </p>
    <p>
        按状态：
        <select name="status">
            <option value="0">全部状态</option>
            <option value="3">审核通过</option>
            <option value="5">审核未通过</option>
        </select>
    </p>
    <p>
        <input type="submit" class="btn" value="查询" />
    </p>
</form>

<p>
    <?php echo validation_errors(); ?>
</p>

<p>
    <a type="button" class="btn" href="index.php/admin/submit_clear_outofdate_project">清除过期项目</a>
</p>

<?php if ($project_info_list): ?>
<table class="table">
<tr>
    <td>项目发起人</td>
    <td>发起时间</td>
    <td>结束时间</td>
    <td>项目ID</td>
    <td>项目类型</td>
    <td>相关文件证明</td>
    <td>项目名称</td>
    <td>项目描述</td>
    <td>相关图片</td>
    <td>救助对象</td>
    <td>求助金额</td>
    <td>捐物地址</td>
    <td>志愿者人数</td>
    <td>审核状态</td>
    <td>操作</td>
</tr>

<?php $project_info_cnt = 1; ?>
<?php foreach($project_info_list as $row): ?>
<tr>
    <td><?php echo $row->nickname; ?></td>
    <td><?php echo $row->start_time; ?></td>
    <td><?php echo $row->end_time; ?></td>
    <td><?php echo $row->project_id; ?></td>
    <td><?php echo $row->type; ?></td>
    <td><a href="<?php echo $row->material; ?>">点此下载</a></td>
    <td><?php echo $row->project_name; ?></td>
    <td><?php echo $row->project_desc; ?></td>
    <td>
    <?php $i=1; ?>
    <?php foreach($row->image as $picture): ?>
        <a class="grouped_elements" rel="<?php echo $row->project_id ?>" title="<?php echo $row->project_name; ?>" href="<?php echo $picture; ?>">
        <img alt src="<?php echo $picture; ?>" height="20" width="50" <?php if($i>1) echo 'style="display:none"'; $i++;?>/>
        </a>
    <?php endforeach; ?>
    </td>
    <td><?php echo $row->assist_obj; ?></td>
    <td><?php echo $row->money; ?></td>
    <td><?php echo $row->address; ?></td>
    <td><?php echo $row->volunteer_num; ?></td>
    <td>
    <?php if ($row->status == 2): ?>未审核
    <?php elseif ($row->status == 3): ?>已通过
    <?php elseif ($row->status == 5):?>已拒绝
    <?php endif; ?>
    </td>
    <td>
        <a type="button" class="btn" href="index.php/admin/submit_audit_project/<?php echo $row->project_id; ?>/3">接受</a>
        <a type="button" class="btn" href="index.php/admin/submit_audit_project/<?php echo $row->project_id; ?>/5">拒绝</a>
    </td>
</tr>
<?php $project_info_cnt ++ ; ?>
<?php endforeach; ?>

</table>
<?php else: echo "对不起，没有满足条件的记录" ?>
<?php endif; ?>
