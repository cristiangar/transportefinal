<?php 
ob_start();
include ('../Configuracion/config.php');
class mantenimiento
{

		public function IngresarMantenimiento($fecha,$descripcion,$costo,$no_factura,$imagenfac,$id,$tipo_moneda)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_mantenimiento(0, '$fecha', '$descripcion', $costo, '$no_factura', '$imagenfac', $id, $tipo_moneda, 'I', @pn_respuesta);";
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

	
			public function VerMantenimientosVehiculo($id)
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_mantenimiento(0, '0', '0', 0, '0', '0', $id, 0, 'S', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}
				public function Eliminar($id2)
	{

		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_mantenimiento($id2, '0', '0', 0, '0', '0', 0, 0, 'D', @pn_respuesta);";
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