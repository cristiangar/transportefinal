<?php 
ob_start();
include ('../configuracion/config.php');
class Reporte
{

	public function VerEnvio($id)
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_envio(0,'0', '0', '0', $id, '0', 0, 0, 0, 0, 0, 0, 0, 'S1', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}
}

 ?>