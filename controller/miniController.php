<?php
require_once("model/maestrosModel.php");
require_once("model/gruposModel.php");
require_once("model/alumnosModel.php");

//Inicializamos,Creamos eL objeto para maestros
$omaestro = new maestro();
$ogrupo=new grupo();
$oalumno=new alumnos();

if(isset($_GET["valor"])){
    $e=$_GET["valor"]; 
}else{
    $e=0;
}
if(isset($_POST["ccali"])){
    for($s=0;$s<sizeof($_POST["nc"]);$s++){
        
        $nc=$_POST["nc"][$s];
        
        $wi1=$_POST["wi1"][$s];
        $wi2=$_POST["wi2"][$s];
        $wo1=$_POST["wo1"][$s];
        $wo2=$_POST["wo2"][$s];
        $po1=$_POST["po1"][$s];
        $po2=$_POST["po2"][$s];
        $e1=$_POST["e1"][$s];
        $e2=$_POST["e2"][$s];
        $in1=$_POST["in1"][$s];
        $in2=$_POST["in2"][$s];
        $a1=$_POST["in1"][$s];
        $a2=$_POST["in2"][$s];
        $cali=$oalumno->ingresar_calificacion($nc,$wi1,$wi2,$wo1,$wo2,$po1,$po2,$e1,$e2,$in1,$in2,$a1,$a2);
    }
  
    
}


$_GET["valor"]=$_SESSION["cve_maes"];
$consulta_es=$omaestro->consulta_maes_es();

$consultadia=$ogrupo->consultadia_grupo_m();

if(isset($_POST["ce"]))
{
  //print_r($_POST);
  $actualizar_estatus_p=$omaestro->actualizar_statusp();  
}
if(isset($_POST["ab"]))
{
  $cvp=$_POST["cv_p"]; 
  $trae_prac_es=$omaestro->trae_practicas_es($cvp);
  $es_p=1;
}
if(isset($_POST["npractica"]))
{
  $npra=$omaestro->npractica();
}
if(isset($_POST["vap"]))
{
  $cvp=$_POST["cv_p"]; 
  $trae_prac_ge_es=$omaestro->trae_practicas_ge_es($cvp) ;
  $e=5;
}

require_once("view/mini.phtml");

?>