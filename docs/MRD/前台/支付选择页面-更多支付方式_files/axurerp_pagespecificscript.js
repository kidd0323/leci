
var PageName = '支付选择页面-更多支付方式';
var PageId = '7066cf3ed05b4590883079ab0a96ee09'
var PageUrl = '支付选择页面-更多支付方式.html'
document.title = '支付选择页面-更多支付方式';
var PageNotes = 
{
"pageName":"支付选择页面-更多支付方式",
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

var u102 = document.getElementById('u102');

var u25 = document.getElementById('u25');

var u16 = document.getElementById('u16');

var u55 = document.getElementById('u55');

var u46 = document.getElementById('u46');
gv_vAlignTable['u46'] = 'top';
var u76 = document.getElementById('u76');
gv_vAlignTable['u76'] = 'center';
var u31 = document.getElementById('u31');

var u77 = document.getElementById('u77');

var u93 = document.getElementById('u93');

u93.style.cursor = 'pointer';
if (bIE) u93.attachEvent("onclick", Clicku93);
else u93.addEventListener("click", Clicku93, true);
function Clicku93(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}
gv_vAlignTable['u93'] = 'top';
var u107 = document.getElementById('u107');

var u38 = document.getElementById('u38');
gv_vAlignTable['u38'] = 'top';
var u32 = document.getElementById('u32');
gv_vAlignTable['u32'] = 'center';
var u23 = document.getElementById('u23');

u23.style.cursor = 'pointer';
if (bIE) u23.attachEvent("onclick", Clicku23);
else u23.addEventListener("click", Clicku23, true);
function Clicku23(e)
{
windowEvent = e;


if (true) {

	self.location.href="javascript:history.back()";

}

}

var u62 = document.getElementById('u62');
gv_vAlignTable['u62'] = 'top';
var u53 = document.getElementById('u53');

var u87 = document.getElementById('u87');
gv_vAlignTable['u87'] = 'top';
var u1 = document.getElementById('u1');

var u27 = document.getElementById('u27');

var u7 = document.getElementById('u7');
gv_vAlignTable['u7'] = 'top';
var u66 = document.getElementById('u66');
gv_vAlignTable['u66'] = 'top';
var u112 = document.getElementById('u112');
gv_vAlignTable['u112'] = 'top';
var u115 = document.getElementById('u115');

var u104 = document.getElementById('u104');

var u30 = document.getElementById('u30');
gv_vAlignTable['u30'] = 'top';
var u8 = document.getElementById('u8');

var u60 = document.getElementById('u60');
gv_vAlignTable['u60'] = 'center';
var u89 = document.getElementById('u89');

var u34 = document.getElementById('u34');
gv_vAlignTable['u34'] = 'top';
var u17 = document.getElementById('u17');
gv_vAlignTable['u17'] = 'center';
var u64 = document.getElementById('u64');
gv_vAlignTable['u64'] = 'center';
var u100 = document.getElementById('u100');

u100.style.cursor = 'pointer';
if (bIE) u100.attachEvent("onclick", Clicku100);
else u100.addEventListener("click", Clicku100, true);
function Clicku100(e)
{
windowEvent = e;


if (true) {

	self.location.href="发布求助信息.html" + GetQuerystring();

}

}

var u19 = document.getElementById('u19');
gv_vAlignTable['u19'] = 'center';
var u49 = document.getElementById('u49');

var u103 = document.getElementById('u103');
gv_vAlignTable['u103'] = 'center';
var u79 = document.getElementById('u79');

var u81 = document.getElementById('u81');
gv_vAlignTable['u81'] = 'top';
var u97 = document.getElementById('u97');

u97.style.cursor = 'pointer';
if (bIE) u97.attachEvent("onclick", Clicku97);
else u97.addEventListener("click", Clicku97, true);
function Clicku97(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}
gv_vAlignTable['u97'] = 'top';
var u118 = document.getElementById('u118');
gv_vAlignTable['u118'] = 'top';
var u85 = document.getElementById('u85');

var u11 = document.getElementById('u11');

var u41 = document.getElementById('u41');

var u108 = document.getElementById('u108');
gv_vAlignTable['u108'] = 'center';
var u71 = document.getElementById('u71');

var u15 = document.getElementById('u15');
gv_vAlignTable['u15'] = 'center';
var u45 = document.getElementById('u45');

var u36 = document.getElementById('u36');
gv_vAlignTable['u36'] = 'center';
var u75 = document.getElementById('u75');

var u58 = document.getElementById('u58');
gv_vAlignTable['u58'] = 'top';
var u37 = document.getElementById('u37');

var u2 = document.getElementById('u2');

var u92 = document.getElementById('u92');
gv_vAlignTable['u92'] = 'center';
var u83 = document.getElementById('u83');

var u95 = document.getElementById('u95');
gv_vAlignTable['u95'] = 'center';
var u22 = document.getElementById('u22');
gv_vAlignTable['u22'] = 'top';
var u13 = document.getElementById('u13');
gv_vAlignTable['u13'] = 'center';
var u52 = document.getElementById('u52');
gv_vAlignTable['u52'] = 'center';
var u43 = document.getElementById('u43');

var u0 = document.getElementById('u0');
gv_vAlignTable['u0'] = 'top';
var u3 = document.getElementById('u3');
gv_vAlignTable['u3'] = 'center';
var u47 = document.getElementById('u47');

var u68 = document.getElementById('u68');
gv_vAlignTable['u68'] = 'center';
var u90 = document.getElementById('u90');
gv_vAlignTable['u90'] = 'center';
var u73 = document.getElementById('u73');

var u84 = document.getElementById('u84');
gv_vAlignTable['u84'] = 'center';
var u20 = document.getElementById('u20');

var u50 = document.getElementById('u50');
gv_vAlignTable['u50'] = 'top';
var u106 = document.getElementById('u106');
gv_vAlignTable['u106'] = 'center';
var u28 = document.getElementById('u28');
gv_vAlignTable['u28'] = 'center';
var u24 = document.getElementById('u24');
gv_vAlignTable['u24'] = 'center';
var u54 = document.getElementById('u54');
gv_vAlignTable['u54'] = 'top';
var u99 = document.getElementById('u99');

u99.style.cursor = 'pointer';
if (bIE) u99.attachEvent("onclick", Clicku99);
else u99.addEventListener("click", Clicku99, true);
function Clicku99(e)
{
windowEvent = e;


if (true) {

	self.location.href="我捐助的求助.html" + GetQuerystring();

}

}

if (bIE) u99.attachEvent("onmouseover", MouseOveru99);
else u99.addEventListener("mouseover", MouseOveru99, true);
function MouseOveru99(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u99',e)) return;
if (true) {

	SetPanelVisibility('u104','','none',500);

}

}

if (bIE) u99.attachEvent("onmouseout", MouseOutu99);
else u99.addEventListener("mouseout", MouseOutu99, true);
function MouseOutu99(e)
{
windowEvent = e;

if (!IsTrueMouseOut('u99',e)) return;
if (true) {

	SetPanelVisibility('u104','hidden','none',500);

}

}
gv_vAlignTable['u99'] = 'top';
var u113 = document.getElementById('u113');
gv_vAlignTable['u113'] = 'top';
var u39 = document.getElementById('u39');

var u111 = document.getElementById('u111');

u111.style.cursor = 'pointer';
if (bIE) u111.attachEvent("onclick", Clicku111);
else u111.addEventListener("click", Clicku111, true);
function Clicku111(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}
gv_vAlignTable['u111'] = 'top';
var u69 = document.getElementById('u69');

var u78 = document.getElementById('u78');
gv_vAlignTable['u78'] = 'top';
var u114 = document.getElementById('u114');

var u4 = document.getElementById('u4');

var u94 = document.getElementById('u94');

u94.style.cursor = 'pointer';
if (bIE) u94.attachEvent("onclick", Clicku94);
else u94.addEventListener("click", Clicku94, true);
function Clicku94(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}

var u6 = document.getElementById('u6');
gv_vAlignTable['u6'] = 'top';
var u96 = document.getElementById('u96');

u96.style.cursor = 'pointer';
if (bIE) u96.attachEvent("onclick", Clicku96);
else u96.addEventListener("click", Clicku96, true);
function Clicku96(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}
gv_vAlignTable['u96'] = 'top';
var u61 = document.getElementById('u61');

var u91 = document.getElementById('u91');

var u35 = document.getElementById('u35');

var u26 = document.getElementById('u26');
gv_vAlignTable['u26'] = 'top';
var u65 = document.getElementById('u65');

var u56 = document.getElementById('u56');
gv_vAlignTable['u56'] = 'center';
var u116 = document.getElementById('u116');

var u105 = document.getElementById('u105');

var u109 = document.getElementById('u109');

u109.style.cursor = 'pointer';
if (bIE) u109.attachEvent("onclick", Clicku109);
else u109.addEventListener("click", Clicku109, true);
function Clicku109(e)
{
windowEvent = e;


if (true) {

	self.location.href="我发起的求助.html" + GetQuerystring();

}

}
gv_vAlignTable['u109'] = 'top';
var u82 = document.getElementById('u82');

var u5 = document.getElementById('u5');
gv_vAlignTable['u5'] = 'center';
var u12 = document.getElementById('u12');

var u9 = document.getElementById('u9');
gv_vAlignTable['u9'] = 'center';
var u42 = document.getElementById('u42');
gv_vAlignTable['u42'] = 'top';
var u33 = document.getElementById('u33');

var u72 = document.getElementById('u72');
gv_vAlignTable['u72'] = 'center';
var u63 = document.getElementById('u63');

var u18 = document.getElementById('u18');

var u48 = document.getElementById('u48');
gv_vAlignTable['u48'] = 'center';
var u110 = document.getElementById('u110');

u110.style.cursor = 'pointer';
if (bIE) u110.attachEvent("onclick", Clicku110);
else u110.addEventListener("click", Clicku110, true);
function Clicku110(e)
{
windowEvent = e;


if (true) {

	self.location.href="我捐助的求助.html" + GetQuerystring();

}

}
gv_vAlignTable['u110'] = 'top';
var u67 = document.getElementById('u67');

var u88 = document.getElementById('u88');
gv_vAlignTable['u88'] = 'top';
var u57 = document.getElementById('u57');

var u101 = document.getElementById('u101');
gv_vAlignTable['u101'] = 'center';
var u10 = document.getElementById('u10');
gv_vAlignTable['u10'] = 'top';
var u40 = document.getElementById('u40');
gv_vAlignTable['u40'] = 'center';
var u70 = document.getElementById('u70');
gv_vAlignTable['u70'] = 'top';
var u14 = document.getElementById('u14');

u14.style.cursor = 'pointer';
if (bIE) u14.attachEvent("onclick", Clicku14);
else u14.addEventListener("click", Clicku14, true);
function Clicku14(e)
{
windowEvent = e;


if (true) {

	self.location.href="resources/reload.html#" + encodeURI(PageUrl + GetQuerystring());

}

}

var u44 = document.getElementById('u44');
gv_vAlignTable['u44'] = 'center';
var u117 = document.getElementById('u117');
gv_vAlignTable['u117'] = 'center';
var u74 = document.getElementById('u74');
gv_vAlignTable['u74'] = 'top';
var u29 = document.getElementById('u29');

var u59 = document.getElementById('u59');

var u98 = document.getElementById('u98');

u98.style.cursor = 'pointer';
if (bIE) u98.attachEvent("onclick", Clicku98);
else u98.addEventListener("click", Clicku98, true);
function Clicku98(e)
{
windowEvent = e;


if (true) {

	self.location.href="公益项目.html" + GetQuerystring();

}

}
gv_vAlignTable['u98'] = 'top';
var u80 = document.getElementById('u80');
gv_vAlignTable['u80'] = 'center';
if (window.OnLoad) OnLoad();
