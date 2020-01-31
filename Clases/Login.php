
<?php

class login 
{
	private   $id_usuario;
	private   $nombre;
	private   $usuario;
	private   $clave;
	private   $Descripcion;
	private   $condicion;


	function __construct()
	{
		//constructor vacio por default
	}


	public function  GetId_usuario()
	{
		return $this->id_usuario;
	}
	public function setId_usuario($id_usuario)
	{
	      $this->id_usuario=$id_usuario;
	}

	public function GetNombre()
	{
		return $this->nombre;
	}
	public function setNombre($nombre)
	{
	      $this->nombre=$nombre;
	}

	public function GetUsuario()
	{
		return $this->usuario;
	}
	public function setUsuario($usuario)
	{
		$this->usuario=$usuario;
	}

	public function GetClave()
	{
		return $this->clave;
	}
	public function setClave($clave)
	{
		$this->clave=$clave;
	}


	public function GetDescripcion()
	{
		return $this->Descripcion;
	}
	public function setDescripcion($Descripcion)
	{
		$this->Descripcion=$Descripcion;
	}

	public function GetCondicion()
	{
		return $this->condicion;
	}
	public function setCondicion($condicion)
	{
		$this->condicion=$condicion;
	}



}

?>