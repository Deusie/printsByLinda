<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//Load Composer's autoloader
require 'vendor/autoload.php';
require 'config/EmailCredentials.php';
// Include the main TCPDF library (search for installation path).
require_once('tcpdf.php');
require_once('config/configdbPDO.php');
require "config/initialize.php";

try {
    /*
     * Generate a unique order id for this example. It is important to include this unique attribute
     * in the redirectUrl (below) so a proper return page can be shown to the customer.
     */
    $orderId = time();

    $voorNaam = filter_var ( $_POST['inputVoornaam'], FILTER_SANITIZE_STRING);
    $Tussenvoegsel = filter_var ( $_POST['inputTussenvoegsel'], FILTER_SANITIZE_STRING);
    $Achternaam = filter_var ( $_POST['inputAchternaam'], FILTER_SANITIZE_STRING);

    $eMail = filter_var(filter_var ( $_POST['inputEmail'], FILTER_SANITIZE_STRING), FILTER_VALIDATE_EMAIL);
    $straatNaam = filter_var ( $_POST['inputStraatNaam'], FILTER_SANITIZE_STRING);
    $huisNummer = filter_var ( $_POST['inputHuisNummer'], FILTER_SANITIZE_NUMBER_INT);
    $Plaats = filter_var ( $_POST['inputPlaats'], FILTER_SANITIZE_STRING);
    $Postcode = filter_var ( $_POST['inputPostcode'], FILTER_SANITIZE_STRING);
    $Instructies = filter_var ( $_POST['inputInstructies'], FILTER_SANITIZE_STRING);

    $aantalArr = $_POST['inputAantal'];
    $sizesArr = $_POST['inputSizes'];
    $colorsArr = $_POST['inputColors'];

    $IDS = filter_var ( $_POST["itemID"], FILTER_SANITIZE_STRING);
    $totalPrice = filter_var ( $_POST["TotalPrice"], FILTER_SANITIZE_STRING);
    $totalPriceCheck = 0;
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

// set color for background
    $pdf->SetFillColor(120, 172, 255);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

    $Datum = "DATUM: " . date("d/m/Y");

    $pdf->MultiCell(0, 10, "factuur: " .$orderId." ".$Datum, 0, 'J', 1, 1, '', '', true, 0, false, true, 10, 'M');


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
        <th><font face="Arial, Helvetica, sans-serif">Maat</font></th>
        <th><font face="Arial, Helvetica, sans-serif">Kleur</font></th>
        <th><font face="Arial, Helvetica, sans-serif">prijs per eenheid</font></th>
        <th><font face="Arial, Helvetica, sans-serif">Totaal</font></th>
      </tr>';
    $tbl_footer = '</table>';
    $tbl = '';

    $data = $conn->query("SELECT * FROM product WHERE ID IN (" . $IDS . ") ORDER BY ID ASC")->fetchAll();
    $i = 0;
    foreach ($data as $row) {
        $totalPriceCheck = $aantalArr[$i] * $row['Price'];
        $tbl .= '
    <tr>
        <td>'.$aantalArr[$i].'</td>
        <td>'.$row['ProductName'].'</td>
        <td>'.$sizesArr[$i].'</td>
        <td style=" padding: 50px;background-color:'.$colorsArr[$i].'"></td>
        <td>'.$row['Price'].'</td>
        <td>'.$aantalArr[$i] * $row['Price'].'</td>
    </tr>
';
        $i++;
    }
// output the HTML content
    $pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');

    $pdf->setCellMargins(75, 1, 1, 1);



    $BTW = round(0.21 * $totalPrice, 2);
    $subTotal = $totalPrice - $BTW;

    $pdf->MultiCell(100, 10, "SUBTOTAAL: ".round($subTotal, 2), 'B', 'J', 0, 1, '', '', true, 0, false, true, 10, 'M');
    $pdf->MultiCell(100, 10, "BTW: ".round($BTW, 2), 'B', 'J', 0, 1, '', '', true, 0, false, true, 10, 'M');
    $pdf->MultiCell(100, 10, "TOTAAL: ".round($totalPrice, 2), 0, 'J', 1, 1, '', '', true, 0, false, true, 10, 'M');


// move pointer to last page
    $pdf->lastPage();
    if ($totalPriceCheck == $totalPrice){

    //Close and output PDF document
        $filename= $orderId.".pdf";

        //xampp
    //    $orderFolderPath = "C:\\xampp\\htdocs\\printsbylinda\\Orders";
    //    $fileLocation = $orderFolderPath . "\\" .str_replace("/", "", date("m/Y"));
    //    if (!file_exists($fileLocation)){
    //        mkdir($fileLocation);
    //    }
    //    $fileNL = $fileLocation."\\".$filename;
    //    $pdf->Output($fileNL, 'F');

        //Server
        $orderFolderPath = __DIR__ ."/"."Orders";
        $fileLocation = $orderFolderPath."/". str_replace("/", "", date("m/Y"));
        if (!file_exists($fileLocation)){
            mkdir($fileLocation);
        }
        $fileNL = $fileLocation."/".$filename;
        $pdf->Output($fileNL, 'F');


        $pdfFile = $pdf->Output('Factuur.pdf', 'S');

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            //$mail->SMTPDebug = 4;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'mail.printsbylinda.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = EMAIL;                     //SMTP username
            $mail->Password   = PASS;                               //SMTP password
            $mail->SMTPSecure = 'TLS';            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom(EMAIL, 'PrintsByLinda');
            $mail->addAddress($eMail, "lindamizee@gmail.com");
            $mail->addReplyTo("info@printsbylinda.com", 'PrintsByLinda');

            //Attachments
            $mail->addStringAttachment($pdfFile, 'Factuur.pdf');

            //Content
            $mail->Subject = 'uw bestellig #'. $orderId .' bij PrintsByLinda';
            $mail->Body = '<p>
                    Hallo '.$voorNaam.',<br>
                    Wat leuk dat je bij ons hebt besteld!!<br>
                    We hebben je bestelling in goede orde ontvangen en<br>
                    zodra de betaling binnen is krijg je van ons een mailtje<br>
                    en gaan wij zo snel mogelijk voor je aan de slag<br>
                    <br>
                    <br>
                    <br>
                    Heb je wel betaald maar nog geen confirmatie mailtje?<br>
                    Controleer je spam folder en wacht minimaal 10 minuten<br>
                     <br>
                    Nog steeds niks binnen?<br>
                    Contact ons via info@printsbylinda.com of reageer op deze mail met je probleem
                </p>';
            $mail->AltBody = 'Er is een fout opgetreden probeer het nog is';

            $mail->send();
            //save pdf to server
            $pdf->Output($fileNL, 'F');
            echo'
            <div class="row text-center mt-5">
                <div class="col">
                    <h1>BEDANKT VOOR U BESTELLING!!</h1>
                </div>
            </div>
            <div class="row mt-5 mb-5 text-center">
                <div class="col">
                    <h4 class="mt-4 mb-5">Gelieve de stappen in uw mail te volgen</h4>
                    <h6 class="mb-5">Dan gaan wij alvast met u bestelling aan de slag :)</h6>
                </div>
            </div>';

        } catch (Exception $e) {
            echo "<h2>Er is iets fout gegaan controleer uw gegevens en probeer het opnieuw</h2>" . "<br>";
            echo "<h2>Als dit probleem zich voor blijft doen neem dan contact met ons op</h2>";
        }



        /*
         * Determine the url parts to these example files.
         */
        $protocol = isset($_SERVER['HTTPS']) && strcasecmp('off', $_SERVER['HTTPS']) !== 0 ? "https" : "http";
        $hostname = $_SERVER['HTTP_HOST'];
        $path = dirname(isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $_SERVER['PHP_SELF']);

        /*
         * Payment parameters:
         *   amount        Amount in EUROs. This example creates a € 10,- payment.
         *   description   Description of the payment.
         *   redirectUrl   Redirect location. The customer will be redirected there after the payment.
         *   webhookUrl    Webhook location, used to report when the payment changes state.
         *   metadata      Custom metadata that is stored with the payment.
         */

        echo "do payment";
        $payment = $mollie->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => $totalPrice, // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            "description" => "Order #{$orderId}",
            "redirectUrl" => "{$protocol}://{$hostname}{$path}OrderConfirmation.php?order_id={$orderId}",
            "webhookUrl" => "{$protocol}://{$hostname}{$path}WebhookHandler.php",
            "metadata" => [
                "order_id" => $orderId,
                "emailAdress" => $eMail,
            ],
        ]);

    /*
     * Send the customer off to complete the payment.
     * This request should always be a GET, thus we enforce 303 http response code
     */
    $payURL = $payment->getCheckoutUrl();
    echo "<p id='url' class='$payURL'>even geduld u word doorgestuurd...</p>";
    echo "<p>als dit te lang duur druk dan <a href='$payURL'>hier</a></p>";
    }else{
        echo "Uw betaling is mislukt";
    }
} catch (\Mollie\Api\Exceptions\ApiException $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}
?>
<script>
    $(document).ready(function(){
        window.location.href = document.getElementById("url").className;
    });
</script>

