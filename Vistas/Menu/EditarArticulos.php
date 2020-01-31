<?php
require 'header.php';
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
          //require_once("../Conexion/conexion.php");
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
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    

                    
                    <!-- /.box-header -->
                    <!-- centro -->
<?php
/** 
$databaseHost = 'localhost';
$databaseName = 'farmacia';
$databaseUsername = 'root';
$databasePassword = '';
 
try {
    // http://php.net/manual/en/pdo.connections.php
    $success='Conexion Exitosa !!!! ';
    $Conn = new PDO("mysql:host={$databaseHost};dbname={$databaseName}", $databaseUsername, $databasePassword);
    
    $Conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Setting Error Mode as Exception
    // More on setAttribute: http://php.net/manual/en/pdo.setattribute.php
} catch(PDOException $e) {
    $error='Base Datos Desconocida !!!! ';
    $_SESSION['error']='Base Datos Desconocida !!!! ';
    echo "<script type='text/javascript'>window.location='404.php';</script>";
    echo '<p>Error al Conectar a la base de datos</p>';
    exit;
}
 **/
?>                  
                    <div class="panel-body table-responsive" id="listadoregistros">
             <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
          <thead>
                        <th>CODIGO</th>
                        <th>CODIGO CATEGORIA</th>
                        <th>CODIGO BARRA</th>
                        <th>NOMBRE</th>
                        <th>STOCK</th>
                        <th>DESCRIPCION</th>
                        <th>ESTADO</th>
                        <th></th>                       
                        <th>Editar</th>
                        <th>Eliminar</th>
                        <th>Ver</th>
                    </thead>
          <tbody>
         <?php
        
         $conn=null;
         $host='localhost';
         $user='root';
         $pwd='';
         $db='farmacia';
        //require_once("../Conexion/conexion.php");
        try
            {
                $success='Conexion Exitosa !!!! ';
                $conn=new PDO ('mysql:host='.$host.';dbname='.$db,$user,$pwd);
                $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);    
                  //fetching data in descending order (lastest entry first)
                $result = $conn->query("SELECT * FROM articulo");    
                while($row = $result->fetch(PDO::FETCH_ASSOC)) 
              {         
                      echo "<tr>";
                      echo "<td>".$row['idarticulo']."</td>";
                      echo "<td>".$row['idcategoria']."</td>";
                      echo "<td>".$row['codigo']."</td>";   
                      echo "<td>".$row['nombre']."</td>";

                      
                      if($row['stock']==0 )
                          {
                            echo "<td style='color:red;font-size: 19px;'>".$row['stock']."</td>";
                            echo "<script>window.alert('Stock Critico Verifique!!!!');</script>";
                            echo "<td>".$row['descripcion']."</td>";
                            if($row['condicion']==1)
                            {
                              echo "<style type='text/css'>";
                              echo ".Inicia
                              { 
                                  color:blue;
                                  font-size: 15px;
                              }";
                              echo "</style>";
                              echo "<td class='Inicia'>Activo</td>";
                            }
                            
                            else
                            {
                               echo "<style type='text/css'>";
                              echo ".Inac
                              { 
                                  color:red;
                                  font-size: 15px;
                              }";
                              echo "</style>";
                               echo "<td class='Inac'>Inactivo</td>";

                            }
                            
                            
                          }
                          
                          else //es cuando hay stock en el almacen
                          {
                            echo "<td style='color:blue; font-size: 19px;'>".$row['stock']."</td>";
                            echo "<td>".$row['descripcion']."</td>";
                            if($row['condicion']==1)
                            {
                              echo "<style type='text/css'>";
                              echo ".Inicia
                              { 
                                  color:blue;
                                  font-size: 15px;
                              }";
                              echo "</style>";
                               echo "<td class='Inicia'>Activo</td>";
                            }
                            else
                            {
                               echo "<style type='text/css'>";
                              echo ".Inac
                              { 
                                  color:red;
                                  font-size: 15px;
                              }";
                              echo "</style>";
                               echo "<td class='Inac'>Inactivo</td>";
                            }

                          }
                    
                           if($row['stock']==0)
                            {

                                if($row['stock']==1 && $row['stock']==0 || $row['sucursal']==1 && $row['sucursal']==0 )
                                {

                                  echo "<style type='text/css'>";
                                  echo ".noStock
                                  { 
                                      color:blue;
                                      font-size: 15px;
                                  }";
                                  echo "</style>";

                                  echo "<td class='noStock'>Disponible</td>";
                                }
                                else
                                {
                                   echo "<style type='text/css'>";
                                  echo ".foco
                                  { 
                                      color:red;
                                      font-size: 15px;
                                  }";
                                  echo "</style>";
                                   echo "<td class='foco'>No Hay Productos</td>";
                                }
                              
                            }//
                            else //cuando la condicion es falsa
                          {
                             
                                if($row['sucursal']==1)
                                {
                                  echo "<style type='text/css'>";
                                  echo ".noStock
                                  { 
                                      color:blue;
                                      font-size: 15px;
                                  }";
                                  echo "</style>";
                                  echo "<td class='noStock'>Disponible</td>";
                                }
                                else
                                {
                                   echo "<style type='text/css'>";
                                  echo ".foco
                                  { 
                                      color:red;
                                      font-size: 15px;
                                  }";
                                  echo "</style>";
                                   echo "<td class='foco'>No Hay Productos</td>";
                                }
                          }
                          
                          
                          
                                
echo "<td><a href='ModificarArticulos.php?id=".$row['idarticulo']." ' class='btn btn-success btn-sm' name='Modifica' data-toggle='modal'/><span class='glyphicon glyphicon-edit'/></span> Editar</a></td>";

echo "<td><a href='EliminarArticulos.php?id=".$row['idarticulo']." ' class='btn btn-danger btn-sm' data-toggle='modal'/><span class='glyphicon glyphicon-trash'/></span> Eliminar</a></td>";
 echo "<td><a href='VerArticulo.php?id=".$row['idarticulo']." ' class='btn btn-success btn-sm' style='color: white;' data-toggle='modal'/>
      <span class='glyphicon glyphicon-eye-open'/></span> VER</a></td>";
      /** 
      echo "<td><a href='ModificarArticulos.php?id=".$row['idarticulo']." ' class='btn btn-success btn-sm' name='Modifica' data-toggle='modal'/><span class='glyphicon glyphicon-edit'/></span> Editar</a></td>";
echo "<td><a href='EliminarArticulos.php?id=<?php echo ".$row['idarticulo']." ?>' class='btn btn-danger btn-sm' data-toggle='modal'/><span class='glyphicon glyphicon-trash'/></span>Editar</a></td>";
 echo "<td><a href='VerCategoria.php?id=<?php echo ".$row['idarticulo']." ?>' class='btn btn-success btn-sm' style='color: white;' data-toggle='modal'/>
      <span class='glyphicon glyphicon-eye-open'/></span> VER</a></td>";




      **/
              }
            } 
            catch (PDOException $e)
                {
                      $error='Base Datos Desconocida !!!! ';
                      $_SESSION['error']='Base Datos Desconocida !!!! ';
                      echo "<script type='text/javascript'>window.location='404.php';</script>";
                      echo '<p>Error al Conectar a la base de datos</p>';
                      exit;
                }
                   
        ?>
          </tbody>
          <thead>
                        <th>CODIGO</th>
                        <th>CODIGO CATEGORIA</th>
                        <th>CODIGO BARRA</th>
                        <th>NOMBRE</th>
                        <th>STOCK</th>
                        <th>DESCRIPCION</th>
                        <th>ESTADO</th>
                        <th></th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                        <th>Ver</th>
                    </thead>
        </table>

      </div>  
  
                    </div>
                    <!-- finn de la Tabla--->
                   







                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
  
<script type="text/javascript" src="../public/js/JsBarcode.all.min.js"></script>
<script type="text/javascript" src="../public/js/jquery.PrintArea.js"></script>
<script type="text/javascript" src="scripts/articulo.js"></script>



<script src="diseño/js/jquery.min.js"></script>
    <script language="javascript" src="https://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
    <script src="diseño/js/bootstrap.min.js"></script>
    <script src="diseño/js/jquery.dataTables.min.js"></script>
    <script src="diseño/js/dataTable.bootstrap.min.js"></script>
   
    <script language="javascript" src="public/datatables/buttons.colVis.min.js"></script>
    <script language="javascript" src="public/datatables/buttons.html5.min.js"></script>
    <script language="javascript" src="public/datatables/dataTables.buttons.min.js"></script>
    <script language="javascript" src="public/datatables/jszip.min.js"></script>
    <script language="javascript" src="public/datatables/pdfmake.min.js"></script>
    <script language="javascript" src="public/datatables/vfs_fonts.js"></script>
    <script language="javascript" src="public/js/app.js"></script>


    <script language="javascript" src="diseño/js/jquery.validate.js"></script>
    <script language="javascript" src="public/componentes/bootstrap/js/alert.js"></script>
    <script language="javascript" src="public/componentes/bootstrap/js/modal.js"></script>




  
    <script language="javascript">
       $(document).ready(function(){
    
    $('#tbllistado').DataTable({
            "lengthMenu": [ 5, 200, 1000, 10000, 1000000],//mostramos el menú de registros a revisar
            "aProcessing": true,//Activamos el procesamiento del datatables
            "aServerSide": true,//Paginación y filtrado realizados por el servidor
            dom: '<Bl<f>rtip>',//Definimos los elementos del control de tabla
            buttons: [                
                        
                    ],
                language: {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });



    //hide alert
    $(document).on('click', '.close', function(){
        $('.alert').hide();
    })
});


</script>