
<?php


require_once("../../Modelo/Usuarios/Usuario_Create_Model.php");//traigo la clase usuario_Create_Model.php
require_once("../../Modelo/Conexion.php");//traigo la conexion
require_once("../../Clases/Login.php");

$Ejecuta=new Conexion();
//$Ejecuta::EjecutaEscalar();

$mensaje=null;//captura el mensaje tanto EXITO / ERROR

if(empty($_POST['usuario'])  )
{

	echo "Campos Vacios Verifique Usuario !!!! ";
	echo'<p style="background-color:red; font-size:25px; display:none; ">Campos Vacios Verifique usuario !!!! </p> ';
	$error='Campos Vacios Verifique !!!!';
	$_SESSION['error']='Campos Vacios Verifique ';
	
	$Ejecuta->cierraConexion();//llamo al objeto de conexion y luego llamo al metodo de la clase conexion Cierre de Conexion
	//exit(); 

}
elseif(empty($_POST['password']))
{

	echo "Campos Vacios Verifique password !!!! ";
	echo'<p style="background-color:red; font-size:25px; display:none; ">Campos Vacios Verifique password !!!! </p> ';
	$error='Campos Vacios Verifique !!!!';
	$_SESSION['error']='Campos Vacios Verifique ';
	
	$Ejecuta->cierraConexion();//llamo al objeto de conexion y luego llamo al metodo de la clase conexion Cierre de Conexion
	//exit();

}
else
{
	/*
	$mensaje=[];
	$usuario=$_POST['usuario'];
	$password=$_POST['password'];
	$ingresa=new funciones();
	$usuario=$_POST['usuario'];
	$password=$_POST['password'];
	$mensaje=$ingresa->Verificar_Login_Model($usuario,$password);
	echo "<script>window.alert('Usuario Ingresado Exitosamente---- ');</script>";
	return "Usuario Autenticado Exitosamente";**/




	/*METODO 2 DE ORIENTACION A OBJETOS DE LA CLASE LOGIN */


	//$mensaje=[];
	$persona=new login();
	$ingresa=new funciones();

	$usuario=$_POST['usuario'];

	$password=$_POST['password'];

	//session_start();//inicializamos el inicio session

	//$_SESSION['usuario']=$usuario;//inicio session con el tipo de usuario que esta registrado en la base de datos 
	//$_SESSION['password']=$password;

	$a=$persona->setUsuario=$usuario;
	$b=$persona->setClave=$password;



	$ingresa->Verificar_Login_Model($a,$b);
	//$ingresa->mostrar_Usuario_Logueado($a,$b);
	
	
	

	//$array=array(1=>"$ingresa");

	//var_dump($ingresa);

	//echo "<script>window.alert('Usuario Ingresado Exitosamente---- ');</script>";
	//return "Usuario Autenticado Exitosamente";



}



?>
 
