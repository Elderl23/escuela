<?php
class cat_user extends Conectar
{
     private $cat;
    
    public function __construct()
    {
        $this->cat=array();
    }
    
    public function cat_usuarios()
    {
        $sql="select cve_cat_user, nombre_cat  from cat_user";
        $res=mysql_query($sql,parent::conexion());
        while($reg=mysql_fetch_assoc($res))
        {
            $this->cat[]=$reg;
        }
        return $this->cat;
    }
}


?>