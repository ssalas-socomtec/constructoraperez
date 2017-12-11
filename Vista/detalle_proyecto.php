<?php
include ('fpdf/fpdf.php');


        $pdf = new FPDF();
        $pdf->AddPage();

/* seleccionamos el tipo, estilo y tamaño de la letra a utilizar */
        $pdf->SetFont('Times','', 12);
        $pdf->Image('Imagenes/logo_empresa/logo.jpg',20,16,66);
        $pdf->Ln(10);
        $pdf->Cell(100,20);
        $pdf->Write (7, utf8_decode("Teléfono: +56998420939"));
        $pdf->Ln();
        $pdf->Cell(100,20);
		$pdf->Write (7,"Email: constructoraperezltda@gmail.com");
        $pdf->Ln();
        $pdf->Cell(100,20);
		$pdf->Write (7, utf8_decode("Dirección: San Gregorio, Los Acacios #240"));
		
		$pdf->SetFont('Arial','U',20);
        $pdf->SetXY(50, 45); 
        $pdf->Cell(20);
		$pdf->Write (20, utf8_decode("Detalles del Proyecto"));
        $pdf->Ln(20);
        //Creamos el foreach de la base de datos 
        $pdf->SetFont('Arial','b',12);
        $pdf->Write (15, utf8_decode("Nombre Proyecto: "));
        $pdf->SetFont('Arial','',12);
        $pdf->Write (15, utf8_decode("Nombre Proyecto: " ."Casa 1"));
        $pdf->Ln(10);
        $pdf->SetFont('Arial','b',12);
        $pdf->Write (15, utf8_decode("Tipo Proyecto: "));
        $pdf->SetFont('Arial','',12);
        $pdf->Write (15, utf8_decode("Nombre Proyecto: " ."Casa 1"));
        $pdf->Ln(10);
        $pdf->SetFont('Arial','b',12);
        $pdf->Write (15, utf8_decode("Material: "));
        $pdf->SetFont('Arial','',12);
        $pdf->Write (15, utf8_decode("Nombre Proyecto: " ."Casa 1"));
        $pdf->Ln(10);
        $pdf->SetFont('Arial','b',12);
        $pdf->Write (15, utf8_decode("Descripción del Proyecto: "));
        $pdf->Ln(15);
        $txt = utf8_decode("En ");
        
        $pdf->SetFont('Times','',12);  
        $pdf->MultiCell(0,5, $txt, -10); 
        $pdf->Ln();
        

        $pdf->Output("Detalle_proyecto.pdf",'i');
       // echo "<script language='javascript'>window.open('../Detalle_proyecto/Detalle_proyecto" .".pdf','_self','');</script>";//para ver el archivo pdf generado
		exit;
	?>