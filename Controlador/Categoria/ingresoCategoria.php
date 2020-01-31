<?php


require_once("../../Modelo/Categoria/Categoria_Create_Model.php");//traigo la clase usuario_Create_Model.php
require_once("../../Modelo/Conexion.php");//traigo la conexion
require_once("../../Clases/categoria.php");

$Ejecuta=new Conexion();
//$Ejecuta::EjecutaEscalar();

$mensaje=null;//captura el mensaje tanto EXITO / ERROR



if(empty($_POST['nombre']) &&  empty($_POST['descripcion'])  )
{

	$error=' PorFavor Completar Todos Los Campos ';
	echo "<p class='alert alert-info' style='font-size:13px; '>'".$_SESSION['error']='PorFavor Completar Todos Los Campos  '."</p>";

	/**$error='PorFavor Completar Todos Los Campos ';
	echo "PorFavor Completar Todos Los Campos ";

	echo'<p style="background-color:red; font-size:25px; display:none; ">PorFavor Completar Todos Los Campos  !!!! </p> ';
	$_SESSION['error']='PorFavor Completar Todos Los Campos  ';**/
	echo "<script type='text/javascript'> alert('PorFavor Completar Todos Los Campos  !!!!  ');
    window.location='../../Vistas/Categoria/categoria.php';</script>";
}
elseif( empty($_POST['descripcion']))
{
	$error='Campos Vacios Descripcion Verifique !!!!';
	echo "Campos Vacios Verifique descripcion !!!! ";
	echo'<p style="background-color:red; font-size:25px; display:none; ">Campos Vacios Verifique descripcion !!!! </p> ';
	$_SESSION['error']='Campos Vacios Verifique ';
	echo "<script type='text/javascript'> alert('Campos Vacios Verifique nombre !!!!  ');
    window.location='../../Vistas/Categoria/categoria.php';</script>";

}
elseif( empty($_POST['nombre']) )
{
		
	$error='Campos Vacios Nombre Verifique !!!!';
	echo "Campos Vacios Verifique nombre !!!! ";
	echo'<p style="background-color:red; font-size:25px; display:none; ">Campos Vacios Verifique nombre !!!! </p> ';
	$error='Campos Vacios Verifique !!!!';
	$_SESSION['error']='Campos Vacios Verifique ';
	echo "<script type='text/javascript'> alert('Campos Vacios Verifique nombre !!!!  ');
           
           window.location='../../Vistas/Categoria/categoria.php';</script>";

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




	/*METODO 2 DE ORIENTACION A OBJETOS DE LA CLASE Categoria */


	//$mensaje=[];
	$nombre=$_POST['nombre'];
	$descripcion=$_POST['descripcion'];
	$Estado=$_POST['Estado'];
/*-----------------------------------------*/
	$Inserta=new funciones_Categoria();//Muestro la clase categoria de la carpeta Modelo

	$MiCategoria=new categoria();
/*-----------------------------------------*/
	//$horaActual=getdate();

	$a=$MiCategoria->setDescripcion=$nombre;
	$b=$MiCategoria->setIsVenta=$descripcion;
	$c=$MiCategoria->setEstado=$Estado;
	//$d=$MiCategoria->setFecha_registro=$horaActual;

	$Inserta->InsertarCategoria($a,$b,$c);
	
}



?>