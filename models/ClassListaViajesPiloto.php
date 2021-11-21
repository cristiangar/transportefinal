<?php 
ob_start();
include ('../Configuracion/config.php');
class envio_piloto
{
	public function Ingresar($id)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_envio_pilotos($id, 'I', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);

		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/ViewAdministrador.php" </script>';


	}
	public function Terminar($id)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_envio_pilotos($id, 'T', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);

		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/ViewAdministrador.php" </script>';


	}

	public function Ver($id)
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_envio_pilotos($id, 'S', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}
    
	public function Ver2($id)
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_envio_pilotos($id, 'S2', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}


}
 ?>