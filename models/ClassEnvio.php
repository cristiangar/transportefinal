<?php 
ob_start();
session_start();
include ('../configuracion/config.php');
class envio
{

	public function Ingresar($referencia1,$referencia2,$descripcion,$codigo_envio,$ruta,$cliente,$vehiculo,$caja,$piloto,$usuario,$receptor)
	{
		$bd = new datos();
		$bd->conectar();

		$consulta= "call sp_envio('$referencia1','$referencia2','$descripcion',0,'$codigo_envio',$ruta,$cliente,$vehiculo,$caja,$piloto,$usuario,$receptor, 'I', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		if($caja=='0'){
			unset($_SESSION['idcliente']);
			unset($_SESSION['idreceptor']);
			unset($_SESSION['idpiloto']);
			unset($_SESSION['idvehiculo']);
		}
		else{
			unset($_SESSION['idcliente']);
			unset($_SESSION['idreceptor']);
			unset($_SESSION['idpiloto']);
			unset($_SESSION['idvehiculo']);
			unset($_SESSION['idplataforma']);
		}
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/listaviajes.php" </script>';
						



	}

	public function Ver()
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_envio('0', '0', '0', 0, '0', 0, 0, 0, 0, 0, 0, 0, 'S', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}

	public function VerUno($id)
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_envio('0', '0', '0', $id, '0', 0, 0, 0, 0, 0, 0, 0, 'S1', @pn_respuesta);";
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
    
	public function VerRuta()
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_rutas(0, '0', '0', '0', 'S2', @pn_respuesta);";
		$dt2= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt2;

	}
}

 ?>