<html>
<head>

<style type="text/css">
<!--
.Style4 {font-size: 12px}
-->
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="code.php">
  <table width="420" border="0">
    <tr>
      <td width="169" bgcolor="#CCFF00"><label>
        <input name="rechercher" type="submit" id="rechercher" value="Rechercher" />
      </label></td>
      <td width="369" bgcolor="#CCFF00"><label>
        <input name="t_rechercher" type="text" id="t_rechercher" />
        <span class="Style4">      Recherche par nom</span> </label></td>
    </tr>
    <tr>
      <td>Nom</td>
      <td><label>
        <input name="t_nom" type="text" id="t_nom" />
      </label></td>
    </tr>
    <tr>
      <td>Prénom</td>
      <td><label>
        <input name="t_prenom" type="text" id="t_prenom" />
      </label></td>
    </tr>
    <tr>
      <td>Te</td>
      <td><label>
        <input name="t_tel" type="text" id="t_tel" />
      </label></td>
    </tr>
    <tr>
      <td>Fax</td>
      <td><input name="t_fax" type="text" id="t_fax" /></td>
    </tr>
    <tr>
      <td colspan="2"><label>
        <input name="nouveau" type="reset" id="nouveau" value="Nouveau" />
        <input name="ajouter" type="submit" id="ajouter" value="Ajouter" />
        <input name="modidier" type="submit" id="modidier" value="Modifier" />
        <input name="supprimer" type="submit" id="supprimer" value="Supprimer" />
      </label></td>
    </tr>
  </table>
  <p> </p>
</form>
<?php $cn=mysql_connect("localhost","root");
mysql_select_db("ma_base",$cn);  
$req="select * from  t_client";
mysql_query($req);
$res=mysql_query($req,$cn);  
?>
<table width="630" align="left" bgcolor="#CCCCCC">
<tr >
 
<td width="152">Nom</td>
<td width="66">Prénom</td>
<td width="248">Téléphone</td>
<td width="42">Fax</td>
</tr>
<?php
$var=0;
while($row=mysql_fetch_array($res))
{
 
if ($var==0)
{
?>
<tr bgcolor="#EEEEEE">
<td><?php echo $row[0];  ?></td>
<td><?php echo $row[1];  ?></td>
<td><?php echo $row[2]  ?></td>
<td><?php echo $row[3]  ?></td>
</tr>
<?php
$var=1; 
 }
else
{
?>
<tr bgcolor="#FFCCCC">
<td><?php echo $row[0];  ?></td>
<td><?php echo $row[1];  ?></td>
<td><?php echo $row[2]  ?></td>
<td><?php echo $row[3]  ?></td>
</tr><undefined></undefined>
<?php
$var=0; 
 }
 }
?>
</table>
</body>
</html>
<?php
$rech=$_POST['t_rechercher'];
$nom=$_POST['t_nom'];
$prenom=$_POST['t_prenom'];
$tel=$_POST['t_tel'];
$fax=$_POST['t_fax'];
$cn=mysql_connect("localhost","root");
mysql_select_db("ma_base",$cn);
 if (isset($_POST['rechercher']))
{
$req="select * from  t_client where nom='$rech'";
 
mysql_query($req);
$res=mysql_query($req,$cn);
$enrg=mysql_fetch_row($res);
 
 if ($enrg[0] == $rech)
{
 
   echo "<form id='form1' name='form1' method='post' action='code.php'>
    <table width='420' border='0'>
   <tr>
     <td width='169' bgcolor='#CCFF00'><label>
    <input name='rechercher' type='submit' id='rechercher' value='Rechercher' />
     </label></td>
     <td width='369' bgcolor='#CCFF00'><label>
    <input name='t_rechercher' type='text' id='t_rechercher' value='$enrg[0]' />
     </label>Recherche par nom</td>
   </tr>
   <tr>
     <td>Nom</td>
     <td><label>
    <input name='t_nom' type='text' id='t_nom'  value='$enrg[0]'/>
     </label></td>
   </tr>
   <tr>
     <td>Prénom</td>
     <td><label>
    <input name='t_prenom' type='text' id='t_prenom' value='$enrg[1]' />
     </label></td>
   </tr>
   <tr>
     <td>Te</td>
     <td><label>
    <input name='t_tel' type='text' id='t_tel' value='$enrg[2]' />
     </label></td>
   </tr>
   <tr>
     <td>Fax</td>
     <td><input name='t_fax' type='text' id='t_fax' value='$enrg[3]' /></td>
   </tr>
   <tr>
     <td colspan='2'><label>
    <input name='nouveau' type='reset' id='nouveau' value='Nouveau' />
    <input name='ajouter' type='submit' id='ajouter' value='Ajouter' />
    <input name='modifier' type='submit' id='modifier' value='Modidier' />
    <input name='supprimer' type='submit' id='supprimer' value='Supprimer' />
     </label></td>
   </tr>
    </table>
    <p> </p>
  </form>";
}
  else
   {
  // echo '<body onLoad="alert('Client introuvable...')">';
  echo '<meta http-equiv="refresh" content="0;URL=modif_joueurs.php">';
  }
} 
 
 else
  {
  
                 
      
         if (isset($_POST['ajouter']))
                              
         
          $rqt="insert t_client values('$nom','$prenom','$tel','$fax')";
           
          mysql_query($rqt);
           
       
          mysql_close();
  }
  if (isset($_POST['modifier']))
  {
          if($nom=='' || $prenom=='' ||$tel==''   )
          {
         
          }
          else
          {
           $rqt="update t_client set nom='$nom',prenom='$prenom',tel='$tel',fax='$fax' where nom ='$rech'";
           mysql_query($rqt);
           mysql_close();
          }
  elseif(isset($_POST['supprimer']))       
         {
         $rqt="delete  FROM t_client  where nom ='$rech'";
         mysql_query($rqt);
         mysql_close();
         }
  }

?>
<?php $cn=mysql_connect("localhost","root");
mysql_select_db("ma_base",$cn);  
$req="select * from  t_client";
mysql_query($req);
$res=mysql_query($req,$cn);  
?>
<table width="630" align="left" bgcolor="#CCCCCC">
<tr >
 
<td width="152">Nom</td>
<td width="66">Prénom</td>
<td width="248">Téléphone</td>
<td width="42">Fax</td>
</tr>
<?php
$var=0;
while($row=mysql_fetch_array($res))
{
 
if ($var==0)
{
?>
<tr bgcolor="#EEEEEE">
<td><?php echo $row[0];  ?></td>
<td><?php echo $row[1];  ?></td>
<td><?php echo $row[2]  ?></td>
<td><?php echo $row[3]  ?></td>
</tr>
<?php
$var=1; 
 }
else
{
?>
<tr bgcolor="#FFCCCC">
<td><?php echo $row[0];  ?></td>
<td><?php echo $row[1];  ?></td>
<td><?php echo $row[2]  ?></td>
<td><?php echo $row[3]  ?></td>
</tr>
<?php
$var=0; 
 }
 }
?>
</table>