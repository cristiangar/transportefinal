<?php 
ob_start();
include ('../Configuracion/config.php');
class mantenimiento
{

		public function IngresarMantenimiento($id,$descripcion)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_bitacora(0, $id, 1, '$descripcion', 'I', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/bitacora.php" </script>';


	}

	public function VerEnviosA()
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_bitacora(0, 0, 0, '0', 'S2', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}

		public function VerUnabitacora($id2)
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_bitacora($id2, 0, 0, '0', 'S3', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}
			public function VerMantenimientosVehiculo($id)
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_mantenimiento(0, '0', '0', 0, '0', '0', 1, 0, 'S', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}
				public function Eliminar($id2)
	{

		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_bitacora($id2, 0, 0, '0', 'D', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/bitacora.php" </script>';

	}

				

		public function ModificarBitacora($id2,$descripcion)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_bitacora($id2, 0, 0, '$descripcion', 'U', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/bitacora.php" </script>';


	}

	
}

 ?>