<?php
session_start();
ob_start();
//libera el buffer de salida
//OJO!! Los bordes de las tablas no se imprimen a menos que se pongan
//los atributos entre comillas dobles ""

if (isset($_POST['pdf']) && isset($_SESSION['idPedido'])) {
	$numeroPedido = $_SESSION['idPedido'];
	require_once '../persistencia/Productos.php';
	require_once '../persistencia/Pedidos.php';
	require_once '../persistencia/LineasPedidos.php';
	require_once '../persistencia/Clientes.php';

	require_once '../pojos/Producto.php';
	require_once '../pojos/Pedido.php';
	require_once '../pojos/LineaPedido.php';
	require_once '../pojos/Cliente.php';
	require_once '../lib/tcpdf/tcpdf.php';

	//Tenemos que generar un html que contenga todo lo que
	//queremos imprimir
	/*En la hoja de pedido tienen que aparecer los datos del cliente
	     * así como los datos de cada uno de los productos,
	     * por eso necesitamos tener las conexiones a cada una de
	     * las tablas: clientes, productos, pedidos y lineas_pedidos
*/

	
	$tpedido = Pedidos::singletonPedidos();
	$tlineaPedido = LineasPedidos::singletonLineasPedidos();
	$tProducto = Productos::singletonProductos();
	$tCliente = Clientes::singletonClientes();

	//Recuperamos los objetos inherentes al pedido
	$p = $tpedido->getUnPedido($numeroPedido);
	
	$c = $tCliente->getUnCliente($p->getIdCliente());
	$tlp = $tlineaPedido->getLineasUnPedido($p->getIdPedido());
	//$tlp es una tabla de objetos lineaPedidos.

	$fechaPedido = $p->getFechaPedido();
	//Generamos el html con los datos del cliente y del pedido y lo guardamos
	// en $htmlPedido
	$htmlPedido ='<table border="2">'
	. '<tr>'
	. '<td>Número de Cliente:</td>'
	. '<td>' . $p->getIdCliente() . '</td>'
	. "</tr>"
	. "<tr>"
	. "<td>Nombre:</td>"
	. "<td>" . $c->getNombre() . "</td>"
	. "</tr>"
	. "<tr>"
	. "<td>Apellidos:</td>"
	. "<td>" . $c->getApellido1() . " " . $c->getApellido2() . "</td>"
	. "</tr>"
	. "<tr>"
	. "<td>Dirección de envío:</td>"
	. "<td>" . "Calle Sol,3" . "</td>"
	. "</tr></table>";

	//Generammos el html con los detalles del pedido

	$htmlDetallesPedido = '<table border="1">'
		. "<tr>"
		. "<td>Referencia</td>"
		. "<td>Descripción</td>"
		. "<td>Unidades</td>"
		. "<td>PVP</td>"
		. "<td>IVA(%)</td>"
		. "<td>Subtotal</td>"
		. "</tr>";
	$baseImponible = 0;
	$totalIva = 0;
	$totalPedido = 0;
	
	foreach ($tlp as $lp) {
		//necesitamos recuperar los datos del idProducto tales como
		//iva, nombre y pvp para guardarlos en lineapedido

		$idProducto = $lp->getIdProducto();
		$unidades = $lp->getUnidades();
		$pvp = $lp->getPvp();
		$iva = $lp->getTipoIva();
		$descripcion = $lp->getDescripcion();

		$subtotal = $unidades * $lp->getPvp();
		$baseImponible += $subtotal;
		$totalIva += $subtotal * $lp->getTipoIva() / 100;
		$totalPedido = $baseImponible + $totalIva;
		$htmlDetallesPedido = $htmlDetallesPedido .
			"<tr>"
			. "<td>" . $idProducto . "</td>"
			. "<td>" . $lp->getDescripcion() . "</td>"
			. '<td align="rigth">' . $lp->getUnidades() . "</td>"
			. '<td align="rigth">' . number_format($lp->getPvp(),2) . " €</td>"
			. '<td align="rigth">' . number_format($lp->getTipoIva(),2) . " €</td>"
			. '<td align="rigth">' . number_format($subtotal,2) . " €</td>"
			. "</tr>";

	}
	$htmlDetallesPedido=$htmlDetallesPedido . "</table>";

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
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
//$pdf->setFooterData(array(0,64,0), array(0,64,128));
	//$pdf->SetHeaderData('logo_castelar.jpg', PDF_HEADER_LOGO_WIDTH - 12,
	//	"Empresa, S.L.", "Avda. Ramón y Cajal, s/n.\n "
	//	. "06001 Badajoz \n CIF: B-0611111 \n Tlf: 924010101");

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
	$pdf->writeHTML($htmlPedido, true, false, false, false, '');
	$pdf->SetFont('Times', 'B', 14);
	$pdf->Write(15, 'Detalles de su pedido', '', 0, 'C', true, 0, false, false, 0);
	$pdf->SetFont('Times', 'B', 11);
	
	$pdf->writeHTML($htmlDetallesPedido, true, false, false, false, '');
	$pdf->SetFont('Times', 'B', 10);
	$pdf->SetTextColor(0, 0, 255);
	$pdf->Write(5, 'Base Imponible: ' . $baseImponible . " €", '', 0, 'I', true, 0, false, false, 0);
	$pdf->Write(5, 'Total Iva: ' . $totalIva . " €", '', 0, 'I', true, 0, false, false, 0);
	$pdf->Write(5, 'Total Pedido: ' . $totalPedido . " €", '', 0, 'I', true, 0, false, false, 0);
//Close and output PDF document
	$pdf->lastPage();
//header('Content-type: application/pdf');
	//header('Content-Disposition: attachment; filename="file.pdf"');
	ob_end_clean();
	$pdf->Output('pedido.pdf');
//$pdf->Output('example_048.pdf', 'I');

//============================================================+
	// END OF FILE
	//============================================================+

}

?>