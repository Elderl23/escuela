<?php
session_start();
session_destroy();
header("location:".Conectar::ruta()."c-home/");

?>