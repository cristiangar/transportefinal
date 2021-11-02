<?php 
ob_start();
include ('../Configuracion/config.php');
class Usuario
{

		public function Ingresarcliente($nombre,$apellido,$telefono,$telefono2,$correo,$nit,$cuenta,$banco)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta= "call trasportefinal.sp_cliente(0, '$nombre', '$apellido', '$telefono', '$telefono2', '$correo', '$nit', '$cuenta', '$banco', 'I', @pn_respuesta);";
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


	}

		public function VerUsuario()
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_usuario('0', 0, '0', '0', 0, 0, 'S', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}
			public function VerUnUsuario($id)
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_usuario('0', $id, '0', '0', 0, 0, 'S1', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}
				public function Eliminar($id)
	{

		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_cliente($id, '0', '0', '0', '0', '0', '0', '0', '0', 'D', @pn_respuesta);";
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

	}

				

		public function ModificarUsuario($id,$us,$pwd,$rol)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_usuario('654',$id,'$us','$pwd',$rol,1,'U', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/lista_usuarios_personal.php" </script>';


	}

    public function VerRol(){
        $db = new datos();
		$db->conectar();
		$consulta= "call sp_rol_usuario(0, '0', 'S', @pn_respuesta);";
		$dtr= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dtr;
    }
	
}

 ?>