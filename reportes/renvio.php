<?php 
include_once("plantilla.php");
include_once("../controller/reportes.php");
$id=$_GET['id'];
 while($row=mysqli_fetch_array($dt)){
        $codigo_envio=$row['codigo_envio'];
        $cliente=$row['empresa'];
        $cliente_tel1=$row['telefono_1'];
        $cliente_tel2=$row['telefono_2'];
        $piloto=$row['nombre_piloto'];
        $licencia=$row['no_licencia'];
        $pasaporte=$row['no_pasaporte'];
        $cui=$row['cui'];
        $piloto_telefono=$row['telefono'];
        $piloto_wp=$row['whatsapp'];
        /*vehiculo*/
        $vehiculo=$row['tipo_vehiculo'];
        $marca=$row['marca'];
        $modelo=$row['modelo'];
        $color=$row['color'];
        $placa=$row['no_placa'];
        $caat=$row['numero_caat'];
        $ejes=$row['ejes'];
   if(($vehiculo=="Cabezal") or ($vehiculo=="cabezal") or ($vehiculo=='CABEZAL'))
    {
        $tipo_remolque=$row['tipo_remolque'];
        $marca_remolque=$row['marcaremolque'];
        $modelo_remolque=$row['modeloremolque'];
        $color_remolque=$row['colorplataforma'];
        $placa_remolque=$row['placaremolque'];
        $eje_remolque=$row['ejeremolque'];
        $tamanio_remolque=$row['tamaño'];
        $numero_economico=$row['numero_economico'];
        $caat_remolque=$row['caatremolque'];

    }
 }
$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->MultiCell(75,10,'Datos del envio',0,'C',1);
$pdf->SetFont('Arial','B',12);
$pdf->cell(40,10,'CODIGO DE ENVIO:',0,1,'L');
$pdf->cell(40,10,'CLIENTE:',0,1,'L');
$pdf->cell(40,10,'TELEFONO CLIENTE',0,1,'L');
$pdf->cell(40,10,'OPERADOR:',0,1,'L');
$pdf->cell(40,10,'LICENCIA:',0,1,'L');
$pdf->cell(40,10,'PASAPORTE:',0,1,'L');
$pdf->cell(40,10,'DPI:',0,1,'L');
$pdf->cell(40,10,'TELEFONO OPERADOR:',0,1,'L');
$pdf->cell(40,10,'WHATSAPP OPERADOR:',0,1,'L');
$pdf->cell(40,10,'TRANSPORTE',0,1,'L');

$pdf->SetFont('Arial','',12);
$pdf->Sety(50);
$pdf->SetX(71);
$pdf->cell(40,10,utf8_decode($codigo_envio),0,1,'L');
$pdf->Sety(60);
$pdf->SetX(71);
$pdf->cell(40,10,utf8_decode($cliente),0,1,'L');
$pdf->Sety(70);
$pdf->SetX(71);
$pdf->cell(40,10,utf8_decode($cliente_tel1." ".$cliente_tel2),0,1,'L');
$pdf->Sety(80);
$pdf->SetX(71);
$pdf->cell(40,10,utf8_decode($piloto),0,1,'L');
$pdf->Sety(90);
$pdf->SetX(71);
$pdf->cell(40,10,utf8_decode($licencia),0,1,'L');
$pdf->Sety(100);
$pdf->SetX(71);
$pdf->cell(40,10,utf8_decode($pasaporte),0,1,'L');
$pdf->Sety(110);
$pdf->SetX(71);
$pdf->cell(40,10,utf8_decode($cui),0,1,'L');
$pdf->Sety(120);
$pdf->SetX(71);
$pdf->cell(40,10,utf8_decode($piloto_telefono),0,1,'L');
$pdf->Sety(130);
$pdf->SetX(71);
$pdf->cell(40,10,utf8_decode($piloto_wp),0,1,'L');
$pdf->Sety(140);
$pdf->SetX(71);
$pdf->cell(40,10,utf8_decode("Transportes Hidalgo"),0,1,'L');

$pdf->Sety(150);
$pdf->SetX(10);
$pdf->SetFont('Arial','B',12);
$pdf->MultiCell(80,10,'Datos del vehiculo',0,'C',1);
$pdf->Sety(160);
$pdf->SetX(10);
$pdf->cell(40,10,'VEHICULO:',0,1,'L');
$pdf->Sety(170);
$pdf->SetX(10);
$pdf->cell(40,10,'MARCA:',0,1,'L');
$pdf->Sety(180);
$pdf->SetX(10);
$pdf->cell(40,10,'MODELO:',0,1,'L');
$pdf->Sety(190);
$pdf->SetX(10);
$pdf->cell(40,10,'COLOR:',0,1,'L');
$pdf->Sety(200);
$pdf->SetX(10);
$pdf->cell(40,10,'NO. PLACA:',0,1,'L');
$pdf->Sety(210);
$pdf->SetX(10);
$pdf->cell(40,10,'CODIGO CAAT:',0,1,'L');
$pdf->Sety(220);
$pdf->SetX(10);
$pdf->cell(40,10,'EJES:',0,1,'L');
$pdf->SetFont('Arial','',12);
$pdf->Sety(160);
$pdf->SetX(71);
$pdf->cell(40,10,utf8_decode($vehiculo),0,1,'L');
$pdf->Sety(170);
$pdf->SetX(71);
$pdf->cell(40,10,utf8_decode($marca),0,1,'L');
$pdf->Sety(180);
$pdf->SetX(71);
$pdf->cell(40,10,utf8_decode($modelo),0,1,'L');
$pdf->Sety(190);
$pdf->SetX(71);
$pdf->cell(40,10,utf8_decode($color),0,1,'L');
$pdf->Sety(200);
$pdf->SetX(71);
$pdf->cell(40,10,utf8_decode($placa),0,1,'L');
$pdf->Sety(210);
$pdf->SetX(71);
$pdf->cell(40,10,utf8_decode($caat),0,1,'L');
$pdf->Sety(220);
$pdf->SetX(71);
$pdf->cell(40,10,utf8_decode($ejes),0,1,'L');
if(($vehiculo=="Cabezal") or ($vehiculo=="cabezal") or ($vehiculo=='CABEZAL'))
{
    $pdf->Sety(150);
    $pdf->SetX(100);
    $pdf->SetFont('Arial','B',12);
    $pdf->MultiCell(80,10,'Datos del furgon',0,'C',1);
    $pdf->Sety(160);
    $pdf->SetX(100);
    $pdf->cell(40,10,'TIPO:',0,1,'L');
    $pdf->Sety(170);
    $pdf->SetX(100);
    $pdf->cell(40,10,'MARCA:',0,1,'L');
    $pdf->Sety(180);
    $pdf->SetX(100);
    $pdf->cell(40,10,'MODELO:',0,1,'L');
    $pdf->Sety(190);
    $pdf->SetX(100);
    $pdf->cell(40,10,'COLOR:',0,1,'L');
    $pdf->Sety(200);
    $pdf->SetX(100);
    $pdf->cell(40,10,'NO. PLACA:',0,1,'L');
    $pdf->Sety(210);
    $pdf->SetX(100);
    $pdf->cell(40,10,'EJES:',0,1,'L');
    $pdf->Sety(220);
    $pdf->SetX(100);
    $pdf->cell(40,10,utf8_decode('TAMAÑO:'),0,1,'L');
    $pdf->Sety(230);
    $pdf->SetX(100);
    $pdf->cell(40,10,'NUMERO ECONOMICO:',0,1,'L');
    $pdf->Sety(240);
    $pdf->SetX(100);
    $pdf->cell(40,10,'CODIGO CAAT:',0,1,'L');
    
    $pdf->SetFont('Arial','',12);
    $pdf->Sety(160);
    $pdf->SetX(161);
    $pdf->cell(40,10,utf8_decode($tipo_remolque),0,1,'L');
    $pdf->Sety(170);
    $pdf->SetX(161);
    $pdf->cell(40,10,utf8_decode($marca_remolque),0,1,'L');
    $pdf->Sety(180);
    $pdf->SetX(161);
    $pdf->cell(40,10,utf8_decode($modelo_remolque),0,1,'L');
    $pdf->Sety(190);
    $pdf->SetX(161);
    $pdf->cell(40,10,utf8_decode($color_remolque),0,1,'L');
    $pdf->Sety(200);
    $pdf->SetX(161);
    $pdf->cell(40,10,utf8_decode($placa_remolque),0,1,'L');
    $pdf->Sety(210);
    $pdf->SetX(161);
    $pdf->cell(40,10,utf8_decode($eje_remolque),0,1,'L');
    $pdf->Sety(220);
    $pdf->SetX(161);
    $pdf->cell(40,10,utf8_decode($tamanio_remolque),0,1,'L');
    $pdf->Sety(230);
    $pdf->SetX(161);
    $pdf->cell(40,10,utf8_decode($numero_economico),0,1,'L');
    $pdf->Sety(240);
    $pdf->SetX(161);
    $pdf->cell(40,10,utf8_decode($caat_remolque),0,1,'L');
}




$pdf->Output('Envio','I')
?>