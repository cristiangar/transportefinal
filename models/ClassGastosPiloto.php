<?php 
ob_start();
include ('../configuracion/config.php');
class GastoPiloto
{

	public function Ingresar($descripcion,$ruta_pasaporte,$precio,$id_envio,$id_moneda,$idn)
	{
		$bd = new datos();
		$bd->conectar();

		$consulta= "call sp_gastos_piloto(0, '$descripcion', '$ruta_pasaporte', $precio, '0', $id_envio, $id_moneda, 'I', @pn_respuesta);";
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
				self.location="../Pilos/listaviajes.php?id=<?php echo $idn;?>&ver" 
        </script>
        <?php



	}

	public function Ver($id)
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_gastos_piloto(0, '0', '0', 0, '0', $id, 0, 'S', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}

    public function VerMoneda()
	{
		$db = new datos();
		$db->conectar();
		$consulta= "call sp_tipo_moneda(0, '0', 0, 'S', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;
	}
	public function Eliminar($id,$idenvio)
	{

		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_gastos_piloto($id, '0', '0', 0, '0', 0, 0, 'D', @pn_respuesta);";
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
				self.location="../Pilos/lista_gastos.php?id_envio=<?php echo $idenvio;?>" 
        </script>
        <?php

	}

				

	public function Modificar($id_gasto,$id_envio)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_gastos_piloto($id_gasto, '0', '0', 0, '0', 0, 0, 'D2', @pn_respuesta);";
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
						self.location="../Pilos/lista_gastos.php?id_envio=<?php echo $id_envio;?>" 
		</script>
		<?php
	}
	public function pagar_todo($id_gasto,$id_envio)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_gastos_piloto($id_gasto, '0', '0', 0, '0', 0, 0, 'D2', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
	}

	
}

 ?>