
<?php
ob_start();
//session_start();
require_once("../../Modelo/Usuarios/Usuario_Create_Model.php");//traigo la clase usuario_Create_Model.php
$ingresa=new funciones();

if(isset($_SESSION['usuario']))
{
  //echo "hay session";
  $ingresa->setUsuario($ingresa->GetUsuario());
  include_once('../../Vistas/Menu/header.php');//reedirecciona al menu principal
}
elseif (isset($_POST['usuario']) && isset($_POST['password'])  ) 
{
  $user=$_POST['usuario'];
  $clave=$_POST['password'];

  if($ingresa->Usuario_Existe($user , $clave))
  {
      //echo"Existe Usuario";
      $ingresa->setCurrentUsuario($user);
      $ingresa->setUsuario($clave);
      include_once('../../Vistas/Menu/header.php');//reedirecciona al menu principal
  }
  else
  {
       //echo"NO EXISTE USUARIO";
       echo "<p style='background-color:red; '>'".$_SESSION['error']='Error Usuarios No Logeado !!!!  '."</p>";
       echo "<script type='text/javascript'> alert('Error Usuarios No Logeado !!!!   ');window.location='../../index.php';</script>";
  }

}
else
{
	echo "<p style='background-color:green; display:none; font-size:19px;  '>'".$_SESSION['success']='Ingrese Credenciales de Acceso  !!!  '."</p>";
  	$success='Ingrese Credenciales de Acceso ';
  	echo "<script type='text/javascript'> alert('Ingrese Credenciales de Acceso Al Sistema');
  	</script>";
}
?>

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
	
	
  <link rel="stylesheet" href="../../diseño/css/Estilos_Login.css">
  <link rel="stylesheet" href="../../diseño/css/bootstrap.css">

</head>
<body class="hold-transition">
				<div class="col-sm-8 col-sm-offset-2">
			            <div class="row" style="text-align:center">
			                                <?php
												
			                                    if(isset($_SESSION['error']))
												{
			                                        echo
			                                        "
			                                        <div class='alert alert-danger text-center' style='display:none;   '  >
			                                            ".$_SESSION['error']."
			                                        </div>
			                                        ";
			                                        unset($_SESSION['error']);
			                                    }
			                                    if(isset($_SESSION['success'])){
			                                        $_SESSION['success'];
			                                        echo
			                                        "
			                                        <div class='alert alert-success text-center' style=' display:none; '>
			                                            ".$_SESSION['success']."
			                                        </div>
			                                        ";
			                                        unset($_SESSION['success']);
			                                    }
			                                ?>
			            </div>
			    </div>



<div class="row">
	<h3>Panel Administracion</h3>
	<br>
	<div class="success" id="success">
		<?php 
		if(isset($_SESSION['success']))
			{
				"
			          <div class='alert alert-success text-center' style=' display:none; '>
			                  ".$_SESSION['success']."
			          </div>
			    ";
			       
			    unset($_SESSION['success']);
			}

		?>
	</div>
	<div class="col-sm-8 col-sm-offset-2">
	    <form class="form-horizontal" action="../../Controlador/Usuarios/ingresoUsuario.php" method="post">
	    <br>
	   <div class="form-group">
		  
			<label class="col-sm-2 control-label" style="font-size:30px;">Usuario</label>
			<div class="col-sm-12">
					<input type="text" class="form-control" name="usuario" placeholder="Ingrese Usuario " >
			</div>
	   </div>
		<br>
      <div class="form-group">
			<label  class="col-sm-2 control-label" style="font-size:30px;">Password</label>
			<div class="col-sm-12">
				<input type="password" class="form-control" name="password" placeholder="Ingrese Password ">
			</div>
	   </div>
		
		<br>
			
		<input type="submit" id="btnlogin" class="btn btn-default"  value="Ingresar"/>

      </form>	
	</div><!--   -->
</div><!--Cierre de row-->
<div class="error">
	<?php 
		if(isset($_SESSION['error']))
			{
				"
			          <div class='alert alert-danger text-center'>
			                  ".$_SESSION['error']."
			          </div>
			    ";
			       
			    unset($_SESSION['error']);
			}
	?>
	</div>
<div class="footer">
				|Se reserva derechos de autor  © 2020|
	</div>


  </body>
        
</html>
<?php
if(isset($Ejecuta))
{
	if(isset($_SESSION['success']))
	{
		"
			          <div class='alert alert-success text-center' id='exito'>
			                  ".$_SESSION['success']."
			          </div>
        ";
			       
		unset($_SESSION['success']);

	}
	$success='Conexion Exitosa !!!!';
	echo "<br>";
	echo "<div class='alert alert-success text-center' style='font-size:10 px; width:100%; background-color:blue; display:none; ' >
			                  ".$_SESSION['success']='Conexion Exitosa !!!! '."
			          </div>";
    //echo "<p style='background-color:red; font-size:29px; width:100%; '>'".$_SESSION['error']='Error Base Datos Desconocida '."</p>";
    //echo"<script>window.alert('Conexion Finalizada !!!!');</script>";
    //echo "<script type='text/javascript'>  window.location='../../404.php.php';     </script>";//llamo al index en caso de error
	$success='Conexion Exitosa !!!! ';
    echo "<p style='background-color:blue; font-size:10px; display:none;  '>'".$_SESSION['success']='Base Datos Exitosa xxx '."</p>";
    //echo"<script>window.alert('Conexion Exitosa');</script>";
}


require_once("../../Modelo/Conexion.php");
$Ejecuta=new Conexion();
$Ejecuta->EjecutaEscalar();

?>