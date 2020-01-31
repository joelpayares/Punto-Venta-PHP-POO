<?php


session_start();
if(isset($_SESSION['usuario']) && isset($_SESSION['nombre']))
{

  if($_SESSION['usuario']=="Administrador" && $_SESSION['nombre']="")
  {
    header('Location:  ../../Vistas/Menu/header.php');
  }
  else
  {
    header('Location: ../../index.php');

  }
  


}

?>

<!DOCTYPE html>
<html lang="es" id="FarmaciaSanaSana" class="no_js" >
 <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Farmacia_Sana_Sana " />
        <meta name="author" content=" FarmaciaSanaSana">
        <meta name="keywords" content="BibliotecaVirtual" />
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
        
        <title>Farmacia Sana Sana </title>

      <link rel="stylesheet" href="../public/bower_components/bootstrap/dist/css/bootstrap.min.css">

      <!--<link rel="stylesheet" href="../public/bower_components/font-awesome/css/font-awesome.min.css">-->

      <link rel="stylesheet" href="../public/bower_components/Ionicons/css/ionicons.min.css">

      <link rel="stylesheet" href="../public/dist/css/skins/_all-skins.min.css">

        <link rel="stylesheet" href="../public/css/font-awesome.css">

        <link rel="stylesheet" href="../public/css/AdminLTE.min.css">    
        <link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
        <link rel="shortcut icon" href="../public/img/favicon.ico">
  </head>
  <body class="hold-transition skin-blue-light sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>F</b>SS</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Farmacia Sana Sana</b></span>
        </a>
        
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
         
          
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li><a><i class="icon-calendar icon-large"></i>
                <?php
                //$Today = date('y:m:d',time());
                //$new=date('l, F d, Y', strtotime($Today));
                //echo $new;
                $miFecha= gmmktime(12,0,0,1,15,2089);
                setlocale(LC_TIME, 'es_ES.UTF-8'); //cAMBIAR LA FECHA A ESPAÑOL 
                echo strftime("%A, %d de %B del %Y  ");
                ?>
              </a></li><!--Fin del termino mostrar la fecha actual del Equipo-->            


              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Tienes 10 Notificaciones</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
 
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../public/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <?php

                  $conn=null;
                  $host='localhost';
                  $user='root';
                  $pwd='';
                  $db='farmaciaversionoriginal';
                  try
                  {

                    $success='Conexion Exitosa !!!! ';
                    $conn=new PDO ('mysql:host='.$host.';dbname='.$db,$user,$pwd);
                    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    $sql="SELECT
                    l.usuario,r.Descripcion,l.Estado
                    FROM login as l
                    INNER JOIN rol as r ON r.id_rol=l.id_rol

                    WHERE l.Estado=1 OR l.Estado=0 LIMIT 1 ";
                    //$sql="SELECT r.Descripcion FROM rol as r LIMIT 1";
                    $stmt=$conn->prepare($sql);
                    $stmt->execute();
                    foreach($stmt as $fila)
                    {
                     
                    }

                  } catch (PDOException $e)
                  {
                      $error='Base Datos Desconocida !!!! ';
                      $_SESSION['error']='Base Datos Desconocida !!!! ';
                      echo "<script type='text/javascript'>window.location='404.php';</script>";
                      //echo '<p>Error al Conectar a la base de datos</p>';
                      
                  }
                  ?>
                  <span class="hidden-xs" style="font-size:20px;">Bienvenido : <?php echo $fila["usuario"]=$_SESSION['usuario']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../public/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      www.FarmaciasSanaSana.com
                      <small style="font-size:20px; ">Nombre: <?php echo $_SESSION["Descripcion"]   ?></small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="../Menu/Cerrar.php" class="btn btn-default btn-flat" style="font-size:24px; border-radius: 10px;  ">Cerrar</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
<!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">       
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            <li>
              <a href="header.php">
                <i class="fa fa-tasks"></i> <span>Menu</span>
              </a>
            </li>            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Almacén</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../Articulos/articulo.php"><i class="fa fa-circle-o"></i>Añadir Artículos</a></li>
                <li><a href="../Categoria/categoria.php"><i class="fa fa-circle-o"></i>Añadir Categorías</a></li>
                <li><a href="../Cliente/cliente.php"><i class="fa fa-circle-o"></i>Añadir Cliente</a></li>
                <li><a href="categoria.php"><i class="fa fa-circle-o"></i>Añadir Usuarios</a></li>
                <li><a href="../Articulos/MostrarArticulos.php"><i class="fa fa-circle-o"></i>Editar Artículos</a></li>
                <li><a href="EditarCategoria.php"><i class="fa fa-circle-o"></i>Editar Categoria</a></li>
                <li><a href="../Categoria/BuscarCategoria.php"><i class="fa fa-circle-o"></i>Buscar Categorías</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Compras</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="ingreso.php"><i class="fa fa-circle-o"></i> Ingresos</a></li>
                <li><a href="proveedor.php"><i class="fa fa-circle-o"></i> Proveedores</a></li>
                <li><a href="ingreso.php"><i class="fa fa-circle-o"></i> Ingresos</a></li>
                <li><a href="proveedor.php"><i class="fa fa-circle-o"></i> Proveedores</a></li>
                <li><a href="ingreso.php"><i class="fa fa-circle-o"></i> Ingresos</a></li>
                <li><a href="proveedor.php"><i class="fa fa-circle-o"></i> Proveedores</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Ventas</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="cliente.php"><i class="fa fa-circle-o"></i>Añadir Clientes</a></li>
                <li><a href="venta.php"><i class="fa fa-circle-o"></i> Añadir Ventas</a></li>
                <li><a href="EditarPersona.php"><i class="fa fa-circle-o"></i>Editar Clientes</a></li>
                <li><a href="cliente.php"><i class="fa fa-circle-o"></i>Editar Ventas </a></li>
              </ul>
            </li>                       
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="usuario.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                <li><a href="permiso.php"><i class="fa fa-circle-o"></i> Permisos</a></li>
                
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-bar-chart"></i> <span>Consulta Compras</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="consultacompras.php"><i class="fa fa-circle-o"></i> Consulta Compras</a></li>                
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-bar-chart"></i> <span>Consulta Ventas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="consultaventas.php"><i class="fa fa-circle-o"></i> Consulta Ventas</a></li>                
              </ul>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>


                        
          </ul>
          <br>
          <form name="clock">
            <font color="black">Hora : <br></font>&nbsp;<input style="width: 150px;" type="submit" class="trans" name="face" value="">
          </form>
          <br>
        </section>
        <!-- /.sidebar -->
      </aside>
      <script type="text/javascript">
        /*se realizara la hora actual del equipo*/
        var timerID=null;
        var timerRunning=false;
        function stopclock()
        {
          if(timerRunning)
          {
            clearTimeout(timerID);
            timerRunning=false;
          }
        }
        function showtime()
        {
          var now=new Date();
          var hours= now.getHours();
          var minutes=now.getMinutes();
          var seconds=now.getSeconds()
          var timeValue=""+((hours>12)? hours -12 :hours)
          if(timeValue=="0")timeValue=12;
          timeValue+=((minutes<10)?   ":0" : ":")+minutes
          timeValue+=((seconds < 10)? ":0" : ":" )+seconds
          timeValue+=(hours>=12)? " P.M" : " A.M"
          document.clock.face.value=timeValue;
          timerID=setTimeout("showtime()",1000);
          timerRunning=true;
        }
        function startclock()
        {
          stopclock();
          showtime();
        }
        window.onload=startclock;
      </script>
<br>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../../header.php"><i class="fa fa-dashboard"></i> Menu</a></li>
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
        


<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner" style="font-size: 27px; ">
            <?php
            require_once("../../Modelo/MostrarCabezeras/MostrarCabezeras.php");//traigo la clase MostrarCabezeras.php
            $Ordenes_Compras=new MostrarCabezeras_Model();
            ?>
            <h3><?php $Ordenes_Compras->OrdenesCompras(); ?><sup style="font-size: 20px"></sup></h3>
             <p style="font-size: 25px; ">Ordenes Compras</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#Orden_Compras_Proveedores.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-ligthgray">
            <div class="inner" style="font-size: 27px; ">
            <?php
            require_once("../../Modelo/MostrarCabezeras/MostrarCabezeras.php");//traigo la clase MostrarCabezeras.php
            $Numero_Ventas=new MostrarCabezeras_Model();
            ?>
              <h3><?php $Numero_Ventas->Numero_Ventas(); ?><sup style="font-size: 20px"></sup></h3>

              <p style="font-size: 25px; ">Tickets Emitidos</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#Tickets.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
                $db='farmaciaversionoriginal';
                //require_once("../Conexion/conexion.php");
                try
                {
                  
                    $success='Conexion Exitosa !!!! ';
                    $conn=new PDO ('mysql:host='.$host.';dbname='.$db,$user,$pwd);
                    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    $sql="SELECT COUNT(l.id_usuario) FROM login as l";
                    $stmt=$conn->prepare($sql);
                    $stmt->execute(array('id_usuario'=>"id_usuario"));
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


              </h3>
              <p><h3><?php echo $resultados; ?></h3></p>
              <p>Usuarios Registrados</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
</section>
<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-card"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>$1.890.000  <sup style="font-size: 20px"> % </sup></h3>

              <p>Dinero Efectivo</p>
            </div>
            <div class="icon">
              <i class="ion ion-cash"></i>
            </div>
            <a href="#" class="small-box-footer">Ir <i class="fa fa-arrow-circle-right"></i></a>
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
                $db='farmaciaversionoriginal';
                //require_once("../Conexion/conexion.php");
                try
                {
                  
                    $success='Conexion Exitosa !!!! ';
                    $conn=new PDO ('mysql:host='.$host.';dbname='.$db,$user,$pwd);
                    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    $sql="SELECT COUNT(l.id_usuario) FROM login as l";
                    $stmt=$conn->prepare($sql);
                    $stmt->execute(array('id_usuario'=>"id_usuario"));
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


              </h3>
              <p><h3><?php echo $resultados; ?></h3></p>
              <p>Usuarios Registrados</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
</section>




<!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h2 class="box-title">BUSCAR CATEGORIA</h2>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                      <div class="row">
				                <?php
                        //require_once("../../Modelo/Categoria/Buscar_Categoria_Model.php");//traigo la clase usuario_Create_Model.php
                        require_once("../../Modelo/Conexion.php");//traigo la conexion

                        $mostrar_Resultados=null;

                        if(isset($_GET['nombre']))
                        {

                          //$valor=$_GET['nombre'];
                          $Ejecuta_Conexion=$Ejecuta->EjecutaEscalar();
                          $stmt=$Ejecuta_Conexion->prepare(" 
                          SELECT * FROM categoria WHERE Id_Categoria LIKE  '%".$valor."%' OR Descripcion LIKE '%".$valor."%' ORDER By descripcion LIMIT 5   ");

                          //SELECT * FROM categoria WHERE Id_Categoria LIKE '%$nombre%' OR Descripcion LIKE '%$nombre%' ORDER By descripcion LIMIT 5   ");             
                          $stmt->execute();
                          while($mostrar_Resultados=$stmt->fetch(PDO::FETCH_ASSOC))
                          {
                              
                          }
                          
                        }
                        echo $mostrar_Resultados['Descripcion'];

                        ?>
					             </div>
                    </div>

                    <div class="panel-body" style="height: 400px;" id="formularioregistros">

                     <form name="formulario" action="BuscarCategoria.php" id="formulario"  method="POST">

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label style="font-size:19px;">Nombre Categoria:</label>
                            <!--<input type="hidden" name="idcategoria" id="idcategoria">-->
                            <input type="text" class="form-control" name="nombre"  
                            placeholder="Ingrese Nombre Categoria"  onkeyup="Buscar();">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label style="font-size:19px;">Laboratorio:</label>
                            <input type="text" class="form-control" name="descripcion" value="<?php  ?> "
                             onkeypress="return permite(event, 'car') " placeholder="Descripción">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Estado(*):</label>
                            <select id="Estado" name="Estado" class="form-control selectpicker" readonly="readonly" data-live-search="true" required>
                              <!--<option>Seleccione</option>-->
                              <option  value="1" readonly="readonly">Activo</option>
                              <option value="0"  readonly="readonly">Inactivo</option>
                            </select>
                          </div>
                          <br>
                          <br>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <button class="btn btn-primary" type="submit"  ><i class="fa fa-search" ></i> Buscar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>

                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->
	 
    </div><!-- /.content-wrapper -->





<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.0.1
    </div>
    <strong>Desarrollado Farmacia Sana Sana &copy; 2019-2021 <a href="https://adminlte.io">Desarrollado por Sistemas-Ecu_Red-Solutions</a>.</strong> Todos Los Derechos Reservados.
  </footer>


    <script src="../public/js/Validadores_Cajas_Texto.js"></script>
    <script src="../diseño/js/jquery.min.js"></script>
    <script language="javascript" src="https://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
    <script src="../diseño/js/bootstrap.min.js"></script>
    <script language="javascript" src="../public/js/app.js"></script>
    <!--<script language="javascript" src="../public/js/jquery.PrintArea.js"></script>-->
    <script src="../public/js/jquery.nanoscroller.min.js"></script>
    <script src="../public/js/demo.js"></script> 
    <script src="../public/js/moment.min.js"></script>
  

  </body>
  
</html>