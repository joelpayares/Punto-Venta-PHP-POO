<?php

require_once("../../Modelo/Articulo/ArticuloModel.php");//traigo la clase usuario_Create_Model.php
require_once("../../Modelo/Conexion.php");//traigo la conexion
require_once("../../Clases/articulo.php");

$Ejecuta=new Conexion();

$mensaje=null;//capturo el mensaje tanto Error/Exito



if( empty($_POST['CodigoBarra']) && empty($_POST['Stock'])  && empty($_POST['StockMin'])  && empty($_POST['PrecioCosto']) && empty($_POST['PrecioVenta'])  && empty($_POST['Utilidad']) && 
	empty($_POST['impuesto'])   )
{
		$error=' PorFavor Completar Todos Los Campos ';
		echo "<p class='alert alert-info' style='font-size:13px; '>'".$_SESSION['error']='PorFavor Completar Todos Los Campos  '."</p>";
		echo "<script type='text/javascript'> alert('PorFavor Completar Todos Los Campos  !!!!  ');
	    window.location='../../Vistas/Articulos/articulo.php';</script>";
}
elseif( empty($_POST['Descripcion'])    )
{
	$error='Campos Vacios Verifique !!!!';
	echo "Campos Vacios Verifique  !!!! ";
	echo'<p style="background-color:red; font-size:25px; display:none; ">Campos Vacios Verifique   !!!! </p> ';
	$_SESSION['error']='Campos Vacios Verifique ';
	echo "<script type='text/javascript'> alert('Campos Vacios Verifique  !!!!  ');
    window.location='../../Vistas/Articulos/articulo.php';</script>";

}
elseif( empty($_POST['Nombre']) )
{
		
	$error='Campos Vacios Nombre Verifique    !!!!';
	echo "Campos Vacios Verifique nombre !!!! ";
	echo'<p style="background-color:red; font-size:25px; display:none; ">Campos Vacios Verifique nombre  !!!! </p> ';
	$error='Campos Vacios Verifique !!!!';
	$_SESSION['error']='Campos Vacios Verifique ';
	echo "<script type='text/javascript'> alert('Campos Vacios Verifique  !!!!  ');
    window.location='../../Vistas/Articulos/articulo.php';</script>";

}
else
{

	try 
	{
		if( empty($_POST['CodigoBarra']) && 
			empty($_POST['Stock'])       && 
			empty($_POST['StockMin'])    && 
			empty($_POST['PrecioCosto']) && 
			empty($_POST['PrecioVenta']) && 
			empty($_POST['Utilidad'])    && 
			empty($_POST['impuesto'])   

			)

		{
				$error=' PorFavor Completar Todos Los Campos ';
				echo "<p class='alert alert-info' style='font-size:13px; '>'".$_SESSION['error']='PorFavor Completar Todos Los Campos  '."</p>";
				echo "<script type='text/javascript'> alert('PorFavor Completar Todos Los Campos  !!!!  ');
			    window.location='../../Vistas/Articulos/articulo.php';</script>";
		}

			$codigo=$_POST["codigo"];
		    $CodigoBarra=$_POST["CodigoBarra"];
		    $Nombre=$_POST["Nombre"];
		    $Stock=$_POST["Stock"];
		    $Descripcion=$_POST["Descripcion"];
		    $StockMin=$_POST["StockMin"];
		    $PrecioCosto=$_POST["PrecioCosto"];
		    $PrecioVenta=$_POST["PrecioVenta"];
		    $Utilidad=$_POST["Utilidad"];
		    $Estado=$_POST["Estado"];
		    $impuesto=$_POST["impuesto"];
		    $Id_Categoria=$_POST["Id_Categoria"];

		    	$miArticulo_Model=new Articulo_Modelo();
		    /*--------------------------------------------------*/
		    	$miArticulo=new producto();
		    /*--------------------------------------------------*/
		    	$a=$miArticulo->setCodigo=$codigo;

		    	$b=$miArticulo->setCodigoBarra=$CodigoBarra;

		    	$c=$miArticulo->setNombre=$Nombre;

		    	$d=$miArticulo->setStock=$Stock;

		    	$e=$miArticulo->setDescripcion=$Descripcion;

		    	$f=$miArticulo->setStockMin=$StockMin;

		    	$g=$miArticulo->setPrecioCosto=$PrecioCosto;

		    	$h=$miArticulo->setPrecioVenta=$PrecioVenta;

		    	$i=$miArticulo->setUtilidad=$Utilidad;

		    	$j=$miArticulo->setEstado=$Estado;

		    	$k=$miArticulo->setId_Categoria=$Id_Categoria;

		    	$l=$miArticulo->setImpuesto=$impuesto;
		    /*-------------------------------------------------------------------------*/

		    	$miArticulo_Model->InsertarArticulos($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l);
		    /*---------------------------------------------------------------------------*/

	} 
	catch (Exception $e) 
	{
		$error=' Error Falta Campos Por Completar ';
		echo "<p class='alert alert-info' style='font-size:13px; '>'".$_SESSION['error']='Error Falta Campos Por Completar  '."</p>";
		echo "<script type='text/javascript'> alert('Error Falta Campos Por Completar  !!!!  ');
			    window.location='../../Vistas/Articulos/articulo.php';</script>";
	}


			






































}
?>