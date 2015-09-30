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
     private $trae_consulta_grupo_m;
    
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
        $this->trae_consulta_grupo_m=array();
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
                "select cve_maes from grupo where cve_hora=%s and dia=%s and status_gpo=1",
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
                "select cve_aula from grupo where cve_hora=%s and dia=%s",
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
                "select * from aulas where cve_au!=$cve_aula; "
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
            echo $sql=sprintf
            (
                "select cve_horarios_lab from grupo where cve_hora=%s and dia=%s and status_gpo=1;",
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
                "select cve_maes,nom_hora from grupo,hora where grupo.dia='$di' and grupo.cve_hora=hora.cve_hora ; "
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
             "SELECT cve_horarios_lab FROM grupo WHERE cve_lab=$l and dia='$di';"
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
                        (null,%s,%s,%s,%s,%s,%s,%s,1);
                        ",
                        parent::comillas_inteligentes($_POST["nom_gpo"]),
                        parent::comillas_inteligentes($_POST["maestro"]),
                        parent::comillas_inteligentes($_POST["horario"]),
                        parent::comillas_inteligentes($_POST["aula"]),
                        parent::comillas_inteligentes($_POST["Laboratorio"]),
                        parent::comillas_inteligentes($_POST["hl"]),
                        parent::comillas_inteligentes($_POST["dia"])
                    );
                    mysql_query($query);
                    header("Location: ".Conectar::ruta()."c-grupos/");exit; 
        }
        
        public function consulta_gpo_m()
        {
            parent::conexion();
                $sql=sprintf
                (
                    "SELECT * FROM  grupo ORDER BY  cve_grupo  DESC LIMIT 1; "
                );
                $res=mysql_query($sql);
                while($reg=mysql_fetch_assoc($res))
                {
                    $this->trae_consulta_grupo_m[]=$reg;
                }
                return $this->trae_consulta_grupo_m;
        }               
         
    
}


?>