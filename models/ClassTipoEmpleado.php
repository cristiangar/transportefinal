<?php 
ob_start();
include ('../configuracion/config.php');
class tipo
{

		public function IngresarTipoEmpleado($cargo)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_tipo_empleado(0, '$cargo', 'I', @pn_respuesta)";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/Motro/tipo_empleado/lista_tipo_empleado.php" </script>';


	}

		public function VerTipoEmpleado()
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_tipo_empleado(0, '0', 'S', @pn_respuesta)";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}
			public function VerunTipoEmpleado($id)
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_tipo_empledo($id,'0','S1', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}
				public function Eliminar($id)
	{

		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_tipo_empledo($id, '0','D', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/tipo_empleado.php" </script>';

	}

				

		public function ModificarTipoEmpleado($id,$cargo)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_tipo_empledo($id, '$cargo', 'U', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/tipo_empleado.php" </script>';


	}

	
}

 ?>