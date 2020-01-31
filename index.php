<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>

<?php 

$conn=null;
$host='localhost';
$user='root';
$pwd='';
$db='farmaciaversionoriginal';
try
{

	$conn=new PDO ('mysql:host='.$host.';dbname='.$db,$user,$pwd);
	if($conn==true)
	{
		$success='Conexion Exitosa !!!! ';
		$_SESSION['success']='Base Datos Exitosa !!!! ';
        echo "<script type='text/javascript'>window.location='./Vistas/Usuarios/Login.php';</script>";
	}
	else
	{
		$error='Base Datos Desconocida !!!! ';
		$_SESSION['error']='Base Datos Desconocida !!!! ';
		echo "<script type='text/javascript'>window.location='404.php';</script>";
		//echo '<p>Error al Conectar a la base de datos</p>';
		exit;
	}
	

} catch (PDOException $e)
{
		$error='Base Datos Desconocida !!!! ';
		$_SESSION['error']='Base Datos Desconocida !!!! ';
		echo "<script type='text/javascript'>window.location='404.php';</script>";
		//echo '<p>Error al Conectar a la base de datos</p>';
		exit;
}
return $conn;

?>
</body>
</html>
