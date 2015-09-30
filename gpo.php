<?php



if(isset($_GET["id"])){
include("config.php");    
$c=$_GET["id"];
$sql="select cve_grupo,dia,nombre_maes,apellido_maes,nom_hora,nombre_au,edificio_au,nombre_lab,horario_ini,horario_fin 
                    from grupo,maestros,hora,aulas,laboratorios,horarios_lab
                    where
                     grupo.cve_grupo=$c and  
                     grupo.cve_maes=maestros.cve_maes and
                     grupo.cve_hora=hora.cve_hora and
                     grupo.cve_aula=aulas.cve_au and
                     grupo.cve_lab=laboratorios.cve_lab and
                     grupo.cve_horarios_lab=horarios_lab.cve_horarios_lab and
                     status_gpo!=0";
$res=mysql_query($sql,Conectar::conexion2());
?>
<div id="cve">


<?php
while ($reg=mysql_fetch_array($res))
{
?>
<table width="670" align="center">
<tr>
  <td colspan="3" class="tituloes" align="center"><h5>DATOS DEL GRUPO</h5></td>
</tr>
<tr>
  <td align="center"><h5>Nombre del Instructor:</h5></td><td align="center"><h5>Dia de clase:</h5></td><td align="center"><h5>Horario:</h5></td>
</tr>
<tr>
     <td align="center"><?php echo $reg["nombre_maes"]; echo " "; echo $reg["apellido_maes"];?></td><td align="center"><?php echo $reg["dia"];?></td><td align="center"><?php echo $reg["nom_hora"];?></td>
</tr>
<tr>
<td align="center"><h5>Aula y Edificio:</h5></td><td align="center"><h5>Laboratorio:</h5></td><td align="center"><h5>Horario de Laboratorio:</h5></td>
</tr>
<tr>
     <td align="center"><?php echo $reg["nombre_au"]; echo " "; echo "Edificio";  echo " "; echo $reg["edificio_au"];?></td><td align="center"><?php echo $reg["nombre_lab"];?></td>
     <td align="center"><?php echo $reg["horario_ini"]; echo " "; echo $reg["horario_fin"];?></td>
</tr>
</table>
<?php
}
?>

</div>
<?php  } ?>


<?php
if(isset($valor)){
    
$c=$_GET["id2"];
$sql="select cve_grupo,dia,nombre_maes,apellido_maes,nom_hora,nombre_au,edificio_au,nombre_lab,horario_ini,horario_fin 
                    from grupo,maestros,hora,aulas,laboratorios,horarios_lab
                    where
                     grupo.cve_grupo=$c and  
                     grupo.cve_maes=maestros.cve_maes and
                     grupo.cve_hora=hora.cve_hora and
                     grupo.cve_aula=aulas.cve_au and
                     grupo.cve_lab=laboratorios.cve_lab and
                     grupo.cve_horarios_lab=horarios_lab.cve_horarios_lab and
                     status_gpo!=0";
$res=mysql_query($sql,Conectar::conexion2());
?>
<div id="cve">


<?php
while ($reg=mysql_fetch_array($res))
{
?>
<table width="670" align="center">
<tr>
  <td colspan="3" class="tituloes" align="center"><h5>DATOS DEL GRUPO</h5></td>
</tr>
<tr>
  <td align="center"><h5>Nombre del Instructor:</h5></td><td align="center"><h5>Dia de clase:</h5></td><td align="center"><h5>Horario:</h5></td>
</tr>
<tr>
     <td align="center"><?php echo $reg["nombre_maes"]; echo " "; echo $reg["apellido_maes"];?></td><td align="center"><?php echo $reg["dia"];?></td><td align="center"><?php echo $reg["nom_hora"];?></td>
</tr>
<tr>
<td align="center"><h5>Aula y Edificio:</h5></td><td align="center"><h5>Laboratorio:</h5></td><td align="center"><h5>Horario de Laboratorio:</h5></td>
</tr>
<tr>
     <td align="center"><?php echo $reg["nombre_au"]; echo " "; echo "Edificio";  echo " "; echo $reg["edificio_au"];?></td><td align="center"><?php echo $reg["nombre_lab"];?></td>
     <td align="center"><?php echo $reg["horario_ini"]; echo " "; echo $reg["horario_fin"];?></td>
</tr>
</table>
<?php
}
?>

</div>
<?php  } ?>




