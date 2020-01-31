
<?php


require_once("../../Modelo/Usuarios/Usuario_Create_Model.php");//traigo la clase usuario_Create_Model.php
require_once("../../Modelo/Conexion.php");//traigo la conexion
//require_once("../../Clases/Login.php");

$Ejecuta=new Conexion();
//$Ejecuta::EjecutaEscalar();

$mensaje=null;//captura el mensaje tanto EXITO / ERROR

$mensaje=[];

$ingresa=new funciones();

$mensaje=$ingresa->mostrar_Todos_Login();

?>
 