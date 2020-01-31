<?php

class producto
{
	private  $Id_cliente;
	private  $Rut;
	private  $Nombre;
	private  $Apellido;
	private  $Direccion;
	private  $Telefono;
	private  $Email;
	private  $Estado;
	
	function __construct()
	{
		//constructor vacio por default
	}

	public function  GetId_cliente()
	{
		return $this->Id_cliente;
	}
	public function setId_cliente($Id_cliente)
	{
	      $this->Id_cliente=$Id_cliente;
	}
	public function  GetRut()
	{
		return $this->Rut;
	}
	public function setRut($Rut)
	{
	      $this->Rut=$Rut;
	}

	public function  GetNombre()
	{
		return $this->Nombre;
	}
	public function setNombre($Nombre)
	{
	      $this->Nombre=$Nombre;
	}
	public function  GetNombre()
	{
		return $this->Nombre;
	}
	public function setNombre($Nombre)
	{
	      $this->Nombre=$Nombre;
	}
	public function  GetApellido()
	{
		return $this->Apellido;
	}
	public function setApellido($Apellido)
	{
	      $this->Apellido=$Apellido;
	}
	public function  GetDireccion()
	{
		return $this->Direccion;
	}
	public function setDireccion($Direccion)
	{
	      $this->Direccion=$Direccion;
	}

	public function  GetTelefono()
	{
		return $this->Telefono;
	}
	public function setTelefono($Telefono)
	{
	      $this->Telefono=$Telefono;
	}



	public function  GetEmail()
	{
		return $this->Email;
	}
	public function setEmail($Email)
	{
	      $this->Email=$Email;
	}



	public function  GetEstado()
	{
		return $this->Estado;
	}
	public function setEmail($Estado)
	{
	      $this->Estado=$Estado;
	}












}
?>