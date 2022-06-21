<?php
// require('../lib/pdf/fpdf.php');
require('../js/lib/php/pdf/pdf.php');  

set_time_limit(0);
/*
$titulo         = 'REPORTE GASTOS DE: ';
$sucursal_id    = $_REQUEST['suc_id'];
$fecha_inicial  = $_REQUEST['f_ini'];
$fecha_final    = $_REQUEST['f_fin'];
$cta            = $_REQUEST['cta'];
$scta           = $_REQUEST['scta'];*/

 

$pdf = new PDF('P', 'mm', 'Letter');
$pdf->AddPage();
$pdf->SetFillColor(192,192,192); //Fondo del texto Gris Claro  

$x = 0;
$cx = 0;
$total_importe = 0;     // TOTALES GENERAL //
$ctotal_importe = 0;    // TOTALES POR CUENTA //

 

// IMPRIMIR EL ULTIMO SUBTOTAL CUANDO TERMINA EL ARREGO data //
$pdf->SetFont('Arial','B',12);
$pdf->Ln(1);
$pdf->Cell(155);
$pdf->Cell(5,1,"H. AYUNTAMIENTO DE",0,0,'R');
$pdf->Ln(5); 
$pdf->SetFont('Arial','B',12);
$pdf->Cell(180);
$pdf->Cell(5,1,"TESORERIA MUNICIPAL",0,0,'R');
$pdf->Ln(5); 
$pdf->Cell(180);

$fecha = Date('Y-m-d')

$pdf->Cell(5,1,,0,0,'R');

// // IMPRIMIR TOTAL GENERAL //
$pdf->SetFont('Arial','B',10);
$pdf->Ln(8); 

$pdf->Output();
?>
