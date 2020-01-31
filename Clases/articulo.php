<?php

class producto
{
	private  $id_producto;
	private  $codigo;
	private  $CodigoBarra;
	private  $Nombre;
	private  $Descripcion;
	private  $Stock;
	private  $StockMin;
	private  $PrecioCosto;
	private  $PrecioVenta;
	private  $Utilidad;
	private  $Estado;
	private  $impuesto;
	private  $Id_Categoria;

	function __construct()
	{
		//constructor vacio por default
	}

	public function  GetId_producto()
	{
		return $this->id_producto;
	}
	public function setId_producto($id_producto)
	{
	      $this->id_producto=$id_producto;
	}
	public function  GetCodigo()
	{
		return $this->codigo;
	}
	public function setCodigo($codigo)
	{
	      $this->codigo=$codigo;
	}

	public function  GetCodigoBarra()
	{
		return $this->CodigoBarra;
	}
	public function setCodigoBarra($CodigoBarra)
	{
	      $this->CodigoBarra=$CodigoBarra;
	}
	public function  GetNombre()
	{
		return $this->Nombre;
	}
	public function setNombre($Nombre)
	{
	      $this->Nombre=$Nombre;
	}
	public function  GetDescripcion()
	{
		return $this->Descripcion;
	}
	public function setDescripcion($Descripcion)
	{
	      $this->Descripcion=$Descripcion;
	}
	public function  GetStock()
	{
		return $this->Stock;
	}
	public function setStock($Stock)
	{
	      $this->Stock=$Stock;
	}
	public function  GetStockMin()
	{
		return $this->StockMin;
	}
	public function setStockMin($StockMin)
	{
	      $this->StockMin=$StockMin;
	}
	public function  GetPrecioCosto()
	{
		return $this->PrecioCosto;
	}
	public function setPrecioCosto($PrecioCosto)
	{
	      $this->PrecioCosto=$PrecioCosto;
	}
	public function  GetPrecioVenta()
	{
		return $this->PrecioVenta;
	}
	public function setPrecioVenta($PrecioVenta)
	{
	      $this->PrecioVenta=$PrecioVenta;
	}
	public function  GetUtilidad()
	{
		return $this->Utilidad;
	}
	public function setUtilidad($Utilidad)
	{
	      $this->Utilidad=$Utilidad;
	}
	public function  GetEstado()
	{
		return $this->Estado;
	}
	public function setEstado($Estado)
	{
	      $this->Estado=$Estado;
	}
	public function GetImpuesto()
	{
		return $this->impuesto;
	}
	public function setImpuesto($impuesto)
	{
	      $this->impuesto=$impuesto;
	}
	public function  GetId_Categoria()
	{
		return $this->Id_Categoria;
	}
	public function setId_Categoria($Id_Categoria)
	{
	      $this->Id_Categoria=$Id_Categoria;
	}


}
?>