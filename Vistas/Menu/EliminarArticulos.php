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
                                      $sql="SELECT * FROM articulo ";
                                      $stmt=$conn->prepare($sql);
                                      $stmt->execute();
                                      foreach($stmt as $rows)
                                      {

                                            /**
                                              echo " ".$rows[0]."<br>";
                                              echo " ".$rows[1]."<br>";
                                              echo " ".$rows[2]."<br>";
                                              echo " ".$rows[3]."<br>";
                                              echo " ".$rows[4]."<br>";
                                              echo " ".$rows[5]."<br>";
                                              echo " ".$rows[6]."<br>";
                                              echo " ".$rows[7]."<br>";**/
                                             
                                              
                                      }
                                      
                                      
                                  } catch (PDOException $e)
                                  {
                                      $error='Base Datos Desconocida !!!! ';
                                      $_SESSION['error']='Base Datos Desconocida !!!! ';
                                      echo "<script type='text/javascript'>window.location='404.php';</script>";
                                      echo '<p>Error al Conectar a la base de datos</p>';
                                      exit;
                                  }
                    ?>
<?php
              $conn=null;
              $host='localhost';
              $user='root';
              $pwd='';
              $db='farmacia';
              //$id=$_GET["id"];
              require_once("../Conexion/conexion.php");
              try
              {
                  
                  $success='Conexion Exitosa !!!! ';
                  $conn=new PDO ('mysql:host='.$host.';dbname='.$db,$user,$pwd);
                  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  echo $sql="DELETE FROM articulo  WHERE idarticulo='".$rows[0]."'    ";
                  $stmt=$conn->prepare($sql);
                  $stmt->execute();
                  $_SESSION['success']='Articulos Eliminado Exitosamente !!!! ';
                  echo "<script type='text/javascript'>window.location='EditarArticulos.php';</script>";
                  
                  
                  
              } catch (PDOException $e)
              {
                  $error='Base Datos Desconocida !!!! ';
                  $_SESSION['error']='Base Datos Desconocida !!!! ';
                  echo "<script type='text/javascript'>window.location='404.php';</script>";
                  echo '<p>Error al Conectar a la base de datos</p>';
                  exit;
              }

?>      
            