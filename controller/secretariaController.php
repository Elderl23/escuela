<?php
require_once("model/cat_userModel.php");
$cat_u= new cat_user();
require_once("model/secretariasModel.php");
$secre= new user();

/*Inicio del  objeto que trae las categorias*/
$ver=$cat_u->cat_usuarios();
/*Fin objeto que trae las categorias*/

if(isset($_GET["valor"])){
    $v=$_GET["valor"];
    $con_fol=$secre->consulta_folio(); 
}else{
    $v=0;
}

/*Inicio del  objeto que trae las consltas espesificas consultando su avatar*/
if(isset($_GET["estatus"]) and $_GET["estatus"]==1 ){
    $e=$_GET["estatus"];
$consulta_es=$secre->consulta_user_es();     
}
/*fin del  objeto que trae las consltas espesificas consultando su avatar*/

/*Inicio del  objeto que elimina al usuario*/
if(isset($_GET["estatus"]) and $_GET["estatus"]==2 ){
    $e=$_GET["estatus"];
$consulta_es=$secre->consulta_user_es();      
}
/*fin del  objeto que elimina al usuario*/

/*Inicio del  objeto que trae las consltas espesificas*/
if(isset($_GET["estatus"]) and $_GET["estatus"]==3 ){
    $e=$_GET["estatus"];
    $v=$_GET["valor"];
//$consulta_es=$secre->consulta_user_es();     
}
/*Inicio del  objeto que trae las consltas espesificas*/

/*Inicio del  objeto alta user*/
if(isset($_POST["als"]))
{
$alta=$secre->alta_user();
}
/*Inicio del  objeto alta user*/

/*Inicio del  objeto eliminar user*/
if(isset($_POST["on"]))
{
    //print_r($_POST);
$estatus=$secre->estatus_user();
}
/*Inicio del  objeto eliminar user*/


/*Inicio del  objeto consulta user*/
$consulta_user=$secre->consulta_user();
/*Inicio del  objeto consulta user*/

/*Inicio del  objeto consulta user*/
if(isset($_POST["consulta_es"]))
{
    $co_es=1;
$consul_es=$secre->consulta_user_es_for();
//print_r($_POST);
}
/*Fin del  objeto consulta user*/

require_once("view/secretarias.phtml");

?>