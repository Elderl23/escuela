<?php
require_once("model/alumnosModel.php");
require_once("model/maestrosModel.php");
$oalumno= new alumnos;
$omaestro = new maestro();

if(isset($_GET["valor"])){
    $e=$_GET["valor"]; 
}else{
    $e=0;
}



$v=$_SESSION["cve_alum"];
$con_es_al=$oalumno->consulta_alum_es($v);

if(isset($_POST["sp"]))
{
  $cvp=$_POST["cv_p"]; 
  $trae_prac_es=$omaestro->trae_practicas_es($cvp);
  $es_p=1;
}

if(isset($_POST["actua"]))
{
  $acta=$oalumno->actualizar_alumnos();
}


require_once("view/aini.phtml");

?>