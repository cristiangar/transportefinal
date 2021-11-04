<?php 
ob_start();
include ('../Configuracion/config.php');
class encabezado
{

        public function IngresarEncabezado($cantidad,$id,$descripcion)
    {
        $bd = new datos();
        $bd->conectar();
        $consulta= "call sp_detalle(0, '$descripcion', $cantidad, $id, 'I', @pn_respuesta);";
        $dt= mysqli_query($bd->objetoconexion,$consulta);

        $salida="SELECT @pn_respuesta";
        $consultar=mysqli_query($bd->objetoconexion,$salida);
        
        $bd->desconectar();

        $res=mysqli_fetch_array($consultar);
        //
        $texto=$res['@pn_respuesta'];
        echo'<script language = javascript>
                        alert("'.$texto.'")
                        self.location="../views/encabezado.php" </script>';


    }

        public function VerEncabezado()
    {

        $db = new datos();
        $db->conectar();
        $consulta= " select a.id_encabezado,a.total,a.fecha,a.estado_factura,a.envio_id_envio,b.codigo_envio,b.estado_envio,c.id_clientes,c.empresa as cliente, d.total,d.pendiente,d.estado_cuenta from envio as b inner join encabezado as a on b.id_envio=a.envio_id_envio inner join cuentas_por_cobrar as d on b.id_envio=d.id_envio inner join clientes as c on b.id_clientes=c.id_clientes
            where a.estado_eliminado=1;";
            /*and a.estado_factura='Pendiente'*/
        $dt= mysqli_query($db->objetoconexion,$consulta);
        $db->desconectar();
        return $dt;

    }
            public function VerUnDetalle($id)
    {

        $db = new datos();
        $db->conectar();
        $consulta= "call sp_detalle($id, '0', 0, 0, 'S1', @pn_respuesta);";
        $dt= mysqli_query($db->objetoconexion,$consulta);
        $db->desconectar();
        return $dt;

    }

            public function VerDetalles($id)
    {

        $db = new datos();
        $db->conectar();
        $consulta= "call sp_detalle(0, '0', 0, $id, 'S2', @pn_respuesta);";
        $dt= mysqli_query($db->objetoconexion,$consulta);
        $db->desconectar();
        return $dt;

    }

                public function Eliminar($id,$ide)
    {

        $bd = new datos();
        $bd->conectar();
        $consulta= "call sp_detalle($id, '0', 0, $ide, 'D', @pn_respuesta);";
        $dt= mysqli_query($bd->objetoconexion,$consulta);

        $salida="SELECT @pn_respuesta";
        $consultar=mysqli_query($bd->objetoconexion,$salida);
        
        $bd->desconectar();


        $res=mysqli_fetch_array($consultar);
        //
        $texto=$res['@pn_respuesta'];

        echo'<script language = javascript>
                        alert("'.$texto.'")
                        self.location="../views/encabezado.php" </script>';   

    }

                

        public function ModificarDetalle($id,$id2,$descripcion,$subtotal)
    {
        $bd = new datos();
        $bd->conectar();
        $consulta= "call sp_detalle($id2, '$descripcion', $subtotal, $id, 'U', @pn_respuesta);";
        $dt= mysqli_query($bd->objetoconexion,$consulta);

        $salida="SELECT @pn_respuesta";
        $consultar=mysqli_query($bd->objetoconexion,$salida);
        
        $bd->desconectar();

        $res=mysqli_fetch_array($consultar);
        //
        $texto=$res['@pn_respuesta'];
        echo'<script language = javascript>
                        alert("'.$texto.'")
                        self.location="../views/encabezado.php" </script>';


    }

    
}

 ?>