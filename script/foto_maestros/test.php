<?php
function conexion()
    {
      $con=mysql_connect("localhost","root","");
      mysql_query("SET NAMES 'utf8'");
      mysql_select_db("iitae");
      return $con;  
    }


$filename = $_GET["id"]."_"."Avatar".'.jpg';

$cv=$_GET["id"];
$ava=$filename;

$sql="update maestros set avatar_maes='".$ava."' where cve_maes='".$cv."'";
$res=mysql_query($sql,conexion());

$result = file_put_contents("avatar/".$filename, file_get_contents('php://input') );
if (!$result)
 {
	print "ERROR: al crear el avatar\n";
	exit();
}



?>
