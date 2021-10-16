<?php 
ob_start();
include ('../Configuracion/config.php');
class rol_usuario
{

		public function IngresarRolUsuario($nombre)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_rol_usuario(0, '$nombre', 'I', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/lista_tipo_usuario.php" </script>';


	}

		public function VerRolUsuario()
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_rol_usuario(0,'0','S', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}
			public function VerUnRolUsuario($id)
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_rol_usuario($id, '0', 'S1', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}
				public function Eliminar($id)
	{

		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_rol_usuario($id, '0','D', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/lista_tipo_usuario.php" </script>';

	}

				

		public function ModificarRolUsuario($id,$nombre)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_rol_usuario($id, '$nombre','U', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/lista_tipo_usuario.php" </script>';


	}

	
}

 ?>