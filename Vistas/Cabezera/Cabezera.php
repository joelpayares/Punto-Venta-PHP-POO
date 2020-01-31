
      <!DOCTYPE html>
      <html lang="es" id="FarmaciaSanaSana" class="no_js">
      <head>
        
         <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="description" content="Farmacia_Sana_Sana " />
        <meta name="author" content=" FarmaciaSanaSana">
        <meta name="keywords" content="BibliotecaVirtual" />
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
        <title>Farmacia Sana Sana</title> 
		
        <link rel="stylesheet" href="../../diseño/public/bower_components/bootstrap/dist/css/bootstrap.min.css">
  		<link rel="stylesheet" href="../../diseño/public/bower_components/Ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="../../diseño/public/dist/css/skins/_all-skins.min.css">
    	<link rel="stylesheet" href="../../diseño/public/css/font-awesome.css">
    	<link rel="stylesheet" href="../../diseño/public/css/AdminLTE.min.css">
		<link rel="apple-touch-icon" href="../../diseño/public/img/apple-touch-icon.png">
    	<link rel="shortcut icon" href="../../diseño/public/img/favicon.ico">		
        </head>
		  
        <body class="hold-transition skin-blue-light sidebar-mini">
          <div class="wrapper">

            <header class="main-header">

              <!-- Logo -->
              <a href="#index2.html" class="logo">
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
                        <img src="../../diseño/img/muser2-160x160.jpg" class="user-image" alt="User Image">  
                        <span class="hidden-xs" style="font-size:20px;">Bienvenido : <?php //echo $ingresa->GetUsuario();  ?></span>
                      </a>
                      <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                          <img src="../../diseño/img/muser2-160x160.jpg" class="img-circle" alt="User Image">
                          <p>
                            www.FarmaciasSanaSana.com
                            <small style="font-size:20px; ">Perfil: <?php  //echo $ingresa->GetUsuario();  ?></small>
                            <!--<small style="font-size:20px;"><?php //echo $_SESSION['usuario']=$fila["Descripcion"]; ?></small>-->
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
                      <li><a href="../Usuarios/usuario.php"><i class="fa fa-circle-o"></i>Añadir Usuarios</a></li>
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
                      <li><a href="../Venta/venta.php"><i class="fa fa-circle-o"></i> Añadir Ventas</a></li>
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
              </section>
              <!-- /.sidebar -->
            </aside>
            <!-- AQUI VA LA HORA ACTUAL DEL EQUIPO -->
      <br>
      <!--Contenido-->
            <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
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

          
                  <section class="content-header">
                            <h1>
                              Dashboard
                              <small>Control panel</small>
                            </h1>
                            <ol class="breadcrumb">
                              <li><a href="../Menu/header.php"><i class="fa fa-dashboard"></i> Home</a></li>
                              <li class="active">Dashboard</li>
                            </ol>
                  </section>




<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
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
            require_once("../../Modelo/MostrarCabezeras/MostrarCabezeras.php");//traigo la clase MostrarCabezeras.php
            $ContarUsuarios=new MostrarCabezeras_Model();
              ?>
              <h3><?php $Numero_Ventas->ContarUsuarios(); ?><sup style="font-size: 20px"></sup></h3>
              <p style="font-size: 25px; " >Usuarios Registrados</p>
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




     