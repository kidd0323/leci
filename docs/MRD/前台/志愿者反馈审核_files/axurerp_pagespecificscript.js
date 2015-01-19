
var PageName = '志愿者反馈审核';
var PageId = '5be1cc2b4660465c989b85dbe5ec9460'
var PageUrl = '志愿者反馈审核.html'
document.title = '志愿者反馈审核';
var PageNotes = 
{
"pageName":"志愿者反馈审核",
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

u21.style.cursor = 'pointer';
if (bIE) u21.attachEvent("onclick", Clicku21);
else u21.addEventListener("click", Clicku21, true);
function Clicku21(e)
{
windowEvent = e;


if (true) {

	self.location.href="我捐助的求助.html" + GetQuerystring();

}

}
gv_vAlignTable['u21'] = 'top';
var u7 = document.getElementById('u7');

u7.style.cursor = 'pointer';
if (bIE) u7.attachEvent("onclick", Clicku7);
else u7.addEventListener("click", Clicku7, true);
function Clicku7(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}
gv_vAlignTable['u7'] = 'top';
var u51 = document.getElementById('u51');

var u25 = document.getElementById('u25');

var u16 = document.getElementById('u16');

var u55 = document.getElementById('u55');

var u46 = document.getElementById('u46');
gv_vAlignTable['u46'] = 'top';
var u76 = document.getElementById('u76');
gv_vAlignTable['u76'] = 'top';
var u49 = document.getElementById('u49');

var u38 = document.getElementById('u38');
gv_vAlignTable['u38'] = 'top';
var u32 = document.getElementById('u32');
gv_vAlignTable['u32'] = 'top';
var u23 = document.getElementById('u23');
gv_vAlignTable['u23'] = 'top';
var u62 = document.getElementById('u62');
gv_vAlignTable['u62'] = 'top';
var u53 = document.getElementById('u53');

var u87 = document.getElementById('u87');

var u1 = document.getElementById('u1');
gv_vAlignTable['u1'] = 'center';
var u27 = document.getElementById('u27');
gv_vAlignTable['u27'] = 'top';
var u68 = document.getElementById('u68');
gv_vAlignTable['u68'] = 'top';
var u66 = document.getElementById('u66');
gv_vAlignTable['u66'] = 'top';
var u30 = document.getElementById('u30');
gv_vAlignTable['u30'] = 'top';
var u8 = document.getElementById('u8');

u8.style.cursor = 'pointer';
if (bIE) u8.attachEvent("onclick", Clicku8);
else u8.addEventListener("click", Clicku8, true);
function Clicku8(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}
gv_vAlignTable['u8'] = 'top';
var u60 = document.getElementById('u60');
gv_vAlignTable['u60'] = 'top';
var u34 = document.getElementById('u34');
gv_vAlignTable['u34'] = 'top';
var u17 = document.getElementById('u17');
gv_vAlignTable['u17'] = 'center';
var u64 = document.getElementById('u64');
gv_vAlignTable['u64'] = 'top';
var u19 = document.getElementById('u19');
gv_vAlignTable['u19'] = 'center';
var u6 = document.getElementById('u6');
gv_vAlignTable['u6'] = 'center';
var u79 = document.getElementById('u79');

var u81 = document.getElementById('u81');

var u85 = document.getElementById('u85');

var u11 = document.getElementById('u11');

u11.style.cursor = 'pointer';
if (bIE) u11.attachEvent("onclick", Clicku11);
else u11.addEventListener("click", Clicku11, true);
function Clicku11(e)
{
windowEvent = e;


if (true) {

	self.location.href="发布求助信息.html" + GetQuerystring();

}

}

var u41 = document.getElementById('u41');

var u71 = document.getElementById('u71');

var u15 = document.getElementById('u15');

var u45 = document.getElementById('u45');

var u36 = document.getElementById('u36');
gv_vAlignTable['u36'] = 'top';
var u75 = document.getElementById('u75');

var u58 = document.getElementById('u58');
gv_vAlignTable['u58'] = 'top';
var u37 = document.getElementById('u37');

var u2 = document.getElementById('u2');

var u83 = document.getElementById('u83');
gv_vAlignTable['u83'] = 'top';
var u22 = document.getElementById('u22');

u22.style.cursor = 'pointer';
if (bIE) u22.attachEvent("onclick", Clicku22);
else u22.addEventListener("click", Clicku22, true);
function Clicku22(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}
gv_vAlignTable['u22'] = 'top';
var u13 = document.getElementById('u13');

var u52 = document.getElementById('u52');
gv_vAlignTable['u52'] = 'top';
var u43 = document.getElementById('u43');

var u0 = document.getElementById('u0');

var u3 = document.getElementById('u3');
gv_vAlignTable['u3'] = 'center';
var u47 = document.getElementById('u47');

var u77 = document.getElementById('u77');

var u86 = document.getElementById('u86');

var u73 = document.getElementById('u73');

var u84 = document.getElementById('u84');

var u20 = document.getElementById('u20');

u20.style.cursor = 'pointer';
if (bIE) u20.attachEvent("onclick", Clicku20);
else u20.addEventListener("click", Clicku20, true);
function Clicku20(e)
{
windowEvent = e;


if (true) {

	self.location.href="我发起的求助.html" + GetQuerystring();

}

}
gv_vAlignTable['u20'] = 'top';
var u50 = document.getElementById('u50');
gv_vAlignTable['u50'] = 'top';
var u28 = document.getElementById('u28');

var u24 = document.getElementById('u24');
gv_vAlignTable['u24'] = 'top';
var u54 = document.getElementById('u54');
gv_vAlignTable['u54'] = 'top';
var u39 = document.getElementById('u39');

var u69 = document.getElementById('u69');

var u78 = document.getElementById('u78');

var u4 = document.getElementById('u4');

u4.style.cursor = 'pointer';
if (bIE) u4.attachEvent("onclick", Clicku4);
else u4.addEventListener("click", Clicku4, true);
function Clicku4(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}
gv_vAlignTable['u4'] = 'top';
var u31 = document.getElementById('u31');

var u61 = document.getElementById('u61');

var u35 = document.getElementById('u35');

var u26 = document.getElementById('u26');

var u65 = document.getElementById('u65');

var u56 = document.getElementById('u56');
gv_vAlignTable['u56'] = 'top';
var u82 = document.getElementById('u82');

var u5 = document.getElementById('u5');

u5.style.cursor = 'pointer';
if (bIE) u5.attachEvent("onclick", Clicku5);
else u5.addEventListener("click", Clicku5, true);
function Clicku5(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}

var u12 = document.getElementById('u12');
gv_vAlignTable['u12'] = 'center';
var u9 = document.getElementById('u9');

u9.style.cursor = 'pointer';
if (bIE) u9.attachEvent("onclick", Clicku9);
else u9.addEventListener("click", Clicku9, true);
function Clicku9(e)
{
windowEvent = e;


if (true) {

	self.location.href="公益项目.html" + GetQuerystring();

}

}
gv_vAlignTable['u9'] = 'top';
var u42 = document.getElementById('u42');
gv_vAlignTable['u42'] = 'top';
var u33 = document.getElementById('u33');

var u72 = document.getElementById('u72');
gv_vAlignTable['u72'] = 'top';
var u63 = document.getElementById('u63');

var u18 = document.getElementById('u18');

var u48 = document.getElementById('u48');
gv_vAlignTable['u48'] = 'top';
var u67 = document.getElementById('u67');

var u57 = document.getElementById('u57');

var u10 = document.getElementById('u10');

u10.style.cursor = 'pointer';
if (bIE) u10.attachEvent("onclick", Clicku10);
else u10.addEventListener("click", Clicku10, true);
function Clicku10(e)
{
windowEvent = e;


if (true) {

	self.location.href="我捐助的求助.html" + GetQuerystring();

}

}

if (bIE) u10.attachEvent("onmouseover", MouseOveru10);
else u10.addEventListener("mouseover", MouseOveru10, true);
function MouseOveru10(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u10',e)) return;
if (true) {

	SetPanelVisibility('u15','','none',500);

}

}

if (bIE) u10.attachEvent("onmouseout", MouseOutu10);
else u10.addEventListener("mouseout", MouseOutu10, true);
function MouseOutu10(e)
{
windowEvent = e;

if (!IsTrueMouseOut('u10',e)) return;
if (true) {

	SetPanelVisibility('u15','hidden','none',500);

}

}
gv_vAlignTable['u10'] = 'top';
var u40 = document.getElementById('u40');
gv_vAlignTable['u40'] = 'top';
var u70 = document.getElementById('u70');
gv_vAlignTable['u70'] = 'top';
var u14 = document.getElementById('u14');
gv_vAlignTable['u14'] = 'center';
var u44 = document.getElementById('u44');
gv_vAlignTable['u44'] = 'top';
var u74 = document.getElementById('u74');
gv_vAlignTable['u74'] = 'top';
var u29 = document.getElementById('u29');

var u59 = document.getElementById('u59');

var u80 = document.getElementById('u80');

if (window.OnLoad) OnLoad();
