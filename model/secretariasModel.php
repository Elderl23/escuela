<?php
class user extends Conectar
{
     private $consultar;
     private $consulta_es;
     private $consulta_ava;
     private $consulta_es_for;
     private $consulta_folio;
    
    public function __construct()
    {
        $this->consultar=array();
        $this->consulta_es=array();
        $this->consulta_ava=array();
        $this->consulta_es_for=array();
        $this->consulta_folio=array();
    }
    
    public function consulta_folio()
    {
       $sql="SELECT cve_usu FROM usuarios ORDER BY cve_usu DESC LIMIT 1;";
         $res=mysql_query($sql,parent::conexion());
         while($reg=mysql_fetch_assoc($res))
         {
            $this->consulta_folio[]=$reg;
         }
            return $this->consulta_folio; 
    }
    
    public function alta_user()
    {
        
            parent::conexion();
             $query=sprintf
                    (
                        "insert into usuarios 
                        values
                        (null,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,1);
                        ",
                        parent::comillas_inteligentes($_POST["nombre"]),
                        parent::comillas_inteligentes($_POST["aps"]),
                        parent::comillas_inteligentes($_POST["dire"]),
                        parent::comillas_inteligentes($_POST["tel"]),
                        parent::comillas_inteligentes($_POST["correo"]),
                        parent::comillas_inteligentes($_POST["sexo"]),
                        parent::comillas_inteligentes($_POST["carrera"]),
                        parent::comillas_inteligentes($_POST["login"]),
                        parent::comillas_inteligentes($_POST["pass"]),
                        parent::comillas_inteligentes($_POST["cat"]) 
                    );
                    mysql_query($query);
                    header("Location: ".Conectar::ruta()."c-secretaria/");exit; 
    }
    public function consulta_user()
    {
       $sql="select 
                   *
                     from 
                           usuarios,cat_user 
                                    where usuarios.cve_cat_user=cat_user.cve_cat_user and  usuarios.status!=0
                           ;";
         $res=mysql_query($sql,parent::conexion());
         while($reg=mysql_fetch_assoc($res))
         {
            $this->consultar[]=$reg;
         }
            return $this->consultar; 
    }
    public function consulta_user_es()
    {
        parent::conexion();
            $sql=sprintf
            (
                "select * from usuarios,cat_user,avatar where usuarios.cve_usu=%s and usuarios.cve_cat_user=cat_user.cve_cat_user and usuarios.cve_usu=avatar.cve_usu",
                parent::comillas_inteligentes($_GET["valor"])
            );
            $res=mysql_query($sql);
            while($reg=mysql_fetch_assoc($res))
            {
                $this->consulta_es[]=$reg;
            }
            return $this->consulta_es;
    }
    
    public function estatus_user()
    {
        parent::conexion();
            $sql=sprintf
            (
                "update usuarios set
                status=%s
                where
                cve_usu=%s
                ",
                parent::comillas_inteligentes($_POST["es"]),
                parent::comillas_inteligentes($_POST["cve"]) 
            );
             mysql_query($sql);
             header("Location: ".Conectar::ruta()."c-secretaria/");exit;  
    }
    public function consulta_user_avatar($av)
    {
        parent::conexion();
            $sql=sprintf
            (
                "select * from avatar where cve_usu=%s",
                parent::comillas_inteligentes($av)
            );
            $res=mysql_query($sql);
            if(mysql_num_rows($res)!=0)
                {
                    while($reg=mysql_fetch_assoc($res))
                    {
                        $this->consulta_ava[]=$reg;
                    }
                    return $this->consulta_ava;
               }else{
                    
                        $this->consulta_ava[]=1;
                    
                    return $this->consulta_ava;
               }
    }
    
    public function consulta_user_es_for()
    {
        parent::conexion();
            $sql=sprintf
            (
                "select * from usuarios,cat_user
                     where 
                         usuarios.nombre_usu=%s 
                         and usuarios.apellidos_usu=%s 
                         and usuarios.cve_cat_user=cat_user.cve_cat_user 
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
    
    
}


?>