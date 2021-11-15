<?php 
ob_start();
include ('../Configuracion/config.php');
class encabezado
{

        public function IngresarEncabezado($cantidad,$id,$descripcion,$id_moneda)
    {
        $bd = new datos();
        $bd->conectar();
        $consulta= "call sp_detalle(0, '$descripcion', $cantidad, $id,$id_moneda, 'I', @pn_respuesta);";
        $dt= mysqli_query($bd->objetoconexion,$consulta);

        $salida="SELECT @pn_respuesta";
        $consultar=mysqli_query($bd->objetoconexion,$salida);
        
        $bd->desconectar();

        $res=mysqli_fetch_array($consultar);
        //
        $texto=$res['@pn_respuesta'];
        echo'<script language = javascript>
                        alert("'.$texto.'")
                        self.location="../views/lista_encabezados.php" </script>';


    }

        public function VerEncabezado()
    {

        $db = new datos();
        $db->conectar();
        $consulta= "select a.id_encabezado,a.total,a.id_tipo_moneda,t.tipo,a.fecha,a.estado_factura,a.envio_id_envio,b.codigo_envio,b.estado_envio,c.id_clientes,c.empresa as cliente, 
    d.total,d.pendiente,d.estado_cuenta 
    from envio as b inner join encabezado as a on b.id_envio=a.envio_id_envio 
    inner join cuentas_por_cobrar as d on b.id_envio=d.id_envio 
    inner join clientes as c on b.id_clientes=c.id_clientes
    inner join tipo_moneda as t on a.id_tipo_moneda=t.id_tipo_moneda
    where a.estado_eliminado=1 and d.estado_eliminado=1; ";
            /*and a.estado_factura='Pendiente'*/
        $dt= mysqli_query($db->objetoconexion,$consulta);
        $db->desconectar();
        return $dt;

    }
            public function VerUnDetalle($id)
    {

        $db = new datos();
        $db->conectar();
        $consulta= "call sp_detalle($id, '0', 0, 0, 0, 'S1', @pn_respuesta);";
        $dt= mysqli_query($db->objetoconexion,$consulta);
        $db->desconectar();
        return $dt;

    }

            public function VerDetalles($id)
    {

        $db = new datos();
        $db->conectar();
        $consulta= "call sp_detalle(0, '0', 0, $id, 0, 'S2', @pn_respuesta);";
        $dt= mysqli_query($db->objetoconexion,$consulta);
        $db->desconectar();
        return $dt;

    }

                public function Eliminar($id,$ide)
    {

        $bd = new datos();
        $bd->conectar();
        $consulta= "call sp_detalle($id, '0', 0, $ide, 0, 'D', @pn_respuesta);";
        $dt= mysqli_query($bd->objetoconexion,$consulta);

        $salida="SELECT @pn_respuesta";
        $consultar=mysqli_query($bd->objetoconexion,$salida);
        
        $bd->desconectar();


        $res=mysqli_fetch_array($consultar);
        //
        $texto=$res['@pn_respuesta'];

        echo'<script language = javascript>
                        alert("'.$texto.'")
                        self.location="../views/lista_encabezados.php" </script>';   

    }

                

        public function ModificarDetalle($id,$id2,$descripcion,$subtotal,$id_moneda)
    {
        $bd = new datos();
        $bd->conectar();
        $consulta= "call sp_detalle($id2, '$descripcion', $subtotal, $id,$id_moneda, 'U', @pn_respuesta);";
        $dt= mysqli_query($bd->objetoconexion,$consulta);

        $salida="SELECT @pn_respuesta";
        $consultar=mysqli_query($bd->objetoconexion,$salida);
        
        $bd->desconectar();

        $res=mysqli_fetch_array($consultar);
        //
        $texto=$res['@pn_respuesta'];
        echo'<script language = javascript>
                        alert("'.$texto.'")
                        self.location="../views/lista_encabezados.php" </script>';


    }

    
}

 ?>