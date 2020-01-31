<?php

//session_start();

if($_SESSION['usuario']=true)
{

	

	//$_SESSION['usuario'] = array(1=>'usuario');

	//print_r( $_SESSION );



	require_once("../../Modelo/funciones/Usuario_Create_Model.php");//traigo la clase usuario_Create_Model.php
	require_once("../../Modelo/Conexion.php");//traigo la conexion
	require_once("../../Clases/Login.php");

	$Ejecuta=new Conexion();
	//$Ejecuta::EjecutaEscalar();

	$mensaje=null;//captura el mensaje tanto EXITO / ERROR

	$mensaje=[];

	$ingresa=new funciones();

	//$_SESSION['usuario']=$ingresa;


	$mensaje=$ingresa->mostrar_Usuario_Logueado();


}

else
{
	if( isset($_SESSION['usuario'])==false   )
	{
		echo "<script type='text/javascript'> alert('Error Usuario NO Autenticado !!!!  ');window.location='../../index.php';</script>";
	}

	

}


?>
 