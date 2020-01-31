<?php
require 'header.php';
$idpersona="";
$tipo_persona="";
$nombre="";
$tipo_documento="";
$num_documento="";
$direccion="";
$telefono="";
$email="";
$conn=null;
$host='localhost';
$user='root';
$pwd='';
$db='farmacia';
require_once("../Conexion/conexion.php");
try
{
            
      $success='Conexion Exitosa !!!! ';
      $conn=new PDO ('mysql:host='.$host.';dbname='.$db,$user,$pwd);
      $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      

} catch (PDOException $e)
  {
      $error='Base Datos Desconocida !!!! ';
      $_SESSION['error']='Base Datos Desconocida !!!! ';
      echo "<script type='text/javascript'>window.location='404.php';</script>";
      echo '<p>Error al Conectar a la base de datos</p>';
      exit;
  }

?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="row">
                                <?php
                                    if(isset($_SESSION['error'])){
                                        echo
                                        "
                                        <div class='alert alert-default text-center'>
                                            ".$_SESSION['error']."
                                        </div>
                                        ";
                                        unset($_SESSION['error']);
                                    }
                                    if(isset($_SESSION['success'])){
                                        $_SESSION['success'];
                                        unset($_SESSION['success']);
                                    }
                                ?>
            </div>
        </div>
    </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>Ventas</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Escala Ventas</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php  
          $conn=null;
          $host='localhost';
          $user='root';
          $pwd='';
          $db='farmacia';
          require_once("../Conexion/conexion.php");
          try
          {
            
              $success='Conexion Exitosa !!!! ';
              $conn=new PDO ('mysql:host='.$host.';dbname='.$db,$user,$pwd);
              $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
              $sql="SELECT COUNT(*) FROM login";
              $stmt=$conn->prepare($sql);
              $stmt->execute(array('id usuario'=>"idusuario"));
              $resultados=$stmt->fetchColumn();

          } catch (PDOException $e)
          {
              $error='Base Datos Desconocida !!!! ';
              $_SESSION['error']='Base Datos Desconocida !!!! ';
              echo "<script type='text/javascript'>window.location='404.php';</script>";
              echo '<p>Error al Conectar a la base de datos</p>';
              exit;
          }

            ?>
        <h3><?php echo $resultados; ?>  </h3>
              <p>Usuarios Registrados</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>Ordenes Compras</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="#" class="small-box-footer">
              Ver <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- Main content -->
		<?php

                   if (isset($_GET['id'])) 
                  {
                            $idpersona=$_GET['id'];
                            $consulta=$conn->prepare("SELECT * FROM persona WHERE idpersona='".$_GET['id']."' ");

                            $consulta->bindParam(':id',$idpersona);
                            $consulta->execute();
                            if($consulta->rowCount()>=1)
                            {
                                $resultados=$consulta->fetch();//declaramos la variale resultados donde tendra
                                // la fila traidA DE LA BASE DE DATOS
                                
                            }
                            else
                            {
                              echo "Ocurrio Un Error";
                            }
                            //var_dump($consulta);

                    

                  }
                    else
                    {
                      echo "No Hay ID Articulo Modificar";
                    }

                   ?>
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST" action="">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre:</label>
                            <input type="hidden" name="idpersona" id="idpersona" value="<?php echo $resultados[0]; ?> " >
                            <input type="hidden" name="tipo_persona" id="tipo_persona" value="<?php echo $resultados[1]; ?> ">
                            <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $resultados[2]; ?> " maxlength="100" placeholder="Nombre del proveedor" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Tipo Documento:</label>
                            <select class="form-control select-picker" name="tipo_documento" id="tipo_documento" required>
                              <option><?php echo $resultados[3]; ?></option>
                            </select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Número Documento:</label>
                            <input type="text" class="form-control" name="num_documento" value="<?php echo $resultados[4]; ?> " id="num_documento" maxlength="20" placeholder="Documento">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Dirección:</label>
                            <input type="text" class="form-control" name="direccion" value="<?php echo $resultados[5]; ?> " id="direccion" maxlength="70" placeholder="Dirección">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Teléfono:</label>
                            <input type="text" class="form-control" name="telefono" value="<?php echo $resultados[6]; ?> " id="telefono" maxlength="20" placeholder="Teléfono">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $resultados[7]; ?> " id="email" maxlength="50" placeholder="Email">
                          </div>

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" name="Ejecuta" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-edit" type="button"><a href="cliente.php" class="fa fa-arrow-circle-left">Atras</button></a>
                          </div>
                        </form>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->


<!-- este FORM LE PERTENECE AL INGRESAR Cliente------------------------------------------------>
 <?php
    if(isset($_POST["Ejecuta"]))
        {

              $conn=null;
              $host='localhost';
              $user='root';
              $pwd='';
              $db='farmacia';
              require_once("../Conexion/conexion.php");
              $id=0;
              try
              {
                
                  $success='Conexion Exitosa !!!! ';
                  $conn=new PDO ('mysql:host='.$host.';dbname='.$db,$user,$pwd);
                  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                echo $sql="UPDATE persona SET nombre='".$_POST["nombre"]."',

                      tipo_documento='".$_POST["tipo_documento"]."',num_documento='".$_POST["num_documento"]."',

                      direccion='".$_POST["direccion"]."',telefono='".$_POST["telefono"]."',email='".$_POST["email"]."'
                      
                 WHERE idpersona='".$_GET['id']."'  ";
                  $stmt=$conn->prepare($sql);
                  $stmt->execute();
                  $_SESSION['success']='Persona Modificado Exitosamente !!!! ';
                  echo "<script type='text/javascript'>window.location='EditarPersona.php';</script>";
                  
              } catch (PDOException $e)
              {
                  $error='Base Datos Desconocida !!!! ';
                  $_SESSION['error']='Base Datos Desconocida !!!! ';
                  echo "<script type='text/javascript'>window.location='404.php';</script>";
                  echo '<p>Error al Conectar a la base de datos</p>';
                  exit;
              }







        }

?>
<?php

require 'footer.php';
?>
