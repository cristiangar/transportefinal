<?php 
ob_start();
include ('../Configuracion/config.php');
class abonos
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
	public function IngresarAbono($id_pago_piloto,$descripcion,$abono,$moneda)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_pago_piloto($id_pago_piloto, '$descripcion', $abono, $moneda,0, 'I', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		?>
		<script language = javascript>
						alert("<?php echo $texto;?>")
						self.location="../views/detalle_abonos.php?id=<?php echo $id_pago_piloto;?>&moneda=<?php echo $moneda;?>" </script>
						<?php
	}

	public function Ver()
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_pago_piloto(0, '0', 0, 0, 0, 'S', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}
	public function VerUno($id)
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_pago_piloto($id, '0', 0, 0, 0, 'S1', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}
	public function Eliminar($id_abono,$id_tbl_pago_piloto)
	{

		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_pago_piloto($id_tbl_pago_piloto, '0', 0, 0, $id_abono, 'D', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/ListaPagoPilotos.php" </script>';

	}

				

		public function Modificar($id,$nombre,$telefono,$telefono2,$correo,$nit,$cuenta,$banco)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_cliente($id, '$nombre','$telefono', '$telefono2', '$correo', '$nit', '$cuenta', '$banco', 'U', @pn_respuesta);";
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

	
}

 ?>