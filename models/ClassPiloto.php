<?php 
ob_start();
include ('../configuracion/config.php');
class piloto
{

	public function Ingresar($nombre, $apellido, $cui, $ruta, $telefono, $whatsapp, $contacto_emergencia, $numero_emergencia, $correo, $licencia, $tipo_licencia, $fecha, $ruta_licencia, $pasaporte, $ruta_pasaporte, $banco, $nombre_cuenta, $numero_cuenta, $tipo_cuenta, $tipo_piloto)
	{
		$bd = new datos();
		$bd->conectar();

		$consulta= "call sp_piloto(0, '$nombre', '$apellido', $cui, '$ruta', '$telefono', '$whatsapp', '$contacto_emergencia', '$numero_emergencia', '$correo', $licencia, '$tipo_licencia', '$fecha', '$ruta_licencia', $pasaporte, '$ruta_pasaporte', '$banco', '$nombre_cuenta', '$numero_cuenta', '$tipo_cuenta', $tipo_piloto, 'I', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/lista_piloto.php" </script>';



	}

	public function Ver()
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_piloto(0, '0', '0', 0, '0', '0', '0', '0', '0', '0', 0, '0', '0', '0', 0, '0', '0', '0', '0', '0', 0, 'S', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}

	public function VerDetalle($id)
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_piloto($id, '0', '0', 0, '0', '0', '0', '0', '0', '0', 0, '0', '0', '0', 0, '0', '0', '0', '0', '0', 0, 'S2', @pn_respuesta);";
		$dt3= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt3;

	}
	public function VerUno($id)
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_piloto($id, '0', '0', 0, '0', '0', '0', '0', '0', '0', 0, '0', '0', '0', 0, '0', '0', '0', '0', '0', 0, 'S1', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}
	public function Eliminar($id)
	{

		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_piloto($id, '0', '0', 0, '0', '0', '0', '0', '0', '0', 0, '0', '0', '0', 0, '0', '0', '0', '0', '0', 0, 'D', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/lista_piloto.php" </script>';

	}

				

	public function Modificar($id,$nombre, $apellido, $cui, $ruta, $telefono, $whatsapp, $contacto_emergencia, $numero_emergencia, $correo, $licencia, $tipo_licencia, $fecha, $ruta_licencia, $pasaporte, $ruta_pasaporte, $banco, $nombre_cuenta, $numero_cuenta, $tipo_cuenta, $tipo_piloto)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_piloto($id, '$nombre', '$apellido', $cui, '$ruta', '$telefono', '$whatsapp', '$contacto_emergencia', '$numero_emergencia', '$correo', $licencia, '$tipo_licencia', '$fecha', '$ruta_licencia', $pasaporte, '$ruta_pasaporte', '$banco', '$nombre_cuenta', '$numero_cuenta', '$tipo_cuenta', $tipo_piloto, 'U', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/lista_piloto.php" </script>';


	}

    public function VerTipoEmpleado()
    {
        
		$db = new datos();
		$db->conectar();
		$consulta= "call sp_tipo_empleado(0, '0', 'S', @pn_respuesta);";
		$dt2= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt2;
    }

	
}

 ?>