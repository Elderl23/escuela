<?php
class grupo extends Conectar
{
     private $consulta_hora;
     private $consulta_hora2;
     private $consulta_maes_grupo;
     private $consulta_maes_ge;
     private $consulta_au_es;
     private $consulta_au_es2;
     private $consulta_au_ge;
     private $consulta_au_es3;
     private $consulta_hora_lab;
     private $consulta_gpo_lab_hor;
     private $consulta_hora3;
     private $consulta_lab;
     private $consulta_horario_lab;
     private $consulta_lab_ess;
     private $consulta_hl;
     private $consulta_gpo_ulti;
     private $consulta_maes_dina;
     private $consultadia_grupo;
     private $consultadia_hora_gpo;
     private $trae_alumnos_por_gpo;
     
     private $consulta_gpo;
     private $trae_gpo_m;       
    
    public function __construct()
    {
        $this->consulta_hora=array();
        $this->consulta_hora2=array();
        $this->consulta_maes_grupo=array();
        $this->consulta_maes_ge=array();
        $this->consulta_au_es=array();
        $this->consulta_au_es2=array();
        $this->consulta_au_ge=array();
        $this->consulta_au_es3=array();
        $this->consulta_hora_lab=array();
        $this->consulta_gpo_lab_hor=array();
        $this->consulta_hora3=array();
        $this->consulta_lab=array();
        $this->consulta_horario_lab=array();
        $this->consulta_horario_lab=array();
        $this->consulta_hl=array();
        $this->consulta_gpo_ulti=array();
        $this->consulta_maes_dina=array(); 
        $this->consultadia_grupo=array();
        $this->consultadia_hora_gpo=array();
        
        $this->consulta_gpo=array();
        $this->trae_alumnos_por_gpo=array();
        $this->trae_gpo_m=array();       
    }
        public function consulta_hora() 
        {
                $sql="select 
                       *
                         from 
                               hora 
                               ;";
             $res=mysql_query($sql,parent::conexion());
             while($reg=mysql_fetch_assoc($res))
             {
                $this->consulta_hora[]=$reg;
             }
                return $this->consulta_hora;
        }
        
      public function consulta_hora2() 
        {
                $sql="select 
                       *
                         from 
                               hora2 
                               ;";
             $res=mysql_query($sql,parent::conexion());
             while($reg=mysql_fetch_assoc($res))
             {
                $this->consulta_hora2[]=$reg;
             }
                return $this->consulta_hora2;
        }  
    public function consulta_maes_grupo()
    {
        parent::conexion();
             $sql=sprintf
            (
                "select cve_maes from grupo where cve_hora=%s and dia=%s and status_gpo=1 ",
                parent::comillas_inteligentes($_GET["hora"]),
                parent::comillas_inteligentes($_SESSION["dia"])
            );
            $res=mysql_query($sql);
            while($reg=mysql_fetch_assoc($res))
            {
                $this->consulta_maes_grupo[]=$reg;
            }
            return $this->consulta_maes_grupo;
    }
   
   public function consulta_maes_grupo2($cve_maes)
    {
       
        parent::conexion();
           $sql=sprintf
            (
                "select * from maestros where cve_maes!=$cve_maes and status_maes!=0 "
            );
            $res=mysql_query($sql);
            while($reg=mysql_fetch_assoc($res))
            {
                $this->consulta_maes[]=$reg;
            }
            return $this->consulta_maes;
    }
    
    public function consulta_maes_grupo3($url)
    {
       
        parent::conexion();
            $sql=sprintf
            (
                "select * from maestros where $url  status_maes!=0 "
            );
            $res=mysql_query($sql);
            while($reg=mysql_fetch_assoc($res))
            {
                $this->consulta_maes_dina[]=$reg;
            }
            return $this->consulta_maes_dina;
    }        
   public function consulta_maestro_general() 
        {
                $sql="select 
                       *
                         from 
                               maestros 
                                        where status_maes!=0
                               ;";
             $res=mysql_query($sql,parent::conexion());
             while($reg=mysql_fetch_assoc($res))
             {
                $this->consulta_maes_ge[]=$reg;
             }
                return $this->consulta_maes_ge;
        }
    public function consulta_au_es()
    {
        parent::conexion();
            $sql=sprintf
            (
                "select cve_aula from grupo where cve_hora=%s and dia=%s  and status_gpo=1",
                parent::comillas_inteligentes($_SESSION["cve"]),
                parent::comillas_inteligentes($_SESSION["dia"])
            );
            $res=mysql_query($sql);
            while($reg=mysql_fetch_assoc($res))
            {
                $this->consulta_au_es[]=$reg;
            }
            return $this->consulta_au_es;
    }
   public function consulta_au_es2($cve_aula)
    {
        parent::conexion();
            $sql=sprintf
            (
                "select * from aulas where $cve_aula; "
            );
            $res=mysql_query($sql);
            while($reg=mysql_fetch_assoc($res))
            {
                $this->consulta_au_es2[]=$reg;
            }
            return $this->consulta_au_es2;
    }
    
    public function consulta_au_ge()
    {
        parent::conexion();
            $sql=sprintf
            (
                "select * from aulas; "
            );
            $res=mysql_query($sql);
            while($reg=mysql_fetch_assoc($res))
            {
                $this->consulta_au_ge[]=$reg;
            }
            return $this->consulta_au_ge;
    }
    
     public function consulta_au_es3($a)
     {
        parent::conexion();
            $sql=sprintf
            (
                "select cve_au,nombre_au,edificio_au from aulas where cve_au=$a; "
            );
            $res=mysql_query($sql);
            while($reg=mysql_fetch_assoc($res))
            {
                $this->consulta_au_es3[]=$reg;
            }
            return $this->consulta_au_es3;
      }
      public function consulta_horarios_lab($dia)
     {
        parent::conexion();
            $sql=sprintf
            (
                "select cve_horarios_lab,horario_ini,horario_fin from horarios_lab where dia_horario_lab='$dia'; "
            );
            $res=mysql_query($sql);
            while($reg=mysql_fetch_assoc($res))
            {
                $this->consulta_hora_lab[]=$reg;
            }
            return $this->consulta_hora_lab;
      }
      
     public function consulta_lab_hor()
    {
        parent::conexion();
             $sql=sprintf
            (
                "select cve_horarios_lab from grupo where cve_hora=%s and dia=%s  and status_gpo=1;",
                parent::comillas_inteligentes($_SESSION["cve"]),
                parent::comillas_inteligentes($_SESSION["dia"])
            );
            $res=mysql_query($sql);
            while($reg=mysql_fetch_assoc($res))
            {
                $this->consulta_gpo_lab_hor[]=$reg;
            }
            return $this->consulta_gpo_lab_hor;
    }
    public function consulta_hora3($di)
     {
        parent::conexion();
            $sql=sprintf
            (
                "select cve_maes,nom_hora from grupo,hora where grupo.dia='$di' and grupo.cve_hora=hora.cve_hora and status_gpo=1 ; "
            );
            $res=mysql_query($sql);
            while($reg=mysql_fetch_assoc($res))
            {
                $this->consulta_hora3[]=$reg;
            }
            return $this->consulta_hora3;
      }
    public function consulta_lab()
     {
        parent::conexion();
            $sql=sprintf
            (
                "select * from laboratorios;"
            );
            $res=mysql_query($sql);
            while($reg=mysql_fetch_assoc($res))
            {
                $this->consulta_lab[]=$reg;
            }
            return $this->consulta_lab;
      }   
      
      public function consulta_horario_lab($l)
     {
        $di=$_SESSION["dia"];
        parent::conexion();
           $sql=sprintf
            (
             "SELECT cve_horarios_lab FROM grupo WHERE cve_lab=$l and dia='$di'  and status_gpo=1;"
            );
            $res=mysql_query($sql);
            while($reg=mysql_fetch_assoc($res))
            {
                $this->consulta_horario_lab[]=$reg;
            }
            return $this->consulta_horario_lab;
      }
      
         public function consulta_lab_es($l)
        {
            parent::conexion();
                $sql=sprintf
                (
                    "select * from laboratorios where cve_lab=$l; "
                );
                $res=mysql_query($sql);
                while($reg=mysql_fetch_assoc($res))
                {
                    $this->consulta_lab_ess[]=$reg;
                }
                return $this->consulta_lab_ess;
        }
        public function consulta_hl($hl)
        {
            parent::conexion();
                $sql=sprintf
                (
                    "SELECT * FROM horarios_lab WHERE cve_horarios_lab =$hl; "
                );
                $res=mysql_query($sql);
                while($reg=mysql_fetch_assoc($res))
                {
                    $this->consulta_hl[]=$reg;
                }
                return $this->consulta_hl;
        }
     
      public function consulta_gpo_u()
        {
            parent::conexion();
                $sql=sprintf
                (
                    "SELECT * FROM  grupo ORDER BY  cve_grupo  DESC LIMIT 1; "
                );
                $res=mysql_query($sql);
                while($reg=mysql_fetch_assoc($res))
                {
                    $this->consulta_gpo_ulti[]=$reg;
                }
                return $this->consulta_gpo_ulti;
        }
      public function alta_grupo()
       {
        
           parent::conexion();
             $query=sprintf
                    (
                        "insert into grupo 
                        values
                        (null,%s,%s,%s,%s,%s,%s,%s,1,1,%s);
                        ",
                        parent::comillas_inteligentes($_POST["nom_gpo"]),
                        parent::comillas_inteligentes($_POST["maestro"]),
                        parent::comillas_inteligentes($_POST["horario"]),
                        parent::comillas_inteligentes($_POST["aula"]),
                        parent::comillas_inteligentes($_POST["Laboratorio"]),
                        parent::comillas_inteligentes($_POST["hl"]),
                        parent::comillas_inteligentes($_POST["dia"]),
                        parent::comillas_inteligentes($_POST["fecha"])
                    );
                    mysql_query($query);
                    header("Location: ".Conectar::ruta()."c-grupos/");exit; 
        }
        public function consultadia_grupo()
        {
           
            parent::conexion();
               $sql=sprintf
                (
                    "select cve_grupo,estado,dia,nombre_maes,apellido_maes,nom_hora,nombre_au,edificio_au,nombre_lab,horario_ini,horario_fin,fecha_gpo 
                    from grupo,maestros,hora,aulas,laboratorios,horarios_lab 
                    where
                     grupo.dia='".$_SESSION["dia"]."' and  
                     grupo.cve_maes=maestros.cve_maes and
                     grupo.cve_hora=hora.cve_hora and
                     grupo.cve_aula=aulas.cve_au and
                     grupo.cve_lab=laboratorios.cve_lab and
                     grupo.cve_horarios_lab=horarios_lab.cve_horarios_lab and
                     status_gpo=1 "
                );
                $res=mysql_query($sql);
                while($reg=mysql_fetch_assoc($res))
                {
                    $this->consultadia_grupo[]=$reg;
                }
                return $this->consultadia_grupo;
        }
        
        public function consultadia_grupo_ultimos()
        {
           
            parent::conexion();
               $sql=sprintf
                (
                    "select cve_grupo,estado,dia,nombre_maes,apellido_maes,nom_hora,nombre_au,edificio_au,nombre_lab,horario_ini,horario_fin 
                    from grupo,maestros,hora,aulas,laboratorios,horarios_lab 
                    where
                     grupo.estado=1 and
                     grupo.status_gpo=1 and   
                     grupo.cve_maes=maestros.cve_maes and
                     grupo.cve_hora=hora.cve_hora and
                     grupo.cve_aula=aulas.cve_au and
                     grupo.cve_lab=laboratorios.cve_lab and
                     grupo.cve_horarios_lab=horarios_lab.cve_horarios_lab and
                     estado=1 and status_gpo=1 ORDER BY cve_grupo DESC "
                );
                $res=mysql_query($sql);
                while($reg=mysql_fetch_assoc($res))
                {
                    $this->consultadia_grupo[]=$reg;
                }
                return $this->consultadia_grupo;
        }
        
        public function consultadia_gpo($cv)
        {
           
            parent::conexion();
               $sql=sprintf
                (
                    "select cve_grupo,dia,nombre_maes,apellido_maes,estado,status_gpo 
                    from grupo,maestros
                    where
                     grupo.cve_grupo=$cv and  
                     grupo.cve_maes=maestros.cve_maes and
                     status_gpo!=0 "
                );
                $res=mysql_query($sql);
                while($reg=mysql_fetch_assoc($res))
                {
                    $this->consulta_gpo[]=$reg;
                }
                return $this->consulta_gpo;
        }
       public function estado_gpo()
        {
            if($_POST["dia"]=="Lunes"){ $d=1; } if($_POST["dia"]=="Martes"){ $d=2; } if($_POST["dia"]=="Miercoles"){ $d=3; }
               if($_POST["dia"]=="Jueves"){ $d=4; } if($_POST["dia"]=="Viernes"){ $d=5; } if($_POST["dia"]=="Sabado"){ $d=6; }
                if($_POST["dia"]=="Domingo"){ $d=7; }
            parent::conexion();
                $sql=sprintf
                (
                    "update grupo set
                    estado=%s
                    where
                    cve_grupo=%s
                    ",
                    parent::comillas_inteligentes($_POST["es"]),
                    parent::comillas_inteligentes($_POST["cve_grupo"]) 
                );
                 mysql_query($sql);
                 header("Location: ".Conectar::ruta()."c-grupos/d2-$d/");exit;  
        }
        
        public function desactivar_gpo()
        {
            if($_POST["dia"]=="Lunes"){ $d=1; } if($_POST["dia"]=="Martes"){ $d=2; } if($_POST["dia"]=="Miercoles"){ $d=3; }
               if($_POST["dia"]=="Jueves"){ $d=4; } if($_POST["dia"]=="Viernes"){ $d=5; } if($_POST["dia"]=="Sabado"){ $d=6; }
                if($_POST["dia"]=="Domingo"){ $d=7; }
            parent::conexion();
                $sql=sprintf
                (
                    "update grupo set
                    status_gpo=%s
                    where
                    cve_grupo=%s
                    ",
                    parent::comillas_inteligentes($_POST["es"]),
                    parent::comillas_inteligentes($_POST["cve_grupo"]) 
                );
                 mysql_query($sql);
                 header("Location: ".Conectar::ruta()."c-grupos/d2-$d/");exit;  
        }
        
        public function consulta_hora_gpo($cv) 
        {
               $sql="select 
                       nom_hora
                         from 
                               grupo,hora 
                                        where grupo.cve_maes=$cv and grupo.cve_hora=hora.cve_hora
                               ;";
             $res=mysql_query($sql,parent::conexion());
             while($reg=mysql_fetch_assoc($res))
             {
                $this->consultadia_hora_gpo[]=$reg;
             }
                return $this->consultadia_hora_gpo;
        }
        
        public function consulta_alum_por_gpo($g) 
        {
               $sql="select 
                       *
                         from 
                               alumnos 
                                        where cve_grupo=$g and status_al!=0
                               ;";
             $res=mysql_query($sql,parent::conexion());
             while($reg=mysql_fetch_assoc($res))
             {
                $this->trae_alumnos_por_gpo[]=$reg;
             }
                return $this->trae_alumnos_por_gpo;
        }
        
        public function consultadia_grupo_m()
        {
           
            parent::conexion();
               $sql=sprintf
                (
                    "select cve_grupo,estado,dia,fecha_gpo,cve_grupo,nombre_maes,apellido_maes,nom_hora,nombre_au,edificio_au,nombre_lab,horario_ini,horario_fin 
                    from grupo,maestros,hora,aulas,laboratorios,horarios_lab 
                    where
                     grupo.cve_maes='".$_SESSION["cve_maes"]."' and  
                     grupo.cve_maes=maestros.cve_maes and
                     grupo.cve_hora=hora.cve_hora and
                     grupo.cve_aula=aulas.cve_au and
                     grupo.cve_lab=laboratorios.cve_lab and
                     grupo.cve_horarios_lab=horarios_lab.cve_horarios_lab and
                     status_gpo=1 "
                );
                $res=mysql_query($sql);
                while($reg=mysql_fetch_assoc($res))
                {
                    $this->trae_gpo_m[]=$reg;
                }
                return $this->trae_gpo_m;
        } 
         public function cargar_practica()
        {
          
             
            
        }  
                       
         
    
}


?>