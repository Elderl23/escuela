<?php
function conexion()
    {
      $con=mysql_connect("localhost","root","");
      mysql_query("SET NAMES 'utf8'");
      mysql_select_db("iitae");
      return $con;  
    }

             $a1=$_POST["fcha"];$a2=$_POST["des"];$a3=$_POST["gpo"];$cve_m=$_POST["cv_m"];
            
            $temp=$_FILES["image"]['tmp_name'];
            $image=$_FILES["image"]["name"];
            
            $tempa=$_FILES["archivo"]['tmp_name'];
            $archivo=$_FILES["archivo"]["name"];
             
              $sql="insert into practicas 
                values
                (null,'$cve_m','$image','$archivo','$a1','$a2','$a3',1);";
                
                    if($image!=null){
                    copy($temp,"img_practicas/$image");
                    }
                     if($archivo!=null){
                    copy($tempa,"img_practicas/$archivo");
                    }
                
                $res=mysql_query($sql,conexion());
                while($res!=0)
                {
                    header("Location: /iitae/c-mini/e-2/");exit;  
                } 

?>