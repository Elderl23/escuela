<?php
class maestro extends Conectar
{
     private $consulta_maes_ge;
     private $consulta_maes_es;
     private $consulta_es_for;
    
    public function __construct()
    {
        $this->consulta_maes_ge=array();
        $this->consulta_maes_es=array();
        $this->consulta_es_for=array();
    }
    
    public function alta_maestro()
    {
        
           parent::conexion();
             $query=sprintf
                    (
                        "insert into maestros 
                        values
                        (null,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,0,1);
                        ",
                        parent::comillas_inteligentes($_POST["nombre"]),
                        parent::comillas_inteligentes($_POST["aps"]),
                        parent::comillas_inteligentes($_POST["dire"]),
                        parent::comillas_inteligentes($_POST["tel"]),
                        parent::comillas_inteligentes($_POST["correo"]),
                        parent::comillas_inteligentes($_POST["sexo"]),
                        parent::comillas_inteligentes($_POST["carrera"]),
                        parent::comillas_inteligentes($_POST["cedula"]),
                        parent::comillas_inteligentes($_POST["login"]),
                        parent::comillas_inteligentes(md5($_POST["pass"])) 
                    );
                    mysql_query($query);
                    header("Location: ".Conectar::ruta()."c-maestros/");exit; 
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
    public function consulta_maes_es()
    {
        parent::conexion();
            $sql=sprintf
            (
                "select * from maestros where cve_maes=%s",
                parent::comillas_inteligentes($_GET["valor"])
            );
            $res=mysql_query($sql);
            while($reg=mysql_fetch_assoc($res))
            {
                $this->consulta_maes_es[]=$reg;
            }
            return $this->consulta_maes_es;
    }
   public function estatus_maes()
    {
        parent::conexion();
            $sql=sprintf
            (
                "update maestros set
                status_maes=%s
                where
                cve_maes=%s
                ",
                parent::comillas_inteligentes($_POST["es"]),
                parent::comillas_inteligentes($_POST["cve"]) 
            );
             mysql_query($sql);
             header("Location: ".Conectar::ruta()."c-maestros/");exit;  
    }
   public function consulta_maes_es_for()
    {
        parent::conexion();
            $sql=sprintf
            (
                "select * from maestros
                     where 
                         nombre_maes=%s 
                         and apellido_maes=%s
                         ",
                parent::comillas_inteligentes($_POST["nombre"]),
                parent::comillas_inteligentes($_POST["aps"])
            );
            $res=mysql_query($sql);
            while($reg=mysql_fetch_assoc($res))
            {
                $this->consulta_es_for[]=$reg;
            }
            return $this->consulta_es_for;
    }
   public function actualizar_maes()
    {
        parent::conexion();
             $sql=sprintf
            (
                "update maestros set
                direccion_maes=%s,
                telefono_maes=%s,
                correo_maes=%s
                where
                cve_maes=%s
                ",
                parent::comillas_inteligentes($_POST["dire"]),
                parent::comillas_inteligentes($_POST["tel"]),
                parent::comillas_inteligentes($_POST["correo"]),
                parent::comillas_inteligentes($_POST["cve"]) 
            );
             mysql_query($sql);
             header("Location: ".Conectar::ruta()."c-maestros/e-1/v-".$_POST["cve"]."/");exit;  
    }    
    
}


?>