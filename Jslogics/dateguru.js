function pkr_pickajhda(ghalick, viol, event, paramt) {
    var xmlhttp = null;
    satoxi();
    var determ = "absolute";
    var dishy = "pal_" + new Date().getTime().toString();

    var cliX = parseInt(event.clientX);
    var winWth = parseInt(window.innerWidth);
    var x = 0;

    var cliY = parseInt(event.clientY);
    var winHt = parseInt(window.innerHeight);
    var y = 0;


    var month = ["January", "February", "March", "April", "May", "June", "July", "August",
        "September", "October", "November", "December"];

    var dateyr = new Date();
    var dimet = dateyr.getFullYear();
    var dimeta = month[dateyr.getMonth()];
    var dd = dateyr.getDate();

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

    var vals = "dimet=" + dimet + "&dimeta=" + dimeta + "&dimetb=" + dishy + "&dimetc=" + ghalick +
            "&dimetd=" + viol + "&paramt=" + paramt + "&determ=" + determ;

    xmlhttp.open('POST', '../Dateguru/dateswitch.php');
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            var keypad1 = document.createElement("div");
            keypad1.innerHTML = xmlhttp.responseText;
            keypad1.id = dishy;
            document.body.appendChild(keypad1);

            /* Dynamic horizontal position */
            if (winWth - cliX < 402 && winWth - cliX > 0) {
                x = (cliX) - (412 - (winWth - cliX));

            } else if (winWth - cliX <= 0) {
                x = cliX - 412;

            } else {
                x = cliX + 5.0;

            }

            /* Dynamic vertical position */
            if (winHt - cliY < 185 && winHt - cliY > 0) {
                y = cliY - 190;

            } else if (screen.height - cliY <= 0) {
                y = cliY - 190;

            } else {
                y = cliY + 15;

            }

            document.getElementById(dishy + "dpk").style.left = '' + x + 'px';
            document.getElementById(dishy + "dpk").style.top = '' + y + 'px';

            document.getElementById(dishy + "," + dd).style.backgroundColor = 'blue';
            document.getElementById(dishy + "," + dd).style.color = 'white';
            satoxia();
        }
    };

    xmlhttp.send(vals);
}
;

function pkr_dpkrfrrd(mnthch) {
    satoxi();

    var matches = mnthch.match(/\S+(?=,)/g);
    var dtrvosqa = parseInt(document.getElementById(matches + ",dtrvosqa").value);
    var dimetc = document.getElementById(matches + ",dtoupdtval").value;
    var dimetd = document.getElementById(matches + ",dtoupdtvalq").value;
    var paramt = document.getElementById(matches + ",paramt").value;
    var dtrvosqb = null;
    var determ = "absolute";

    var top = document.getElementById(matches + "dpk").style.top;
    var left = document.getElementById(matches + "dpk").style.left;

    if (mnthch === matches + ",mthbckwrd") {
        if (dtrvosqa === 0) {
            dtrvosqb = 11;
        } else {
            dtrvosqb = dtrvosqa - 1;
        }
    } else if (mnthch === matches + ",mthfwrd") {
        if (dtrvosqa === 11) {
            dtrvosqb = 0;
        } else {
            dtrvosqb = dtrvosqa + 1;
        }
    }

    var month = ["January", "February", "March", "April", "May", "June", "July", "August",
        "September", "October", "November", "December"];

    var dtrvosqc = month[dtrvosqb];

    document.getElementById(matches + ",dtrvosqa").value = dtrvosqb;
    document.getElementById(matches + ",dtrvos").value = dtrvosqc;

    var dimet = document.getElementById(matches + ",yearvos").value;
    var dimeta = document.getElementById(matches + ",dtrvos").value;

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

    var vals = "dimet=" + dimet + "&dimeta=" + dimeta + "&dimetb=" + matches + "&dimetc=" + dimetc +
            "&dimetd=" + dimetd + "&paramt=" + paramt + "&determ=" + determ;

    xmlhttp.open('POST', '../Dateguru/dateswitch.php');
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById(matches).innerHTML = xmlhttp.responseText;
            document.getElementById(matches + "dpk").style.top = '' + top + '';
            document.getElementById(matches + "dpk").style.left = '' + left + '';

            satoxia();
        }
    };

    xmlhttp.send(vals);
}
;

function pkr_yearpkrfrrd(mnthch) {
    satoxi();

    var matches = mnthch.match(/\S+(?=,)/g);
    var dtrvosqa = parseInt(document.getElementById(matches + ",yearvos").value);
    var dimetc = document.getElementById(matches + ",dtoupdtval").value;
    var dimetd = document.getElementById(matches + ",dtoupdtvalq").value;
    var paramt = document.getElementById(matches + ",paramt").value;
    var dtrvosqb = null;
    var determ = "absolute";

    var top = document.getElementById(matches + "dpk").style.top;
    var left = document.getElementById(matches + "dpk").style.left;

    if (mnthch === matches + ",yrrbckwrd") {
        dtrvosqb = dtrvosqa - 1;

    } else if (mnthch === matches + ",yrrforwrd") {
        dtrvosqb = dtrvosqa + 1;
    }
    document.getElementById(matches + ",yearvos").value = dtrvosqb;

    var dimet = document.getElementById(matches + ",yearvos").value;
    var dimeta = document.getElementById(matches + ",dtrvos").value;

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

    var vals = "dimet=" + dimet + "&dimeta=" + dimeta + "&dimetb=" + matches + "&dimetc=" + dimetc +
            "&dimetd=" + dimetd + "&paramt=" + paramt + "&determ=" + determ;

    xmlhttp.open('POST', '../Dateguru/dateswitch.php');
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById(matches).innerHTML = xmlhttp.responseText;
            document.getElementById(matches + "dpk").style.top = '' + top + '';
            document.getElementById(matches + "dpk").style.left = '' + left + '';

            satoxia();
        }
    };

    xmlhttp.send(vals);

}


function pkr_assxevisto(wraxy) {
    var matches = wraxy.match(/\S+(?=,)/g);

    var dtapkr = document.getElementById(wraxy).value;
    var dtapkra = document.getElementById(matches + ",dtoupdtval").value;
    var dtapkrb = document.getElementById(matches + ",dtoupdtvalq").value;
    var uniqa = document.getElementById(matches + ",paramt").value;


    if (dtapkr > 0) {
        var mthpkr = document.getElementById(matches + ",dtrvos").value;
        var yerpkr = document.getElementById(matches + ",yearvos").value;

        var compdta = dtapkr + "-" + mthpkr + "-" + yerpkr;
        document.getElementById(dtapkra).innerHTML = compdta;
        var fmode = window[dtapkrb];

        var proc_arry = uniqa.split(",");

        if (proc_arry.length < 3) {
            fmode(uniqa);

        } else if (proc_arry.length === 6) {
            fmode(proc_arry[0].replace(/\s/g, ''), proc_arry[1].replace(/\s/g, ''),
                    proc_arry[2].replace(/\s/g, ''), proc_arry[3].replace(/\s/g, ''),
                    proc_arry[4].replace(/\s/g, ''), proc_arry[5].replace(/\s/g, ''));

        } else if (proc_arry.length === 7) {
            var moduca = proc_arry[4] + "," + proc_arry[5];
            var moducamod = moduca.replace(/\s/g, '');

            fmode(proc_arry[0].replace(/\s/g, ''), proc_arry[1].replace(/\s/g, ''),
                    proc_arry[2].replace(/\s/g, ''), proc_arry[3].replace(/\s/g, ''),
                    moducamod, proc_arry[6].replace(/\s/g, ''));

        }

        document.getElementById(matches).remove();

    } else {

    }
}

function clozdtpckr(wraxy) {
    var matches = wraxy.match(/\S+(?=,)/g);
    document.getElementById(matches).remove();
}


/*Inline date*/
function pkr_pickainline(ghalick, viol, viola, paramt, paramta, ghalicka) {
    var xmlhttp = null;
    satoxi();
    var dishy = "pal_" + new Date().getTime().toString();
    var determ = "inline";


    var month = ["January", "February", "March", "April", "May", "June", "July", "August",
        "September", "October", "November", "December"];

    var dateyr = new Date();
    var dimet = dateyr.getFullYear();
    var dimeta = month[dateyr.getMonth()];
    var dd = dateyr.getDate();

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

    var vals = "dimet=" + dimet + "&dimeta=" + dimeta + "&dimetb=" + dishy + "&dimetc=" + ghalick +
            "&dimetd=" + viol + "&dimetde=" + viola + "&paramt=" + paramt + "&paramta=" + paramta +
            "&ghalicka=" + ghalicka + "&determ=" + determ;

    xmlhttp.open('POST', '../Dateguru/dateswitch.php');
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById(ghalicka).innerHTML = xmlhttp.responseText;

            document.getElementById(dishy + "," + dd).style.backgroundColor = 'blue';
            document.getElementById(dishy + "," + dd).style.color = 'white';

            satoxia();
        }
    };

    xmlhttp.send(vals);
}

function pkr_dpkrfrrdin(mnthch) {
    satoxi();
    var matches = mnthch.match(/\S+(?=,)/g);
    var dtrvosqa = parseInt(document.getElementById(matches + ",dtrvosqa").value);
    var dimetc = document.getElementById(matches + ",dtoupdtval").value;
    var dimetd = document.getElementById(matches + ",dtoupdtvalq").value;
    var dimetde = document.getElementById(matches + ",dtoupdtvalqa").value;
    var paramt = document.getElementById(matches + ",paramt").value;
    var paramta = document.getElementById(matches + ",paramta").value;
    var ghalicka = document.getElementById(matches + ",ghalicvalue").value;
    var dtrvosqb = null;
    var determ = "inline";


    if (mnthch === matches + ",mthbckwrd") {
        if (dtrvosqa === 0) {
            dtrvosqb = 11;
        } else {
            dtrvosqb = dtrvosqa - 1;
        }
    } else if (mnthch === matches + ",mthfwrd") {
        if (dtrvosqa === 11) {
            dtrvosqb = 0;
        } else {
            dtrvosqb = dtrvosqa + 1;
        }
    }

    var month = ["January", "February", "March", "April", "May", "June", "July", "August",
        "September", "October", "November", "December"];

    var dtrvosqc = month[dtrvosqb];

    document.getElementById(matches + ",dtrvosqa").value = dtrvosqb;
    document.getElementById(matches + ",dtrvos").value = dtrvosqc;

    var dimet = document.getElementById(matches + ",yearvos").value;
    var dimeta = document.getElementById(matches + ",dtrvos").value;

    var ssdate = new Date();
    var ssyear = ssdate.getFullYear();
    var ssmonth = month[ssdate.getMonth()];
    var dd = ssdate.getDate();

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

    var vals = "dimet=" + dimet + "&dimeta=" + dimeta + "&dimetb=" + matches + "&dimetc=" + dimetc +
            "&dimetd=" + dimetd + "&dimetde=" + dimetde + "&paramt=" + paramt + "&paramta=" +
            paramta + "&ghalicka=" + ghalicka + "&determ=" + determ;

    xmlhttp.open('POST', '../Dateguru/dateswitch.php');
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById(ghalicka).innerHTML = xmlhttp.responseText;

            var dtapkr = 1;
            var dtapkrb = document.getElementById(matches + ",dtoupdtvalq").value;


            if (dtapkr > 0) {
                var mthpkr = document.getElementById(matches + ",dtrvos").value;
                var yerpkr = document.getElementById(matches + ",yearvos").value;

                var compdta = dtapkr + "-" + mthpkr + "-" + yerpkr;
                document.getElementById(dimetc).value = compdta;

                var fmode = window[dtapkrb];
                fmode(paramt, compdta);

                if (ssmonth === mthpkr && ssyear.toString() === yerpkr) {
                    document.getElementById(matches + "," + dd).style.backgroundColor = 'blue';
                    document.getElementById(matches + "," + dd).style.color = 'white';

                }


            } else {

            }

            satoxia();

        }
    };

    xmlhttp.send(vals);
}
;

function pkr_yearpkrfrrdin(mnthch) {
    satoxi();

    var matches = mnthch.match(/\S+(?=,)/g);
    var dtrvosqa = parseInt(document.getElementById(matches + ",yearvos").value);
    var dimetc = document.getElementById(matches + ",dtoupdtval").value;
    var dimetd = document.getElementById(matches + ",dtoupdtvalq").value;
    var dimetde = document.getElementById(matches + ",dtoupdtvalqa").value;
    var paramt = document.getElementById(matches + ",paramt").value;
    var paramta = document.getElementById(matches + ",paramta").value;
    var ghalicka = document.getElementById(matches + ",ghalicvalue").value;
    var dtrvosqb = null;
    var determ = "inline";


    if (mnthch === matches + ",yrrbckwrd") {
        dtrvosqb = dtrvosqa - 1;

    } else if (mnthch === matches + ",yrrforwrd") {
        dtrvosqb = dtrvosqa + 1;
    }
    document.getElementById(matches + ",yearvos").value = dtrvosqb;

    var dimet = document.getElementById(matches + ",yearvos").value;
    var dimeta = document.getElementById(matches + ",dtrvos").value;

    var month = ["January", "February", "March", "April", "May", "June", "July", "August",
        "September", "October", "November", "December"];

    var ssdate = new Date();
    var ssyear = ssdate.getFullYear();
    var ssmonth = month[ssdate.getMonth()];
    var dd = ssdate.getDate();

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

    var vals = "dimet=" + dimet + "&dimeta=" + dimeta + "&dimetb=" + matches + "&dimetc=" + dimetc +
            "&dimetd=" + dimetd + "&dimetde=" + dimetde + "&paramt=" + paramt + "&paramta=" +
            paramta + "&ghalicka=" + ghalicka + "&determ=" + determ;

    xmlhttp.open('POST', '../Dateguru/dateswitch.php');
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById(ghalicka).innerHTML = xmlhttp.responseText;

            var dtapkr = 1;
            var dtapkrb = document.getElementById(matches + ",dtoupdtvalq").value;


            if (dtapkr > 0) {
                var mthpkr = document.getElementById(matches + ",dtrvos").value;
                var yerpkr = document.getElementById(matches + ",yearvos").value;

                var compdta = dtapkr + "-" + mthpkr + "-" + yerpkr;
                document.getElementById(dimetc).value = compdta;

                var fmode = window[dtapkrb];
                fmode(paramt, compdta);

                if (ssmonth === mthpkr && ssyear.toString() === yerpkr) {
                    document.getElementById(matches + "," + dd).style.backgroundColor = 'blue';
                    document.getElementById(matches + "," + dd).style.color = 'white';

                }


            } else {

            }

            satoxia();

        }
    };

    xmlhttp.send(vals);

}

function pkr_assxevistoin(wraxy) {
    var matches = wraxy.match(/\S+(?=,)/g);
    var sumnth = document.getElementById("mathoxs").value;

    var dtapkr = document.getElementById(wraxy).value;
    var dtapkra = document.getElementById(matches + ",dtoupdtval").value;
    var dtapkrb = document.getElementById(matches + ",dtoupdtvalqa").value;
    var uniqa = document.getElementById(matches + ",paramta").value;

    var tixsy = [];

    for (var xi = 1; xi < sumnth + 1; xi++) {
        tixsy.push(matches + "," + xi);

    }

    for (var xi = 0; xi < sumnth; xi++) {
        if (tixsy[xi] === wraxy) {
            document.getElementById(tixsy[xi]).style.backgroundColor = 'blue';
            document.getElementById(tixsy[xi]).style.color = 'white';

        } else {
            document.getElementById(tixsy[xi]).style.backgroundColor = 'white';
            document.getElementById(tixsy[xi]).style.color = 'black';

        }
    }


    if (dtapkr > 0) {
        var mthpkr = document.getElementById(matches + ",dtrvos").value;
        var yerpkr = document.getElementById(matches + ",yearvos").value;
        var compdta = dtapkr + "-" + mthpkr + "-" + yerpkr;
        document.getElementById(dtapkra).value = compdta;

        var fmode = window[dtapkrb];
        var proc_arry = uniqa.split(",");

        if (proc_arry.length < 3) {
            fmode(uniqa);

        } else if (proc_arry.length === 3) {

        } else if (proc_arry.length === 6) {
            fmode(proc_arry[0].replace(/\s/g, ''), proc_arry[1].replace(/\s/g, ''),
                    proc_arry[2].replace(/\s/g, ''), proc_arry[3].replace(/\s/g, ''),
                    proc_arry[4].replace(/\s/g, ''), proc_arry[5].replace(/\s/g, ''));

        } else if (proc_arry.length === 7) {
            var moduca = proc_arry[4] + "," + proc_arry[5];
            var moducamod = moduca.replace(/\s/g, '');

            fmode(proc_arry[0].replace(/\s/g, ''), proc_arry[1].replace(/\s/g, ''),
                    proc_arry[2].replace(/\s/g, ''), proc_arry[3].replace(/\s/g, ''),
                    moducamod, proc_arry[6].replace(/\s/g, ''));

        }


    } else {

    }
}

/*Search function*/
function tmePicker(mims, event, bhascad, limitstro) {
    satoxi();

    var valec = document.getElementById(mims).innerHTML;
    var dishka = "vida" + new Date().getTime().toString() + "tmepet";
    var determ = "tme_picker";

    var x = "";
    var y = event.clientY - 100;

    if (bhascad === "right") {
        x = event.clientX + 15;

    } else if (bhascad === "left") {
        x = event.clientX - 190;

    }

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
            dishka + "&limitstro=" + limitstro;

    xmlhttp.open('POST', 'Recoscer');
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            var tmeCont = document.createElement("div");
            tmeCont.innerHTML = xmlhttp.responseText;
            tmeCont.id = dishka;
            document.body.appendChild(tmeCont);

            document.getElementById(dishka + "dhack").style.top = '' + y + 'px';
            document.getElementById(dishka + "dhack").style.left = '' + x + 'px';

            satoxia();

        }
    };

    xmlhttp.send(vals);

}

function rmv_tmepckre(mimsa) {
    var cooliz = document.getElementById(mimsa);
    document.body.removeChild(cooliz);

}

function tmepkreCkdigt(btnId, dimet, limit) {
    var hres = document.getElementById(dimet + "hres").innerHTML;
    var mins = document.getElementById(dimet + "mins").innerHTML;

    var limitarry = limit.split(",");
    var upperlimit = parseInt(limitarry[2]);
    var lowerlimit = parseInt(limitarry[0]);

    switch (btnId) {

        case dimet + "modescoas":
        {
            hres = parseInt(hres);

            if (hres < upperlimit) {
                hres = hres + 1;
                hres = ("0" + hres).slice(-2);
                document.getElementById(dimet + "hres").innerHTML = hres;
                var tmmes = hres + ":" + mins + " Hrs";
                document.getElementById(dimet + "quwert").innerHTML = tmmes;
            }

            break;
        }

        case dimet + "modescoasa":
        {
            mins = parseInt(mins);

            if (mins < 59) {
                mins = mins + 1;
                mins = ("0" + mins).slice(-2);
                document.getElementById(dimet + "mins").innerHTML = mins;
                var tmmes = hres + ":" + mins + " Hrs";
                document.getElementById(dimet + "quwert").innerHTML = tmmes;

            }

            break;
        }

        case dimet + "modescoasb":
        {
            hres = parseInt(hres);

            if (hres > lowerlimit) {
                hres = hres - 1;
                hres = ("0" + hres).slice(-2);
                document.getElementById(dimet + "hres").innerHTML = hres;
                var tmmes = hres + ":" + mins + " Hrs";
                document.getElementById(dimet + "quwert").innerHTML = tmmes;
            }

            break;
        }

        case dimet + "modescoasc":
        {
            mins = parseInt(mins);

            if (mins > 0) {
                mins = mins - 1;
                mins = ("0" + mins).slice(-2);
                document.getElementById(dimet + "mins").innerHTML = mins;
                var tmmes = hres + ":" + mins + " Hrs";
                document.getElementById(dimet + "quwert").innerHTML = tmmes;

            }

            break;
        }

        default:
            break;
    }


}

function tmepkreSet(tmeBtn, dimet) {
    var hres = document.getElementById(dimet + "hres").innerHTML;
    var mins = document.getElementById(dimet + "mins").innerHTML;

    var tmmes = hres + ":" + mins;
    document.getElementById(tmeBtn).innerHTML = tmmes;

    rmv_tmepckre(dimet);

}

