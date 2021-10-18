<?php 
ob_start();
include ('../configuracion/config.php');
class receptor
{

	public function Ingresar($nombre,$apellido,$telefono1,$telefono2)
	{
		$bd = new datos();
		$bd->conectar();

		$consulta= "call sp_receptor(0, '$nombre', '$apellido', '$telefono1', '$telefono2', 'I', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/lista_receptor.php" </script>';



	}

	public function Ver()
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_receptor(0, '0', '0', '0', '0', 'S', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}
	public function VerUno($id)
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_receptor($id, '0', '0', '0', '0', 'S1', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}
	public function Eliminar($id)
	{

		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_receptor($id, '0', '0', '0', '0', 'D', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/lista_receptor.php" </script>';

	}

				

	public function Modificar($id,$nombre,$apellido,$telefono1,$telefono2)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_receptor($id, '$nombre', '$apellido', '$telefono1', '$telefono2', 'U', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/lista_receptor.php" </script>';


	}

	
}

 ?>