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
    <title>Nuevo Vehiculo</title>
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
    <a href="../views/ViewAdministrador.php">
        <img src="../imagenes/logo.png" alt="HTML tutorial" style="width:52px;height:52px;">
    </a>
    <ul class="navbar-nav ml-auto">
        <li class="navbar-item">
            <a class="nav-link" >Nuevo Vehiculo</a>
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
                        var filtro = 'ABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890';
                        var v = 0;//Contador de caracteres validos
                        
                        //Filtar solo los numeros
                        for (var i=0; i<val.length; i++){
                           if (filtro.indexOf(val.charAt(i)) != -1){
                               v++;
                               out += val.charAt(i);
                               
                               //Agregando un espacio cada 4 caracteres
                               if((v==2) || (v==9))
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
            if(isset($_GET['id']))/** formulario de  a modificar */
            {
                $id_vehiculo_mantenimiento=$_GET['id'];
                include_once('../controller/vehiculos_mantenimiento.php');
                $vehiculo=new vehiculomantenimiento();
                $detalle=$vehiculo->VerUno($id);
                while($row=mysqli_fetch_array($detalle)){
                    $id_vehiculo=$row['id_vehiculos_2'];
                    $tipo=$row['tipo'];
                    $placa=$row['no_placa'];
                    $modelo=$row['modelo'];
                    $marca=$row['marca'];
                    }   
                ?>
                    <form method="POST" action="../controller/vehiculos_mantenimiento.php?id=<?php echo $id;?>&mod" enctype="multipart/form-data">
                        <h1>Datos del Vehiculo para modificar</h1>
                        <br>
                            <div class="form-row">

                                <div class="col-sm-4">
                                <label>Placa</label>
                                        <input value="<?php echo $placa?>"  name='pplaca' type="text" class="form-control" placeholder="Número de placa" onkeyup="Card(event, this)" maxlength="9" require>
                                </div>

                                <div class="col-sm-4">
                                    <label>Marca</label>
                                        <input value="<?php echo $marca?>"  name='pmarca' type="text" class="form-control" placeholder="marca del equipo" require>
                                </div>

                               
                                <div class="col-sm-4">
                                    <label>Modelo</label>
                                        <input value="<?php echo $modelo?>"  name='pmodelo' type="text" class="form-control" placeholder="Modelo del equipo" require>
                                </div>

                                <br>
                                
                                <div class="col-sm-4">
                                    <label>Tipo de Vehiculo / Remolque</label>
                                        <select name="ptipo" id=""class="form-control">
                                    <option value="<?php echo $tipo ?>"><?php echo $tipo ?></option>
                                    <option value="Camion">Camion</option>
                                    <option value="Cabezal">Cabezal</option>
                                    <option value="Plataforma">Plataforma</option>
                                    <option value="Cisterna">Cisterna</option>
                                    <option value="Caja refrigerada">Caja refrigerada</option>
                                    <option value="Caja seca">Caja seca</option>
                                    <option value="Low Body">Low Body</option>
                                    <option value="Cama baja">Cama baja</option>
                                        </select>
                                </div>
                            
                        </div>

                            <div class="container-fluid wrapper fadeInDown col-sm-5">
                                <br>
                                <br>
                                <center>
                                    <input type="submit" class="btn btn-success" value="Aceptar">
                                    <a href="lista_vehiculos.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
                                    <input type="reset" class="btn btn-danger" value="cancelar">
                                    
                                </center>
                            </div>
                    </form>
                <?php

            }
            else{/* formulario de nuevo  */
                ?>
            <form method="POST" action="../controller/vehiculos_mantenimiento.php" enctype="multipart/form-data">
            <h1>Datos de Vehiculo</h1>
            <br>
                <div class="form-row">

                        <div class="col-sm-4">
                            <label>Placa</label>
                                <input  name='pplaca' type="text" class="form-control" placeholder="Número de placa" onkeyup="Card(event, this)" maxlength="9" require>
                        </div>

                        <div class="col-sm-4">
                            <label>Marca</label>
                            <input value="N/A" name='pmarca' type="text" class="form-control" placeholder="Marca" require>
                        </div>
                        <br>
                        <div class="col-sm-4">
                            <label>Modelo</label>
                                <input value="N/A" name='pmodelo' type="text" class="form-control" placeholder="Modelo" require>
                        </div>

                        
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="col-sm-4">
                            <label>Tipo de Vehiculo / Remolque</label>
                                <select name="ptipo" id=""class="form-control">
                                    <option value="Camion">Camion</option>
                                    <option value="Cabezal">Cabezal</option>
                                    <option value="Plataforma">Plataforma</option>
                                    <option value="Cisterna">Cisterna</option>
                                    <option value="Caja refrigerada">Caja refrigerada</option>
                                    <option value="Caja seca">Caja seca</option>
                                    <option value="Low Body">Low Body</option>
                                    <option value="Cama baja">Cama baja</option>
                                </select>
                        </div>
                    

                </div>

                    <div class="container-fluid wrapper fadeInDown col-sm-5">
                        <br>
                        <br>
                        <center>
                            <input type="submit" class="btn btn-success" value="Aceptar">
                            <a href="lista_vehiculos.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
                            <input type="submit" class="btn btn-danger" value="cancelar">
                            
                        </center>
                    </div>
            </form>
                <?php
            }
        
    ?>    
    </div>


</div>
</body>
</html>
<?php
}

else{/**else de la session */
    header("location: ../Index.php");
}/**ses */
?>