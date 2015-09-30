<?php
class acceso extends Conectar
{
     private $login;
    
    public function __construct()
    {
        $this->login=array();
    }
    
    public function login()
    {
        if(!empty($_POST["user"]) and !empty($_POST["pass"]))
        {
            parent::conexion();
            $sql=sprintf
            (
                "select * from admin where login_dire='%s' and pass_dire='%s'",
                parent::comillas_inteligentes($_POST["user"]),
                parent::comillas_inteligentes($_POST["pass"])
            );
            
            $res=mysql_query($sql);
            if(mysql_num_rows($res)!=0)
                {
                     while($reg=mysql_fetch_array($res))
                     {
                       $_SESSION["admin"]=$reg["nombre_dire"]." ".$reg["apellidos_dire"];
                       header("Location: ".Conectar::ruta()."c-admin/");exit;
                     }
                        
                 }else
                 {
                   /////////////////////////
                    parent::conexion();
                    $sql=sprintf
                    (
                        "select * from alumnos where login_al='%s' and pass_al='%s' and status_al!=0",
                        parent::comillas_inteligentes($_POST["user"]),
                        parent::comillas_inteligentes($_POST["pass"])
                    );
                    
                    $res=mysql_query($sql);
                    if(mysql_num_rows($res)!=0)
                        {
                             while($reg=mysql_fetch_array($res))
                             {
                               $_SESSION["nom_alumn"]=$reg["nombre_alum"]." ".$reg["apellidos_al"];
                               $_SESSION["cve_alum"]=$reg["cve_alum"];
                               header("Location: ".Conectar::ruta()."c-aini/");exit;
                             }
                                
                         }else
                         {
                           /////////////////////////
                            parent::conexion();
                            $sql=sprintf
                            (
                                "select * from maestros where login_maes='%s' and pass_maes='%s' and status_maes!=0",
                                parent::comillas_inteligentes($_POST["user"]),
                                parent::comillas_inteligentes($_POST["pass"])
                            );
                            
                            $res=mysql_query($sql);
                            if(mysql_num_rows($res)!=0)
                                {
                                     while($reg=mysql_fetch_array($res))
                                     {
                                       $_SESSION["nom_maes"]=$reg["nombre_maes"]." ".$reg["apellido_maes"];
                                       $_SESSION["cve_maes"]=$reg["cve_maes"];
                                       header("Location: ".Conectar::ruta()."c-mini/");exit;
                                     }
                                        
                                 }else
                                 {
                                  /////////////////////////
                                    parent::conexion();
                                    $sql=sprintf
                                    (
                                        "select * from usuarios where login_usu='%s' and pass_usu='%s' and cve_cat_user=1 and status!=0",
                                        parent::comillas_inteligentes($_POST["user"]),
                                        parent::comillas_inteligentes($_POST["pass"])
                                    );
                                    
                                    $res=mysql_query($sql);
                                    if(mysql_num_rows($res)!=0)
                                        {
                                             while($reg=mysql_fetch_array($res))
                                             {
                                               $_SESSION["nom_se"]=$reg["nombre_usu"]." ".$reg["apellidos_usu"];
                                               $_SESSION["cve_se"]=$reg["cve_usu"];
                                               header("Location: ".Conectar::ruta()."c-sini/");exit;
                                             }
                                                
                                         }else
                                         {
                                           header("Location: ".Conectar::ruta()."c-login/v-2/");exit; 
                                         }
                                  ////////////////////////
                                 }
                          ////////////////////////
                         }
                   ////////////////////////
                 }
          }
          else
             {
                header("Location: ".Conectar::ruta()."c-login/v-1/");exit;
             }
        }
    
}


?>