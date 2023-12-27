<html><head>
<title>Kikou ! petit chat</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
 
 
<style>
body {
text-align:center;
background-color:#000000;
color:#cccccc;
font-family:arial;
font-size:14pt;
 
}
h1 {
color:#cccccc;
font-size:20pt;
line-height:18pt;
}
 
span.jour, .heure, .min, .sec, .jour2, .heure2, .min2, .sec2 {
width:42px;background-color:#111111;text-align:right;11;padding-right:5px;padding-left:5px;border:.5pt solid #333333;
}
 
.jour {color:#ff0000;font-size:20pt;}
.heure {color:#F39912;font-size:20pt;}
.min {color:#0000ff;font-size:20pt;}
.sec {color:#aa00aa;font-size:20pt;}
.sectot {color:#eed000;font-size:16pt;}
 
.jour2 {color:#00CC00;font-size:20pt;}
.heure2 {color:#33CC99;font-size:20pt;}
.min2 {color:#33FFFF;font-size:20pt;}
.sec2 {color:#BFCBFF;font-size:20pt;}
.sectot2 {color:#eed000;font-size:16pt;}
 
</style>
 
 
<script LANGUAGE="JavaScript">
 
function getTime()
{
var maintenant = new Date();
var nan = new Date("december 24, 2023 23:59:59"); 
// entre les guillemets la date dous la forme mois(en anglais) quantieme, année heure 
//ex: december 24, 2007 23:59:59
var diffSec = Math.floor((nan - maintenant)/1000);
var diffMin = Math.floor(diffSec/60);
var diffheure = Math.floor(diffMin/60);
var diffJour = Math.floor(diffheure/24);
var heurejust = diffheure - (diffJour*24);
var minjust = diffMin - (diffJour*24*60) - (heurejust*60);
var minDEC = Math.floor(minjust/10);
var minUNIT = minjust - (minDEC*10);
var secjust = diffSec - (diffJour*24*60*60) - (heurejust*60*60)  - (minjust*60);
var secDEC = Math.floor(secjust/10);
var secUNIT = secjust - (secDEC*10);
 
document.getElementById("tempsrestant").innerHTML = 
"<span class=jour>" + diffJour + "</span> jour(s) <span class=heure>" + heurejust + "</span> heure(s) <span class=min>" + minDEC + + minUNIT + "</span> minute(s)  <span class=sec>"  + secDEC + + secUNIT +"</span> seconde(s) <br>soit exactement :  <span class=sectot>" + diffSec + "</span> seconde(s)";
 
var nanBX = new Date("december 24, 2007 23:59:59");
var diffSecBX = Math.floor((nanBX - maintenant)/1000);
var diffMinBX = Math.floor(diffSecBX/60);
var diffheureBX = Math.floor(diffMinBX/60);
var diffJourBX = Math.floor(diffheureBX/24);
var heurejustBX = diffheureBX - (diffJourBX*24);
var minjustBX = diffMinBX - (diffJourBX*24*60) - (heurejustBX*60);
var secjustBX = diffSecBX - (diffJourBX*24*60*60) - (heurejustBX*60*60)  - (minjustBX*60);
var minDECBX = Math.floor(minjustBX/10);
var minUNITBX = minjustBX - (minDECBX*10);
var secDECBX = Math.floor(secjustBX/10);
var secUNITBX = secjustBX - (secDECBX*10);
 
document.getElementById("tempsrestantBX").innerHTML = 
"<span class=jour2>" + diffJourBX + "</span> jour(s) <span class=heure2>" + heurejustBX + "</span> heure(s) <span class=min2>" + minjustBX + "</span> minute(s)  <span class=sec2>"   + secDECBX + + secUNITBX + "</span> seconde(s) <br>soit exactement :  <span class=sectot2>" + diffSecBX + "</span> seconde(s)";
 
}
setInterval("getTime()", 1000);
 
 
</SCRIPT>
</head>
 
<body bgproperties=fixed topmargin="0" leftmargin="0" marginwidth="0" marginheight="0"  background="dino.gif">
<div style="margin:auto;padding-top:60px;width:600px;"> 
  <table width="600" border="0" cellspacing="0" cellpadding="0">
    <tr> 
      <td> 
        <div align="center"> 
          <h1>Kikou, ma grigrounette.<br>
            Il reste</h1>
        </div>
      </td>
    </tr>
    <tr> 
      <td height="66"> 
        <div align="center"><b><span id="tempsrestant" style="line-height:18pt;"> 
          </span></b></div>
      </td>
    </tr>
    <tr> 
      <td height="24" valign="top"> 
        <div align="center"> 
          <h1>avant ton anniversaire, petit poisson,<br>
          </h1>
        </div>
      </td>
    </tr>
    <tr> 
      <td height="66" valign="bottom"> 
        <div align="center"> <b><span id="tempsrestantBX"> </span></b></div>
      </td>
    </tr>
    <tr> 
      <td height="24" valign="top"> 
        <div align="center"><h1>avant le mien</h1></div></td>
    </tr>
  </table>
</div>
</body>
</html>
