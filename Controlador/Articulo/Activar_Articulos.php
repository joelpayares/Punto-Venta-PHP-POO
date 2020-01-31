<?php
$id_producto=null;
require_once("../../Modelo/Articulo/ArticuloModel.php");//traigo la clase usuario_Create_Model.php
require_once("../../Modelo/Conexion.php");//traigo la conexion
require_once("../../Clases/articulo.php");


$mensaje=null;//capturo el mensaje tanto Error/Exito


try 
		{
					
					if(isset($_GET['id']) )
						{
								   $id=$_GET['id'];	
								   //$id=$_POST['id'];   /*if(isset($_GET['id'])  )*/

								   $miArticulo_Model=new Articulo_Modelo();
							/*--------------------------------------------------*/
								  $miArticulo=new producto();
							/*--------------------------------------------------*/
								  	$a=$miArticulo->setId_producto=$id;

						            
								   $consultar=$miArticulo_Model->Activar_Articulos($a);
								   

								  	
							/*---------------------------------------------------------------------------*/

						   


						}
		            
		            
		                    
		           
		} 
		catch (Exception $e) 
		{
		            $error='Error Consulta Usuarios_Create_Model !!!! ';
		            echo "Error Consulta Usuarios_Create_Model --->  "+$e->getMessage();
		            echo "<p style='background-color:red; '>'".$_SESSION['error']='Error Consulta Usuarios_Create_Model !!!!  '."</p>";
		            echo "<scrip>window.alert('Error Consulta Usuarios_Create_Model !!!! ');</script>".$e->getMessage();
		}
		catch (PDOException $ex)
		{
		            $error='Error Al Cerrar La Base Datos Desconocida !!!! ';
		             echo "<p style='background-color:red; '>'".$_SESSION['error']='Error Al Cerrar La Base Datos Desconocida !!!! '."</p>";
		             $_SESSION['error']='Error Al Cerrar La Base Datos Desconocida !!!! ';
		             echo "<scrip>window.alert('Error Al Cerrar La Base Datos Desconocida !!!! ');</script>".$ex->getMessage();

		}
?>