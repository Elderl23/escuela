<?php
require_once("model/loginModel.php");
$objeto_login = new acceso();

if(isset($_POST["login"])){
$login=$objeto_login->login();
}


require_once("view/login.phtml");

?>