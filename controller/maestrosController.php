<?php
require_once("model/maestrosModel.php");

if(isset($_GET["valor"])){
    $v=$_GET["valor"]; 
}else{
    $v=0;
}

//Inicializamos,Creamos eL objeto para maestros
$omaestro = new maestro();

/*Inicio del  objeto alta de maestro*/
if(isset($_POST["alm"])){
    $almaestro=$omaestro->alta_maestro();  
}
/*fin del  objeto alta de maestro*/

/*Inicio del  objeto que trae las consltas espesificas consultando su avatar*/
if(isset($_GET["estatus"]) and $_GET["estatus"]==1 ){
    $e=$_GET["estatus"];
$consulta_es=$omaestro->consulta_maes_es();     
}
/*fin del  objeto que trae las consltas espesificas consultando su avatar*/

/*Inicio del  objeto que elimina al usuario*/
if(isset($_GET["estatus"]) and $_GET["estatus"]==2 ){
    $e=$_GET["estatus"];
$consulta_es=$omaestro->consulta_maes_es();      
}
/*fin del  objeto que elimina al usuario*/

/*Inicio del  objeto para tomar foto*/
if(isset($_GET["estatus"]) and $_GET["estatus"]==3 ){
    $e=$_GET["estatus"];
    $v=$_GET["valor"];    
}
/*Fin del  objeto para tomar foto*/

/*Inicio del  objeto eliminar user*/
if(isset($_POST["on"]))
{
    //print_r($_POST);
$estatus=$omaestro->estatus_maes();
}
/*Inicio del  objeto eliminar user*/

/*Inicio del  objeto consulta maes_es_estatus*/
if(isset($_POST["consulta_es"]))
{
    $co_es=1;
$consul_es=$omaestro->consulta_maes_es_for();
//print_r($_POST);
}
/*Fin del  objeto consulta maes_es_estatus*/

/*Inicio del  objeto actualizar maes*/
if(isset($_POST["acm"]))
{
$actualizar=$omaestro->actualizar_maes();
//print_r($_POST);
}
/*Fin del  objeto actualizar maes*/


/*Inicio del  objeto consulta maestro general*/
$consulta_maestro_ge=$omaestro->consulta_maestro_general();
/*Inicio del  objeto consulta maestro general*/

require_once("view/maestros.phtml");

?>