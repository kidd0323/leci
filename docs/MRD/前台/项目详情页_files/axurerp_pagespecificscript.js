
var PageName = '项目详情页';
var PageId = '1240b29897b64304a73da255cbac3f42'
var PageUrl = '项目详情页.html'
document.title = '项目详情页';
var PageNotes = 
{
"pageName":"项目详情页",
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

var u167 = document.getElementById('u167');

var u299 = document.getElementById('u299');
gv_vAlignTable['u299'] = 'top';
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
var u180 = document.getElementById('u180');
gv_vAlignTable['u180'] = 'center';
var u216 = document.getElementById('u216');
gv_vAlignTable['u216'] = 'top';
var u194 = document.getElementById('u194');
gv_vAlignTable['u194'] = 'top';
var u72 = document.getElementById('u72');

var u333 = document.getElementById('u333');

var u97 = document.getElementById('u97');
gv_vAlignTable['u97'] = 'center';
var u152 = document.getElementById('u152');
gv_vAlignTable['u152'] = 'center';
var u231 = document.getElementById('u231');
gv_vAlignTable['u231'] = 'center';
var u60 = document.getElementById('u60');

var u78 = document.getElementById('u78');

var u166 = document.getElementById('u166');
gv_vAlignTable['u166'] = 'top';
var u298 = document.getElementById('u298');
gv_vAlignTable['u298'] = 'top';
var u139 = document.getElementById('u139');
gv_vAlignTable['u139'] = 'center';
var u201 = document.getElementById('u201');
gv_vAlignTable['u201'] = 'top';
var u1 = document.getElementById('u1');
gv_vAlignTable['u1'] = 'center';
var u215 = document.getElementById('u215');
gv_vAlignTable['u215'] = 'top';
var u193 = document.getElementById('u193');
gv_vAlignTable['u193'] = 'center';
var u11 = document.getElementById('u11');

var u126 = document.getElementById('u126');
gv_vAlignTable['u126'] = 'top';
var u332 = document.getElementById('u332');
gv_vAlignTable['u332'] = 'center';
var u151 = document.getElementById('u151');

var u202 = document.getElementById('u202');
gv_vAlignTable['u202'] = 'top';
var u26 = document.getElementById('u26');

var u165 = document.getElementById('u165');
gv_vAlignTable['u165'] = 'top';
var u138 = document.getElementById('u138');

var u100 = document.getElementById('u100');
gv_vAlignTable['u100'] = 'center';
var u54 = document.getElementById('u54');
gv_vAlignTable['u54'] = 'top';
var u236 = document.getElementById('u236');
gv_vAlignTable['u236'] = 'center';
var u214 = document.getElementById('u214');
gv_vAlignTable['u214'] = 'center';
var u192 = document.getElementById('u192');

var u67 = document.getElementById('u67');
gv_vAlignTable['u67'] = 'top';
var u269 = document.getElementById('u269');

var u331 = document.getElementById('u331');

var u321 = document.getElementById('u321');
gv_vAlignTable['u321'] = 'center';
var u150 = document.getElementById('u150');
gv_vAlignTable['u150'] = 'top';
var u287 = document.getElementById('u287');
gv_vAlignTable['u287'] = 'center';
var u48 = document.getElementById('u48');
gv_vAlignTable['u48'] = 'top';
var u327 = document.getElementById('u327');
gv_vAlignTable['u327'] = 'top';
var u340 = document.getElementById('u340');
gv_vAlignTable['u340'] = 'top';
var u24 = document.getElementById('u24');

var u80 = document.getElementById('u80');
gv_vAlignTable['u80'] = 'top';
var u65 = document.getElementById('u65');
gv_vAlignTable['u65'] = 'top';
var u318 = document.getElementById('u318');

var u113 = document.getElementById('u113');
gv_vAlignTable['u113'] = 'center';
var u268 = document.getElementById('u268');

var u330 = document.getElementById('u330');
gv_vAlignTable['u330'] = 'top';
var u227 = document.getElementById('u227');

var u42 = document.getElementById('u42');

var u159 = document.getElementById('u159');

var u163 = document.getElementById('u163');

var u63 = document.getElementById('u63');

u63.style.cursor = 'pointer';
if (bIE) u63.attachEvent("onclick", Clicku63);
else u63.addEventListener("click", Clicku63, true);
function Clicku63(e)
{
windowEvent = e;


if ((GetCheckState('u63')) == (true)) {

	self.location.href="#" + GetQuerystring();

}

}

var u326 = document.getElementById('u326');
gv_vAlignTable['u326'] = 'center';
var u177 = document.getElementById('u177');
gv_vAlignTable['u177'] = 'top';
var u37 = document.getElementById('u37');

var u93 = document.getElementById('u93');
gv_vAlignTable['u93'] = 'top';
var u112 = document.getElementById('u112');

var u46 = document.getElementById('u46');
gv_vAlignTable['u46'] = 'top';
var u307 = document.getElementById('u307');
gv_vAlignTable['u307'] = 'center';
var u285 = document.getElementById('u285');
gv_vAlignTable['u285'] = 'center';
var u18 = document.getElementById('u18');
gv_vAlignTable['u18'] = 'center';
var u50 = document.getElementById('u50');
gv_vAlignTable['u50'] = 'top';
var u74 = document.getElementById('u74');
gv_vAlignTable['u74'] = 'top';
var u162 = document.getElementById('u162');
gv_vAlignTable['u162'] = 'top';
var u79 = document.getElementById('u79');
gv_vAlignTable['u79'] = 'top';
var u176 = document.getElementById('u176');
gv_vAlignTable['u176'] = 'center';
var u55 = document.getElementById('u55');

var u149 = document.getElementById('u149');
gv_vAlignTable['u149'] = 'top';
var u111 = document.getElementById('u111');
gv_vAlignTable['u111'] = 'center';
var u306 = document.getElementById('u306');

u306.style.cursor = 'pointer';
if (bIE) u306.attachEvent("onclick", Clicku306);
else u306.addEventListener("click", Clicku306, true);
function Clicku306(e)
{
windowEvent = e;


if (true) {

}

}

var u284 = document.getElementById('u284');

var u12 = document.getElementById('u12');
gv_vAlignTable['u12'] = 'center';
var u342 = document.getElementById('u342');
gv_vAlignTable['u342'] = 'top';
var u161 = document.getElementById('u161');
gv_vAlignTable['u161'] = 'top';
var u329 = document.getElementById('u329');
gv_vAlignTable['u329'] = 'center';
var u175 = document.getElementById('u175');

var u229 = document.getElementById('u229');
gv_vAlignTable['u229'] = 'top';
var u148 = document.getElementById('u148');
gv_vAlignTable['u148'] = 'center';
var u110 = document.getElementById('u110');

var u305 = document.getElementById('u305');
gv_vAlignTable['u305'] = 'top';
var u283 = document.getElementById('u283');
gv_vAlignTable['u283'] = 'top';
var u20 = document.getElementById('u20');
gv_vAlignTable['u20'] = 'center';
var u124 = document.getElementById('u124');
gv_vAlignTable['u124'] = 'top';
var u279 = document.getElementById('u279');

var u241 = document.getElementById('u241');

var u160 = document.getElementById('u160');
gv_vAlignTable['u160'] = 'center';
var u297 = document.getElementById('u297');
gv_vAlignTable['u297'] = 'center';
var u8 = document.getElementById('u8');
gv_vAlignTable['u8'] = 'top';
var u49 = document.getElementById('u49');

var u25 = document.getElementById('u25');
gv_vAlignTable['u25'] = 'center';
var u309 = document.getElementById('u309');
gv_vAlignTable['u309'] = 'center';
var u228 = document.getElementById('u228');
gv_vAlignTable['u228'] = 'center';
var u81 = document.getElementById('u81');
gv_vAlignTable['u81'] = 'top';
var u88 = document.getElementById('u88');

var u304 = document.getElementById('u304');
gv_vAlignTable['u304'] = 'top';
var u282 = document.getElementById('u282');
gv_vAlignTable['u282'] = 'top';
var u76 = document.getElementById('u76');
gv_vAlignTable['u76'] = 'top';
var u123 = document.getElementById('u123');

var u278 = document.getElementById('u278');
gv_vAlignTable['u278'] = 'top';
var u240 = document.getElementById('u240');
gv_vAlignTable['u240'] = 'center';
var u296 = document.getElementById('u296');

var u137 = document.getElementById('u137');
gv_vAlignTable['u137'] = 'center';
var u33 = document.getElementById('u33');

u33.style.cursor = 'pointer';
if (bIE) u33.attachEvent("onclick", Clicku33);
else u33.addEventListener("click", Clicku33, true);
function Clicku33(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}
gv_vAlignTable['u33'] = 'top';
var u254 = document.getElementById('u254');
gv_vAlignTable['u254'] = 'top';
var u173 = document.getElementById('u173');
gv_vAlignTable['u173'] = 'top';
var u213 = document.getElementById('u213');

var u303 = document.getElementById('u303');
gv_vAlignTable['u303'] = 'top';
var u281 = document.getElementById('u281');
gv_vAlignTable['u281'] = 'top';
var u94 = document.getElementById('u94');

var u122 = document.getElementById('u122');
gv_vAlignTable['u122'] = 'center';
var u5 = document.getElementById('u5');
gv_vAlignTable['u5'] = 'top';
var u317 = document.getElementById('u317');
gv_vAlignTable['u317'] = 'center';
var u295 = document.getElementById('u295');
gv_vAlignTable['u295'] = 'top';
var u136 = document.getElementById('u136');

var u51 = document.getElementById('u51');

var u109 = document.getElementById('u109');

var u253 = document.getElementById('u253');
gv_vAlignTable['u253'] = 'top';
var u172 = document.getElementById('u172');
gv_vAlignTable['u172'] = 'center';
var u267 = document.getElementById('u267');

var u302 = document.getElementById('u302');
gv_vAlignTable['u302'] = 'center';
var u280 = document.getElementById('u280');
gv_vAlignTable['u280'] = 'center';
var u121 = document.getElementById('u121');

var u316 = document.getElementById('u316');

var u294 = document.getElementById('u294');
gv_vAlignTable['u294'] = 'top';
var u135 = document.getElementById('u135');
gv_vAlignTable['u135'] = 'center';
var u108 = document.getElementById('u108');
gv_vAlignTable['u108'] = 'center';
var u252 = document.getElementById('u252');
gv_vAlignTable['u252'] = 'center';
var u171 = document.getElementById('u171');

var u191 = document.getElementById('u191');
gv_vAlignTable['u191'] = 'top';
var u266 = document.getElementById('u266');
gv_vAlignTable['u266'] = 'center';
var u64 = document.getElementById('u64');
gv_vAlignTable['u64'] = 'top';
var u239 = document.getElementById('u239');

var u301 = document.getElementById('u301');

var u120 = document.getElementById('u120');

var u2 = document.getElementById('u2');

var u315 = document.getElementById('u315');
gv_vAlignTable['u315'] = 'center';
var u293 = document.getElementById('u293');
gv_vAlignTable['u293'] = 'top';
var u21 = document.getElementById('u21');
gv_vAlignTable['u21'] = 'top';
var u134 = document.getElementById('u134');

var u251 = document.getElementById('u251');

var u170 = document.getElementById('u170');
gv_vAlignTable['u170'] = 'top';
var u265 = document.getElementById('u265');

var u82 = document.getElementById('u82');
gv_vAlignTable['u82'] = 'top';
var u16 = document.getElementById('u16');
gv_vAlignTable['u16'] = 'center';
var u238 = document.getElementById('u238');
gv_vAlignTable['u238'] = 'center';
var u200 = document.getElementById('u200');
gv_vAlignTable['u200'] = 'center';
var u314 = document.getElementById('u314');

var u292 = document.getElementById('u292');
gv_vAlignTable['u292'] = 'center';
var u77 = document.getElementById('u77');
gv_vAlignTable['u77'] = 'top';
var u133 = document.getElementById('u133');
gv_vAlignTable['u133'] = 'top';
var u250 = document.getElementById('u250');
gv_vAlignTable['u250'] = 'center';
var u147 = document.getElementById('u147');

var u58 = document.getElementById('u58');
gv_vAlignTable['u58'] = 'top';
var u34 = document.getElementById('u34');

var u90 = document.getElementById('u90');

var u61 = document.getElementById('u61');
gv_vAlignTable['u61'] = 'top';
var u164 = document.getElementById('u164');
gv_vAlignTable['u164'] = 'center';
var u95 = document.getElementById('u95');
gv_vAlignTable['u95'] = 'center';
var u132 = document.getElementById('u132');
gv_vAlignTable['u132'] = 'top';
var u255 = document.getElementById('u255');

var u146 = document.getElementById('u146');
gv_vAlignTable['u146'] = 'top';
var u52 = document.getElementById('u52');
gv_vAlignTable['u52'] = 'top';
var u125 = document.getElementById('u125');
gv_vAlignTable['u125'] = 'top';
var u263 = document.getElementById('u263');
gv_vAlignTable['u263'] = 'top';
var u91 = document.getElementById('u91');
gv_vAlignTable['u91'] = 'top';
var u277 = document.getElementById('u277');
gv_vAlignTable['u277'] = 'top';
var u47 = document.getElementById('u47');

var u212 = document.getElementById('u212');
gv_vAlignTable['u212'] = 'top';
var u131 = document.getElementById('u131');
gv_vAlignTable['u131'] = 'top';
var u28 = document.getElementById('u28');

var u145 = document.getElementById('u145');

var u118 = document.getElementById('u118');
gv_vAlignTable['u118'] = 'top';
var u262 = document.getElementById('u262');
gv_vAlignTable['u262'] = 'center';
var u322 = document.getElementById('u322');

var u276 = document.getElementById('u276');
gv_vAlignTable['u276'] = 'top';
var u89 = document.getElementById('u89');
gv_vAlignTable['u89'] = 'top';
var u249 = document.getElementById('u249');

var u211 = document.getElementById('u211');
gv_vAlignTable['u211'] = 'top';
var u130 = document.getElementById('u130');
gv_vAlignTable['u130'] = 'center';
var u85 = document.getElementById('u85');
gv_vAlignTable['u85'] = 'center';
var u22 = document.getElementById('u22');

var u144 = document.getElementById('u144');
gv_vAlignTable['u144'] = 'top';
var u261 = document.getElementById('u261');

var u43 = document.getElementById('u43');
gv_vAlignTable['u43'] = 'center';
var u275 = document.getElementById('u275');
gv_vAlignTable['u275'] = 'center';
var u17 = document.getElementById('u17');

var u248 = document.getElementById('u248');
gv_vAlignTable['u248'] = 'center';
var u210 = document.getElementById('u210');
gv_vAlignTable['u210'] = 'top';
var u325 = document.getElementById('u325');

var u107 = document.getElementById('u107');

var u44 = document.getElementById('u44');

var u30 = document.getElementById('u30');

var u224 = document.getElementById('u224');
gv_vAlignTable['u224'] = 'top';
var u143 = document.getElementById('u143');
gv_vAlignTable['u143'] = 'center';
var u341 = document.getElementById('u341');
gv_vAlignTable['u341'] = 'top';
var u260 = document.getElementById('u260');
gv_vAlignTable['u260'] = 'top';
var u9 = document.getElementById('u9');
gv_vAlignTable['u9'] = 'top';
var u157 = document.getElementById('u157');
gv_vAlignTable['u157'] = 'top';
var u59 = document.getElementById('u59');

u59.style.cursor = 'pointer';
if (bIE) u59.attachEvent("onclick", Clicku59);
else u59.addEventListener("click", Clicku59, true);
function Clicku59(e)
{
windowEvent = e;


if (true) {

	self.location.href="支付选择页面.html" + GetQuerystring();

}

}

var u189 = document.getElementById('u189');
gv_vAlignTable['u189'] = 'top';
var u35 = document.getElementById('u35');
gv_vAlignTable['u35'] = 'center';
var u274 = document.getElementById('u274');

var u328 = document.getElementById('u328');

var u106 = document.getElementById('u106');
gv_vAlignTable['u106'] = 'center';
var u223 = document.getElementById('u223');
gv_vAlignTable['u223'] = 'top';
var u142 = document.getElementById('u142');

var u86 = document.getElementById('u86');
gv_vAlignTable['u86'] = 'top';
var u70 = document.getElementById('u70');
gv_vAlignTable['u70'] = 'center';
var u237 = document.getElementById('u237');

var u156 = document.getElementById('u156');
gv_vAlignTable['u156'] = 'center';
var u188 = document.getElementById('u188');
gv_vAlignTable['u188'] = 'top';
var u273 = document.getElementById('u273');
gv_vAlignTable['u273'] = 'top';
var u105 = document.getElementById('u105');

u105.style.cursor = 'pointer';
if (bIE) u105.attachEvent("onclick", Clicku105);
else u105.addEventListener("click", Clicku105, true);
function Clicku105(e)
{
windowEvent = e;


if (true) {

	self.location.href="发布求助信息.html" + GetQuerystring();

}

}

var u222 = document.getElementById('u222');
gv_vAlignTable['u222'] = 'top';
var u311 = document.getElementById('u311');
gv_vAlignTable['u311'] = 'center';
var u6 = document.getElementById('u6');
gv_vAlignTable['u6'] = 'top';
var u29 = document.getElementById('u29');
gv_vAlignTable['u29'] = 'center';
var u155 = document.getElementById('u155');

var u209 = document.getElementById('u209');
gv_vAlignTable['u209'] = 'top';
var u272 = document.getElementById('u272');
gv_vAlignTable['u272'] = 'top';
var u336 = document.getElementById('u336');
gv_vAlignTable['u336'] = 'top';
var u19 = document.getElementById('u19');

var u104 = document.getElementById('u104');

u104.style.cursor = 'pointer';
if (bIE) u104.attachEvent("onclick", Clicku104);
else u104.addEventListener("click", Clicku104, true);
function Clicku104(e)
{
windowEvent = e;


if (true) {

	self.location.href="我捐助的求助.html" + GetQuerystring();

}

}

if (bIE) u104.attachEvent("onmouseover", MouseOveru104);
else u104.addEventListener("mouseover", MouseOveru104, true);
function MouseOveru104(e)
{
windowEvent = e;

if (!IsTrueMouseOver('u104',e)) return;
if (true) {

	SetPanelVisibility('u109','','none',500);

}

}

if (bIE) u104.attachEvent("onmouseout", MouseOutu104);
else u104.addEventListener("mouseout", MouseOutu104, true);
function MouseOutu104(e)
{
windowEvent = e;

if (!IsTrueMouseOut('u104',e)) return;
if (true) {

	SetPanelVisibility('u109','hidden','none',500);

}

}
gv_vAlignTable['u104'] = 'top';
var u308 = document.getElementById('u308');

var u259 = document.getElementById('u259');
gv_vAlignTable['u259'] = 'top';
var u221 = document.getElementById('u221');
gv_vAlignTable['u221'] = 'center';
var u119 = document.getElementById('u119');

var u232 = document.getElementById('u232');
gv_vAlignTable['u232'] = 'top';
var u235 = document.getElementById('u235');

var u75 = document.getElementById('u75');
gv_vAlignTable['u75'] = 'top';
var u13 = document.getElementById('u13');
gv_vAlignTable['u13'] = 'top';
var u208 = document.getElementById('u208');
gv_vAlignTable['u208'] = 'top';
var u271 = document.getElementById('u271');
gv_vAlignTable['u271'] = 'top';
var u312 = document.getElementById('u312');

var u98 = document.getElementById('u98');

u98.style.cursor = 'pointer';
if (bIE) u98.attachEvent("onclick", Clicku98);
else u98.addEventListener("click", Clicku98, true);
function Clicku98(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}
gv_vAlignTable['u98'] = 'top';
var u103 = document.getElementById('u103');

u103.style.cursor = 'pointer';
if (bIE) u103.attachEvent("onclick", Clicku103);
else u103.addEventListener("click", Clicku103, true);
function Clicku103(e)
{
windowEvent = e;


if (true) {

	self.location.href="公益项目.html" + GetQuerystring();

}

}
gv_vAlignTable['u103'] = 'top';
var u339 = document.getElementById('u339');
gv_vAlignTable['u339'] = 'top';
var u158 = document.getElementById('u158');
gv_vAlignTable['u158'] = 'top';
var u220 = document.getElementById('u220');

var u3 = document.getElementById('u3');
gv_vAlignTable['u3'] = 'center';
var u117 = document.getElementById('u117');
gv_vAlignTable['u117'] = 'top';
var u31 = document.getElementById('u31');
gv_vAlignTable['u31'] = 'center';
var u234 = document.getElementById('u234');
gv_vAlignTable['u234'] = 'center';
var u73 = document.getElementById('u73');
gv_vAlignTable['u73'] = 'top';
var u270 = document.getElementById('u270');
gv_vAlignTable['u270'] = 'center';
var u199 = document.getElementById('u199');

var u319 = document.getElementById('u319');
gv_vAlignTable['u319'] = 'center';
var u92 = document.getElementById('u92');

var u102 = document.getElementById('u102');

u102.style.cursor = 'pointer';
if (bIE) u102.attachEvent("onclick", Clicku102);
else u102.addEventListener("click", Clicku102, true);
function Clicku102(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}
gv_vAlignTable['u102'] = 'top';
var u56 = document.getElementById('u56');

var u300 = document.getElementById('u300');
gv_vAlignTable['u300'] = 'top';
var u116 = document.getElementById('u116');

u116.style.cursor = 'pointer';
if (bIE) u116.attachEvent("onclick", Clicku116);
else u116.addEventListener("click", Clicku116, true);
function Clicku116(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}
gv_vAlignTable['u116'] = 'top';
var u186 = document.getElementById('u186');
gv_vAlignTable['u186'] = 'top';
var u233 = document.getElementById('u233');

u233.style.cursor = 'pointer';
if (bIE) u233.attachEvent("onclick", Clicku233);
else u233.addEventListener("click", Clicku233, true);
function Clicku233(e)
{
windowEvent = e;


if (true) {

}

}

var u87 = document.getElementById('u87');

var u247 = document.getElementById('u247');

var u68 = document.getElementById('u68');
gv_vAlignTable['u68'] = 'top';
var u226 = document.getElementById('u226');
gv_vAlignTable['u226'] = 'top';
var u198 = document.getElementById('u198');
gv_vAlignTable['u198'] = 'top';
var u101 = document.getElementById('u101');

u101.style.cursor = 'pointer';
if (bIE) u101.attachEvent("onclick", Clicku101);
else u101.addEventListener("click", Clicku101, true);
function Clicku101(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}
gv_vAlignTable['u101'] = 'top';
var u0 = document.getElementById('u0');

var u190 = document.getElementById('u190');
gv_vAlignTable['u190'] = 'top';
var u115 = document.getElementById('u115');

u115.style.cursor = 'pointer';
if (bIE) u115.attachEvent("onclick", Clicku115);
else u115.addEventListener("click", Clicku115, true);
function Clicku115(e)
{
windowEvent = e;


if (true) {

	self.location.href="我捐助的求助.html" + GetQuerystring();

}

}
gv_vAlignTable['u115'] = 'top';
var u313 = document.getElementById('u313');
gv_vAlignTable['u313'] = 'center';
var u291 = document.getElementById('u291');

var u7 = document.getElementById('u7');
gv_vAlignTable['u7'] = 'top';
var u246 = document.getElementById('u246');
gv_vAlignTable['u246'] = 'center';
var u62 = document.getElementById('u62');

var u219 = document.getElementById('u219');
gv_vAlignTable['u219'] = 'top';
var u114 = document.getElementById('u114');

u114.style.cursor = 'pointer';
if (bIE) u114.attachEvent("onclick", Clicku114);
else u114.addEventListener("click", Clicku114, true);
function Clicku114(e)
{
windowEvent = e;


if (true) {

	self.location.href="我发起的求助.html" + GetQuerystring();

}

}
gv_vAlignTable['u114'] = 'top';
var u57 = document.getElementById('u57');

var u169 = document.getElementById('u169');
gv_vAlignTable['u169'] = 'top';
var u290 = document.getElementById('u290');
gv_vAlignTable['u290'] = 'top';
var u187 = document.getElementById('u187');
gv_vAlignTable['u187'] = 'top';
var u38 = document.getElementById('u38');
gv_vAlignTable['u38'] = 'center';
var u245 = document.getElementById('u245');

var u14 = document.getElementById('u14');

var u218 = document.getElementById('u218');
gv_vAlignTable['u218'] = 'top';
var u99 = document.getElementById('u99');

u99.style.cursor = 'pointer';
if (bIE) u99.attachEvent("onclick", Clicku99);
else u99.addEventListener("click", Clicku99, true);
function Clicku99(e)
{
windowEvent = e;


if (true) {

	self.location.href="#" + GetQuerystring();

}

}

var u286 = document.getElementById('u286');

var u168 = document.getElementById('u168');
gv_vAlignTable['u168'] = 'center';
var u230 = document.getElementById('u230');

var u127 = document.getElementById('u127');

var u338 = document.getElementById('u338');
gv_vAlignTable['u338'] = 'top';
var u32 = document.getElementById('u32');
gv_vAlignTable['u32'] = 'top';
var u244 = document.getElementById('u244');
gv_vAlignTable['u244'] = 'center';
var u27 = document.getElementById('u27');
gv_vAlignTable['u27'] = 'center';
var u83 = document.getElementById('u83');
gv_vAlignTable['u83'] = 'top';
var u310 = document.getElementById('u310');

var u207 = document.getElementById('u207');
gv_vAlignTable['u207'] = 'center';
var u185 = document.getElementById('u185');
gv_vAlignTable['u185'] = 'top';
var u40 = document.getElementById('u40');

var u324 = document.getElementById('u324');
gv_vAlignTable['u324'] = 'top';
var u243 = document.getElementById('u243');

var u257 = document.getElementById('u257');
gv_vAlignTable['u257'] = 'center';
var u69 = document.getElementById('u69');

var u289 = document.getElementById('u289');
gv_vAlignTable['u289'] = 'top';
var u45 = document.getElementById('u45');
gv_vAlignTable['u45'] = 'center';
var u206 = document.getElementById('u206');

var u184 = document.getElementById('u184');
gv_vAlignTable['u184'] = 'top';
var u323 = document.getElementById('u323');
gv_vAlignTable['u323'] = 'center';
var u242 = document.getElementById('u242');
gv_vAlignTable['u242'] = 'center';
var u96 = document.getElementById('u96');

var u337 = document.getElementById('u337');
gv_vAlignTable['u337'] = 'top';
var u256 = document.getElementById('u256');

var u53 = document.getElementById('u53');

var u129 = document.getElementById('u129');

var u174 = document.getElementById('u174');
gv_vAlignTable['u174'] = 'top';
var u205 = document.getElementById('u205');
gv_vAlignTable['u205'] = 'top';
var u183 = document.getElementById('u183');
gv_vAlignTable['u183'] = 'top';
var u10 = document.getElementById('u10');
gv_vAlignTable['u10'] = 'top';
var u179 = document.getElementById('u179');

var u141 = document.getElementById('u141');
gv_vAlignTable['u141'] = 'center';
var u197 = document.getElementById('u197');
gv_vAlignTable['u197'] = 'top';
var u39 = document.getElementById('u39');
gv_vAlignTable['u39'] = 'top';
var u71 = document.getElementById('u71');
gv_vAlignTable['u71'] = 'top';
var u15 = document.getElementById('u15');

var u128 = document.getElementById('u128');
gv_vAlignTable['u128'] = 'center';
var u288 = document.getElementById('u288');
gv_vAlignTable['u288'] = 'top';
var u204 = document.getElementById('u204');
gv_vAlignTable['u204'] = 'top';
var u182 = document.getElementById('u182');
gv_vAlignTable['u182'] = 'center';
var u66 = document.getElementById('u66');
gv_vAlignTable['u66'] = 'top';
var u178 = document.getElementById('u178');
gv_vAlignTable['u178'] = 'top';
var u140 = document.getElementById('u140');

var u196 = document.getElementById('u196');
gv_vAlignTable['u196'] = 'top';
var u335 = document.getElementById('u335');
gv_vAlignTable['u335'] = 'top';
var u23 = document.getElementById('u23');
gv_vAlignTable['u23'] = 'center';
var u154 = document.getElementById('u154');
gv_vAlignTable['u154'] = 'top';
var u264 = document.getElementById('u264');
gv_vAlignTable['u264'] = 'top';
var u203 = document.getElementById('u203');
gv_vAlignTable['u203'] = 'top';
var u181 = document.getElementById('u181');

var u84 = document.getElementById('u84');

var u258 = document.getElementById('u258');
gv_vAlignTable['u258'] = 'top';
var u320 = document.getElementById('u320');

var u4 = document.getElementById('u4');
gv_vAlignTable['u4'] = 'top';
var u217 = document.getElementById('u217');
gv_vAlignTable['u217'] = 'top';
var u195 = document.getElementById('u195');
gv_vAlignTable['u195'] = 'top';
var u225 = document.getElementById('u225');
gv_vAlignTable['u225'] = 'top';
var u41 = document.getElementById('u41');
gv_vAlignTable['u41'] = 'top';
var u334 = document.getElementById('u334');
gv_vAlignTable['u334'] = 'center';
var u153 = document.getElementById('u153');
gv_vAlignTable['u153'] = 'top';
if (window.OnLoad) OnLoad();
