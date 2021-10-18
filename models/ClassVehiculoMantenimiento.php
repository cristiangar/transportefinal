<?php 
ob_start();
include ('../Configuracion/config.php');
class vehiculomantenimiento
{

		public function Ingresar($marca,$modelo,$placa,$tipo_vehiculo)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_vehiculo_mantenimiento(0, '$marca', '$modelo', '$placa', 'I', '$tipo_vehiculo', @pn_respuesta);";

		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../mantenimientovehiculos/lista_vehiculos.php" </script>';


	}

		public function Ver()
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_vehiculo_mantenimiento(0, '0', '0', '0', 'S', '0', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}
			public function VerUno($id)
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_vehiculo_mantenimiento($id, '0', '0', '0', 'S1', '0', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}
				public function Eliminar($id)
	{

		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_vehiculo_mantenimiento($id, '0', '0', '0', 'D', '0', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../mantenimientovehiculos/lista_vehiculos.php" </script>';

	}

				

		public function Modificar($id,$marca,$modelo,$placa,$tipo_vehiculo)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta="call sp_vehiculo_mantenimiento($id, '$marca', '$modelo', '$placa', 'U', '$tipo_vehiculo', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo $texto;
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../mantenimientovehiculos/lista_vehiculos.php" </script>';


	}

	
}

 ?>