<?php
require_once("model/maestrosModel.php");
require_once("model/gruposModel.php");
require_once("model/alumnosModel.php");

require_once("model/cat_userModel.php");
require_once("model/secretariasModel.php");
$secre= new user();
$cat_u= new cat_user();

$omaestro = new maestro();
$ogrupo=new grupo();
$oalumno= new alumnos;

if(isset($_GET["valor"])){
    $e=$_GET["valor"]; 
}else{
    $e=0;
}

if($e==6){
    $_GET["valor"]= $_SESSION["cve_se"];
    $consulta_es=$secre->consulta_user_es(); 
}

require_once("view/sini.phtml");

?>