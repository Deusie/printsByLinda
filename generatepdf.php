<?php
// Include the main TCPDF library (search for installation path).
require_once('tcpdf.php');
require_once('configdbPDO.php');

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





// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 005');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

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

// set color for background
$pdf->SetFillColor(120, 172, 255);

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

$pdf->Line(15, 54, 195, 54, $style);
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
    background-color: #CCCCCC;
    border: 1px solid #DDDDDD;
    color: #333333;
    font-family: trebuchet MS;
    font-size: 30px;
    padding-bottom: 4px;
    padding-left: 6px;
    padding-top: 5px;
    text-align: left;
}
td {
    border: 1px solid #CCCCCC;
    font-size: 25px;
    padding: 3px 7px 2px;
}
</style>
<table id="gallerytab" width="600" cellspacing="2" cellpadding="1" border="0">
<tr>
        <th><font face="Arial, Helvetica, sans-serif">Products Title</font></th>
        <th><font face="Arial, Helvetica, sans-serif">Product Specs</font></th>
        <th><font face="Arial, Helvetica, sans-serif">Product Price</font></th>
        <th><font face="Arial, Helvetica, sans-serif">Products Image</font></th>
      </tr>';
$tbl_footer = '</table>';
$tbl = '';

$data = $conn->query("SELECT * FROM product")->fetchAll();
foreach ($data as $row) {
    $tbl .= '
    <tr>
        <td>'.$row['ID'].'</td>
        <td>'.$row['ProductName'].'</td>
        <td>'.$row['Categorie'].'</td>
    </tr>
';
}
// output the HTML content
$pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');



// move pointer to last page
$pdf->lastPage();

//Close and output PDF document
$pdfFile = $pdf->Output('example_005.pdf', 'I');
