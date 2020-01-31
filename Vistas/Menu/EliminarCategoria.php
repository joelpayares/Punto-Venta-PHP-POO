<?php

 $conn=null;
                              $host='localhost';
                              $user='root';
                              $pwd='';
                              $db='farmacia';
                              $id=$_GET['id'];
                              require_once("../Conexion/conexion.php");
                              try
                              {
                                
                                  $success='Conexion Exitosa !!!! ';
                                  $conn=new PDO ('mysql:host='.$host.';dbname='.$db,$user,$pwd);
                                  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                                  //print_r($_POST);
                                  //var_dump($_POST);
                                  echo $sql="DELETE FROM categoria WHERE idcategoria='".$_GET['id']."'    ";
                                  $stmt=$conn->prepare($sql);
                                  $stmt->execute();
                                  $_SESSION['success']='Categoria Eliminada Exitosamente !!!! ';
        echo "<script type='text/javascript'> alert('Categoria Eliminada Exitosamente !!! ');window.location='EditarCategoria.php';</script>"; 


                              } catch (PDOException $e)
                              {
                                  $error='Base Datos Desconocida !!!! ';
                                  $_SESSION['error']='Base Datos Desconocida !!!! ';
                                  echo "<script type='text/javascript'>window.location='404.php';</script>";
                                  echo '<p>Error al Conectar a la base de datos</p>';
                                 exit;
                              }
                              return $conn;

?>

