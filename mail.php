<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//Load Composer's autoloader
require 'vendor/autoload.php';
require 'credentials.php';
// Include the main TCPDF library (search for installation path).
require_once('tcpdf.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Store</title>
    <link rel="icon" href="Logos/LogosPrints.png">
    <link rel="stylesheet" href="Bootstrap pure/Style.css">
    <script src="Bootstrap pure/b1.js"></script>
    <script src="Bootstrap pure/b2.js"></script>
    <script src="Bootstrap pure/b3.js"></script>

    <link rel="stylesheet" href="Bootstrap pure/myStyling.css">

</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark" style="background-color: black">
    <a class="navbar-brand" href="index.php">
        <img src="Logos/Copy%20of%20PRINTS%20B%20Y%20LINDA.svg" width="150em" height="100em"  alt="">
    </a>
    <a href="FavoritePage.php" class="d-md-none ml-auto">
        <svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
        </svg>
    </a>
    <a href="#" class="d-md-none ml-3">
        <svg style="color: white" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
        </svg>
    </a>
    <button class="navbar-toggler ml-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Store.php">Store</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Contact.php">Contact</a>
            </li>
        </ul>
    </div>
    <form class="form-inline my-2 my-lg-0 d-none d-md-block">
        <div class="form-group has-search">
            <span class="form-control-feedback">
                <svg style="color: white" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                </svg>
            </span>
            <input style="background-color: black; border-radius: 20px 20px 20px 20px;-moz-border-radius: 20px 20px 20px 20px;-webkit-border-radius: 20px 20px 20px 20px;border: 0px solid #000000;" type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <a href="FavoritePage.php" class="d-none d-md-block">
        <svg style="color: white" width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-heart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
        </svg>
    </a>
    <a class="d-none d-md-block ml-4" href="Cart.php">
        <svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
        </svg>
    </a>
</nav>

<div class="container mt-4">
    <h2 class="mb-5">Bezorgadres</h2>
    <form method="post">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputVoornaam">voornaam</label>
                <input type="text" class="form-control" id="inputVoornaam" name="inputVoornaam">
            </div>
            <div class="form-group col-md-2">
                <label for="inputTussenvoegsel">tussenvoegsel</label>
                <input type="text" class="form-control" id="inputTussenvoegsel" name="inputTussenvoegsel">
            </div>
            <div class="form-group col-md-6">
                <label for="inputAchternaam">achternaam</label>
                <input type="text" class="form-control" id="inputAchternaam" name="inputAchternaam">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="inputEmail">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-9">
                <label for="inputStraatNaam">straatnaam</label>
                <input type="text" class="form-control" id="inputStraatNaam" name="inputStraatNaam">
            </div>
            <div class="form-group col-md-2">
                <label for="inputHuisNummer">huisnummer</label>
                <input type="text" class="form-control" id="inputHuisNummer" name="inputHuisNummer">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-7">
                <label for="inputPlaats">plaats</label>
                <input type="text" class="form-control" id="inputPlaats" name="inputPlaats">
            </div>
            <div class="form-group col-md-2">
                <label for="inputPostcode">postcode</label>
                <input type="text" class="form-control" id="inputPostcode" name="inputPostcode">
            </div>
            <div class="form-group col-md-2">
                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="inputFactuurCheck" name="inputFactuurCheck">
                    <label class="form-check-label" for="inputFactuurCheck">
                        factuuradress zelde als bezorgadres
                    </label>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-11">
                <label for="inputInstructies">Instructies</label>
                <textarea class="form-control" id="inputInstructies" name="inputInstructies"rows="3"></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Bestellen</button>
    </form>
</div>


<footer class="container-fluid pt-3 pb-5 fixed-bottom" style="background-color: #535353">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="list-group list-group-horizontal justify-content-center">
                    <li class="list-group-item footerLI"><a  href="index.php">Home</a></li>
                    <li class="list-group-item footerLI"><a  href="Store.php">Store</a></li>
                    <li class="list-group-item footerLI"><a  href="Contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //define input variables
    $voorNaam = filter_var ( $_POST['inputVoornaam'], FILTER_SANITIZE_STRING);
    $Tussenvoegsel = filter_var ( $_POST['inputTussenvoegsel'], FILTER_SANITIZE_STRING);
    $Achternaam = filter_var ( $_POST['inputAchternaam'], FILTER_SANITIZE_STRING);

    $eMail = filter_var(filter_var ( $_POST['inputEmail'], FILTER_SANITIZE_STRING), FILTER_VALIDATE_EMAIL);
    $straatNaam = filter_var ( $_POST['inputStraatNaam'], FILTER_SANITIZE_STRING);
    $huisNummer = filter_var ( $_POST['inputHuisNummer'], FILTER_SANITIZE_NUMBER_INT);
    $Plaats = filter_var ( $_POST['inputPlaats'], FILTER_SANITIZE_STRING);
    $Postcode = filter_var ( $_POST['inputPostcode'], FILTER_SANITIZE_STRING);
    $Instructies = filter_var ( $_POST['inputInstructies'], FILTER_SANITIZE_STRING);




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



// move pointer to last page
    $pdf->lastPage();

//Close and output PDF document
    $pdfFile = $pdf->Output('factuur', 'S');

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 4;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'mail.printsbylinda.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = EMAIL;                     //SMTP username
        $mail->Password   = PASS;                               //SMTP password
        $mail->SMTPSecure = 'TLS';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom(EMAIL, 'PrintsByLinda');
        $mail->addAddress($eMail);
        $mail->addReplyTo(EMAIL, 'Information');

        //Attachments
        $mail->addStringAttachment($pdfFile, 'test.pdf');

        //Content
        $mail->Subject = 'bedankt voor u bestelling!!';
        $mail->Body = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'alt body';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
</body>
<script>
    function searchBar() {
        document.getElementById("searchIcon").style.display = "none";
        document.getElementById("heartIcon").style.display = "none";
        document.getElementById("SearchBar").style.display = "block";
        $(document.body).click(function(e){
            var $box = $('#SearchBar');
            var $box2 = $('#searchIcon');
            if(e.target.id !== 'SearchBar' && e.target.id !== 'searchIcon' && !$.contains($box[0], e.target) && !$.contains($box2[0], e.target)){
                console.log("remove searchbar");
                document.getElementById("searchIcon").style.display = "block";
                document.getElementById("heartIcon").style.display = "block";
                document.getElementById("SearchBar").style.display = "none";
            }
        });
    }
</script>
</html>