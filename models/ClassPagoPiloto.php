<?php 
ob_start();
include ('../Configuracion/config.php');
class PagoPiloto
{

	public function Ingresar($id_pago,$boleta,$abono,$moneda)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_deposito($id_pago, '$boleta', $abono, $moneda, 'I', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/ListaPendienteDeposito.php" </script>';
	}

	public function Ver()
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_deposito(0, '0', 0, 0, 'S', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}
	public function VerUno($id)
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_envio(0,'0', '0', '0', $id, '0', 0, 0, 0, 0, 0, 0, 0, 'S2', @pn_respuesta);";
		$dt3= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}
	public function Eliminar($id)
	{

		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_cliente($id, '0', '0', '0', '0', '0', '0', '0', 'D', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/lista_clientes.php" </script>';

	}

				

		public function Modificar($id_pago_piloto,$id_envio,$adelanto,$pendiente,$renta_caja,$combustible)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_modificar_extra($id_pago_piloto, $id_envio, $adelanto, $pendiente, $renta_caja, $combustible, 'U', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>window.close(); opener.location.reload();</script>';
	}

	
}

 ?>