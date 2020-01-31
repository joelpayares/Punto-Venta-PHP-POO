<?php
require_once("../../Clases/categoria.php");
require_once("../../Modelo/Conexion.php");
$Ejecuta=new Conexion();


class funciones_Buscar_Categoria
{	
	
	public function __construct() 
	{
        
    }

     

     public function BuscarCategoria($nombre)
    {
        try 
        {
            //$respuesta=[];
            $Ejecuta=new Conexion();

            $Ejecuta_Conexion=$Ejecuta->EjecutaEscalar();

            $micategoria=new categoria();
            sleep(4);
            $salida = "";//mostrar los datos de la consulta
            /*--------------------------------------------------------------------------------------*/
            //$hora=$horaActual=date("Y-m-d H:i:s");'%$nombre%'
            $stmt=$Ejecuta_Conexion->prepare(" 
            SELECT * FROM categoria WHERE Id_Categoria LIKE  '%".$nombre."%' OR Descripcion LIKE '%".$nombre."%' ORDER By descripcion LIMIT 5   ");

            //SELECT * FROM categoria WHERE Id_Categoria LIKE '%$nombre%' OR Descripcion LIKE '%$nombre%' ORDER By descripcion LIMIT 5   ");
         
            $stmt->execute();

            echo "<p style='background-color:green; display:none '>'".$_SESSION['success']='Categoria Buscado Exitosamente !!!  '."</p>";
            echo "<script type='text/javascript'> alert('Categoria Buscado Exitosamente  !!! ');
            window.location='../../Vistas/Categoria/BuscarCategoria.php';</script>";
    


            //$stmt->fetch(PDO::FETCH_ASSOC);
            /*

            $stmt->fetch(PDO::FETCH_ASSOC);
            $success='Categoria Buscada Exitosamente !!! ';
            $array = array(1 => "$nombre"  );
            var_dump($array);
            echo "<p style='background-color:green; display:none '>'".$_SESSION['success']='Categoria Buscado Exitosamente !!!  '."</p>";




            */
            /**
                $salida.="<table border=1 class='tabla_datos'>
                        <thead>
                            <tr id='titulo'>

                                <td>ID CATEGORIA</td>
                                <td>DESCRIPCION</td>
                                <td>Laboratorio</td>
                            </tr>

                        </thead>
                        

                <tbody>";

                $miarray=array();
               while($fila = $stmt->fetch(PDO::FETCH_ASSOC))
                {

                         echo $salida="<tr>";
                                 $miarray[]=$fila['Descripcion'];


                                 var_dump($miarray);
                                 
                        echo "</tr>";

                    $salida.="</tbody></table>";


                }

            
            echo $salida;

            $success='Categoria Buscada Exitosamente !!! ';
            
            echo "<p style='background-color:green; display:none '>'".$_SESSION['success']='Categoria Buscado Exitosamente !!!  '."</p>";

            **/



























            


        } 
        catch (Exception $e) 
        {
            $error='Error Insertar Categoria_Create_Model !!!! ';
            echo "Error Insertar Categoria_Create_Model --->  "+$e->getMessage();
        echo "<p style='background-color:red; '>'".$_SESSION['error']='Error Insertar Categoria_Create_Model !!!!  '."</p>";
            echo "<scrip>window.alert('Error Insertar Categoria_Create_Model !!!! ');</script>".$e->getMessage();
            exit;
        }
        catch (PDOException $ex)
        {
            $error='Error Al Cerrar La Base Datos Desconocida !!!! ';
             echo "<p style='background-color:red; '>'".$_SESSION['error']='Error Al Cerrar La Base Datos Desconocida !!!! '."</p>";
             $_SESSION['error']='Error Al Cerrar La Base Datos Desconocida !!!! ';
             echo "<scrip>window.alert('Error Al Cerrar La Base Datos Desconocida !!!! ');</script>".$ex->getMessage();
             exit;

        }

    } 




































}
?>