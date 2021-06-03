<?php

ob_end_clean();//libera el buffer de salida
require_once '../lib/tcpdf/tcpdf.php';



// create new PDF document
	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT,
		PDF_PAGE_FORMAT, true, 'UTF-8', true);

// set document information
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Empresa, SL');
	$pdf->SetTitle('Pedido en la tienda online');

//En el archivo tcpdf_autoconfig.php se puede cambiar la ruta
	//del logo de la empresa.
	// set default header data

	$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH - 12,
		"Empresa, S.L.", "Avda. Ramón y Cajal, s/n.\n "
		. "06001 Badajoz \n CIF: B-0611111 \n Tlf: 924010101");

// set header and footer fonts
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


// ---------------------------------------------------------

// set font
	$pdf->SetFont('Times', 'B', 16);

// add a page
	$pdf->AddPage();

	$pdf->Write(15, 'Comprobante de su pedido', '', 0, 'C', true, 0, false, false, 0);

	$pdf->SetFont('helvetica', '', 8);
	//$pdf->Write(16, '', '', 0, 'L', true, 0, false, false, 0);
// -----------------------------------------------------------------------------
	$htmlPedido="Estimado cliente este es su pedido";
	$htmlDetallesPedido="Su pedido consta de los siguientes productos actualmente en su cesta:";

	$pdf->writeHTML($htmlPedido, true, false, false, false, '');
	$pdf->SetFont('Times', 'B', 14);
	//$pdf->Write(15, 'Detalles de su pedido', '', 0, 'C', true, 0, false, false, 0);
	$pdf->Write(15, 'Detalles de su pedido','',0,'C');
	$pdf->SetFont('Times', 'B', 11);
	
	//$pdf->writeHTML($htmlDetallesPedido, true, false, false, false, '');
	$pdf->writeHTML($htmlDetallesPedido);
	$pdf->SetFont('Times', 'B', 13);

	$pdf->SetTextColor(0, 0, 255); //color azul

	$baseImponible=34;
	$pdf->Write(5, 'Base Imponible: ' . $baseImponible . " €", '', 0, 'I', true, 0, false, false, 0);
	$totalIva=3.4;
	$totalPedido=37.4;
	$pdf->Write(5, 'Total Iva: ' . $totalIva . " €", '', 0, 'I', true, 0, false, false, 0);
	$pdf->Write(5, 'Total Pedido: ' . $totalPedido . " €", '', 0, 'I', true, 0, false, false, 0);
//Close and output PDF document
	$pdf->lastPage();
//header('Content-type: application/pdf');
	//header('Content-Disposition: attachment; filename="file.pdf"');
	$pdf->Output('pedido.pdf');
//$pdf->Output('example_048.pdf', 'I');

//============================================================+
	// END OF FILE
	//============================================================+
?>