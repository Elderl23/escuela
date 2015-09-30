<?php
include_once("c:/xampp/htdocs/iitae/config.php");

             $a1=$_POST["fcha"];$a2=$_POST["cve_pra"];$cve_a=$_POST["cv_a"];
            
            $tempa=$_FILES["archivo"]['tmp_name'];
            $archivo=$_FILES["archivo"]["name"];
            $archivo=$cve_a.$archivo;
            $hora= date ("h".":"."i".":"."s"." "."a"); 
             
            echo  $sql="insert into practicas_realizadas 
                values
                (null,'$a2','$archivo','$cve_a','$a1','$hora');";
                
                  
                    copy($tempa,"img_practicas/$archivo");

                
                $res=mysql_query($sql,Conectar::conexion2());
                while($res!=0)
                {
                    header("Location: /iitae/c-aini/e-5/");exit;  
                } 

?>