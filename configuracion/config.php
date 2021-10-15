<?php 
class Datos{
	private $servidor='localhost';
	private $usuario='root';
	private $pass='';
	private $db='transportefinal';
	public $objetoconexion;
	public function conectar()
	{
		$this->objetoconexion=mysqli_connect($this->servidor,$this->usuario,$this->pass,$this->db) or die("Error al conectar con el Servidor");
	}
	public function desconectar()
	{
		mysqli_close($this->objetoconexion);
	}

}
 ?>