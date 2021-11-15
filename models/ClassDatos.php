<?php 
ob_start();
session_start();
include ('../Configuracion/config.php');
class envio
{

	public function Verpaquete()
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_paquete(0, '0', '0', '0', '0', 0, 'S', @id_respuesta, @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}

	public function Verclientes()
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_cliente(0, '0', '0', '0', '0', '0', '0', '0', 'S', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}

	public function VerListaViajePago()
	{

		$db = new datos();
        $db->conectar();
        $consulta= "call sp_cuentas_por_pagar(0, '0', 0, 0, 0, 'S4', @pn_respuesta);";
        $dt9= mysqli_query($db->objetoconexion,$consulta);
        $db->desconectar();
        return $dt9;

	}

	public function Verpilotointerno()
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_pilotos(0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', '0', '0', 'S', @pn_respuesta);";
		$dt5= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt5;

	}


	public function VerReceptor()
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_receptor(0, 'S', '0', '0', '0', '0', @pn_respuesta);";
		$dt3= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt3;

	}

	public function VerEnvio()
	{

		$db = new datos();
		$db->conectar();
		$consulta= "select a.id_envio,a.codigo_envio,a.fecha_envio,b.id_clientes,b.empresa,c.id_receptor,concat(c.nombre,' ',c.apellido) as receptor,a.autorizado
		from envio as a
		inner join clientes as b on a.id_clientes=b.id_clientes
		inner join receptor as c on a.id_receptor=c.id_receptor
		where a.estado_eliminado=1 and a.estado_activo=1 and a.autorizado=1 and a.bandera_encabezado=0;";
		$dt8= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt8;

	}

	
	public function VerVehiculo()
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_vehiculos(0, '0', '0', '0', '0', '0', '0', 0, '0', 0, '0', '0', '0', 'S', '0', '0', '0', '0', @pn_respuesta, @pn_id_vehiculo);";
		$dt4= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt4;
	}



	public function VerPlataforma()
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_plataforma(0, '0', '0', '0', '0', '0', 'S', '0', '0', '0', '0', '0', '0', '0', 0, @pn_respuesta, @pn_id);";
		$dt6= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt6;
	}

public function Ingresar2($descripcion, $peso, $direccion_entrega, $direccion_envio, $ruta, $fecha_envio,$fecha_entrega, $id_cliente, $id_receptor, $codigo_envio,$piloto,$cabezal,$plataforma)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_envio2(0, 'I', '$descripcion', '$peso', '$direccion_entrega', '$direccion_envio', $ruta, '$fecha_envio', '$fecha_entrega', $id_cliente, $id_receptor, '$codigo_envio', 2, $piloto, $cabezal, $plataforma, @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);


		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/estados.php" </script>';
						unset($_SESSION['idcliente']);
						unset($_SESSION['idreceptor']);
						unset($_SESSION['idpiloto']);
						unset($_SESSION['idvehiculo']);
						unset($_SESSION['idplataforma']);


	}

	public function Ingresar3($descripcion, $peso, $direccion_entrega, $direccion_envio, $ruta, $fecha_envio,$fecha_entrega, $id_cliente, $id_receptor, $codigo_envio,$piloto,$cabezal)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_envio2(0, 'I', '$descripcion', '$peso', '$direccion_entrega', '$direccion_envio', $ruta, '$fecha_envio', '$fecha_entrega', $id_cliente, $id_receptor, '$codigo_envio', 2, $piloto, $cabezal,0, @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		unset($_SESSION['idcliente']);
		unset($_SESSION['idreceptor']);
		unset($_SESSION['idpiloto']);
		unset($_SESSION['idvehiculo']);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/estados.php" </script>';


	}
	public function Ver()
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_envio(0, 'S', '0', '0', '0', '0', 0, '0', '0', 0, 0, '0', 0, 0, @pn_respuesta);";
		$dt4= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;
	}

	public function VerUno($id)
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_envio($id, 'S1', '0', '0', '0', '0', 0, '0', '0', 0, 0, '0', 0, 0, @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;
	}

	public function Autorizar($id,$adelanto,$pendiente,$renta,$combustible)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_autorizar_envio($id,$adelanto,$pendiente,$renta,$combustible, 'A', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);


		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/estados.php" </script>';


	}

	public function Eliminar($id)
	{
		
		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_envio2($id, 'D', '1', '1', '1', '1', 1, '1', '1', 1, 1, '1', 1, 1, 1, 1, @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/estados.php" </script>';
	}
	public function Tipo_ruta()
    {
        $db = new datos();
		$db->conectar();
		$consulta= "call sp_ruta(0, 'n', 'n', 'no','S2', @pn_respuesta);";
		$dtruta= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dtruta;
    }
	public function Actualizar1($id,$codigo_envio,$fecha_envio, $fecha_entrega,$id_cliente, $id_receptor,$id_paquete,$direccion_entrega, $direccion_envio,$descripcion,$ruta,$asignacion,$piloto, $vehiculo)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta= "call actualizar_envio($id, '$codigo_envio', '$fecha_envio', '$fecha_entrega', $id_cliente,$id_receptor, $id_paquete, '$direccion_entrega', '$direccion_envio', '$descripcion', $ruta, $asignacion, $piloto, $vehiculo,0, 'U', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		unset($_SESSION['idcliente']);
		unset($_SESSION['idreceptor']);
		unset($_SESSION['idpiloto']);
		unset($_SESSION['idvehiculo']);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/estados.php" </script>';
	}

	public function Actualizar2($id,$codigo_envio,$fecha_envio, $fecha_entrega,$id_cliente, $id_receptor,$id_paquete,$direccion_entrega, $direccion_envio,$descripcion,$ruta,$asignacion,$piloto, $vehiculo,$plataforma)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta= "call actualizar_envio($id, '$codigo_envio', '$fecha_envio', '$fecha_entrega', $id_cliente,$id_receptor, $id_paquete, '$direccion_entrega', '$direccion_envio', '$descripcion', $ruta, $asignacion, $piloto, $vehiculo,$plataforma, 'U2', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		unset($_SESSION['idcliente']);
		unset($_SESSION['idreceptor']);
		unset($_SESSION['idpiloto']);
		unset($_SESSION['idvehiculo']);
		unset($_SESSION['idplataforma']);

		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/estados.php" </script>';
	}

}