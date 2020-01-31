<?php


require_once("../../Modelo/Categoria/Buscar_Categoria_Model.php");//traigo la clase usuario_Create_Model.php
require_once("../../Modelo/Conexion.php");//traigo la conexion
require_once("../../Clases/categoria.php");

$Ejecuta=new Conexion();
//$Ejecuta::EjecutaEscalar();

$mensaje=null;//captura el mensaje tanto EXITO / ERROR
$nombre=null;


	$nombre=$_POST["nombre"];
	$Buscar_Dato=new funciones_Buscar_Categoria();//Muestro la clase categoria de la carpeta Modelo
	$Buscar_Dato->BuscarCategoria($nombre);


	




/**if(isset($_POST['nombre']) )
{

	

}**/


/**


echo "<p style='background-color:green; display:none '>'".$_SESSION['success']='Categoria Buscado Exitosamente !!!  '."</p>";
                                echo "<script type='text/javascript'> alert('Categoria Buscado Exitosamente  !!! ');
                                window.location='../../Vistas/Categoria/BuscarCategoria.php';</script>";
	


*/

?>