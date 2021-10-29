<?php 
ob_start();
session_start();
include ('../configuracion/config.php');
class Listas
{

	public function Verclientes()
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_lista('S');";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}
    public function VerReceptor()
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_lista('S2');";
		$dt2= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt2;

	}
    public function VerVehiculo()
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_lista('S3');";
		$dt3= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt3;

	}
    public function VerCaja()
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_lista('S4');";
		$dt4= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt4;

	}
    public function VerPiloto()
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_lista('S5');";
		$dt5= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt5;

	}

}