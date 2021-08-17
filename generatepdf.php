<?php
// Include the main TCPDF library (search for installation path).
require_once('tcpdf.php');
require_once('config/configdbPDO.php');

//define input variables
$voorNaam = 'hans';
$Tussenvoegsel = 'de';
$Achternaam = 'berg';

$eMail = 'hansberg@gmail.com';
$straatNaam = 'destreelaan';
$huisNummer = '119';
$Plaats = 'Sint- pancras';
$Postcode = '1834 EC';
$Instructies = 'Graag naast de witte plantenbak zetten';
$Aantal = 3;
$totalPrice = 0;
$verzendKosten = '2.50';

$Rekeningnummer = "NL25 ABNA 0102 9630 88";



// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('PrintsByLinda');
$pdf->SetTitle('Factuur');
$pdf->SetSubject('Factuur');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

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

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(2, 1, 2, 1);

// set cell margins
$pdf->setCellMargins(1, 2, 1, 1);


// create some HTML content
$html = '<p>
<br>
Hallo '.$voorNaam.',<br><br>
Hartelijk bedankt voor je bestelling en vertrouwen in ons!<br>
Hieronder vind je het overzicht van je bestelling:<br>
</p>

';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// set color for background
$pdf->SetFillColor(122, 193, 253);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

// set some text for example
$factuurNr = "FACTUURNR: " . rand(1,10);
$Datum = "DATUM: " . date("d/m/Y");
// Multicell test
$pdf->MultiCell(0, 10, $factuurNr." ".$Datum, 0, 'J', 1, 1, '', '', true, 0, false, true, 10, 'M');


$pdf->Ln(4);

// set color for background

$pdf->MultiCell(57, 10, 'Naam geadresseerde', 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(57, 10, 'verzendadres', 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(57, 10, 'instructies', 0, 'L', 0, 1, '', '', true);

$style = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));

$pdf->Line(15, 82, 195, 82, $style);
// Vertical alignment
$pdf->MultiCell(57, 40, $voorNaam." ".$Tussenvoegsel." ".$Achternaam, 0, 'J', 0, 0, '', '', true, 0, true, true, 40, 'T');
$pdf->MultiCell(57, 40, $straatNaam." ".$huisNummer."<br>".$Postcode." ".$Plaats, 0, 'J', 0, 0, '', '', true, 0, true, true, 40, 'T');
$pdf->MultiCell(57, 40, $Instructies, 0, 'J', 0, 1, '', '', true, 0, true, true, 40, 'T');

$tbl_header = '<style>
table {
    border-collapse: collapse;
    border-spacing: 0;
    margin: 0 20px;
}
tr {
    padding: 3px 0;
}

th {
    background-color: #7ac1fd;
    color: #333333;
    font-family: trebuchet MS;
    font-size: 10px;
    padding-bottom: 4px;
    padding-left: 6px;
    padding-top: 5px;
    text-align: left;
}
td {
    border-bottom: 1px solid #CCCCCC;
    font-size: 10px;
    padding: 3px 7px 2px;
}
</style>
<table id="gallerytab" width="600" cellspacing="0" cellpadding="4" border="0">
<tr>
        <th><font face="Arial, Helvetica, sans-serif">Aantal</font></th>
        <th><font face="Arial, Helvetica, sans-serif">product</font></th>
        <th><font face="Arial, Helvetica, sans-serif">prijs per eenheid</font></th>
        <th><font face="Arial, Helvetica, sans-serif">Totaal</font></th>
      </tr>';
$tbl_footer = '</table>';
$tbl = '';

$data = $conn->query("SELECT * FROM product WHERE ID IN (1, 2)")->fetchAll();
foreach ($data as $row) {
    $totalPrice += $row['Price'];
    $tbl .= '
    <tr>
        <td>'.$Aantal.'</td>
        <td>'.$row['ProductName'].'</td>
        <td>'.$row['Price'].'</td>
        <td>'.$Aantal * $row['Price'].'</td>
    </tr>
';
}
// output the HTML content
$pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');

$pdf->setCellMargins(75, 1, 1, 1);
$BTW = round((21 / 100) * $totalPrice, 2);
$subTotal = $totalPrice - $BTW;

$pdf->MultiCell(100, 10, "SUBTOTAAL: ".$subTotal, 'B', 'J', 0, 1, '', '', true, 0, false, true, 10, 'M');
$pdf->MultiCell(100, 10, "BTW: ".$BTW, 'B', 'J', 0, 1, '', '', true, 0, false, true, 10, 'M');
$pdf->MultiCell(100, 10, "Verzendkosten: ".$verzendKosten, 'B', 'J', 0, 1, '', '', true, 0, false, true, 10, 'M');
$floatVerzendkosten = (float)$verzendKosten;
$totalPrice2 = $totalPrice + $floatVerzendkosten;
$pdf->MultiCell(100, 10, "TOTAAL: ".$totalPrice2, 0, 'J', 1, 1, '', '', true, 0, false, true, 10, 'M');

$html = '
<p>
    Het totaal bedrag kunt u over maken naar<br> 
    Rekeningnummer: '.$Rekeningnummer.'
    T.n.v. Prints By Linda
    Onder vermelding van:'. $factuurNr .' 
</p>

';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// move pointer to last page
$pdf->lastPage();

//Close and output PDF document
$pdfFile = $pdf->Output('example_005.pdf', 'I');
