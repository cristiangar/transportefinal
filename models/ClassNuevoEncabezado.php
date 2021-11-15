<?php 
ob_start();
session_start();
include ('../Configuracion/config.php');
class encabezado
{

    public function IngresarEncabezado2($total,$anticipo,$id_envio, $id_clienteenvio,$tipo_moneda)
    {
        $bd = new datos();
        $bd->conectar();
        $consulta= "call sp_encabezado(0, $id_clienteenvio, $id_envio, $anticipo, $total,$tipo_moneda, 'I', '1', @pn_respuesta);";
        $dt= mysqli_query($bd->objetoconexion,$consulta);

        $salida="SELECT @pn_respuesta";
        $consultar=mysqli_query($bd->objetoconexion,$salida);
        
        $bd->desconectar();

        $res=mysqli_fetch_array($consultar);

        unset($_SESSION['id_clienteenvio']);
        unset($_SESSION['id_envio']);
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
        $consulta= " select a.id_encabezado, a.total, d.saldo,a.fecha, a.estado_factura, a.id_cliente, concat(c.nombre,' ',c.apellido) as cliente, a.id_envio, e.codigo_envio,a.id_tipo_moneda 
            from encabezado as a 
            inner join cxc as d on a.id_encabezado=d.id_encabezado
            inner join clientes as c on a.id_cliente=c.id_cliente
            inner join solicitud_envio as e on a.id_envio=e.id_envio
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

                public function Eliminar($id)
    {

        $bd = new datos();
        $bd->conectar();
        $consulta= "call sp_encabezado($id, 0, 0, 0, 0, 0, 'D', '0', @pn_respuesta);";
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