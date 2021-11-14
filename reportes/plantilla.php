<?php 
include_once('../fpdf/fpdf.php');
/**
 * 
 */
class pdf extends fpdf
{
	
	function Header()
	{
		$this->Image('../imagenes/logoE2.jpeg',5,5,40);
		$this->SetFont('Arial','B',40);
		$this->SetY(20);
		$this->Cell(30);
		$this->Cell(120,10,'Envio',0,0,'C');
		$this->Ln(20);
	}

}
 ?>