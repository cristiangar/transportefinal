<?php 
ob_start();
session_start();
include ('../configuracion/config.php');
class Autorizar
{

	public function Ingresar($idenvio, $renta_caja, $combustible, $adelanto, $pendiente, $total, $id_moneda, $id_piloto, $id_vehiculo, $id_caja)
	{
		$bd = new datos();
		$bd->conectar();

		$consulta= "call sp_autorizar($idenvio, $renta_caja, $combustible, $adelanto, $pendiente, $total, $id_moneda, $id_piloto, $id_vehiculo, $id_caja, 'I', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/listaviajesnoautorizados.php" </script>';



	}

	public function Ver()
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_autorizar(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'S', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}

	public function VerUno($id)
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_autorizar($id, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'S1', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}
	public function Eliminar($id)
	{

		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_envio(0, '0', '0', '0', $id, '0', 0, 0, 0, 0, 0, 0, 0, 'D', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/listaviajes.php" </script>';

	}

				

	public function Modificar($id, $id_paquete, $codigo_envio, $cliente, $receptor, $referencia1, $referencia2,$descripcion, $ruta, $vehiculo, $caja, $retiro_caja, $piloto)
	{
		$bd = new datos();
		$bd->conectar();
		if($retiro_caja==0){
			$consulta= "call sp_actualizar_envio($id, $id_paquete, '$codigo_envio', $cliente, $receptor, '$referencia1', '$referencia2','$descripcion', $ruta, $vehiculo, $caja, $retiro_caja, $piloto, 'U', @pn_respuesta);";
			// echo "cambia de cabezal a camion ";
		}
		else{
			if($retiro_caja==1)
			{
				//echo "cambia solo camiones";
				$consulta= "call sp_actualizar_envio($id, $id_paquete, '$codigo_envio', $cliente, $receptor, '$referencia1', '$referencia2','$descripcion', $ruta, $vehiculo, $caja, $retiro_caja, $piloto, 'U2', @pn_respuesta);";
			}
			else
			{
				//echo "cambi todo para cabezal y plataforma";
				$consulta= "call sp_actualizar_envio($id, $id_paquete, '$codigo_envio', $cliente, $receptor, '$referencia1', '$referencia2','$descripcion', $ruta, $vehiculo, $caja, $retiro_caja, $piloto, 'U3', @pn_respuesta);";	
			}
			
		}
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
	
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/listaviajes.php" </script>';


	}	
    
	public function VerMoneda()
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_tipo_moneda(0, '0', 0, 'S', @pn_respuesta);";
		$dt2= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt2;

	}
}

 ?>