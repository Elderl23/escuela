<?php
include_once("c:/xampp/htdocs/iitae/config.php");

             $a1=$_POST["cv_p"];$img=$_POST["img"];
            
            
             
      echo  $sql="DELETE FROM practicas_realizadas WHERE cve_practica=$a1;";
                
                  
                    unlink("img_practicas/".$img);

                
                $res=mysql_query($sql,Conectar::conexion2());
                while($res!=0)
                {
                    header("Location: /iitae/c-mini/e-3/");exit;  
                } 

?>