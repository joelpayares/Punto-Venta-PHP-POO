<?php

require_once("../../Clases/articulo.php");
require_once("../../Modelo/Conexion.php");

$resultados=null;
$Id_Categoria=null;

class Mostrar_Articulos_Controller 
{

	public function __construct() 
	{
        //$this->$Ejecuta->EjecutaEscalar();//abro la cadena de conexion
		
    }
    
    public function getList() 
	{
		try 
		  {
			   $data[]=array();//esta es mi data del array
			   $Ejecuta=new Conexion();
			   $Ejecuta_Conexion=$Ejecuta->EjecutaEscalar();
			   $page = (!empty($_REQUEST["page"])) ? $_REQUEST["page"] : 1;
			   $count = $Ejecuta_Conexion->prepare("SELECT COUNT(*) FROM producto")->execute();
			   $records_per_page = 650;
			   $offset = ($page-1) * $records_per_page;
			   $total_pages = ceil($count / $records_per_page);
				 $sql=$Ejecuta_Conexion->prepare(
				"
				SELECT
				p.id_producto,p.codigo,p.Nombre,p.Stock,p.PrecioVenta,c.Descripcion,p.Estado
				FROM producto as p 
				INNER JOIN categoria as c on p.Id_Categoria=c.Id_Categoria
				where p.Estado=1 LIMIT $offset, $records_per_page
				");

				$sql->execute();

				$data = [
					'data' => []
				];
				
				$i=1;
 				while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
					
					if(round($row['Stock'])==0 ) {
						if($row['Estado']==1 ) { 
							$status = "<label class='label label-success'>Activo</label>"; // Estado activo
						} else {
							$status = "<label class='label label-danger'>Inactivo</label>"; // Estado inactivo
						}
					} else {
						if($row['Estado']==1) {
							$status = "<label class='label label-success'>Activo</label>";
						} else {
							$status = "<label class='label label-danger'>Inactivo</label>";
						}
					}

					if(round($row['Stock'])==0) {
						if(round($row['Stock'])==1 && round($row['Stock'])==0 && $row['Descripcion'] && $row['Descripcion'] ) {
						 $message = "<label class='label label-info'>Disponible</label>";
						} else {
						 $message = "<label class='label label-warning'>No Hay Productos</label>";
						}
					} else {
						if($row['Descripcion']) {
							$message = "<label class='label label-info'>Disponible</label>";
						} else {
          					$message = "<label class='label label-warning'>No Hay Productos</label>";
        				}
					}
					
					
					$link_update = "<a href='../../Vistas/Articulos/Actualizar.php?id=".$row['id_producto']."->".$row['Nombre']."' class='btn btn-success btn-sm' name='Modifica' data-toggle='modal'/><span class='glyphicon glyphicon-edit'/></span> Editar</a>";
					$link_activate = "<a href='../../Controlador/Articulo/Activar_Articulos.php?id=".$row['id_producto']." ' class='btn btn-labeled btn-info' data-toggle='modal'/><span class='glyphicon glyphicon-refresh'/></span> Activar </a>";
					$link_delete = "<a href='../../Controlador/Articulo/EliminarArticulos_Controller.php?id=".$row['id_producto']." ' class='btn btn-danger btn-sm' data-toggle='modal'/><span class='glyphicon glyphicon-trash'/></span> Eliminar</a>";
					$link_view = "<a href='../../Controlador/Articulo/VerArticulo_Controller.php?id=".$row['id_producto']." ' class='btn btn-success btn-sm' style='color: white;' data-toggle='modal'/><span class='glyphicon glyphicon-eye-open'/></span> VER</a>";
					

					/**$data['data'][] = [
					 'id' => $i,
					 'codigo' => $row['codigo'],
					 'Nombre' => $row['Nombre'],
					 'Stock' => $row['Stock'],
					 'PrecioVenta' =>'$'.number_format($row['PrecioVenta']),
					 'Categoria' => $row['Descripcion'],
					 'Estado' => $status,
					 'Mensaje' => $message,
					 'Actualizar' => $link_update,
					 'Activar' => $link_activate,
					 'Eliminar' => $link_delete,
					 'Ver' => $link_view
					];
					$i++;**/
					$data['data'][]= [
					 'id' => $i,
					 'codigo' => $row['codigo'],
					 'Nombre' => $row['Nombre'],
					 'Stock' => round($row['Stock']),
					 'PrecioVenta' =>'$'.number_format($row['PrecioVenta']),
					 'Categoria' => $row['Descripcion'],
					 'Estado' => $status,
					 'Mensaje' => $message,
					 'Actualizar' => $link_update,
					 'Activar' => $link_activate,
					 'Eliminar' => $link_delete,
					 'Ver' => $link_view
					];
					$i++;
				
				}
			
				echo json_encode($data);
			
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
		
       	   

    }



    public function InsertarArticulos($codigo,$CodigoBarra,$Nombre,$Stock,$Descripcion,$StockMin,$PrecioCosto,$PrecioVenta,$Utilidad,$Estado,$Id_Categoria,$impuesto)
    {

        try 
        {
            //$respuesta=[];
            $Ejecuta=new Conexion();

            $Ejecuta_Conexion=$Ejecuta->EjecutaEscalar();

            $miproducto=new producto();

            
            /*--------------------------------------------------------------------------------------*/
            //$hora=$horaActual=date("Y-m-d H:i:s");


            $stmt=$Ejecuta_Conexion->prepare(" INSERT INTO producto(codigo,CodigoBarra,Nombre,Descripcion,Stock,StockMin,PrecioCosto,PrecioVenta,Utilidad,Estado,impuesto,Id_Categoria) 
            VALUES ('".$codigo."','".$CodigoBarra."','".$Nombre."','".$Descripcion."','".$Stock."','".$StockMin."','".$PrecioCosto."','".$PrecioVenta."','".$Utilidad."','".$Estado."','".$impuesto."','".$Id_Categoria."'  ) ");
            /*-------------------------------------------*/

            /** $id=$miproducto->GetId_producto();**/

            $codigo=$miproducto->GetCodigo();
            $CodigoBarra=$miproducto->GetCodigoBarra();
            $Nombre=$miproducto->GetNombre();
            $Stock=$miproducto->GetStock();
            $Descripcion=$miproducto->GetDescripcion();
            $StockMin=$miproducto->GetStockMin();
            $PrecioCosto=$miproducto->GetPrecioCosto();
            $PrecioVenta=$miproducto->GetPrecioVenta();
            $Utilidad=$miproducto->GetUtilidad();
            $Estado=$miproducto->GetEstado();
            $Id_Categoria=$miproducto->GetId_Categoria();
            $impuesto=$miproducto->GetImpuesto();
            /*-------------------------------------------*/
            $stmt->execute();
            /*-------------------------------------------*/
            $stmt->fetch(PDO::FETCH_ASSOC);
            $success='Productos Ingresado Exitosamente !!! ';
            $array = array( 1 => "$codigo",
                            2 =>"$CodigoBarra",
                            3 => "$Nombre",
                            4 =>"$Stock",
                            5 => "$Descripcion",
                            6 =>"$StockMin",
                            7 => "$PrecioCosto",
                            8 =>"$PrecioVenta",
                            9 => "$Utilidad",
                            10 =>"$Estado",
                            11 => "$Id_Categoria" 
                        );
            var_dump($array);
            echo "<p style='background-color:green; display:none '>'".$_SESSION['success']='Productos Ingresado Exitosamente !!!  '."</p>";
            echo "<script type='text/javascript'> alert('Productos Ingresado Exitosamente !!! ');
            window.location='../../Vistas/Articulos/articulo.php';</script>";
            

        } 
        catch (Exception $e) 
        {
            $error='Error Insertar articuloModel !!!! ';
            echo "Error Insertar articuloModel --->  "+$e->getMessage();
        echo "<p style='background-color:red; '>'".$_SESSION['error']='Error Insertar articuloModel !!!!  '."</p>";
            echo "<scrip>window.alert('Error Insertar articuloModel !!!! ');</script>".$e->getMessage();
        }
        catch (PDOException $ex)
        {
            $error='Error Al Cerrar La Base Datos Desconocida !!!! ';
             echo "<p style='background-color:red; '>'".$_SESSION['error']='Error Al Cerrar La Base Datos Desconocida !!!! '."</p>";
             $_SESSION['error']='Error Al Cerrar La Base Datos Desconocida !!!! ';
             echo "<scrip>window.alert('Error Al Cerrar La Base Datos Desconocida !!!! ');</script>".$ex->getMessage();

        }






    }

    /*--------------------------------------------------------------------------------------------------------------*/
    public function Actualizar_Articulos($id_producto,$codigo,$CodigoBarra,$Nombre,$Stock,$Descripcion,$StockMin,$PrecioCosto,$PrecioVenta,$Utilidad,$Estado,$Id_Categoria,$impuesto)
    {

        try 
        {
            $Ejecuta=new Conexion();
            $Ejecuta_Conexion=$Ejecuta->EjecutaEscalar();
            
            $sql=$Ejecuta_Conexion->prepare("

            UPDATE producto SET codigo='".$codigo."',CodigoBarra='".$CodigoBarra."',

            Nombre='".$Nombre."',Descripcion='".$Descripcion."',Stock='".$Stock."',

            StockMin='".$StockMin."', PrecioCosto='".$PrecioCosto."', PrecioVenta='".$PrecioVenta."',

            Utilidad='".$Utilidad."',Estado='".$Estado."',Id_Categoria='".$Id_Categoria."',

            impuesto='".$impuesto."' WHERE id_producto='".$id_producto."' AND Estado=1 or Estado=0 


            ");


            $codigo=$miproducto->GetCodigo();
            $CodigoBarra=$miproducto->GetCodigoBarra();
            $Nombre=$miproducto->GetNombre();
            $Stock=$miproducto->GetStock();
            $Descripcion=$miproducto->GetDescripcion();
            $StockMin=$miproducto->GetStockMin();
            $PrecioCosto=$miproducto->GetPrecioCosto();
            $PrecioVenta=$miproducto->GetPrecioVenta();
            $Utilidad=$miproducto->GetUtilidad();
            $Estado=$miproducto->GetEstado();
            $Id_Categoria=$miproducto->GetId_Categoria();
            $impuesto=$miproducto->GetImpuesto();
            /*-------------------------------------------*/
            $stmt->execute();
            /*-------------------------------------------*/
            $stmt->fetch(PDO::FETCH_ASSOC);
            $success='Productos Actualizados Exitosamente !!! ';
            $array = array( 1 => "$codigo",
                            2 =>"$CodigoBarra",
                            3 => "$Nombre",
                            4 =>"$Stock",
                            5 => "$Descripcion",
                            6 =>"$StockMin",
                            7 => "$PrecioCosto",
                            8 =>"$PrecioVenta",
                            9 => "$Utilidad",
                            10 =>"$Estado",
                            11 => "$Id_Categoria" 
                        );
            //var_dump($array);
            echo "<p style='background-color:green; display:none '>'".$_SESSION['success']='Productos Actualizados Exitosamente !!!  '."</p>";
            echo "<script type='text/javascript'> alert('Productos Actualizados Exitosamente !!! ');
            window.location='../../Vistas/Articulos/articulo.php';</script>";
            
                 
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










    }

    public function Eliminar_Articulos($id_producto)
    {

        try 
        {
            

            $Ejecuta=new Conexion();
            $Ejecuta_Conexion=$Ejecuta->EjecutaEscalar();
            
            $stmt=$Ejecuta_Conexion->prepare("

            UPDATE producto SET Estado=0 

            WHERE id_producto='".$id_producto."' AND Estado=1 OR Estado=0
            ");


            /*-------------------------------------------*/
            $stmt->execute();
            /*-------------------------------------------*/
            $stmt->fetch(PDO::FETCH_ASSOC);
            $success='Productos Eliminados Exitosamente !!! ';
            $array = array( 1 => "$id_producto" );
            var_dump($array);
            echo "<p style='background-color:green; display:none '>'".$_SESSION['success']='Productos Eliminados Exitosamente !!!  '."</p>";
            echo "<script type='text/javascript'> alert('Productos Eliminados Exitosamente !!! ');
            window.location='../../Vistas/Articulos/MostrarArticulos.php   ';</script>";


                 
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










    }
     public function Activar_Articulos($id_producto)
    {

        try 
        {
            

            $Ejecuta=new Conexion();
            $Ejecuta_Conexion=$Ejecuta->EjecutaEscalar();
            
            $stmt=$Ejecuta_Conexion->prepare("

            UPDATE producto SET Estado=1 

            WHERE id_producto='".$id_producto."'
            ");


            /*-------------------------------------------*/
            $stmt->execute();
            /*-------------------------------------------*/
            $stmt->fetch(PDO::FETCH_ASSOC);
            $success='Productos Activado Exitosamente !!! ';
            $array = array( 1 => "$id_producto" );
            var_dump($array);
            echo "<p style='background-color:green; display:none '>'".$_SESSION['success']='Productos Activado Exitosamente !!!  '."</p>";
            echo "<script type='text/javascript'> alert('Productos Activado Exitosamente !!! ');
            window.location='../../Vistas/Articulos/MostrarArticulos.php   ';</script>";


                 
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










    }






















































}

$cl = new Mostrar_Articulos_Controller();
echo $cl->getList();
?>