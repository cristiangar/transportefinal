<?php 
ob_start();
include ('../configuracion/config.php');
class CajaSeca
{

	public function Ingresar($placa,$marca,$modelo,$ejes,$tamanio,$color,$economico,$caat,$pimagencaat,$tipo,$ruta_tarjeta,$flotilla)
	{
		$bd = new datos();
		$bd->conectar();

		$consulta= "call sp_caja_seca(0, '$placa', '$marca', $modelo, $ejes, '$tamanio', '$color', $economico, '$caat', '$pimagencaat', '$tipo', '$ruta_tarjeta', $flotilla, 'I', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/lista_caja.php" </script>';



	}

	public function Ver()
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_caja_seca(0, '0', '0', 0, 0, '0', '0', 0, '0', '0', '0', '0', 0, 'S', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}

	public function VerUno($id)
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_caja_seca($id, '0', '0', 0, 0, '0', '0', 0, '0', '0', '0', '0', 0, 'S1', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}
	public function Eliminar($id)
	{

		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_caja_seca($id, '0', '0', 0, 0, '0', '0', 0, '0', '0', '0', '0', 0, 'D', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/lista_caja.php" </script>';

	}

				

	public function Modificar($id,$placa,$marca,$modelo,$ejes,$tamanio,$color,$economico,$caat,$pimagencaat,$tipo,$ruta_tarjeta,$flotilla)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_caja_seca($id, '$placa', '$marca', $modelo, $ejes, '$tamanio', '$color', $economico, '$caat', '$pimagencaat', '$tipo', '$ruta_tarjeta', $flotilla, 'U', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/lista_caja.php" </script>';


	}

    public function VerFlotilla()
    {
        
		$db = new datos();
		$db->conectar();
		$consulta= "SELECT *FROM flotilla WHERE estado_eliminado=1;";
		$dt2= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt2;
    }

	
}

 ?>