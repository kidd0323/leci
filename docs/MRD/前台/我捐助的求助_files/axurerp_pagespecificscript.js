
var PageName = '我捐助的求助';
var PageId = '5f10fa4b870d483b8e2d0b1b2b06e2a4'
var PageUrl = '我捐助的求助.html'
document.title = '我捐助的求助';
var PageNotes = 
{
"pageName":"我捐助的求助",
"showNotesNames":"False"}
var $OnLoadVariable = '';

var $NewVariable1 = '';

var $CSUM;

var hasQuery = false;
var query = window.location.hash.substring(1);
if (query.length > 0) hasQuery = true;
var vars = query.split("&");
for (var i = 0; i < vars.length; i++) {
    var pair = vars[i].split("=");
    if (pair[0].length > 0) eval("$" + pair[0] + " = decodeURIComponent(pair[1]);");
} 

if (hasQuery && $CSUM != 1) {
alert('Prototype Warning: The variable values were too long to pass to this page.\nIf you are using IE, using Firefox will support more data.');
}

function GetQuerystring() {
    return '#OnLoadVariable=' + encodeURIComponent($OnLoadVariable) + '&NewVariable1=' + encodeURIComponent($NewVariable1) + '&CSUM=1';
}

function PopulateVariables(value) {
    var d = new Date();
  value = value.replace(/\[\[OnLoadVariable\]\]/g, $OnLoadVariable);
  value = value.replace(/\[\[NewVariable1\]\]/g, $NewVariable1);
  value = value.replace(/\[\[PageName\]\]/g, PageName);
  value = value.replace(/\[\[GenDay\]\]/g, '26');
  value = value.replace(/\[\[GenMonth\]\]/g, '3');
  value = value.replace(/\[\[GenMonthName\]\]/g, '三月');
  value = value.replace(/\[\[GenDayOfWeek\]\]/g, '星期一');
  value = value.replace(/\[\[GenYear\]\]/g, '2012');
  value = value.replace(/\[\[Day\]\]/g, d.getDate());
  value = value.replace(/\[\[Month\]\]/g, d.getMonth() + 1);
  value = value.replace(/\[\[MonthName\]\]/g, GetMonthString(d.getMonth()));
  value = value.replace(/\[\[DayOfWeek\]\]/g, GetDayString(d.getDay()));
  value = value.replace(/\[\[Year\]\]/g, d.getFullYear());
  return value;
}

function OnLoad(e) {

}

var u21 = document.getElementById('u21');

var u86 = document.getElementById('u86');

var u51 = document.getElementById('u51');
gv_vAlignTable['u51'] = 'center';
var u102 = document.getElementById('u102');

var u25 = document.getElementById('u25');
gv_vAlignTable['u25'] = 'top';
var u16 = document.getElementById('u16');

var u55 = document.getElementById('u55');
gv_vAlignTable['u55'] = 'top';
var u46 = document.getElementById('u46');
gv_vAlignTable['u46'] = 'top';
var u76 = document.getElementById('u76');
gv_vAlignTable['u76'] = 'center';
var u31 = document.getElementById('u31');
gv_vAlignTable['u31'] = 'top';
var u77 = document.getElementById('u77');

u77.style.cursor = 'pointer';
if (bIE) u77.attachEvent("onclick", Clicku77);
else u77.addEventListener("click", Clicku77, true);
function Clicku77(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}
gv_vAlignTable['u77'] = 'top';
var u93 = document.getElementById('u93');
gv_vAlignTable['u93'] = 'top';
var u38 = document.getElementById('u38');
gv_vAlignTable['u38'] = 'center';
var u32 = document.getElementById('u32');

var u23 = document.getElementById('u23');
gv_vAlignTable['u23'] = 'top';
var u62 = document.getElementById('u62');
gv_vAlignTable['u62'] = 'center';
var u53 = document.getElementById('u53');
gv_vAlignTable['u53'] = 'center';
var u87 = document.getElementById('u87');
gv_vAlignTable['u87'] = 'center';
var u1 = document.getElementById('u1');
gv_vAlignTable['u1'] = 'center';
var u4 = document.getElementById('u4');

var u7 = document.getElementById('u7');
gv_vAlignTable['u7'] = 'center';
var u66 = document.getElementById('u66');

u66.style.cursor = 'pointer';
if (bIE) u66.attachEvent("onclick", Clicku66);
else u66.addEventListener("click", Clicku66, true);
function Clicku66(e)
{
windowEvent = e;


if (true) {

	self.location.href="我支持的求助.html" + GetQuerystring();

}

}
gv_vAlignTable['u66'] = 'top';
var u104 = document.getElementById('u104');

u104.style.cursor = 'pointer';
if (bIE) u104.attachEvent("onclick", Clicku104);
else u104.addEventListener("click", Clicku104, true);
function Clicku104(e)
{
windowEvent = e;


if (true) {

	NewWindow("我的公益中心.html" + GetQuerystring(), "", "directories=1, height=500, location=1, menubar=1, resizable=1, scrollbars=1, status=1, toolbar=1, width=500", true, 500, 500);

}

}
gv_vAlignTable['u104'] = 'top';
var u30 = document.getElementById('u30');
gv_vAlignTable['u30'] = 'top';
var u8 = document.getElementById('u8');

var u60 = document.getElementById('u60');

var u89 = document.getElementById('u89');
gv_vAlignTable['u89'] = 'center';
var u34 = document.getElementById('u34');

var u17 = document.getElementById('u17');
gv_vAlignTable['u17'] = 'center';
var u64 = document.getElementById('u64');
gv_vAlignTable['u64'] = 'center';
var u100 = document.getElementById('u100');
gv_vAlignTable['u100'] = 'top';
var u19 = document.getElementById('u19');
gv_vAlignTable['u19'] = 'center';
var u49 = document.getElementById('u49');
gv_vAlignTable['u49'] = 'top';
var u103 = document.getElementById('u103');
gv_vAlignTable['u103'] = 'center';
var u79 = document.getElementById('u79');

u79.style.cursor = 'pointer';
if (bIE) u79.attachEvent("onclick", Clicku79);
else u79.addEventListener("click", Clicku79, true);
function Clicku79(e)
{
windowEvent = e;


if (true) {

	self.location.href="公益项目.html" + GetQuerystring();

}

}
gv_vAlignTable['u79'] = 'top';
var u81 = document.getElementById('u81');

u81.style.cursor = 'pointer';
if (bIE) u81.attachEvent("onclick", Clicku81);
else u81.addEventListener("click", Clicku81, true);
function Clicku81(e)
{
windowEvent = e;


if (true) {

	self.location.href="发布求助信息.html" + GetQuerystring();

}

}

var u97 = document.getElementById('u97');

var u85 = document.getElementById('u85');

var u11 = document.getElementById('u11');
gv_vAlignTable['u11'] = 'center';
var u41 = document.getElementById('u41');
gv_vAlignTable['u41'] = 'top';
var u71 = document.getElementById('u71');
gv_vAlignTable['u71'] = 'center';
var u15 = document.getElementById('u15');
gv_vAlignTable['u15'] = 'center';
var u45 = document.getElementById('u45');
gv_vAlignTable['u45'] = 'center';
var u36 = document.getElementById('u36');

var u75 = document.getElementById('u75');

u75.style.cursor = 'pointer';
if (bIE) u75.attachEvent("onclick", Clicku75);
else u75.addEventListener("click", Clicku75, true);
function Clicku75(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}

var u58 = document.getElementById('u58');

var u37 = document.getElementById('u37');

var u2 = document.getElementById('u2');

u2.style.cursor = 'pointer';
if (bIE) u2.attachEvent("onclick", Clicku2);
else u2.addEventListener("click", Clicku2, true);
function Clicku2(e)
{
windowEvent = e;


if (true) {

}

}

var u92 = document.getElementById('u92');

u92.style.cursor = 'pointer';
if (bIE) u92.attachEvent("onclick", Clicku92);
else u92.addEventListener("click", Clicku92, true);
function Clicku92(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}
gv_vAlignTable['u92'] = 'top';
var u83 = document.getElementById('u83');

var u95 = document.getElementById('u95');

var u22 = document.getElementById('u22');
gv_vAlignTable['u22'] = 'center';
var u13 = document.getElementById('u13');
gv_vAlignTable['u13'] = 'center';
var u52 = document.getElementById('u52');

var u43 = document.getElementById('u43');
gv_vAlignTable['u43'] = 'center';
var u0 = document.getElementById('u0');

var u3 = document.getElementById('u3');
gv_vAlignTable['u3'] = 'center';
var u27 = document.getElementById('u27');
gv_vAlignTable['u27'] = 'center';
var u47 = document.getElementById('u47');

var u68 = document.getElementById('u68');
gv_vAlignTable['u68'] = 'center';
var u90 = document.getElementById('u90');

u90.style.cursor = 'pointer';
if (bIE) u90.attachEvent("onclick", Clicku90);
else u90.addEventListener("click", Clicku90, true);
function Clicku90(e)
{
windowEvent = e;


if (true) {

	self.location.href="我发起的求助.html" + GetQuerystring();

}

}
gv_vAlignTable['u90'] = 'top';
var u73 = document.getElementById('u73');
gv_vAlignTable['u73'] = 'center';
var u84 = document.getElementById('u84');
gv_vAlignTable['u84'] = 'center';
var u20 = document.getElementById('u20');

var u50 = document.getElementById('u50');

var u28 = document.getElementById('u28');

var u24 = document.getElementById('u24');
gv_vAlignTable['u24'] = 'top';
var u54 = document.getElementById('u54');
gv_vAlignTable['u54'] = 'top';
var u99 = document.getElementById('u99');
gv_vAlignTable['u99'] = 'top';
var u39 = document.getElementById('u39');
gv_vAlignTable['u39'] = 'top';
var u69 = document.getElementById('u69');
gv_vAlignTable['u69'] = 'top';
var u78 = document.getElementById('u78');

u78.style.cursor = 'pointer';
if (bIE) u78.attachEvent("onclick", Clicku78);
else u78.addEventListener("click", Clicku78, true);
function Clicku78(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}
gv_vAlignTable['u78'] = 'top';
var u94 = document.getElementById('u94');
gv_vAlignTable['u94'] = 'top';
var u6 = document.getElementById('u6');

var u96 = document.getElementById('u96');

var u61 = document.getElementById('u61');

var u91 = document.getElementById('u91');

u91.style.cursor = 'pointer';
if (bIE) u91.attachEvent("onclick", Clicku91);
else u91.addEventListener("click", Clicku91, true);
function Clicku91(e)
{
windowEvent = e;


if (true) {

	self.location.href="resources/reload.html#" + encodeURI(PageUrl + GetQuerystring());

}

}
gv_vAlignTable['u91'] = 'top';
var u35 = document.getElementById('u35');
gv_vAlignTable['u35'] = 'center';
var u26 = document.getElementById('u26');

var u65 = document.getElementById('u65');

u65.style.cursor = 'pointer';
if (bIE) u65.attachEvent("onclick", Clicku65);
else u65.addEventListener("click", Clicku65, true);
function Clicku65(e)
{
windowEvent = e;


if (true) {

	self.location.href="我发起的求助.html" + GetQuerystring();

}

}
gv_vAlignTable['u65'] = 'top';
var u56 = document.getElementById('u56');

var u82 = document.getElementById('u82');
gv_vAlignTable['u82'] = 'center';
var u5 = document.getElementById('u5');
gv_vAlignTable['u5'] = 'center';
var u12 = document.getElementById('u12');

var u9 = document.getElementById('u9');
gv_vAlignTable['u9'] = 'center';
var u42 = document.getElementById('u42');

var u33 = document.getElementById('u33');
gv_vAlignTable['u33'] = 'center';
var u72 = document.getElementById('u72');

var u63 = document.getElementById('u63');

var u18 = document.getElementById('u18');

var u48 = document.getElementById('u48');
gv_vAlignTable['u48'] = 'center';
var u67 = document.getElementById('u67');

var u88 = document.getElementById('u88');

var u57 = document.getElementById('u57');
gv_vAlignTable['u57'] = 'center';
var u101 = document.getElementById('u101');
gv_vAlignTable['u101'] = 'top';
var u10 = document.getElementById('u10');

var u40 = document.getElementById('u40');
gv_vAlignTable['u40'] = 'top';
var u70 = document.getElementById('u70');

var u14 = document.getElementById('u14');

var u44 = document.getElementById('u44');

var u74 = document.getElementById('u74');

u74.style.cursor = 'pointer';
if (bIE) u74.attachEvent("onclick", Clicku74);
else u74.addEventListener("click", Clicku74, true);
function Clicku74(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}
gv_vAlignTable['u74'] = 'top';
var u29 = document.getElementById('u29');
gv_vAlignTable['u29'] = 'center';
var u59 = document.getElementById('u59');
gv_vAlignTable['u59'] = 'center';
var u98 = document.getElementById('u98');
gv_vAlignTable['u98'] = 'center';
var u80 = document.getElementById('u80');

u80.style.cursor = 'pointer';
if (bIE) u80.attachEvent("onclick", Clicku80);
else u80.addEventListener("click", Clicku80, true);
function Clicku80(e)
{
windowEvent = e;


if (true) {

	self.location.href="resources/reload.html#" + encodeURI(PageUrl + GetQuerystring());

}

}

if (bIE) u80.attachEvent("onmouseover", MouseOveru80);
else u80.addEventListener("mouseover", MouseOveru80, true);
function MouseOveru80(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u80',e)) return;
if (true) {

	SetPanelVisibility('u85','','none',500);

}

}

if (bIE) u80.attachEvent("onmouseout", MouseOutu80);
else u80.addEventListener("mouseout", MouseOutu80, true);
function MouseOutu80(e)
{
windowEvent = e;

if (!IsTrueMouseOut('u80',e)) return;
if (true) {

	SetPanelVisibility('u85','hidden','none',500);

}

}
gv_vAlignTable['u80'] = 'top';
if (window.OnLoad) OnLoad();
