<?php 
ob_start();
include ('../Configuracion/config.php');
class cuenta
{

		public function IngresarAbono($cantidad,$id)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_abonos_cxc(0, $cantidad, $id, 'I', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/lista_cuentas_por_cobrar.php" </script>';


	}

		public function VerCuentas()
	{

		$db = new datos();
		$db->conectar();
		$consulta= "select a.id_cuentas_por_cobrar,a.fecha,a.id_tipo_moneda,e.tipo,a.total,a.pendiente,a.estado_cuenta,b.id_envio,b.codigo_envio,c.empresa,
c.id_clientes,d.id_encabezado,d.estado_factura
from cuentas_por_cobrar as a 
inner join tipo_moneda as e on a.id_tipo_moneda=e.id_tipo_moneda
inner join envio as b on a.id_envio=b.id_envio 
inner join clientes as c on b.id_clientes=c.id_clientes
inner join encabezado as d on b.id_envio=d.envio_id_envio where a.estado_eliminado=1 and d.estado_eliminado=1;";
    		/*and a.estado_factura='Pendiente'*/
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}
			public function VerUnaCuenta($id)/*SIN USAR*/
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_abonos(0, 0, $id, 'S2', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}

			public function VerUnCliente($id)
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_abonos_cxc(0, 0, $id, 'S2', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}

				public function Eliminar($id,$cxc)
	{

		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_abonos_cxc($id, 0, $cxc, 'D', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();


		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];

		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/lista_cuentas_por_cobrar.php" </script>';   

	}

				

	/*	public function ModificarCuenta($id,$nombre,$apellido,$telefono,$telefono2,$correo,$nit,$cuenta,$banco)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_cliente($id, '$nombre', '$apellido', '$telefono', '$telefono2', '$correo', '$nit', '$cuenta', '$banco', 'U', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/clientes.php" </script>';


	}*/

	
}

 ?>