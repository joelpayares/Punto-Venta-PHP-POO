<?php
require_once("../../Clases/categoria.php");
require_once("../../Modelo/Conexion.php");
$Ejecuta=new Conexion();

$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$Estado=$_POST['Estado'];
class funciones_Categoria
{	
	
	public function __construct() 
	{
        
    }

     public function InsertarCategoria($nombre,$descripcion,$Estado)
    {
    	try 
    	{
    		//$respuesta=[];
    		$Ejecuta=new Conexion();

    		$Ejecuta_Conexion=$Ejecuta->EjecutaEscalar();

    		$micategoria=new categoria();

    		
    		/*--------------------------------------------------------------------------------------*/
    		//$hora=$horaActual=date("Y-m-d H:i:s");


			$stmt=$Ejecuta_Conexion->prepare(" INSERT INTO categoria(Descripcion,isVenta,Estado) 

			VALUES ('".$nombre."','".$descripcion."','".$Estado."'  ) ");
			/*-------------------------------------------*/
			$nombre=$micategoria->GetDescripcion();
    		$descripcion=$micategoria->GetIsVenta();
    		$Estado=$micategoria->GetEstado();
    		/*-------------------------------------------*/
			$stmt->execute();
			/*-------------------------------------------*/
			$stmt->fetch(PDO::FETCH_ASSOC);
			$success='Categoria Ingresado Exitosamente !!! ';
			$array = array(1 => "$nombre",2 =>"$descripcion"  );
			//var_dump($array);
    		echo "<p style='background-color:green; display:none '>'".$_SESSION['success']='Categoria Ingresado Exitosamente !!!  '."</p>";
			echo "<script type='text/javascript'> alert('Categoria Ingresado Exitosamente !!! ');
            window.location='../../Vistas/Categoria/categoria.php';</script>";
			

    	} 
    	catch (Exception $e) 
    	{
    		$error='Error Insertar Categoria_Create_Model !!!! ';
    		echo "Error Insertar Categoria_Create_Model --->  "+$e->getMessage();
    	echo "<p style='background-color:red; '>'".$_SESSION['error']='Error Insertar Categoria_Create_Model !!!!  '."</p>";
    		echo "<scrip>window.alert('Error Insertar Categoria_Create_Model !!!! ');</script>".$e->getMessage();
    	}
    	catch (PDOException $ex)
        {
            $error='Error Al Cerrar La Base Datos Desconocida !!!! ';
             echo "<p style='background-color:red; '>'".$_SESSION['error']='Error Al Cerrar La Base Datos Desconocida !!!! '."</p>";
             $_SESSION['error']='Error Al Cerrar La Base Datos Desconocida !!!! ';
             echo "<scrip>window.alert('Error Al Cerrar La Base Datos Desconocida !!!! ');</script>".$ex->getMessage();

        }
    } 

    


}
?>