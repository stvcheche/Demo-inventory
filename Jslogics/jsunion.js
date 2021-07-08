/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function Loadjs(file) {

    var script = document.createElement('script');
    script.src = file;
    script.type = 'text/javascript';
    script.defer = true;

    document.getElementsByTagName('head').item(0).appendChild(script);

}

Loadjs('Jslogics/mainscript.js');
Loadjs('Jslogics/dateguru.js');
Loadjs('Jslogics/home.js');


