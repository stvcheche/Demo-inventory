/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* Tab navigation */
function hometabMng(mims) {
    var arrTabtn = [];
    var arrFnc = [];

    arrTabtn.push("invent_navew");
    arrTabtn.push("invent_navewa");
    arrTabtn.push("invent_navewb");
    arrTabtn.push("invent_navewc");

    arrFnc.push("invenTools");
    arrFnc.push("invenToolsa");
    arrFnc.push("invenToolsb");
    arrFnc.push("invenToolsc");


    for (var i = 0; i < arrTabtn.length; i++) {

	 if (arrTabtn[i] === mims) {
	     document.getElementById(arrTabtn[i]).style.backgroundColor = 'whitesmoke';
	     document.getElementById(arrTabtn[i]).style.color = 'black';
	     inventGthome(arrFnc[i]);

	 } else {
	     document.getElementById(arrTabtn[i]).style.backgroundColor = '#bfbfbf';
	     document.getElementById(arrTabtn[i]).style.color = 'white';

	 }

    }

}

/* Get home window */
function inventGthome(determ) {
    satoxi();
    var xmlhttp = null;
    var dishka = "vida" + new Date().getTime().toString() + "loca";
    var scrwidth = screen.width;
    var scrheight = screen.height;

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

    var vals = "determ=" + determ + "&dimet=" + dishka + "&width=" + scrwidth + "&height=" + scrheight;

    xmlhttp.open('POST', '../Logic/navigation.php');
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xmlhttp.onreadystatechange = function () {
	 if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
	     document.getElementById("skopsGasca").innerHTML = xmlhttp.responseText;
	     document.getElementById("skopfasad").className = "mizacdswtch";

	     if (determ === "invenToolsa") {
		  document.getElementById("mankaidec").style.background = '#ffc966';

	     }

	     inventBkusr(determ, "nada", "nada");

	     xmlhttp = null;
	     satoxia();
	 }
    };

    xmlhttp.send(vals);

}

function inventBkusr(mims, srches, srtId) {
    if (srches === "nada") {
	 satoxi();

    } else {
	 savista("Searching database.....");
    }

    var xmlhttp = null;
    var dishka = "vida" + new Date().getTime().toString() + "loca";
    var pagval = parseInt(document.getElementById("invnt_nbtn").innerHTML);
    var determ = "invntBacksingusr";
    var scrwidth = screen.width;
    var scrheight = screen.height;

    var vexac = document.getElementById("inventstevacq").value;
    var dimeta = document.getElementById("invntSwtchinpt").value;
    var frodta = document.getElementById("salesfro").innerHTML;
    var todta = document.getElementById("salesto").innerHTML;

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

    var vals = "determ=" + determ + "&dimet=" + dishka + "&width=" + scrwidth +
	     "&height=" + scrheight + "&vexac=" + vexac + "&mims=" + mims +
	     "&pagval=" + pagval + "&srches=" + srches + "&srtId=" + srtId +
	     "&dimeta=" + dimeta + "&frodta=" + frodta + "&todta=" + todta;

    xmlhttp.open('POST', '../Logic/navigation.php');
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xmlhttp.onreadystatechange = function () {
	 if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
	     document.getElementById("inventbackusr").innerHTML = xmlhttp.responseText;

	     inventshowNav();

	     if (srtId !== "nada") {
		  document.getElementById("invnt_navsrt").value = srtId;

	     }

	     xmlhttp = null;

	     if (srches === "nada") {
		  satoxia();

	     } else {
		  savisto();
	     }

	 }
    };

    xmlhttp.send(vals);

}


function inventshowNav() {
    var contval = parseInt(document.getElementById("inventcntbn").value);

    if (contval > 1) {
	 document.getElementById("invnt_pager").style.visibility = 'visible';
	 document.getElementById("salesPgindica").innerHTML = contval - 1;

    } else {
	 document.getElementById("invnt_pager").style.visibility = 'hidden';
    }

}

/* Date selection function */
function dateSuprefnc(mims) {
    document.getElementById("invnt_nbtn").innerHTML = 0;
    inventBkusr(mims, "nada", "nada");

}

/* Switch function */
function inventrySwich(idesc, mims) {
    var idescarr = ["mankaidec", "mankaideca"];

    for (var tee = 0; tee < idescarr.length; tee++) {
	 if (idesc === idescarr[tee]) {
	     document.getElementById(idescarr[tee]).style.background = '#ffc966';

	 } else {
	     document.getElementById(idescarr[tee]).style.background = 'whitesmoke';

	 }
    }

    if (idesc === idescarr[0]) {
	 document.getElementById("invntSwtchinpt").value = "Pending";

    } else if (idesc === idescarr[1]) {
	 document.getElementById("invntSwtchinpt").value = "Dispatched";

    }

    inventBkusr(mims, "nada", "nada");

}

/* Switch function 1 */
function invSwitch(mims, mimsa) {
    if (mims === "skopfasad") {
	 document.getElementById("skopfasad").className = "mizacdswtch";
	 document.getElementById("skopvasad").className = "mizacd";

	 document.getElementById("inventstevacq").value = "Active";


    } else if (mims === "skopvasad") {
	 document.getElementById("skopvasad").className = "mizacdswtch";
	 document.getElementById("skopfasad").className = "mizacd";

	 document.getElementById("inventstevacq").value = "Depreciated";


    }

    inventBkusr(mimsa, "nada", "nada");

}

/* Page navigation piece */
function pageNavigation(mims, mimsa) {
    var pagval = parseInt(document.getElementById("invnt_nbtn").innerHTML);
    var relaval = parseInt(document.getElementById("salesPgindica").innerHTML);
    var contvala = parseInt(document.getElementById("invnt_navsrt").value);

    if (mims === "invnt_fbtn") {
	 if (pagval !== 0) {
	     document.getElementById("invnt_nbtn").innerHTML = pagval - 1;

	 }


    } else if (mims === "invnt_tbtn") {
	 if (pagval !== relaval) {
	     document.getElementById("invnt_nbtn").innerHTML = pagval + 1;

	 }

    }

    if (contvala === 200) {
	 inventBkusr(mimsa, "nada", "nada");

    } else {
	 inventBkusr(mimsa, "nada", contvala);

    }

}


/* New records */
function inventnewrecd(mims) {
    var xmlhttp = null;
    var determ = "newRecord";
    var dishy = "nwrecod" + new Date().getTime().toString();

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

    var vals = "determ=" + determ + "&dimet=" + dishy + "&mims=" + mims;

    xmlhttp.open('POST', '../Logic/navigation.php');
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

function removepopup(mimsa) {
    var cooliz = document.getElementById(mimsa);
    document.body.removeChild(cooliz);

}

/* New records */
function setPrice(mims) {
    var idecprcc = mims.split("#");
    document.getElementById("saleprccidec").value = idecprcc[1];

}

/* Save record */
function prinventSaverecod(mimc, idex) {
    var inp = [];
    var ermssg = [];
    var ermssgval = [];
    var actval = [];
    var ckvala;

    if (mimc === "invenToolsb") {
	 inp.push("saleprdctidec");
	 inp.push("saleprccidec");
	 inp.push("saleqntyidec");

	 ermssg.push(" select the product");
	 ermssg.push(" enter price");
	 ermssg.push(" enter quantity");

	 ckvala = ["deflt", "", ""];

    } else if (mimc === "invenToolsc") {
	 inp.push("prdprdctidec");
	 inp.push("prdprccdidec");
	 inp.push("prdreorderlvlid");
	 inp.push("prdreorderqntyid");

	 ermssg.push(" enter the product");
	 ermssg.push(" enter price");
	 ermssg.push(" enter reorder level");
	 ermssg.push(" enter reorder quantity");

	 ckvala = ["", "", "", ""];

    }

    for (var tecs = 0; tecs < inp.length; tecs++) {
	 actval.push(document.getElementById(inp[tecs]).value);
    }


    for (var max = 0; max < ermssg.length; max++) {

	 if (actval[max] === ckvala[max]) {
	     ermssgval.push(ermssg[max]);

	 }
    }

    if (ermssgval.length > 0) {
	 document.getElementById("savemultido").style.display = 'inline-block';
	 document.getElementById("savemultido").innerHTML = "Kindly:  " + ermssgval.toString();

    } else {
	 document.getElementById("savemultido").style.display = 'none';
	 inventSaverecod(inp, mimc, idex);

    }

}

function inventSaverecod(mims, mimc) {

}
/* Post new record */
function inventSaverecod(inp, mimb, idex) {
    satoxi();
    var xmlhttp = null;
    var determ = "invsavrecode";
    var dta = [];

    if (mimb === "invenToolsb") {
	 dta.push(druCiller(encodeURIComponent(document.getElementById(inp[0]).value)));
	 dta.push(druCiller(encodeURIComponent(document.getElementById(inp[1]).value)));
	 dta.push(druCiller(encodeURIComponent(document.getElementById(inp[2]).value)));

    } else if (mimb === "invenToolsc") {
	 dta.push(druCiller(encodeURIComponent(document.getElementById(inp[0]).value)));
	 dta.push(druCiller(encodeURIComponent(document.getElementById(inp[1]).value)));
	 dta.push(druCiller(encodeURIComponent(document.getElementById(inp[2]).value)));
	 dta.push(druCiller(encodeURIComponent(document.getElementById(inp[3]).value)));

    }



    var dtast = JSON.stringify(dta);

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

    var vals = "determ=" + determ + "&dta=" + dtast + "&destored=" + mimb;

    xmlhttp.open('POST', '../Logic/navigation.php');
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xmlhttp.onreadystatechange = function () {
	 if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
	     if (xmlhttp.responseText === "Error") {
		  document.getElementById("savemultido").style.display = 'inline-block';
		  document.getElementById("savemultido").innerHTML = "an error occured whila saving record";

	     } else {
		  removepopup(idex);
		  inventBkusr(mimb, "nada", "nada");
		  invntGtuusum(mimb);
	     }



	     xmlhttp = null;
	     satoxia();
	 }
    };

    xmlhttp.send(vals);

}

/*
 * 
 * Get recors count
 */
function invntGtuusum(mims) {
    satoxi();
    var xmlhttp = null;
    var determ = "invntupdcount";

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

    var vals = "determ=" + determ + "&mims=" + mims;

    xmlhttp.open('POST', '../Logic/navigation.php');
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xmlhttp.onreadystatechange = function () {
	 if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
	     var varicos = JSON.parse(xmlhttp.responseText);

	     document.getElementById("sumSkops").innerHTML = varicos[0];
	     document.getElementById("acti_skops").innerHTML = varicos[1];
	     document.getElementById("inacti_skops").innerHTML = varicos[2];


	     xmlhttp = null;
	     satoxia();
	 }
    };

    xmlhttp.send(vals);

}

function invprdrchUpdatrecd(mims, mimsa, mimsb, musis, paramt) {
    var texa = document.getElementById(mims).value;


    document.getElementById(mimsb).value = texa;
    hidasrch(mimsa);

    var paramtarry = paramt.split(",");

    updatGen(paramtarry[0], paramtarry[1], paramtarry[2], paramtarry[3], paramtarry[4], paramtarry[5]);


}

/* Dispatch order/Activate deactivate products */
function orDispactdiact(mims, mimsa, mimsb) {
    satoxi();
    var xmlhttp = null;
    var determ = "invordispatch";


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

    var vals = "determ=" + determ + "&mims=" + mims + "&mimsa=" + mimsa + "&mimsb=" + mimsb;

    xmlhttp.open('POST', '../Logic/navigation.php');
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xmlhttp.onreadystatechange = function () {
	 if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
	     invntGtuusum(mimsa);
	     inventBkusr(mimsa, "nada", "nada");

	     xmlhttp = null;
	     satoxia();
	 }
    };

    xmlhttp.send(vals);

}