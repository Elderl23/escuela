<?php
session_start();
date_default_timezone_set("America/Mexico_City");
class Conectar
{
    public function conexion()
    {
      $con=mysql_connect("localhost","root","");
      mysql_query("SET NAMES 'utf8'");
      mysql_select_db("iitae");
      return $con;  
    }
    public static function conexion2()
    {
      $con=mysql_connect("localhost","root","");
      mysql_query("SET NAMES 'utf8'");
      mysql_select_db("iitae");
      return $con;  
    }
    public function comillas_inteligentes($valor)
	{
		// Retirar las barras
		if (get_magic_quotes_gpc()) {
			$valor = stripslashes($valor);
		}
	
		// Colocar comillas si no es entero
		if (!is_numeric($valor)) {
			$valor = "'" . mysql_real_escape_string($valor) . "'";
		}
		return $valor;
	} 
    
    public static function ruta()
    {
        return "http://localhost/iitae/";
    }
    public static function fecha()  
    {  
        $week_days = array ("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");  
        $months = array ("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");  
        $year_now = date ("Y");  
        $month_now = date ("n");  
        $day_now = date ("j");  
        $week_day_now = date ("w");  
        $date = $week_days[$week_day_now] . ", " . $day_now . " de " . $months[$month_now] . " de " . $year_now;   
        return $date;    
    } 
    
    public static function con_guion($url)
      {
            $url = strtolower($url);
            //Rememplazamos caracteres especiales latinos 
            $find = array('�','�','�','�','�','�');
            $repl = array('a','e','i','o','u','n');
            $url = str_replace($find,$repl,$url);
            //// A�aadimos los guiones
//            $find = array(' ', '&', '\r\n', '\n', '+'); 
//            $url = str_replace ($find, '-', $url); 
//            // Eliminamos y Reemplazamos dem�s caracteres especiales 
//            $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/'); 
//            $repl = array('', '-', ''); 
//            $url = preg_replace ($find, $repl, $url); 
            //$palabra=trim($palabra);
            //$palabra=str_replace(" ","-",$palabra);
            return $url;
        }
       public static function quitar_tiltes($cadena)
        {
            $originales = '��������������������������������������������������������������Rr';
            $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
            $cadena = utf8_decode($cadena);
            $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
            $cadena = strtolower($cadena);
            return utf8_encode($cadena);
        } 
}



?>