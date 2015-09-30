<?php
require_once("model/gruposModel.php");
//Inicializamos,Creamos eL objeto para grupo
$ogrupo = new grupo();

if(isset($_GET["valor"])){
    $e=$_GET["valor"]; 
    $consulta_gpo=$ogrupo->consulta_gpo_u();//me trae elultimo registro del grupo
}else{
    $e=0;
}

if(isset($_GET["dia"]))
{
    $d=$_GET["dia"];
    if($d>=1 and $d<=5)
    {
        $va=2;
        $d=$_GET["dia"];
        
        $_SESSION["dia_cve"]=$d;
      if($d==1){ $_SESSION["dia"]="Lunes"; }if($d==2){ $_SESSION["dia"]="Martes"; }if($d==3){ $_SESSION["dia"]="Miercoles"; }
      if($d==4){ $_SESSION["dia"]="Jueves"; }if($d==5){ $_SESSION["dia"]="Viernes"; }if($d==6){ $_SESSION["dia"]="Sabado"; }
      if($d==7){ $_SESSION["dia"]="Domingo"; }
        
        /*Inicio del  objeto consulta hora2*/
        $consulta_hora2=$ogrupo->consulta_hora2();
        /*Inicio del  objeto consulta hora2*/
    }else
    {
        $va=1;
        
        $d=$_GET["dia"];
    

      $_SESSION["dia_cve"]=$d;
      if($d==1){ $_SESSION["dia"]="Lunes"; }if($d==2){ $_SESSION["dia"]="Martes"; }if($d==3){ $_SESSION["dia"]="Miercoles"; }
      if($d==4){ $_SESSION["dia"]="Jueves"; }if($d==5){ $_SESSION["dia"]="Viernes"; }if($d==6){ $_SESSION["dia"]="Sabado"; }
      if($d==7){ $_SESSION["dia"]="Domingo"; }
 
        /*Inicio del  objeto consulta hora*/
        $consulta_hora=$ogrupo->consulta_hora();
        /*Inicio del  objeto consulta hora*/
    } 
}




if(isset($_GET["hora"]))
{
  $h=$_GET["hora"];
    
    $_SESSION["cve"]=$h;
    if($h==1){ $_SESSION["cve2"]="7-11"; }if($h==2){ $_SESSION["cve2"]="08-12"; }if($h==3){ $_SESSION["cve2"]="09-01"; }
    if($h==4){ $_SESSION["cve2"]="10-02"; }if($h==5){ $_SESSION["cve2"]="11-03"; }if($h==6){ $_SESSION["cve2"]="12-04"; }
    if($h==7){ $_SESSION["cve2"]="01-05"; }if($h==8){ $_SESSION["cve2"]="02-06"; }if($h==9){ $_SESSION["cve2"]="03-07"; }
    
    list($ho1,$ho2) = explode("-",$_SESSION["cve2"]);
    
    $consulta_maes_grupo=$ogrupo->consulta_maes_grupo();
    
    if($consulta_maes_grupo!=null)
    {  $con=3;
        $con=1;
        $acum="";
        for($g=0;$g<sizeof($consulta_maes_grupo);$g++)
        {     if($g+1==1){ $v_1=$consulta_maes_grupo[0]["cve_maes"];}
              if($g+1==2){ $v_1=$consulta_maes_grupo[0]["cve_maes"];$v_2=$consulta_maes_grupo[1]["cve_maes"];}
              if($g+1==3){ $v_1=$consulta_maes_grupo[0]["cve_maes"];$v_2=$consulta_maes_grupo[1]["cve_maes"];$v_3=$consulta_maes_grupo[2]["cve_maes"];}
              if($g+1==4){ $v_1=$consulta_maes_grupo[0]["cve_maes"];$v_2=$consulta_maes_grupo[1]["cve_maes"];
                           $v_3=$consulta_maes_grupo[2]["cve_maes"]; $v_4=$consulta_maes_grupo[3]["cve_maes"];}
              if($g+1==5){ $v_1=$consulta_maes_grupo[0]["cve_maes"];$v_2=$consulta_maes_grupo[1]["cve_maes"];
                           $v_3=$consulta_maes_grupo[2]["cve_maes"]; $v_4=$consulta_maes_grupo[3]["cve_maes"];$v_5=$consulta_maes_grupo[4]["cve_maes"];}             
              if($g+1==6){ $v_1=$consulta_maes_grupo[0]["cve_maes"];$v_2=$consulta_maes_grupo[1]["cve_maes"];
                           $v_3=$consulta_maes_grupo[2]["cve_maes"]; $v_4=$consulta_maes_grupo[3]["cve_maes"];$v_5=$consulta_maes_grupo[4]["cve_maes"];
                           $v_6=$consulta_maes_grupo[5]["cve_maes"];
                           }             
                              
                            
                            if($g+1==$_SESSION["url1"]=count($consulta_maes_grupo))
                            { 
                                if($g+1==1){
                                   $url="cve_maes!=$v_1 and";
                                   $consulta_maes_grupo2=$ogrupo->consulta_maes_grupo3($url);       
                                }
                                if($g+1==2){
                                $url="cve_maes!=$v_1 and cve_maes!=$v_2 and";
                                $consulta_maes_grupo2=$ogrupo->consulta_maes_grupo3($url);    
                                }
                                if($g+1==3){
                                $url="cve_maes!=$v_1 and cve_maes!=$v_2 and  cve_maes!=$v_3 and";
                                $consulta_maes_grupo2=$ogrupo->consulta_maes_grupo3($url);    
                                }
                                if($g+1==4){
                                $url="cve_maes!=$v_1 and cve_maes!=$v_2 and  cve_maes!=$v_3 and cve_maes!=$v_4 and";
                                $consulta_maes_grupo2=$ogrupo->consulta_maes_grupo3($url);    
                                }
                                if($g+1==5){
                                $url="cve_maes!=$v_1 and cve_maes!=$v_2 and  cve_maes!=$v_3 and cve_maes!=$v_4 and cve_maes!=$v_5 and";
                                $consulta_maes_grupo2=$ogrupo->consulta_maes_grupo3($url);    
                                }
                                if($g+1==6){
                                $url="cve_maes!=$v_1 and cve_maes!=$v_2 and  cve_maes!=$v_3 and cve_maes!=$v_4 and cve_maes!=$v_5 and cve_maes!=$v_6 and";
                                $consulta_maes_grupo2=$ogrupo->consulta_maes_grupo3($url);    
                                }
                                
                            $con=3; 
                            }
           
            
        }
        
    }else
    { 
        list($ho1,$ho2) = explode("-",$_SESSION["cve2"]);

        $di=$_SESSION["dia"];
        $di2=$ogrupo->consulta_hora3($di);
        if($di2==null){ $con=4; $consulta_maestro_ge=$ogrupo->consulta_maestro_general();  }
        $acumu=0;
        $ac=0;
        $ac2=0;
        for($d=0; $d<sizeof($di2); $d++)
        {
            if($d+1==1){ $v_1=$di2[0]["cve_maes"];}
              if($d+1==2){ $v_1=$di2[0]["cve_maes"];$v_2=$di2[1]["cve_maes"];}
              if($d+1==3){ $v_1=$di2[0]["cve_maes"];$v_2=$di2[1]["cve_maes"];$v_3=$di2[2]["cve_maes"];}
              if($d+1==4){ $v_1=$di2[0]["cve_maes"];$v_2=$di2[1]["cve_maes"];
                           $v_3=$di2[2]["cve_maes"]; $v_4=$di2[3]["cve_maes"];}
              if($d+1==5){ $v_1=$di2[0]["cve_maes"];$v_2=$di2[1]["cve_maes"];
                           $v_3=$di2[2]["cve_maes"]; $v_4=$di2[3]["cve_maes"];$v_5=$di2[4]["cve_maes"];}             
              if($d+1==6){ $v_1=$di2[0]["cve_maes"];$v_2=$di2[1]["cve_maes"];
                           $v_3=$di2[2]["cve_maes"]; $v_4=$di2[3]["cve_maes"];$v_5=$di2[4]["cve_maes"];
                           $v_6=$di2[5]["cve_maes"];
                           }
            
                  $di_c=$di2[$d]["nom_hora"];
                  list($hc1,$hc2) = explode("-",$di_c);
                  
                  
                  for($z=0;$z<=4;$z++)
                  {
                     $hh=$hc1++; $hhh=$hc2++;
                     if($hh=="07"){ $hh="07";}if($hh=="8"){$hh="08";}if($hh=="9"){$hh="09";}if($hh=="13"){$hh="01";}if($hh=="14"){$hh="02";}if($hh=="15"){$hh="03";}if($hh==0){$hh="12";}
                     if($hhh=="1"){ $hhh="01";}if($hhh=="2"){ $hhh="02";}if($hhh=="3"){$hhh="03";}if($hhh=="4"){$hhh="04";}if($hhh=="5"){$hhh="05";}if($hhh=="6"){$hhh="06";}if($hhh=="7"){$hhh="07";}if($hhh=="13"){$hhh="01";}if($hhh=="14"){$hhh="02";}if($hhh=="15"){$hhh="03";}if($hhh==0){$hhh="12";}
                     
                     $horario_uno=$hh."-".$hhh;
                     //echo "<br>";
                     
                        if($_SESSION["cve2"]==$horario_uno)
                        { 
                            if($d+1==$_SESSION["url1"]=count($di2))
                            { 
                                if($d+1==1){
                                   $url="cve_maes!=$v_1 and";
                                   $consulta_maes_grupo2=$ogrupo->consulta_maes_grupo3($url);       
                                }
                                if($d+1==2){
                                $url="cve_maes!=$v_1 and cve_maes!=$v_2 and";
                                $consulta_maes_grupo2=$ogrupo->consulta_maes_grupo3($url);    
                                }
                                if($d+1==3){
                                $url="cve_maes!=$v_1 and cve_maes!=$v_2 and  cve_maes!=$v_3 and";
                                $consulta_maes_grupo2=$ogrupo->consulta_maes_grupo3($url);    
                                }
                                if($d+1==4){
                                $url="cve_maes!=$v_1 and cve_maes!=$v_2 and  cve_maes!=$v_3 and cve_maes!=$v_4 and";
                                $consulta_maes_grupo2=$ogrupo->consulta_maes_grupo3($url);    
                                }
                                if($d+1==5){
                                $url="cve_maes!=$v_1 and cve_maes!=$v_2 and  cve_maes!=$v_3 and cve_maes!=$v_4 and cve_maes!=$v_5 and";
                                $consulta_maes_grupo2=$ogrupo->consulta_maes_grupo3($url);    
                                }
                                if($d+1==6){
                                $url="cve_maes!=$v_1 and cve_maes!=$v_2 and  cve_maes!=$v_3 and cve_maes!=$v_4 and cve_maes!=$v_5 and cve_maes!=$v_6 and";
                                $consulta_maes_grupo2=$ogrupo->consulta_maes_grupo3($url);    
                                }
                                
                          
                                 
                            $con=1;
                            }
                        }else
                        { if($ac==0){
                          $con=2;
                          $consulta_maestro_ge=$ogrupo->consulta_maestro_general();  }
                        }
                    $ac++;
                    $ac2++;
                  }
                  list($hc1,$hc2) = explode("-",$di_c);
                  for($z=0;$z<=4;$z++)
                  {
                     $hh=$hc1--; $hhh=$hc2--;
                     if($hh=="07"){ $hh="07";}if($hh=="8"){$hh="08";}if($hh=="9"){$hh="09";}if($hh=="13"){$hh="01";}if($hh=="14"){$hh="02";}if($hh=="15"){$hh="03";}if($hh==0){$hh="12";}
                     if($hhh=="1"){ $hhh="01";}if($hhh=="2"){ $hhh="02";}if($hhh=="3"){$hhh="03";}if($hhh=="4"){$hhh="04";}if($hhh=="5"){$hhh="05";}if($hhh=="6"){$hhh="06";}if($hhh=="7"){$hhh="07";}if($hhh=="13"){$hhh="01";}if($hhh=="14"){$hhh="02";}if($hhh=="15"){$hhh="03";}if($hhh==0){$hhh="12";}
                     
                     $horario_uno=$hh."-".$hhh;
                     //echo "<br>";
                        if($_SESSION["cve2"]==$horario_uno)
                        { 
                            if($d+1==$_SESSION["url1"]=count($di2))
                            { 
                                if($d+1==1){
                                   $url="cve_maes!=$v_1 and";
                                   $consulta_maes_grupo2=$ogrupo->consulta_maes_grupo3($url);       
                                }
                                if($d+1==2){
                                $url="cve_maes!=$v_1 and cve_maes!=$v_2 and";
                                $consulta_maes_grupo2=$ogrupo->consulta_maes_grupo3($url);    
                                }
                                if($d+1==3){
                                $url="cve_maes!=$v_1 and cve_maes!=$v_2 and  cve_maes!=$v_3 and";
                                $consulta_maes_grupo2=$ogrupo->consulta_maes_grupo3($url);    
                                }
                                if($d+1==4){
                                $url="cve_maes!=$v_1 and cve_maes!=$v_2 and  cve_maes!=$v_3 and cve_maes!=$v_4 and";
                                $consulta_maes_grupo2=$ogrupo->consulta_maes_grupo3($url);    
                                }
                                if($d+1==5){
                                $url="cve_maes!=$v_1 and cve_maes!=$v_2 and  cve_maes!=$v_3 and cve_maes!=$v_4 and cve_maes!=$v_5 and";
                                $consulta_maes_grupo2=$ogrupo->consulta_maes_grupo3($url);    
                                }
                                if($d+1==6){
                                $url="cve_maes!=$v_1 and cve_maes!=$v_2 and  cve_maes!=$v_3 and cve_maes!=$v_4 and cve_maes!=$v_5 and cve_maes!=$v_6 and";
                                $consulta_maes_grupo2=$ogrupo->consulta_maes_grupo3($url);    
                                }
                            $con=1;
                            }
                            
                        }else
                        { 
                          if($ac==0){ 
                          $con=2;
                          $consulta_maestro_ge=$ogrupo->consulta_maestro_general();  }  
                        }
                    
                  }
                  
                         
        }
   
    }  
       
}

        if(isset($_GET["maes"]))
        {
            $m=$_GET["maes"];
            $_GET["valor"]=$_GET["maes"];
 
              require_once("model/maestrosModel.php");
              $omaestro = new maestro();
              $consulta_es=$omaestro->consulta_maes_es();
              
              
              $consulta_au=$ogrupo->consulta_au_es();
              if($consulta_au!=null)
                { 
                    $con2=1;
                    for($g=0;$g<sizeof($consulta_au);$g++)
                    {
                          if($g+1==1){ $v_1=$consulta_au[0]["cve_aula"];}
                          if($g+1==2){ $v_1=$consulta_au[0]["cve_aula"];$v_2=$consulta_au[1]["cve_aula"];}
                          if($g+1==3){ $v_1=$consulta_au[0]["cve_aula"];$v_2=$consulta_au[1]["cve_aula"];$v_3=$consulta_au[2]["cve_aula"];}
                          if($g+1==4){ $v_1=$consulta_au[0]["cve_aula"];$v_2=$consulta_au[1]["cve_aula"];
                                       $v_3=$consulta_maes_grupo[2]["cve_aula"]; $v_4=$consulta_au[3]["cve_aula"];}
                          if($g+1==5){ $v_1=$consulta_au[0]["cve_aula"];$v_2=$consulta_au[1]["cve_aula"];
                                       $v_3=$consulta_maes_grupo[2]["cve_aula"]; $v_4=$consulta_au[3]["cve_aula"];$v_5=$consulta_au[4]["cve_aula"];}             
                          if($g+1==6){ $v_1=$consulta_au[0]["cve_aula"];$v_2=$consulta_au[1]["cve_aula"];
                                       $v_3=$consulta_au[2]["cve_aula"]; $v_4=$consulta_au[3]["cve_aula"];$v_5=$consulta_au[4]["cve_aula"];
                                       $v_6=$consulta_au[5]["cve_aula"];
                                       }
                                       
                          if($g+1==count($consulta_au))
                            {
                              if($g+1==1){
                                   $url="cve_au!=$v_1 ";
                                   $cve_aula2=$ogrupo->consulta_au_es2($url);       
                                }
                                if($g+1==2){
                                $cve_aula="cve_au!=$v_1 and cve_au!=$v_2 ";
                                $cve_aula2=$ogrupo->consulta_au_es2($cve_aula);    
                                }
                                if($g+1==3){
                                $cve_aula="cve_au!=$v_1 and cve_au!=$v_2 and  cve_au!=$v_3";
                                $cve_aula2=$ogrupo->consulta_au_es2($cve_aula);    
                                }
                                if($g+1==4){
                                $cve_aula="cve_au!=$v_1 and cve_au!=$v_2 and  cve_au!=$v_3 and cve_au!=$v_4 ";
                                $cve_aula2=$ogrupo->consulta_au_es2($cve_aula);    
                                }
                                if($g+1==5){
                                $cve_aula="cve_au!=$v_1 and cve_au!=$v_2 and  cve_au!=$v_3 and cve_au!=$v_4 and cve_au!=$v_5 ";
                                $cve_aula2=$ogrupo->consulta_au_es2($cve_aula);    
                                }
                                if($g+1==6){
                                $cve_aula="cve_au!=$v_1 and cve_au!=$v_2 and  cve_au!=$v_3 and cve_au!=$v_4 and cve_au!=$v_5 and cve_au!=$v_6 ";
                                $cve_aula2=$ogrupo->consulta_au_es2($cve_aula);    
                                }     
                            } 
                    }
                }else
                {
                    
                    $con2=0;
                    $consulta_au_ge=$ogrupo->consulta_au_ge();
                    
                }    
 
            
        }
        
        if(isset($_GET["au"]))
        {
           $a=$_GET["au"];
           
           $nombre_au=$ogrupo->consulta_au_es3($a);
           $consulta_lab=$ogrupo->consulta_lab();
        }
      
      
      
      if(isset($_GET["lab"]))
        {
          $l=$_GET["lab"];
          $consu_horario_lab=$ogrupo->consulta_horario_lab($l);
          
          $con_la_es=$ogrupo->consulta_lab_es($l);
          
          $d=$_GET["dia"];
           if($d>=1 and $d<=5)
           {
             $dia="lv";
           }else
           {
             $dia="sd";
           }
           $con_horario_lab=$ogrupo->consulta_horarios_lab($dia);
           $acum=0;
           for($t=0; $t<sizeof($con_horario_lab); $t++)
            {
                $horario_ini=$con_horario_lab[$t]["horario_ini"];
                $horario_fin=$con_horario_lab[$t]["horario_fin"];
                
           
                list($hi1,$hi2) = explode(":",$horario_ini);
                list($hf1,$hf2) = explode(":",$horario_fin);

                $hora2 = $_SESSION["cve2"];
                list($h1,$h2) = explode("-",$hora2);
                
                if($h1==1){ $h1=13;}if($h1==2){ $h1=14;}if($h1==3){ $h1=15;}if($h1==4){ $h1=16;}if($h1==5){ $h1=17;}
                if($h2==1){ $h2=13;}if($h2==2){ $h2=14;}if($h2==3){ $h2=15;}if($h2==4){ $h2=16;}if($h2==5){ $h2=17;}
                
                if($hi1==1){ $hi1=13;}if($hi1==2){ $hi1=14;}if($hi1==3){ $hi1=15;}if($hi1==4){ $hi1=16;}if($hi1==5){ $hi1=17;}
                
                if($hi1==$h1 and $hf1<=$h2)
                { 
                    $con_dia=$con_horario_lab[$t]["horario_ini"]; $con_dia2=$con_horario_lab[$t]["horario_fin"]; 
                    $cve_horario_l=$con_horario_lab[$t]["cve_horarios_lab"];
                    
                    $lab_horarios[]=array("cve_h_l"=>$cve_horario_l,"horario_ini"=>$con_dia,"horario_fin"=>$con_dia2);
                    
                    $acum2=1;
                }
                if($hi1>$h1 and $hf1<=$h2)
                { 
                  if(isset($acum2) and $acum2==1)
                  {
                      if($acum!=1)
                      {
                          $con_dia=$con_horario_lab[$t]["horario_ini"]; $con_dia2=$con_horario_lab[$t]["horario_fin"]; 
                          $cve_horario_l=$con_horario_lab[$t]["cve_horarios_lab"];
                          
                          $lab_horarios[]=array("cve_h_l"=>$cve_horario_l,"horario_ini"=>$con_dia,"horario_fin"=>$con_dia2);
                          
                          $acum++; 
                      }
                  }else
                  {
                   if($hi1>$h1 and $hf1<=$h2)
                   {
                    if($acum!=2)
                      {
                       $con_dia=$con_horario_lab[$t]["horario_ini"]; $con_dia2=$con_horario_lab[$t]["horario_fin"];
                        $cve_horario_l=$con_horario_lab[$t]["cve_horarios_lab"];
                        
                        $lab_horarios[]=array("cve_h_l"=>$cve_horario_l,"horario_ini"=>$con_dia,"horario_fin"=>$con_dia2);
                        
                        $acum++;
                      }    
                   }
                  } 
                }  
            } $_SESSION["horarios_lb"]=$lab_horarios;
            
        }
        if(isset($_GET["hl"]))
        {
          $hl=$_GET["hl"];
          $con_hl=$ogrupo->consulta_hl($hl);  
        }
        
         if(isset($_POST["cg"]))
        {
          //print_r($_POST);
          $alta_grupo=$ogrupo->alta_grupo();
           
        }      

        if(isset($_GET["dia2"]))
        {
           $d=$_GET["dia2"];
           if($d==1){ $_SESSION["dia"]="Lunes"; }if($d==2){ $_SESSION["dia"]="Martes"; }if($d==3){ $_SESSION["dia"]="Miercoles"; }
           if($d==4){ $_SESSION["dia"]="Jueves"; }if($d==5){ $_SESSION["dia"]="Viernes"; }if($d==6){ $_SESSION["dia"]="Sabado"; }
           if($d==7){ $_SESSION["dia"]="Domingo"; } 
           
           $consultadia=$ogrupo->consultadia_grupo();
           $dia2=1;
        }
        if(isset($e) and $e==3)
        {
            //$consul_gpo=$ogrupo->consultadia_gpo();
        }
        if(isset($e) and $e==4)
        {
            $cv=$_GET["clave"];
            $consul_g=$ogrupo->consultadia_gpo($cv);
        }
        if(isset($e) and $e==5)
        {
            $cv=$_GET["clave"];
            $consul_g=$ogrupo->consultadia_gpo($cv);
        }
       if(isset($e) and $e==6)
        {
       
            $consultadia=$ogrupo->consultadia_grupo_ultimos();
        }
        if(isset($_POST["cc"]))
        {
            $actualizar_estado=$ogrupo->estado_gpo();
        }
        if(isset($_POST["eg"]))
        {
            $desactivar_gpo=$ogrupo->desactivar_gpo();
        }
        
        if($e==3){
            $g=$_GET["clave"];
            $con_al_gpo=$ogrupo->consulta_alum_por_gpo($g);
        } 


require_once("view/grupos.phtml");

?>