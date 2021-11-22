<?php 
ob_start();
include ('../configuracion/config.php');
class empleado
{

	public function Ingresar($rol,$nombre,$apellido,$cui,$telefono,$correo)
	{
		$bd = new datos();
		$bd->conectar();

		$consulta= "call sp_empleados(0, $rol, '$nombre', '$apellido', $cui, '$telefono', '$correo', 'I', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/lista_empleados.php" </script>';



	}

	public function Ver()
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_empleados(0, 0, '0', '0', 0, '0', '0', 'S', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}
	public function VerUno($id)
	{

		$db = new datos();
		$db->conectar();
		$consulta= "call sp_empleados($id, 0, '0', '0', 0, '0', '0', 'S1', @pn_respuesta);";
		$dt= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt;

	}
	public function Eliminar($id)
	{

		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_empleados($id, 0, '0', '0', 0, '0', '0', 'D', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/lista_empleados.php" </script>';

	}

				

	public function Modificar($id,$nombre,$apellido,$cui,$telefono,$correo)
	{
		$bd = new datos();
		$bd->conectar();
		$consulta= "call sp_empleados($id, 0, '$nombre', '$apellido', $cui, '$telefono', '$correo', 'U', @pn_respuesta);";
		$dt= mysqli_query($bd->objetoconexion,$consulta);

		$salida="SELECT @pn_respuesta";
		$consultar=mysqli_query($bd->objetoconexion,$salida);
		
		$bd->desconectar();

		$res=mysqli_fetch_array($consultar);
		//
		$texto=$res['@pn_respuesta'];
		echo'<script language = javascript>
						alert("'.$texto.'")
						self.location="../views/lista_empleados.php" </script>';


	}

    public function VerRol()
    {
        
		$db = new datos();
		$db->conectar();
		$consulta= "call sp_rol_usuario(0, '0', 'S2', @pn_respuesta);";
		$dt2= mysqli_query($db->objetoconexion,$consulta);
		$db->desconectar();
		return $dt2;
    }

	
}

 ?>