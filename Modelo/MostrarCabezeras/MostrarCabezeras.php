<?php

require_once("../../Modelo/Conexion.php");//traigo la conexion
class MostrarCabezeras_Model 
{

	public function __construct() 
	{
        
    }


    public function OrdenesCompras()
    {

        try 
        {
            //$respuesta=[];
            $Ejecuta=new Conexion();

            $Ejecuta_Conexion=$Ejecuta->EjecutaEscalar();

            $stmt=$Ejecuta_Conexion->prepare(" SELECT COUNT(c. IdCompra) FROM compra as c ");
            /*-------------------------------------------*/
            $stmt->execute(array('IdCompra'=>"IdCompra"));
            /*-------------------------------------------*/
            $success='Ordenes Compras Mostrado Exitosamente !!! ';
            $resultados=$stmt->fetchColumn();
            print_r($resultados);
        } 
        catch (Exception $e) 
        {
            $error='Error mostrar OrdenesCompras !!!! ';
            echo "Error mostrar OrdenesCompras !!!! --->  "+$e->getMessage();
        echo "<p style='background-color:red; '>'".$_SESSION['error']='Error mostrar OrdenesCompras !!!!  '."</p>";
            echo "<scrip>window.alert('Error mostrar OrdenesCompras !!!! ');</script>".$e->getMessage();
        }
        catch (PDOException $ex)
        {
            $error='Error Al Cerrar La Base Datos Desconocida !!!! ';
             echo "<p style='background-color:red; '>'".$_SESSION['error']='Error Al Cerrar La Base Datos Desconocida !!!! '."</p>";
             $_SESSION['error']='Error Al Cerrar La Base Datos Desconocida !!!! ';
             echo "Error mostrar OrdenesCompras !!!! --->  "+$ex->getMessage();
             echo "<scrip>window.alert('Error Al Cerrar La Base Datos Desconocida !!!! ');</script>".$ex->getMessage();

        }






    }
    public function Numero_Ventas()
    {

        try 
        {
            //$respuesta=[];
            $Ejecuta=new Conexion();

            $Ejecuta_Conexion=$Ejecuta->EjecutaEscalar();

            $stmt=$Ejecuta_Conexion->prepare(" SELECT COUNT(v.IdVenta) FROM venta as v ");
            /*-------------------------------------------*/
            $stmt->execute(); //$stmt->execute(array('IdVenta'=>"IdVenta"));
            /*-------------------------------------------*/
            $success='Numero Total Ventas General Mostrado Exitosamente !!! ';
            $resultados=$stmt->fetchColumn();
            echo "<p style='background-color:green; display:none '>'".$_SESSION['success']='Numero Ventas Mostrado Exitosamente !!!! '."</p>";
            print_r($resultados);

        } 
        catch (Exception $e) 
        {
            $error='Error mostrar Ventas !!!! ';
            echo "Error mostrar Ventas !!!! --->  "+$e->getMessage();
            echo "<p style='background-color:red; '>'".$_SESSION['error']='Error mostrar Ventas !!!!  '."</p>";
            
        }
        catch (PDOException $ex)
        {
            $error='Error Al Cerrar La Base Datos Desconocida !!!! ';
             echo "<p style='background-color:red; '>'".$_SESSION['error']='Error Al Cerrar La Base Datos Desconocida !!!! '."</p>";
             $_SESSION['error']='Error Al Cerrar La Base Datos Desconocida !!!! ';
             echo "Error mostrar Ventas !!!! --->  "+$ex->getMessage();
        }






    }

    public function ContarUsuarios()
    {

        try 
        {
            //$respuesta=[];
            $Ejecuta=new Conexion();

            $Ejecuta_Conexion=$Ejecuta->EjecutaEscalar();

            $stmt=$Ejecuta_Conexion->prepare(" SELECT COUNT(l.id_usuario) FROM login as l   ");
            /*-------------------------------------------*/
            $stmt->execute(array('id_usuario'=>"id_usuario"));
            /*-------------------------------------------*/
            $success='Usuarios Mostrado Exito!!! ';
            $resultados=$stmt->fetchColumn();
            print_r($resultados);
        } 
        catch (Exception $e) 
        {
            $error='Error mostrar OrdenesCompras !!!! ';
            echo "Error mostrar OrdenesCompras !!!! --->  "+$e->getMessage();
        echo "<p style='background-color:red; '>'".$_SESSION['error']='Error mostrar OrdenesCompras !!!!  '."</p>";
            echo "<scrip>window.alert('Error mostrar OrdenesCompras !!!! ');</script>".$e->getMessage();
        }
        catch (PDOException $ex)
        {
            $error='Error Al Cerrar La Base Datos Desconocida !!!! ';
             echo "<p style='background-color:red; '>'".$_SESSION['error']='Error Al Cerrar La Base Datos Desconocida !!!! '."</p>";
             $_SESSION['error']='Error Al Cerrar La Base Datos Desconocida !!!! ';
             echo "Error mostrar OrdenesCompras !!!! --->  "+$ex->getMessage();
             echo "<scrip>window.alert('Error Al Cerrar La Base Datos Desconocida !!!! ');</script>".$ex->getMessage();

        }






    }







}

?>