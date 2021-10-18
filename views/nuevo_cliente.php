<?php
session_start();
if(isset($_SESSION['usuario']))
{
    $rol=$_SESSION['rol'];
    $us=$_SESSION['usuario'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Cliente</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/imagen.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
    <a href="ViewAdministrador.php">
        <img src="../imagenes/logo.png" alt="Transporte" style="width:52px;height:52px;">
    </a>
    <ul class="navbar-nav ml-auto">
        <li class="navbar-item">
            <a class="nav-link" >Nuevo Cliente</a>
        </li>
        <li class="navbar-item">
            <a class="nav-link" ><?php echo $us;?></a>
        </li>
        <li class="navbar-item">
            <a class="nav-link" href="../index.php">Cerrar sesión</a>
        </li>
        
    </ul>

</nav>
<script>
                   function Card(event, el){//Validar nombre

                        //Obteniendo posicion del cursor 
                        var val = el.value;//Valor de la caja de texto
                        var pos = val.slice(0, el.selectionStart).length;
                        
                        var out = '';//Salida
                        var filtro = '1234567890';
                        var v = 0;//Contador de caracteres validos
                        
                        //Filtar solo los numeros
                        for (var i=0; i<val.length; i++){
                           if (filtro.indexOf(val.charAt(i)) != -1){
                               v++;
                               out += val.charAt(i);
                               
                               //Agregando un espacio cada 4 caracteres
                               if((v==3) || (v==7))
                                   out+='-';
                           }
                        }
                        
                        //Reemplazando el valor
                        el.value = out;
                        
                        //En caso de modificar un numero reposicionar el cursor
                        if(event.keyCode==8){//Tecla borrar precionada
                            el.selectionStart = pos;
                            el.selectionEnd = pos;
                        }
                    } 
            </script>
<div class="container-fluid">
<?php
if(isset($_GET['id'])){
     $id= $_GET['id'];
    //busco los datos para acatualizar
    include_once("../models/ClassCliente.php");
    $cliente=new cliente();
    $dt=$cliente->VerUnCliente($id);

    while ($row=mysqli_fetch_array($dt)) {
            $id=$row['id_clientes'];
            $nombre=$row['empresa'];
            $telefono=$row['telefono_1'];
            $telefono2=$row['telefono_2'];
            $correo=$row['correo'];
            $nit=$row['nit'];
            $nocuenta=$row['contacto_1'];
            $nombre_cuenta=$row['contacto_2'];
        }

        ?>
        <form method="POST" action="../controller/cliente.php?id=<?php echo $id?>">
    <br>
    <br>
        <h1>Datos del Cliente a modificar</h1>
        <br>
        <div class="form-row">
            <div class="col-sm-4">
            <label>Empresa</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="<?php echo $nombre?>" require>
            </div>
            
            <div class="col-sm-4">
            <label>Teléfono 1</label>
            <input type="tel" name="telefono" class="form-control" placeholder="solo números"   onkeyup="Card(event, this)" maxlength="13" value="<?php echo  $telefono?>" require>


            </div>
            <div class="col-sm-4">
            <label>Teléfono 2</label>
                <input type="tel" name="telefono2" class="form-control" placeholder="solo números"   onkeyup="Card(event, this)" maxlength="13" value="<?php echo  $telefono2?>" require>
            </div>
            <div class="col-sm-4">
            <label>Correo electronico</label>
                <input type="email" name="correo" class="form-control" placeholder="Nombre del banco" value="<?php echo $correo?>">
            </div>
            <div class="col-sm-4">
            <label>Nit</label>
                <input type="text" name="nit" value='C/F' class="form-control" placeholder="Nit" value="<?php echo $nit?>"require>
            </div>

            <div class="col-sm-4">
            <label>Contacto 1</label>
                <input type="tex" name="cuenta" class="form-control" placeholder="Número de cuenta" value="<?php echo $nocuenta?>" require>
                <!--<input type="tel" name="cuenta" class="form-control" pattern="[0-9]{2,15}" placeholder="Número de cuenta" value="<?php /*echo*/ $nocuenta?>" require>-->
            </div>

            <div class="col-sm-4">
            <label>Conctacto 2</label>
                <input type="text" name="banco" class="form-control" placeholder="Nombre del banco" value = "<?php echo $nombre_cuenta?>" require>
            </div>

                
        </div>  
        <br>
        
        </div>
            <div class="container-fluid col-sm-5">
                <br>
                <br>
            <center>
                <input type="submit" class="btn btn-success" value="Aceptar">
                <a href="clientes.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
                <input type="reset" class="btn btn-danger" value="cancelar">
                
            </center>
        </div>
    </form>

        <?php


}
else
{
    ?>
    <form method="POST" action="../controller/cliente.php" enctype="multipart/form-data">
    <br>
    <br>
        <h1>Datos del Cliente</h1>
        <br>
        <div class="form-row">
            <div class="col-sm-4">
            <label>Empresa</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" require>
            </div>
            
            <div class="col-sm-4">
            <label>Teléfono 1</label>
                <input type="text" name="telefono" class="form-control" placeholder="solo números"   onkeyup="Card(event, this)" maxlength="13"  value="N/A" require>
            </div>
            <div class="col-sm-4">
            <label>Teléfono 2</label>
                <input type="tel" name="telefono2" class="form-control" placeholder="solo números"   onkeyup="Card(event, this)" maxlength="13"  value="N/A" require>
            </div>
            <div class="col-sm-4">
            <label>Correo electronico</label>
                <input type="email" name="correo" class="form-control" placeholder="nombre@correo.com">
            </div>
            <div class="col-sm-4">
            <label>Nit</label>
                <input type="text" name="nit" value='C/F' class="form-control" placeholder="Nit" require>
            </div>

            <div class="col-sm-4">
            <label>Contacto 1</label>
                <input type="text" name="cuenta" value='N/A' class="form-control" placeholder="Nombre del contacto 1" require>
            </div>

            <div class="col-sm-4">
            <label>Contacto 2</label>
                <input type="text" name="banco" class="form-control" placeholder="Nombre del contacto 2" value="N/A" require>
            </div>

                
        </div>  
        <br>
        
        </div>
            <div class="container-fluid col-sm-5">
                <br>
                <br>
            <center>
                <input type="submit" class="btn btn-success" value="Aceptar">
                <a href="lista_clientes.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
                <input type="reset" class="btn btn-danger" value="cancelar">
                
            </center>
        </div>
    </form>
    <?php
}
?>
</div>
<script src="main.js"></script>
</body>
</html>
<?php
}

else{/**else de la session */
    header("location: ../Index.php");
}/**ses */
?>