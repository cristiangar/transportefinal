<?php
ob_start();
session_start();
include ('../../Configuracion/config.php');
class login
{
	public function Ver($us,$pas)
	{
		$db = new datos();
		$db->conectar();
		$consulta= "call sp_login('$us', '$pas', @pn_rol, @pn_id, @pn_usuario);";
		$dt= mysqli_query($db->objetoconexion,$consulta);

        $salida="SELECT @pn_usuario";
        $consultar=mysqli_query($db->objetoconexion,$salida);

        $salida2="SELECT @pn_rol";
        $consultar2=mysqli_query($db->objetoconexion,$salida2);

        $salida3="SELECT @pn_id";
        $consultar3=mysqli_query($db->objetoconexion,$salida3);
		$db->desconectar();

        $res=mysqli_fetch_array($consultar);
        $texto=$res['@pn_usuario'];
        $_SESSION['usuario']=$texto;
        
        $res2=mysqli_fetch_array($consultar2);
        $texto2=$res2['@pn_rol'];
        $_SESSION['rol']=$texto2;
        

        $res3=mysqli_fetch_array($consultar3);
        $texto3=$res3['@pn_id'];
        $_SESSION['idusuario']=$texto3;
        
        if($texto=="ERROR")
        {
         header("Location: ../../Index.php?error");
         unset($_SESSION['usuario']);
         unset($_SESSION['rol']);
         unset($_SESSION['idusuario']);
         
        }
        else{
           header("Location: ../../views/ViewAdministrador.php");
            $una= $_SESSION['rol'];
        }

	}	
}
?>