<?php
require_once("model/alumnosModel.php");

$oalumno= new alumnos; 

if(isset($_GET["valor"])){
    $v=$_GET["valor"]; 
}else{
    $v=0;
}

/*Inicio del  objeto que trae las consltas espesificas consultando su avatar*/
if(isset($_GET["estatus"]) and $_GET["estatus"]==1){
    $e=$_GET["estatus"];//variable  para las catgorias
    $v=$_GET["valor"];   
}
/*fin del  objeto que trae las consltas espesificas consultando su avatar*/

/*Inicio del  objeto que trae las consltas espesificas de los alumnos*/
if(isset($_GET["estatus"]) and $_GET["estatus"]==2){
    $e=$_GET["estatus"];//variable  para las catgorias
    $v=$_GET["valor"]; 
  $con_es_al=$oalumno->consulta_alum_es($v);    
}
/*fin del  objeto que trae las consltas espesificas de los alumnos*/
/*Inicio del  objeto que trae las consltas espesificas de los alumnos para eliminar*/
if(isset($_GET["estatus"]) and $_GET["estatus"]==3){
    $e=$_GET["estatus"];//variable  para las catgorias
    $v=$_GET["valor"]; 
  $con_es_al=$oalumno->consulta_alum_es($v);    
}
/*fin del  objeto que trae las consltas espesificas de los alumnos para eliminar*/



if(isset($_POST["registroa"]))
{
 //print_r($_POST);
$alta_alumnos= $oalumno->alta_alumnos(); 
}

if(isset($_POST["actualizara"]))
{
 //print_r($_POST);
  $actualizar_alumnos= $oalumno->actualizar_alumnos(); 
}

if(isset($_POST["elia"]))
{
 //print_r($_POST);
$eli_a= $oalumno->eli_alumno(); 
}

if(isset($_POST["consulta_es"]))
{
    $co_es=1;
    $consul_es=$oalumno->consulta_es_al();
    //print_r($_POST);
}

$con_gpodis=$oalumno->consulta_grupo_dis();
$con_matricula=$oalumno->consulta_matricula();
$con_pro=$oalumno->consulta_promotor();
$con_al_ava=$oalumno->consulta_alum_ava();
$con_ul_5=$oalumno->consulta_ultomos_5();
require_once("view/alumnos.phtml");

?>