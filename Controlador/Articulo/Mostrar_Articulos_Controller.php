<?php

header("Content-Type: application/json");
try
{
	require_once("../../Modelo/Articulo/ArticuloModel.php");//traigo la clase usuario_Create_Model.php
}
catch (Exception $e) 
	{
			$error='Error Al Mostrar Consulta Productos_Controller  ';
			echo "Error Al Mostrar Consulta Productos_Controller  --->  "+$e->getMessage();
			echo "<p style='background-color:red; '>'".$_SESSION['error']='Error Al Mostrar Consulta Productos_Controller  '."</p>";
			echo "<scrip>window.alert('Error Al Mostrar Consulta Productos_Controller  !!!! ');</script>".$e->getMessage();
		    //echo "Error Al Mostrar Consulta Productos_Controller ".$e->getMessage();
	}
catch (PDOException $ex)
	{
		    $error='Error Al Mostrar Consulta Productos_Controller  ';
			echo "Error Al Mostrar Consulta Productos_Controller  --->  "+$e->getMessage();
			echo "<p style='background-color:red; '>'".$_SESSION['error']='Error Al Mostrar Consulta Productos_Controller  '."</p>";
			echo "<scrip>window.alert('Error Al Mostrar Consulta Productos_Controller  !!!! ');</script>".$e->getMessage();
		    //echo "Error Al Mostrar Consulta Productos_Controller ".$e->getMessage();
	}
?>
 
