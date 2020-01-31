<?php


class Conexion
{
   private $bandera=False;


   
   public static function  EjecutaEscalar()
   {
     $host = "localhost";//Servidor
     $db= "farmaciaversionoriginal";//Base de Datos
     $link = "mysql:host=$host;dbname=$db";
     $usuario = "root";//Usuario
     $pass = "";//Contraseña
     $link = new PDO($link,$usuario,$pass);

     try 
     {
         if($link==true || $bandera==true)
         {
            $success='Conexion Exitosa !!!! ';
            //echo "<p style='background-color:blue; display:none;  '>'".$_SESSION['success']='Base Datos Exitosa !!! '."</p>";
            //echo"<script>window.alert('Conexion Exitosa');</script>";
         }
         
         return $link;
     } 
     catch (Exception $e) 
     {
         $error='Base Datos Desconocida !!!! ';
         echo "<p style='background-color:red;   '>'".$_SESSION['error']='Base Datos Desconocida !!!! '."</p>";
         $_SESSION['error']='Base Datos Desconocida !!!! ';
         echo "<scrip>window.alert('Error Bd ');</script>".$e->getMessage();
         exit;
     }
     catch (PDOException $ex)
     {
        $error='Base Datos Desconocida !!!! ';
         echo "<p style='background-color:red;  '>'".$_SESSION['error']='Base Datos Desconocida !!!! '."</p>";
         $_SESSION['error']='Base Datos Desconocida !!!! ';
         echo "<scrip>window.alert('Error Bd ');</script>".$e->getMessage();

     }
     

     return $link;

    }


    public static function cierraConexion()//declaro una function de cierre de conexion
    {
        
        try 
        {
            $bandera=null;
            $link=null;//declaro como null al linqueo la conexion push

            if($link==false || $bandera==False)
             {
                $error='Conexion Finalizada !!!! ';
                echo "<p style='background-color:red; '>'".$_SESSION['error']='Conexion Finalizada !!!! '."</p>";
                //echo"<script>window.alert('Conexion Finalizada !!!!');</script>";
                echo "<script type='text/javascript'>  window.location='../../index.php';     </script>";//llamo al index en caso de error
             }
            return $link;

        } 
        
        catch (Exception $e) 
        {
             $error='Error Al Cerrar La Base Datos Desconocida !!!! ';
             echo "<p style='background-color:red; '>'".$_SESSION['error']='Error Al Cerrar La Base Datos Desconocida !!!! '."</p>";
             $_SESSION['error']='Error Al Cerrar La Base Datos Desconocida !!!! ';
             echo "<scrip>window.alert('Error Bd ');</script>".$e->getMessage();
             exit;
        }
        catch (PDOException $ex)
        {
            $error='Error Al Cerrar La Base Datos Desconocida !!!! ';
             echo "<p style='background-color:red; '>'".$_SESSION['error']='Error Al Cerrar La Base Datos Desconocida !!!! '."</p>";
             $_SESSION['error']='Error Al Cerrar La Base Datos Desconocida !!!! ';
             echo "<scrip>window.alert('Error Al Cerrar La Base Datos Desconocida !!!! ');</script>".$e->getMessage();

        }
        


    }






 }

?>