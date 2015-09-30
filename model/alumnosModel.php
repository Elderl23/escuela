<?php
class alumnos extends Conectar
{
    private $consulta_grupo_dis;
    private $con_matricula;
    private $con_pro;
    private $con_alum_ava;
    private $con_ultimos_5;
    private $con_alum_es;
    private $nom_promotor;
    private $con_es_alum;
    private $consul_a_gpo;
    private $con_cali;
    private $conpracticas;
    private $con_practicas_re;
    private $trae_practicas_re;
    
    public function __construct()
    {
        $this->consulta_grupo_dis=array();
        $this->con_matricula=array();
        $this->con_pro=array();
        $this->con_alum_ava=array();
        $this->con_ultimos_5=array();
        $this->con_alum_es=array();
        $this->nom_promotor=array();
        $this->con_es_alum=array();
        $this->consul_a_gpo=array();
        $this->con_cali=array();
        $this->conpracticas=array();
        $this->con_practicas_re=array();
        $this->trae_practicas_re=array();
    }
 public function alta_alumnos()
 {
     parent::conexion();
     $query=sprintf
                    (
                        "insert into alumnos 
                        values
                        (null,'%s',%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,'%s','%s',0,1,1);
                        ",
                        parent::comillas_inteligentes($_POST["matricula"]),
                        parent::comillas_inteligentes($_POST["nombre"]),
                        parent::comillas_inteligentes($_POST["ap"]),
                        parent::comillas_inteligentes($_POST["sexo"]),
                        parent::comillas_inteligentes($_POST["edad"]),
                        parent::comillas_inteligentes($_POST["curp"]),
                        parent::comillas_inteligentes($_POST["nacademico"]),
                        parent::comillas_inteligentes($_POST["padre"]),
                        parent::comillas_inteligentes($_POST["tele"]),
                        parent::comillas_inteligentes($_POST["obser"]),
                        parent::comillas_inteligentes($_POST["calle"]),
                        parent::comillas_inteligentes($_POST["numero"]),
                        parent::comillas_inteligentes($_POST["colo"]),
                        parent::comillas_inteligentes($_POST["estado"]),
                        parent::comillas_inteligentes($_POST["muni"]),
                        parent::comillas_inteligentes($_POST["id_pro"]),
                        parent::comillas_inteligentes($_POST["gpo"]),
                        parent::comillas_inteligentes($_POST["an"]),
                        parent::comillas_inteligentes($_POST["ce"]),
                        parent::comillas_inteligentes($_POST["f"]),
                        parent::comillas_inteligentes($_POST["fecha"]),
                        parent::comillas_inteligentes($_POST["semana"]),
                        parent::comillas_inteligentes($_POST["login"]),
                        parent::comillas_inteligentes($_POST["pass"])
                    );
                    $query2=sprintf
                    (
                        "insert into calificacion 
                        values
                        (null,'%s',%s,0,0,0,0,0,0,0,0,0,0,0,0);
                        ",
                        parent::comillas_inteligentes($_POST["matricula"]),
                        parent::comillas_inteligentes($_POST["gpo"])
                    );
                    mysql_query($query);
                    mysql_query($query2);
                    header("Location: ".Conectar::ruta()."c-alumnos/");exit; 
 }
 public function consulta_grupo_dis() 
 {
                $sql="select 
                       *
                         from 
                               grupo,maestros 
                                        where grupo.estado=1 and grupo.status_gpo=1 and
                                        grupo.cve_maes=maestros.cve_maes
                               ;";
             $res=mysql_query($sql,parent::conexion());
             while($reg=mysql_fetch_assoc($res))
             {
                $this->consulta_grupo_dis[]=$reg;
             }
                return $this->consulta_grupo_dis;
 }
 
 public function consulta_matricula() 
   {
                $sql="SELECT * FROM  alumnos ORDER BY cve_alum DESC LIMIT 1
                               ;";
             $res=mysql_query($sql,parent::conexion());
             while($reg=mysql_fetch_assoc($res))
             {
                $this->con_matricula[]=$reg;
             }
                return $this->con_matricula;
 
    }
    
 public function consulta_promotor() 
   {
                $sql="SELECT cve_usu,nombre_usu,apellidos_usu FROM  usuarios where cve_cat_user=3
                               ;";
             $res=mysql_query($sql,parent::conexion());
             while($reg=mysql_fetch_assoc($res))
             {
                $this->con_pro[]=$reg;
             }
                return $this->con_pro;
 
    }
    
    public function consulta_alum_ava() 
    {
                $sql="SELECT * FROM  alumnos where avatar_al=0 and status_al!=0
                               ;";
             $res=mysql_query($sql,parent::conexion());
             while($reg=mysql_fetch_assoc($res))
             {
                $this->con_alum_ava[]=$reg;
             }
                return $this->con_alum_ava;
 
   }
   public function consulta_ultomos_5() 
    {
                $sql="SELECT * FROM  alumnos where avatar_al!=0 and status_al!=0 ORDER BY cve_alum DESC LIMIT 5 
                               ;";
             $res=mysql_query($sql,parent::conexion());
             while($reg=mysql_fetch_assoc($res))
             {
                $this->con_ultimos_5[]=$reg;
             }
                return $this->con_ultimos_5;
 
   }
   public function consulta_alum_es($v) 
    {
                $sql="SELECT * FROM  alumnos,grupo where alumnos.cve_alum=$v and alumnos.cve_grupo=grupo.cve_grupo
                               ;";
             $res=mysql_query($sql,parent::conexion());
             while($reg=mysql_fetch_assoc($res))
             {
                $this->con_alum_es[]=$reg;
             }
                return $this->con_alum_es;
 
   }
  public function consulta_nom_pro($p) 
    {
                $sql="SELECT nombre_usu,apellidos_usu FROM  usuarios where cve_usu=$p and status!=0
                               ;";
             $res=mysql_query($sql,parent::conexion());
             while($reg=mysql_fetch_assoc($res))
             {
                $this->nom_promotor[]=$reg;
             }
                return $this->nom_promotor;
 
   }
   
   public function consulta_es_al() 
    {
             parent::conexion();
            $sql=sprintf
            (
                "select * from alumnos
                     where 
                         nombre_alum=%s 
                         and apellidos_al=%s and avatar_al!=0
                         ",
                parent::comillas_inteligentes($_POST["nombre"]),
                parent::comillas_inteligentes($_POST["aps"])
            );
            $res=mysql_query($sql);
            while($reg=mysql_fetch_assoc($res))
            {
                $this->con_es_alum[]=$reg;
            }
            return $this->con_es_alum;
 
   }
   public function eli_alumno()
    {
        parent::conexion();
            $sql=sprintf
            (
                "update alumnos set
                status_al=%s,
                asistencia=%s
                where
                cve_alum=%s
                ",
                parent::comillas_inteligentes($_POST["e"]),
                parent::comillas_inteligentes($_POST["e"]),
                parent::comillas_inteligentes($_POST["cve_al"]) 
            );
             mysql_query($sql);
             header("Location: ".Conectar::ruta()."c-alumnos/");exit;  
    }
    public function consulta_a_gpo() 
    {
             parent::conexion();
            $sql=sprintf
            (
                "select * from alumnos,calificacion
                     where 
                         alumnos.cve_grupo=%s and 
                         alumnos.matricula=calificacion.cve_alum
                         and status_al!=0 ORDER BY apellidos_al ASC
                         ",
                parent::comillas_inteligentes($_POST["cve_gpo"])
            );
            $res=mysql_query($sql);
            while($reg=mysql_fetch_assoc($res))
            {
                $this->consul_a_gpo[]=$reg;
            }
            return $this->consul_a_gpo;
 
   }
   public function consulta_cali($matricu) 
    {
        $sql="select *  from calificacion
                     where 
                         cve_alum='$matricu'
                               ;";
            $res=mysql_query($sql,parent::conexion());
            while($reg=mysql_fetch_assoc($res))
            {
                $this->con_cali[]=$reg;
            }
            return $this->con_cali;
 
   }
   public function ingresar_calificacion($nc,$wi1,$wi2,$wo1,$wo2,$po1,$po2,$e1,$e2,$in1,$in2,$a1,$a2)
    {
          $sql="UPDATE calificacion  SET 
                wind1 = $wi1,
                wind2 = $wi2,
                wor1 = $wo1,
                wor2 = $wo2,
                pow1 = $po1,
                pow2 = $po2,
                ex1 =  $e1,
                ex2 =  $e2,
                in1 = $in1,
                in2 = $in2,
                ac1 =  $in2,
                ac2 =  $a1 WHERE cve_alum ='$nc';";
                
              $res=mysql_query($sql,parent::conexion());
            
    }
     public function trae_practicas($cv_gpo) 
        {
           $sql="select 
                       *
                         from 
                               practicas 
                                        where cve_grupo=$cv_gpo and estatus_p!=0
                                               ORDER BY cve_practica DESC
                               ;";
             $res=mysql_query($sql,parent::conexion());
             while($reg=mysql_fetch_assoc($res))
             {
                $this->conpracticas[]=$reg;
             }
                return $this->conpracticas;
        }
        public function trae_practicas_re($cve_pra,$cve_alum) 
        {
           $sql="select 
                       *
                         from 
                               practicas_realizadas 
                                        where cve_practica=$cve_pra and cve_alum=$cve_alum
                               ;";
             $res=mysql_query($sql,parent::conexion());
             while($reg=mysql_fetch_assoc($res))
             {
                $this->con_practicas_re[]=$reg;
             }
                return $this->con_practicas_re;
        }
        public function trae_practicas_re_ge($cve_alum) 
        {
           $sql="select 
                       *
                         from 
                               practicas_realizadas 
                                        where cve_alum=$cve_alum
                               ;";
             $res=mysql_query($sql,parent::conexion());
             while($reg=mysql_fetch_assoc($res))
             {
                $this->trae_practicas_re[]=$reg;
             }
                return $this->trae_practicas_re;
        }

       public function actualizar_alumnos()
    {
        parent::conexion();
           echo $sql=sprintf
            (
                "update alumnos set
                tel_al=%s,
                obser_al=%s,
		calle_al=%s,
		num_al=%s,
		col_al=%s,
                estado_al=%s,
		muni_al=%s
                where
                cve_alum=%s
                ",
                parent::comillas_inteligentes($_POST["tele"]),
                parent::comillas_inteligentes($_POST["obser"]),
		parent::comillas_inteligentes($_POST["calle"]),
		parent::comillas_inteligentes($_POST["numero"]),
		parent::comillas_inteligentes($_POST["colo"]),
		parent::comillas_inteligentes($_POST["estado"]),
                parent::comillas_inteligentes($_POST["muni"]),
		parent::comillas_inteligentes($_POST["cve_a"]) 
            );
             mysql_query($sql);
             header("Location: ".Conectar::ruta()."c-aini/v-6/");exit;  
    }

}
?>