<?php

require_once("../../Clases/Login.php");
require_once("../../Modelo/Conexion.php");
$Ejecuta=new Conexion();

$respuesta=null;//captura el mensaje tanto EXITO / ERROR
$persona=new login();

class funciones 
{	
	
	private $usuario;
	private $password;
	private $Descripcion;

	public function __construct() 
	{
        //$this->$Ejecuta->EjecutaEscalar();//abro la cadena de conexion
        //session_start();
        //$a=$persona->setUsuario=$usuario;
		//$b=$persona->setClave=$password;

    }
    /*----------------------------------------------------------------------*/
    public function setCurrentUsuario($usuario)
    {
    	$_SESSION['usuario']=$usuario;
    }
    public function GetUsuario()
	{
		return $this->usuario=$_SESSION['usuario'];
		 
	}
	/*-----------------------------------------------------------------------*/
	
    /*----------------------------------------------------------------------*/
    public static function setNames() 
    {
        return $EjecutaEscalar->query("SET NAMES 'utf8'");//con esto evitamos caracteres extraños
    }

    

    public function Cerrar_Seccion(){
    	session_unset();
    	echo "<script type='text/javascript'> alert('SISTEMA CERRADO EXITOSAMENTE ');
        window.location='../../index.php';</script>";
        //session_destroy();
    }

    
     
    public function Usuario_Existe($usuario,$password)
    {
		//self::setNames();
		try 
		{
			$respuesta=[];

			//$clave=md5($password);

    		$Ejecuta_Conexion=$Ejecuta->EjecutaEscalar();


    		$query=$Ejecuta_Conexion->prepare("
    		SELECT
			*
			FROM login AS l
			INNER join rol as r ON l.id_rol=r.id_rol
			WHERE l.usuario='".$usuario."' and l.clave='".$password."' AND l.Estado=1  AND l.Estado=1  ");

			$query->execute();

			if($resultado=$query->fetch())
			{
				$array = array(1 => "$usuario",2 =>"$password"  );
				//var_dump($array);
				$success='Usuarios Existe en la base de datos !!!! ';
    			echo "<p style='background-color:green; font-size:35px; '>'".$_SESSION['success']=$usuario."</p>";
    			//session_start();
                $_SESSION['usuario']=$usuario;
                $_SESSION['password']=$password;
                $_SESSION['Descripcion']=$resultado['Descripcion'];
                echo "<script type='text/javascript'> alert('Usuarios Existe en la base de datos !!!! ');
                    window.location='../../Vistas/Menu/header.php';</script>";
			}
			else
			{
				$array = array(1 => "$usuario",2 =>"$password"  );
				var_dump($array);
				$error='Error Usuario No Autenticado !!!! ';
    			echo "<p style='background-color:red; '>'".$_SESSION['error']='Error Usuario Autenticado  !!!  '."</p>";
				echo "<script type='text/javascript'> alert('Error Usuario Autenticado !!!!  ');window.location='../../index.php';</script>";
				//$stmt->close();
			}
			
		} 
		catch (Exception $e) 
    	{
    		$error='Error Consulta --> Obtener_Usuario    Usuarios_Create_Model !!!! ';
    		echo "Error Consulta --> Obtener_Usuario    Usuarios_Create_Model !!!! --->  "+$e->getMessage();
    		echo "<p style='background-color:red; '>'".$_SESSION['error']='Error Consulta --> Obtener_Usuario    Usuarios_Create_Model !!!! '."</p>";
    		echo "<scrip>window.alert('Error Consulta --> Obtener_Usuario    Usuarios_Create_Model !!!! ');</script>".$e->getMessage();
    	}
    	catch (PDOException $ex)
        {
            $error='Error Al Cerrar La Base Datos Desconocida !!!! ';
             echo "<p style='background-color:red; '>'".$_SESSION['error']='Error Al Cerrar La Base Datos Desconocida !!!! '."</p>";
             $_SESSION['error']='Error Al Cerrar La Base Datos Desconocida !!!! ';
             echo "<scrip>window.alert('Error Al Cerrar La Base Datos Desconocida !!!! ');</script>".$ex->getMessage();

        }

	}

	public function setUsuario($usuario)
    {
		try 
		{
			$respuesta=[];

    		$Ejecuta=new Conexion();

    		$Ejecuta_Conexion=$Ejecuta->EjecutaEscalar();

    		$query=$Ejecuta_Conexion->prepare("
    		SELECT
			*
			FROM login AS l
			INNER join rol as r ON l.id_rol=r.id_rol

			WHERE l.usuario='".$usuario."'  AND l.Estado=1   ");

			$query->execute();

			foreach ($query as $fila) 
			{
				$fila['usuario']=$this->usuario;
				$fila['clave']=$this->password;
				$this->Descripcion=$fila['Descripcion'];
				//$this->Descripcion=$_SESSION['Descripcion']=$fila['Descripcion'];
			}
			
		} 
		catch (Exception $e) 
    	{
    		$error='Error Consulta --> setUsuario    Usuarios_Create_Model !!!! ';
    		echo "Error Consulta --> setUsuario    Usuarios_Create_Model !!!! --->  "+$e->getMessage();
    		echo "<p style='background-color:red; '>'".$_SESSION['error']='Error Consulta --> setUsuario    Usuarios_Create_Model !!!! '."</p>";
    		echo "<scrip>window.alert('Error Consulta --> setUsuario    Usuarios_Create_Model !!!! ');</script>".$e->getMessage();
    	}
    	catch (PDOException $ex)
        {
            $error='Error Al Cerrar La Base Datos Desconocida !!!! ';
             echo "<p style='background-color:red; '>'".$_SESSION['error']='Error Al Cerrar La Base Datos Desconocida !!!! '."</p>";
             $_SESSION['error']='Error Al Cerrar La Base Datos Desconocida !!!! ';
             echo "<scrip>window.alert('Error Al Cerrar La Base Datos Desconocida !!!! ');</script>".$ex->getMessage();

        }








	}

    public function Verificar_Login_Model($usuario,$password)
    {
    	try 
    	{
    		$Ejecuta=new Conexion();

    		$Ejecuta_Conexion=$Ejecuta->EjecutaEscalar();
    		/*--------------------------------------------------------------------------------------*/
    		$stmt=$Ejecuta_Conexion->prepare("SELECT * from login as l 
    			WHERE l.usuario='".$usuario."' and l.clave='".$password."' and id_rol=1 and l.Estado=1 ");
			$stmt->execute();

			/**------------------------------------------------------------------------------------**/
			$stmt2=$Ejecuta_Conexion->prepare("SELECT l.usuario,l.clave  from login as l
				WHERE l.usuario='".$usuario."' and l.clave='".$password."' and id_rol=2 and l.Estado=1 ");
			$stmt2->execute();

			/*-------------------------------------------------------------------------------------*/

			$stmt3=$Ejecuta_Conexion->prepare("SELECT l.usuario,l.clave from login as l
				WHERE l.usuario='".$usuario."' and l.clave='".$password."' and id_rol=3 and l.Estado=1 ");
			$stmt3->execute();
			/**------------------------------------------------------------------------------------**/
			$stmt4=$Ejecuta_Conexion->prepare("SELECT l.usuario,l.clave from login as l 
    			WHERE l.usuario='".$usuario."' and l.clave='".$password."' and id_rol=4 and l.Estado=1 ");
			$stmt4->execute();
			/*--------------------------------------------------------------------------------------*/
			$stmt5=$Ejecuta_Conexion->prepare("SELECT l.usuario,l.clave from login as l 
    			WHERE l.usuario='".$usuario."' and l.clave='".$password."' and id_rol=5 and l.Estado=1 ");
			$stmt5->execute();
			/*--------------------------------------------------------------------------------------*/




			/*--------------------------------------------------------------------------------------*/
    		$stmt6=$Ejecuta_Conexion->prepare("SELECT l.usuario,l.clave from login as l 
    			WHERE l.usuario='".$usuario."' and l.clave='".$password."' and id_rol=1 and l.Estado=0 ");
			$stmt6->execute();

			/**------------------------------------------------------------------------------------**/
			$stmt7=$Ejecuta_Conexion->prepare("SELECT l.usuario,l.clave  from login as l
				WHERE l.usuario='".$usuario."' and l.clave='".$password."' and id_rol=2 and l.Estado=0 ");
			$stmt7->execute();

			/*-------------------------------------------------------------------------------------*/

			$stmt8=$Ejecuta_Conexion->prepare("SELECT l.usuario,l.clave from login as l
				WHERE l.usuario='".$usuario."' and l.clave='".$password."' and id_rol=3 and l.Estado=0 ");
			$stmt8->execute();
			/**------------------------------------------------------------------------------------**/
			$stmt9=$Ejecuta_Conexion->prepare("SELECT l.usuario,l.clave from login as l 
    			WHERE l.usuario='".$usuario."' and l.clave='".$password."' and id_rol=4 and l.Estado=0 ");
			$stmt9->execute();
			/*--------------------------------------------------------------------------------------*/
			$stmt10=$Ejecuta_Conexion->prepare("SELECT l.usuario,l.clave from login as l 
    			WHERE l.usuario='".$usuario."' and l.clave='".$password."' and id_rol=5 and l.Estado=0 ");
			$stmt10->execute();
			/*--------------------------------------------------------------------------------------*/



			if($stmt->fetch())
			{
				$array = array(1 => "$usuario",2 =>"$password"  );
				//var_dump($array);
				$success='Usuarios Administrador Ingresado Exitosamente !!! ';
    			echo "<p style='background-color:green; font-size:35px; '>'".$_SESSION['success']=$usuario."</p>";
    			session_start();
                $_SESSION['usuario']=$usuario;
                $_SESSION['password']=$password;
                echo "<script type='text/javascript'> alert('Usuario Autenticado Exitosamente ** ');
                    window.location='../../Vistas/Menu/header.php';</script>";
				
				 
               
                
    			
			}
			elseif ($stmt2->fetch()) 
			{
				$array = array(1 => "$usuario",2 =>"$password"  );
				//var_dump($array);
				$success='Vendedor Ingresado Exitosamente !!! ';
    			echo "<p style='background-color:green; '>'".$_SESSION['success']=$usuario."</p>";
    			//session_start();
                $_SESSION['usuario']=$usuario;
				$_SESSION['password']=$password;
    			echo "<script type='text/javascript'> alert('Vendedor Autenticado Exitosamente  ');
                    window.location='../../Vistas/Menu/Vendedor.php';</script>";//esta ruta ingresara el usuario informatico 

			}
			elseif ($stmt3->fetch()) 
			{
				$array = array(1 => "$usuario",2 =>"$password"  );
				//var_dump($array);
				$success='Contador Ingresado Exitosamente !!! ';
    			echo "<p style='background-color:green; '>'".$_SESSION['success']=$usuario."</p>";
    			//session_start();
                $_SESSION['usuario']=$usuario;
				$_SESSION['password']=$password;
    			echo "<script type='text/javascript'> alert('Contador Autenticado Exitosamente  ');
                    window.location='../../Vistas/Menu/header.php';</script>";//esta ruta ingresara el usuario informatico 
			}
			elseif ($stmt4->fetch()) 
			{
				$array = array(1 => "$usuario",2 =>"$password"  );
				//var_dump($array);
				$success='Informatico Ingresado Exitosamente !!! ';
    			echo "<p style='background-color:green; '>'".$_SESSION['success']=$usuario."</p>";
    			//session_start();
                $_SESSION['usuario']=$usuario;
				$_SESSION['password']=$password;
    			echo "<script type='text/javascript'> alert('Informatico Autenticado Exitosamente  ');
                window.location='../../Vistas/Menu/header.php';</script>";//esta ruta ingresara el usuario informatico 

			}
			elseif ($stmt5->fetch()) 
			{
				$array = array(1 => "$usuario",2 =>"$password"  );
				//var_dump($array);
				$success='QUIMICO FARMACEUTICO Ingresado Exitosamente !!! ';
    			echo "<p style='background-color:green; '>'".$_SESSION['success']=$usuario."</p>";
    			//session_start();
                $_SESSION['usuario']=$usuario;
				$_SESSION['password']=$password;
    			echo "<script type='text/javascript'> alert('QUIMICO FARMACEUTICO  ');
                window.location='../../Vistas/Menu/header.php';</script>";//esta ruta ingresara el usuario informatico 

			}



			elseif ($stmt6->fetch()) 
			{
				$array = array(1 => "$usuario",2 =>"$password"  );
				var_dump($array);
				$success='Administrador BLOQUEADO !!! ';
    			echo "<p style='background-color:red; '>'".$_SESSION['error']='Administrador No Autorizado !!!  '."</p>";
    			echo "<script type='text/javascript'> alert('Administrador No Tiene Privilegios ');
                    window.location='../../index.php';</script>";//en caso que Administrador tenga condicion sea 0
			}
			elseif ($stmt7->fetch()) 
			{
				$array = array(1 => "$usuario",2 =>"$password"  );
				var_dump($array);
				$success='Vendedor BLOQUEADO !!! ';
    			echo "<p style='background-color:red; '>'".$_SESSION['error']='Vendedor No Autorizado  !!!  '."</p>";
    			echo "<script type='text/javascript'> alert('Vendedor No Tiene Privilegios ');
                    window.location='../../index.php';</script>";//en caso que Informatico tenga condicion sea 0
			}
			elseif ($stmt8->fetch()) 
			{
				$array = array(1 => "$usuario",2 =>"$password"  );
				var_dump($array);
				$success='Contador BLOQUEADO !!! ';
    			echo "<p style='background-color:red; '>'".$_SESSION['error']='Contador No Autorizado  !!!  '."</p>";
    			echo "<script type='text/javascript'> alert('Contador No Tiene Privilegios ');
                    window.location='../../index.php';</script>";//en caso que vendedor tenga condicion sea 0
			}
			elseif ($stmt9->fetch()) 
			{
				$array = array(1 => "$usuario",2 =>"$password"  );
				var_dump($array);
				$success='Informatico BLOQUEADO !!! ';
    			echo "<p style='background-color:red; '>'".$_SESSION['error']='Informatico No Autorizado !!!  '."</p>";
    			echo "<script type='text/javascript'> alert('Informatico No Tiene Privilegios ');
                    window.location='../../index.php';</script>";//en caso que vendedor tenga condicion sea 0
			}
			elseif ($stmt10->fetch()) 
			{
				$array = array(1 => "$usuario",2 =>"$password"  );
				var_dump($array);
				$success='QUIMICO FARMACEUTICO BLOQUEADO !!! ';
    			echo "<p style='background-color:red; '>'".$_SESSION['error']='QUIMICO FARMACEUTICO No Autorizado !!!  '."</p>";
    			echo "<script type='text/javascript'> alert('QUIMICO FARMACEUTICO No Tiene Privilegios ');
                    window.location='../../index.php';</script>";//en caso que vendedor tenga condicion sea 0
			}
			else
			{
				$array = array(1 => "$usuario",2 =>"$password"  );
				var_dump($array);
				$error='Error Usuario No Autenticado !!!! ';
    			echo "<p style='background-color:red; '>'".$_SESSION['error']='Error Usuario Autenticado  !!!  '."</p>";
				echo "<script type='text/javascript'> alert('Error Usuario Autenticado !!!!  ');window.location='../../index.php';</script>";
				//$stmt->close();
			}

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

    } //FIN DE LA CLASE Verificar_Login_Model()
	
    public function mostrar_Todos_Login()
    {
    	try 
    	{
    		//$respuesta=[];
    		$Ejecuta=new Conexion();

    		$Ejecuta_Conexion=$Ejecuta->EjecutaEscalar();

			$stmt=$Ejecuta_Conexion->prepare("
			SELECT l.usuario FROM login as l
			WHERE l.usuario='".$usuario."'  and l.condicion=1 ");
			$stmt->execute();
			while($stmt->fetch(PDO::FETCH_ASSOC))
			{
                if($resultados=$stmt->fetch(PDO::FETCH_ASSOC))
                {
                	echo "<tr>";
                	
	                      echo "<td>".$resultados['usuario']."</td>";
	                      echo "<td>".$resultados['clave']."</td>";   
	                      echo "<td>".$resultados['Tipo_Usuario']."</td>";
	                      echo "<td>".$resultados['condicion']."</td>";    
	                                
	                      echo "<td><a href='ModificarArticulos.php?id=".$resultados['id_usuario']." ' class='btn btn-success btn-sm' name='Modifica' data-toggle='modal'/><span class='glyphicon glyphicon-edit'/></span> Editar</a></td>";

	                      echo "<td><a href='EliminarArticulos.php?id=".$resultados['id_usuario']." ' class='btn btn-danger btn-sm' data-toggle='modal'/><span class='glyphicon glyphicon-trash'/></span> Eliminar</a></td>";

	                      echo "<td><a href='VerArticulo.php?id=".$resultados['id_usuario']." ' class='btn btn-success btn-sm' style='color: white;' data-toggle='modal'/>
	                      <span class='glyphicon glyphicon-eye-open'/></span> VER</a></td>";
                	echo"</tr>";
                }//fin del ciclo if
                else
                {
                	$error='Error AL Mostrar Tabla Login';
		    		echo "<p style='background-color:red; '>'".$_SESSION['error']='Error AL Mostrar Tabla Login   '."</p>";
                }//fin del elese


			}
			//$resultados = $stmt->fetchAll();
       		//return $resultados;  

    	} 
    	catch (Exception $e) 
    	{
    		$error='Error AL Mostrar Login Model !!!! ';
    		echo "Error AL Mostrar Login Model !!!!  --->  "+$e->getMessage();
    		echo "<p style='background-color:red; '>'".$_SESSION['error']='Error AL Mostrar Login Model !!!!   '."</p>";
    		echo "<scrip>window.alert('Error AL Mostrar Login Model !!!!  ');</script>".$e->getMessage();
    	}
    	catch (PDOException $ex)
        {
            $error='Error AL Mostrar Tabla Login ';
             echo "<p style='background-color:red; '>'".$_SESSION['error']='Error AL Mostrar Tabla Login '."</p>";
             $_SESSION['error']='Error AL Mostrar Tabla Login !!!! ';
             echo "<scrip>window.alert('Error AL Mostrar Tabla Login !!!! ');</script>".$ex->getMessage();

        }	
		

    } 
    //FIN DE LA CLASE mostrar_Todos_Login()

	public function mostrar_Usuario_Logueado($usuario,$password)
    {
    	try 
    	{
    		//$usuario=null;//defino el nombre del usuario de session
    		//$respuesta=[];
    		$Ejecuta=new Conexion();

    		$Ejecuta_Conexion=$Ejecuta->EjecutaEscalar();

    		/*------------------------------------------------------------------------*/
			$stmt=$Ejecuta_Conexion->prepare(" 
		    SELECT
			l.usuario,l.clave,r.Descripcion 
			FROM login AS l
			INNER join rol as r ON l.id_rol=r.id_rol
			WHERE l.Estado=1 and r.Descripcion='Administrador' and l.usuario='".$usuario."' and l.clave='".$password."'   ");

			$stmt->execute();
			/*------------------------------------------------------------------------*/
			$stmt2=$Ejecuta_Conexion->prepare("
			SELECT
			l.usuario,l.clave,r.Descripcion 
			FROM login AS l
			INNER join rol as r ON l.id_rol=r.id_rol
			WHERE l.Estado=1 and r.Descripcion='Vendedor' and l.usuario='".$usuario."' and l.clave='".$password."' ");

			$stmt2->execute();

			/*-------------------------------------------------------------------------------------*/

			$stmt3=$Ejecuta_Conexion->prepare("
			SELECT
			l.usuario,l.clave,r.Descripcion 
			FROM login AS l
			INNER join rol as r ON l.id_rol=r.id_rol
			WHERE l.Estado=1 and r.Descripcion='Contador' and l.usuario='".$usuario."' and l.clave='".$password."'  ");

			$stmt3->execute();
			/**------------------------------------------------------------------------------------**/
			$stmt4=$Ejecuta_Conexion->prepare("
			SELECT
			l.usuario,l.clave,r.Descripcion 
			FROM login AS l
			INNER join rol as r ON l.id_rol=r.id_rol
			WHERE l.Estado=1 and r.Descripcion='Informatico' and l.usuario='".$usuario."' and l.clave='".$password."'  ");

			$stmt4->execute();



			if($stmt->fetch())
			{
				$array = array(1 => "$usuario",2 =>"$password"  );
				//var_dump($array);
				$success='Administrador Ingresado Exitosamente !!! ';
    			echo "<p style='background-color:green; font-size:35px; '>'".$_SESSION['success']=$usuario."</p>";
    			//session_start();
                $_SESSION['usuario']=$usuario;
				$_SESSION['password']=$password;
				$_SESSION['Descripcion']='Administrador';
				
				echo "<script type='text/javascript'> alert('Administrador Ingresado Al Session Start ADMINISTRADOR ');
                window.location='../../Vistas/Menu/header.php';</script>";
			}
			elseif ($stmt2->fetch()) 
			{
				$array = array(1 => "$usuario",2 =>"$password"  );
				//var_dump($array);
				$success='Vendedor Ingresado Exitosamente !!! ';
    			echo "<p style='background-color:green; '>'".$_SESSION['success']=$usuario."</p>";
    			//session_start();
                $_SESSION['usuario']=$usuario;
				$_SESSION['password']=$password;
				$_SESSION['Descripcion']='Vendedor';
				
                echo "<script type='text/javascript'> alert('Vendedor Ingresado Al Session Start ');
                window.location='../../Vistas/Menu/Vendedor.php';</script>";//esta ruta ingresara el vendedor
               

			}
			elseif ($stmt3->fetch()) 
			{
				$array = array(1 => "$usuario",2 =>"$password"  );
				//var_dump($array);
				$success='Contador Ingresado Exitosamente !!! ';
    			echo "<p style='background-color:green; '>'".$_SESSION['success']=$usuario."</p>";
    			//session_start();
                $_SESSION['usuario']=$usuario;
				$_SESSION['password']=$password;
				$_SESSION['Descripcion']='Contador';
				
    			echo "<script type='text/javascript'> alert('Contador Ingresado Al Session Start  ');
                    window.location='../../Vistas/Menu/header.php';</script>";//esta ruta ingresara el usuario informatico 
			}
			elseif ($stmt4->fetch()) 
			{
				$array = array(1 => "$usuario",2 =>"$password"  );
				//var_dump($array);
				$success='Informatico Ingresado Exitosamente !!! ';
    			echo "<p style='background-color:green; '>'".$_SESSION['success']=$usuario."</p>";
    			//session_start();
                $_SESSION['usuario']=$usuario;
				$_SESSION['password']=$password;
				$_SESSION['Descripcion']='Informatico';
				
    			echo "<script type='text/javascript'> alert('Usuario Ingresado Al Session Start Informatico ');
                window.location='../../Vistas/Menu/header.php';</script>";

			}
			else
			{
				$array = array(1 => "$usuario",2 =>"$password"  );
				//var_dump($array);
				$error='Error Usuarios No Logeado !!!! ';

				if($_SESSION['usuario']=='Administrador' && $_SESSION['password']==$password && $_SESSION['Descripcion']='Administrador')
				{
					session_unset();
    				session_destroy();
    				echo "<p style='background-color:red; display:none;   '>'".$_SESSION['error']='Error Usuarios No Logeado  ADMINISTRADOR !!!  '."</p>";
					echo "<script type='text/javascript'> alert('Error Usuarios No Logeado Administrador !!! ');window.location='../../index.php';</script>";
					
				}
				elseif($_SESSION['usuario']=='Vendedor' && $_SESSION['password']==$password && $_SESSION['Descripcion']='Vendedor')
				{
					session_unset();
    				session_destroy();
    				echo "<p style='background-color:red; display:none;   '>'".$_SESSION['error']='Error Usuarios No Logeado   !!!  '."</p>";
					echo "<script type='text/javascript'> alert('Error Usuarios No Logeado !!!!  ');window.location='../../index.php';</script>";
				}
				elseif ($_SESSION['usuario']=='Contador' && $_SESSION['password']==$password && $_SESSION['Descripcion']='Contador') 
				{
					session_unset();
    				session_destroy();
    				echo "<p style='background-color:red; display:none;   '>'".$_SESSION['error']='Error Usuarios No Logeado   !!!  '."</p>";
					echo "<script type='text/javascript'> alert('Error Usuarios No Logeado !!!!  ');window.location='../../index.php';</script>";
				}
				elseif ($_SESSION['usuario']=='Informatico' && $_SESSION['password']=$password && $_SESSION['Descripcion']='Informatico') 
				{
					session_unset();
    				session_destroy();
    				echo "<p style='background-color:red; display:none;   '>'".$_SESSION['error']='Error Usuarios No Logeado   !!!  '."</p>";
					echo "<script type='text/javascript'> alert('Error Usuarios No Logeado !!!!  ');window.location='../../index.php';</script>";
				}
				else
				{
					echo "<p style='background-color:red; '>'".$_SESSION['error']='Error AL INGRESAR AL SISTEMA SANA SANA !!!  '."</p>";
					echo "<script type='text/javascript'> alert('Error AL INGRESAR AL SISTEMA SANA SANA  ');window.location='../../index.php';</script>";

				}
    			echo "<p style='background-color:red; '>'".$_SESSION['error']='Error Usuarios No Logeado !!!!  '."</p>";
				echo "<script type='text/javascript'> alert('Error Usuarios No Logeado !!!!   ');window.location='../../index.php';</script>";

			}
    		
    	} 
    	catch (Exception $e) 
    	{
    		$error='Error AL Mostrar Login Model !!!! ';
    		echo "Error AL Mostrar Login Model !!!!  --->  "+$e->getMessage();
    		echo "<p style='background-color:red; '>'".$_SESSION['error']='Error AL Mostrar Login Model !!!!   '."</p>";
    		echo "<scrip>window.alert('Error AL Mostrar Login Model !!!!  ');</script>".$e->getMessage();
    	}
    	catch (PDOException $ex)
        {
            $error='Error AL Mostrar Tabla Login ';
             echo "<p style='background-color:red; '>'".$_SESSION['error']='Error AL Mostrar Tabla Login '."</p>";
             $_SESSION['error']='Error AL Mostrar Tabla Login !!!! ';
             echo "<scrip>window.alert('Error AL Mostrar Tabla Login !!!! ');</script>".$ex->getMessage();

        }	
		

    } 
    //FIN DE LA CLASE mostrar_Usuario_Logueado()




    public function ValidarSession($usuario)
    {

    	if(isset($_COOKIE[session_start($_SESSION['usuario']==true)]))
    	{
    		setcookie($_SESSION['usuario'],'',-150000,'/' );
    	}
    	/*
		if(isset($_COOKIE[session_start($_SESSION['usuario']==true)]))
    	{
    		setcookie(session_start(),'',+150000,'/' );
    	}
    	*/

    	//session_unset();
    	//session_destroy();



    }


	public function __destruct()
    {
    	//$this->$Ejecuta->EjecutaEscalar();
    	//$this->$Ejecuta->cierraConexion();//cierro la cadena de conexion
    	//$link->close();
    	exit();
    }


}




?>