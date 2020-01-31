<?php
class ciudad
{
	private  $id_ciudad;
	private  $nombre_ciudad;
	

	function __construct()
	{
		//constructor vacio por default
	}

	public function  GetId_ciudad()
	{
		return $this->id_ciudad;
	}
	public function setId_ciudad($id_ciudad)
	{
	      $this->id_ciudad=$id_ciudad;
	}
	public function  GetNombre_ciudad()
	{
		return $this->nombre_ciudad;
	}
	public function setNombre_ciudad($nombre_ciudad)
	{
	      $this->nombre_ciudad=$nombre_ciudad;
	}
	




}
?>