/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

window.onload = function () {
    loadApp();

};

function loadApp() {
    watoxi();

    var xmlhttp = null;
    var dimet = "loadmain";

    if (window.XMLHttpRequest) {
	 /* code for IE7+, Firefox, Chrome, Opera, Safari */
	 xmlhttp = new XMLHttpRequest();
    } else {
	 /* code for IE6, IE5 */
	 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    if (xmlhttp.overrideMimeType) {
	 xmlhttp.overrideMimeType('text/plain');

    }

    var vals = "determ=" + dimet;

    xmlhttp.open('POST', '../Logic/navigation.php');
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xmlhttp.onreadystatechange = function () {
	 if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
	     document.getElementById("vostino").innerHTML = xmlhttp.responseText;

	     var gims = "invenTools";
	     var nagev = "invent_navew";

	     inventGthome(gims);
	     document.getElementById(nagev).style.backgroundColor = 'whitesmoke';
	     document.getElementById(nagev).style.color = 'black';

	     watoxia();
	     xmlhttp = null;
	 }

    };

    xmlhttp.send(vals);
}


/* Messages and loading indicators */
function watoxi() {
    document.getElementById("ontopaid").style.display = 'block';
    document.getElementById("miscid").style.display = 'block';

}


function watoxia() {
    document.getElementById("ontopaid").style.display = 'none';
    document.getElementById("miscid").style.display = 'none';

}


function satoxi() {
    document.getElementById("ontopeya").style.display = 'block';
    document.getElementById("miscid").style.display = 'block';

}


function satoxia() {
    document.getElementById("ontopeya").style.display = 'none';
    document.getElementById("miscid").style.display = 'none';

}


function patoxi() {
    document.getElementById("miscid").style.display = 'block';

}


function patoxia() {
    document.getElementById("miscid").style.display = 'none';

}


function savista(mims) {
    document.getElementById("sovisto_txt").innerHTML = mims;
    document.getElementById("sovisto").style.display = 'block';

}


function savisto() {
    document.getElementById("sovisto").style.display = 'none';

}


function wheel(jnr) {
    jnr = 0;

}
/* Messages and loading indicators */

/* Error logics */
function errShow(elenmt, ttle) {
    elenmt.innerHTML = ttle;
    elenmt.style.display = 'inline-block';

}

function errHide(elenmt) {
    elenmt.innerHTML = "";
    elenmt.style.display = 'none';

}

/* General message */
function mssg_general(valsec) {
    var xmlhttp = null;
    var determ = "genmessage";
    var dishy = "nwf_" + new Date().getTime().toString();

    if (window.XMLHttpRequest) {
	 // code for IE7+, Firefox, Chrome, Opera, Safari
	 xmlhttp = new XMLHttpRequest();
    } else {
	 // code for IE6, IE5
	 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    if (xmlhttp.overrideMimeType) {
	 xmlhttp.overrideMimeType('text/plain');

    }

    var vals = "determ=" + determ + "&dimet=" + dishy + "&valsec=" + valsec;

    xmlhttp.open('POST', '../Swipost/Swipost.php');
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xmlhttp.onreadystatechange = function () {
	 if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
	     if (xmlhttp.responseText !== "null") {
		  var keypad1 = document.createElement("div");
		  keypad1.innerHTML = xmlhttp.responseText;
		  keypad1.id = dishy;
		  document.body.appendChild(keypad1);

	     } else {
	     }

	 }
    };

    xmlhttp.send(vals);

}


function mssg_general_rmv(mimsa) {
    var cooliz = document.getElementById(mimsa);
    document.body.removeChild(cooliz);

}

/* Make content editable */
function admMkedit(mims) {
    var overa = document.getElementById(mims);
    var teza = overa.contentEditable;

    if (teza !== "true") {
	 overa.contentEditable = true;
	 overa.focus();

	 overa.className = 'tdemprdec';

	 mvtoEnd(overa);

    }

}

function admMkedita(mims) {
    var overa = document.getElementById(mims);
    var teza = overa.readOnly;

    if (teza !== "true") {
	 overa.readOnly = false;
	 overa.focus();

	 overa.parentNode.className = 'tdemprdec';

	 mvtoEnd(overa);

    }

}

function admMkeditb(mims) {
    var overa = document.getElementById(mims);
    var teza = overa.contentEditable;

    if (teza !== "true") {
	 overa.contentEditable = true;
	 overa.focus();

	 overa.className = 'demtelrb';

	 mvtoEnd(overa);

    }

}


function mvtoEnd(el) {
    el.focus();

    if (typeof window.getSelection !== "undefined"
	     && typeof document.createRange !== "undefined") {

	 var range = document.createRange();
	 range.selectNodeContents(el);
	 range.collapse(false);

	 var sel = window.getSelection();
	 sel.removeAllRanges();
	 sel.addRange(range);

    } else if (typeof document.body.createTextRange !== "undefined") {
	 var textRange = document.body.createTextRange();
	 textRange.moveToElementText(el);
	 textRange.collapse(false);
	 textRange.select();

    }
}

/*
 * Update record
 */
function updatGen(babs, dims, dimet, dimeta, nexo, ida) {
    var mssge = "Saving in background...";
    savista(mssge);

    var rowex = null;
    var mims = null;
    var overa = document.getElementById(nexo);

    if (dims === "mnex") {
	 rowex = nexo.substr(nexo.indexOf(",") + 1);
	 mims = druCiller(encodeURIComponent(document.getElementById(nexo).innerHTML));

    } else if (dims === "ckmnex") {
	 rowex = nexo.substr(nexo.indexOf(",") + 1);
	 mims = druCiller(encodeURIComponent(document.getElementById(nexo).value));

    } else if (dims === "ckmnexa") {
	 rowex = document.getElementById(nexo).parentNode.cellIndex;
	 mims = druCiller(encodeURIComponent(document.getElementById(nexo).value));

    } else if (dims === "mnexa") {
	 rowex = document.getElementById(nexo).cellIndex;
	 mims = druCiller(encodeURIComponent(document.getElementById(nexo).innerHTML));

    } else if (dims === "mnexb") {
	 rowex = document.getElementById(nexo).parentNode.cellIndex;
	 mims = druCiller(encodeURIComponent(document.getElementById(nexo).value));

    }


    if (window.XMLHttpRequest) {
	 // code for IE7+, Firefox, Chrome, Opera, Safari
	 xmlhttp = new XMLHttpRequest();
    } else {
	 // code for IE6, IE5
	 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    if (xmlhttp.overrideMimeType) {
	 xmlhttp.overrideMimeType('text/plain');

    }

    var vals = "determ=" + dimet + "&dimeta=" + dimeta + "&ida=" + ida + "&dta=" + mims + "&rowex=" + rowex;

    xmlhttp.open('POST', '' + babs + '');
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xmlhttp.onreadystatechange = function () {
	 if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {


	     savisto();
	 }
    };


    xmlhttp.send(vals);

}

/* Encode data */
function druCiller(mims) {
    var Base64 = {
	 _keyStr: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
	 encode: function (input) {
	     var output = "";
	     var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
	     var i = 0;

	     input = Base64._utf8_encode(input);

	     while (i < input.length) {

		  chr1 = input.charCodeAt(i++);
		  chr2 = input.charCodeAt(i++);
		  chr3 = input.charCodeAt(i++);

		  enc1 = chr1 >> 2;
		  enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
		  enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
		  enc4 = chr3 & 63;

		  if (isNaN(chr2)) {
		      enc3 = enc4 = 64;
		  } else if (isNaN(chr3)) {
		      enc4 = 64;
		  }

		  output = output + this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) + this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);

	     }

	     return output;
	 },
	 decode: function (input) {
	     var output = "";
	     var chr1, chr2, chr3;
	     var enc1, enc2, enc3, enc4;
	     var i = 0;

	     input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

	     while (i < input.length) {

		  enc1 = this._keyStr.indexOf(input.charAt(i++));
		  enc2 = this._keyStr.indexOf(input.charAt(i++));
		  enc3 = this._keyStr.indexOf(input.charAt(i++));
		  enc4 = this._keyStr.indexOf(input.charAt(i++));

		  chr1 = (enc1 << 2) | (enc2 >> 4);
		  chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
		  chr3 = ((enc3 & 3) << 6) | enc4;

		  output = output + String.fromCharCode(chr1);

		  if (enc3 != 64) {
		      output = output + String.fromCharCode(chr2);
		  }
		  if (enc4 != 64) {
		      output = output + String.fromCharCode(chr3);
		  }

	     }

	     output = Base64._utf8_decode(output);

	     return output;

	 },
	 _utf8_encode: function (string) {
	     string = string.replace(/\r\n/g, "\n");
	     var utftext = "";

	     for (var n = 0; n < string.length; n++) {

		  var c = string.charCodeAt(n);

		  if (c < 128) {
		      utftext += String.fromCharCode(c);
		  } else if ((c > 127) && (c < 2048)) {
		      utftext += String.fromCharCode((c >> 6) | 192);
		      utftext += String.fromCharCode((c & 63) | 128);
		  } else {
		      utftext += String.fromCharCode((c >> 12) | 224);
		      utftext += String.fromCharCode(((c >> 6) & 63) | 128);
		      utftext += String.fromCharCode((c & 63) | 128);
		  }

	     }

	     return utftext;
	 },
	 _utf8_decode: function (utftext) {
	     var string = "";
	     var i = 0;
	     var c = c1 = c2 = 0;

	     while (i < utftext.length) {

		  c = utftext.charCodeAt(i);

		  if (c < 128) {
		      string += String.fromCharCode(c);
		      i++;
		  } else if ((c > 191) && (c < 224)) {
		      c2 = utftext.charCodeAt(i + 1);
		      string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
		      i += 2;
		  } else {
		      c2 = utftext.charCodeAt(i + 1);
		      c3 = utftext.charCodeAt(i + 2);
		      string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
		      i += 3;
		  }

	     }

	     return string;
	 }

    };

    var durex = mims.replace(/[(]/g, "[");
    var durexa = durex.replace(/[)]/g, "]");
    var ultimanery = Base64.encode(durexa);

    return ultimanery;

}

function druCillera(mims) {
    var Base64 = {
	 _keyStr: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
	 encode: function (input) {
	     var output = "";
	     var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
	     var i = 0;

	     input = Base64._utf8_encode(input);

	     while (i < input.length) {

		  chr1 = input.charCodeAt(i++);
		  chr2 = input.charCodeAt(i++);
		  chr3 = input.charCodeAt(i++);

		  enc1 = chr1 >> 2;
		  enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
		  enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
		  enc4 = chr3 & 63;

		  if (isNaN(chr2)) {
		      enc3 = enc4 = 64;
		  } else if (isNaN(chr3)) {
		      enc4 = 64;
		  }

		  output = output + this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) + this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);

	     }

	     return output;
	 },
	 decode: function (input) {
	     var output = "";
	     var chr1, chr2, chr3;
	     var enc1, enc2, enc3, enc4;
	     var i = 0;

	     input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

	     while (i < input.length) {

		  enc1 = this._keyStr.indexOf(input.charAt(i++));
		  enc2 = this._keyStr.indexOf(input.charAt(i++));
		  enc3 = this._keyStr.indexOf(input.charAt(i++));
		  enc4 = this._keyStr.indexOf(input.charAt(i++));

		  chr1 = (enc1 << 2) | (enc2 >> 4);
		  chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
		  chr3 = ((enc3 & 3) << 6) | enc4;

		  output = output + String.fromCharCode(chr1);

		  if (enc3 != 64) {
		      output = output + String.fromCharCode(chr2);
		  }
		  if (enc4 != 64) {
		      output = output + String.fromCharCode(chr3);
		  }

	     }

	     output = Base64._utf8_decode(output);

	     return output;

	 },
	 _utf8_encode: function (string) {
	     string = string.replace(/\r\n/g, "\n");
	     var utftext = "";

	     for (var n = 0; n < string.length; n++) {

		  var c = string.charCodeAt(n);

		  if (c < 128) {
		      utftext += String.fromCharCode(c);
		  } else if ((c > 127) && (c < 2048)) {
		      utftext += String.fromCharCode((c >> 6) | 192);
		      utftext += String.fromCharCode((c & 63) | 128);
		  } else {
		      utftext += String.fromCharCode((c >> 12) | 224);
		      utftext += String.fromCharCode(((c >> 6) & 63) | 128);
		      utftext += String.fromCharCode((c & 63) | 128);
		  }

	     }

	     return utftext;
	 },
	 _utf8_decode: function (utftext) {
	     var string = "";
	     var i = 0;
	     var c = c1 = c2 = 0;

	     while (i < utftext.length) {

		  c = utftext.charCodeAt(i);

		  if (c < 128) {
		      string += String.fromCharCode(c);
		      i++;
		  } else if ((c > 191) && (c < 224)) {
		      c2 = utftext.charCodeAt(i + 1);
		      string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
		      i += 2;
		  } else {
		      c2 = utftext.charCodeAt(i + 1);
		      c3 = utftext.charCodeAt(i + 2);
		      string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
		      i += 3;
		  }

	     }

	     return string;
	 }

    };

    var durex = mims.replace(/[(]/g, "[");
    var durexa = durex.replace(/[)]/g, "]");
    var ultimanery = Base64.decode(durexa);

    return ultimanery;

}

/*Glob seradhera updec*/
function globSrchup(mims, mimsa, mimsb, mimsc, paramt) {
    savista("Searching........");


    var valec = document.getElementById(mims).value;
    var determ = "globGhestas";
    var posCorct = parseInt(mimsc);
    var paramtarry = paramt.split("#E#");


    var paramval;

    if (paramtarry[0] === "elem") {
	 paramval = document.getElementById(paramtarry[1]).value;


    } else if (paramtarry[1] === "velem") {
	 paramval = paramt + "," + document.getElementById(mimsa + ",6").value;

    } else {
	 paramval = paramt;
    }


    var x = 0;
    var y = 0;

    var xPos = document.getElementById(mims).getBoundingClientRect().left;
    var yPos = document.getElementById(mims).getBoundingClientRect().top;
    var yDeterm = parseInt((yPos / window.innerHeight) * 100);


    var xmlhttp = null;

    if (window.XMLHttpRequest) {
	 // code for IE7+, Firefox, Chrome, Opera, Safari
	 xmlhttp = new XMLHttpRequest();
    } else {
	 // code for IE6, IE5
	 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    if (xmlhttp.overrideMimeType) {
	 xmlhttp.overrideMimeType('text/plain');

    }

    var vals = "determ=" + determ + "&valec=" + valec + "&zims=" + mims + "&dimet=" +
	     mimsa + "&musis=" + mimsb + "&paramt=" + druCiller(paramval);

    xmlhttp.open('POST', '../Logic/navigation.php');
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xmlhttp.onreadystatechange = function () {
	 if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
	     document.getElementById("srchContent").innerHTML = xmlhttp.responseText;

	     if (yDeterm < 60) {
		  x = xPos - posCorct;
		  y = yPos + (35 - posCorct);
		  document.getElementById(mimsa + "globPence").className = "hifga";

	     } else if (yDeterm >= 60) {
		  x = xPos - posCorct;
		  y = yPos - (40 + posCorct);
		  document.getElementById(mimsa + "globPence").className = "hifgamod";

	     }

	     document.getElementById("dynaGlobsrch").style.display = 'block';

	     document.getElementById(mimsa + "globFlux").style.left = '' + x + 'px';
	     document.getElementById(mimsa + "globFlux").style.top = '' + y + 'px';

	     savisto();

	 }
    };

    xmlhttp.send(vals);

}

function srchSetext(mims, mimsa, mimsb, musis, paramt) {
    var texa = document.getElementById(mims).value;
    musis = "nada";
    paramt = "nada";

    document.getElementById(mimsb).value = texa;
    hidasrch(mimsa);

}

function hidasrch() {
    var mincu = "dynaGlobsrch";
    document.getElementById(mincu).style.display = 'none';

}

function bigvai(vail) {
    document.getElementById(vail).style.background = "#999999";
    document.getElementById(vail).style.color = "white";
    document.getElementById(vail).style.fontWeight = "900";
}

function bigvaia(vail) {
    document.getElementById(vail).style.background = "white";
    document.getElementById(vail).style.color = "black";
    document.getElementById(vail).style.fontWeight = "400";

}
