<?php 
ob_start();
include ('../Configuracion/config.php');
class cliente
{

		public function Ingresarcliente($nombre,$telefono,$telefono2,$correo,$nit,$cuenta,$banco)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_cliente(0, '$nombre', '$telefono', '$telefono2', '$correo', '$nit', '$cuenta', '$banco', 'I', @pn_respuesta);";
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

		public function Verclientes()
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_cliente(0, '0', '0', '0', '0', '0', '0', '0', 'S', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}
			public function VerUnCliente($id)
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_cliente($id, '0', '0', '0', '0', '0', '0', '0', 'S1', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
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

				

		public function ModificarCliente($id,$nombre,$telefono,$telefono2,$correo,$nit,$cuenta,$banco)
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