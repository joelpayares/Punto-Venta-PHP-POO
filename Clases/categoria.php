<?php
class categoria
{
	private  $Id_Categoria;
	private  $Descripcion;
	private  $isVenta;
	private  $Estado;
	private  $fecha_registro;
	
	function __construct()
	{
		//constructor vacio por default
	}

	public function  GetId_Categoria()
	{
		return $this->Id_Categoria;
	}
	public function setId_Categoriao($Id_Categoria)
	{
	      $this->Id_Categoria=$Id_Categoria;
	}
	public function  GetDescripcion()
	{
		return $this->Descripcion;
	}
	public function setDescripcion($Descripcion)
	{
	      $this->Descripcion=$Descripcion;
	}


	public function  GetIsVenta()
	{
		return $this->isVenta;
	}
	public function setIsVenta($isVenta)
	{
	      $this->isVenta=$isVenta;
	}




	public function  GetEstado()
	{
		return $this->Estado;
	}
	public function setEstado($Estado)
	{
	      $this->Estado=$Estado;
	}
	public function  GetFecha_registro()
	{
		return $this->fecha_registro;
	}
	public function setFecha_registro($fecha_registro)
	{
	      $this->fecha_registro=$fecha_registro;
	}




}
?>