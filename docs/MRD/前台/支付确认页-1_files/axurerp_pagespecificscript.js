
var PageName = '支付确认页-1';
var PageId = 'fa04956ac9664724bf24b1ca56b51321'
var PageUrl = '支付确认页-1.html'
document.title = '支付确认页-1';
var PageNotes = 
{
"pageName":"支付确认页-1",
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

var u31 = document.getElementById('u31');
gv_vAlignTable['u31'] = 'center';
var u36 = document.getElementById('u36');

u36.style.cursor = 'pointer';
if (bIE) u36.attachEvent("onclick", Clicku36);
else u36.addEventListener("click", Clicku36, true);
function Clicku36(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}
gv_vAlignTable['u36'] = 'top';
var u16 = document.getElementById('u16');

var u17 = document.getElementById('u17');
gv_vAlignTable['u17'] = 'center';
var u28 = document.getElementById('u28');
gv_vAlignTable['u28'] = 'center';
var u29 = document.getElementById('u29');

var u8 = document.getElementById('u8');
gv_vAlignTable['u8'] = 'center';
var u30 = document.getElementById('u30');

var u21 = document.getElementById('u21');

u21.style.cursor = 'pointer';
if (bIE) u21.attachEvent("onclick", Clicku21);
else u21.addEventListener("click", Clicku21, true);
function Clicku21(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}
gv_vAlignTable['u21'] = 'top';
var u6 = document.getElementById('u6');
gv_vAlignTable['u6'] = 'top';
var u32 = document.getElementById('u32');

var u13 = document.getElementById('u13');
gv_vAlignTable['u13'] = 'top';
var u14 = document.getElementById('u14');

var u15 = document.getElementById('u15');
gv_vAlignTable['u15'] = 'center';
var u38 = document.getElementById('u38');
gv_vAlignTable['u38'] = 'top';
var u1 = document.getElementById('u1');
gv_vAlignTable['u1'] = 'center';
var u37 = document.getElementById('u37');
gv_vAlignTable['u37'] = 'top';
var u26 = document.getElementById('u26');
gv_vAlignTable['u26'] = 'center';
var u10 = document.getElementById('u10');
gv_vAlignTable['u10'] = 'top';
var u11 = document.getElementById('u11');

var u3 = document.getElementById('u3');
gv_vAlignTable['u3'] = 'top';
var u12 = document.getElementById('u12');
gv_vAlignTable['u12'] = 'center';
var u39 = document.getElementById('u39');

var u9 = document.getElementById('u9');
gv_vAlignTable['u9'] = 'top';
var u40 = document.getElementById('u40');

var u27 = document.getElementById('u27');

var u7 = document.getElementById('u7');

var u23 = document.getElementById('u23');

u23.style.cursor = 'pointer';
if (bIE) u23.attachEvent("onclick", Clicku23);
else u23.addEventListener("click", Clicku23, true);
function Clicku23(e)
{
windowEvent = e;


if (true) {

	self.location.href="公益项目.html" + GetQuerystring();

}

}
gv_vAlignTable['u23'] = 'top';
var u24 = document.getElementById('u24');

u24.style.cursor = 'pointer';
if (bIE) u24.attachEvent("onclick", Clicku24);
else u24.addEventListener("click", Clicku24, true);
function Clicku24(e)
{
windowEvent = e;


if (true) {

	self.location.href="我捐助的求助.html" + GetQuerystring();

}

}

if (bIE) u24.attachEvent("onmouseover", MouseOveru24);
else u24.addEventListener("mouseover", MouseOveru24, true);
function MouseOveru24(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u24',e)) return;
if (true) {

	SetPanelVisibility('u29','','none',500);

}

}

if (bIE) u24.attachEvent("onmouseout", MouseOutu24);
else u24.addEventListener("mouseout", MouseOutu24, true);
function MouseOutu24(e)
{
windowEvent = e;

if (!IsTrueMouseOut('u24',e)) return;
if (true) {

	SetPanelVisibility('u29','hidden','none',500);

}

}
gv_vAlignTable['u24'] = 'top';
var u4 = document.getElementById('u4');
gv_vAlignTable['u4'] = 'top';
var u2 = document.getElementById('u2');
gv_vAlignTable['u2'] = 'top';
var u18 = document.getElementById('u18');

u18.style.cursor = 'pointer';
if (bIE) u18.attachEvent("onclick", Clicku18);
else u18.addEventListener("click", Clicku18, true);
function Clicku18(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}
gv_vAlignTable['u18'] = 'top';
var u19 = document.getElementById('u19');

u19.style.cursor = 'pointer';
if (bIE) u19.attachEvent("onclick", Clicku19);
else u19.addEventListener("click", Clicku19, true);
function Clicku19(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}

var u20 = document.getElementById('u20');
gv_vAlignTable['u20'] = 'center';
var u5 = document.getElementById('u5');

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
var u25 = document.getElementById('u25');

u25.style.cursor = 'pointer';
if (bIE) u25.attachEvent("onclick", Clicku25);
else u25.addEventListener("click", Clicku25, true);
function Clicku25(e)
{
windowEvent = e;


if (true) {

	self.location.href="发布求助信息.html" + GetQuerystring();

}

}

var u33 = document.getElementById('u33');
gv_vAlignTable['u33'] = 'center';
var u34 = document.getElementById('u34');

u34.style.cursor = 'pointer';
if (bIE) u34.attachEvent("onclick", Clicku34);
else u34.addEventListener("click", Clicku34, true);
function Clicku34(e)
{
windowEvent = e;


if (true) {

	self.location.href="我发起的求助.html" + GetQuerystring();

}

}
gv_vAlignTable['u34'] = 'top';
var u35 = document.getElementById('u35');

u35.style.cursor = 'pointer';
if (bIE) u35.attachEvent("onclick", Clicku35);
else u35.addEventListener("click", Clicku35, true);
function Clicku35(e)
{
windowEvent = e;


if (true) {

	self.location.href="我捐助的求助.html" + GetQuerystring();

}

}
gv_vAlignTable['u35'] = 'top';
var u0 = document.getElementById('u0');

if (window.OnLoad) OnLoad();
