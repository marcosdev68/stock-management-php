<?php
// Carregar dompdf
require_once '../../lib/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$id=$_GET['idvenda'];



 $html=file_get_contents("http://localhost/sistema_estoque/view/vendas/comprovanteVendaPdf.php?idvenda=".$id);


 
// Instanciamos um objeto da classe DOMPDF.
$pdf = new DOMPDF();
 
// Definimos o tamanho do papel e orientação.
$pdf->set_paper(array(0,0,124,250));
 
// Carregar o conteúdo html.
$pdf->load_html(utf8_decode($html));
 
// Renderizar PDF.
$pdf->render();
 
// Enviamos pdf para navegador.
$pdf->stream('relatorioVenda.pdf');



