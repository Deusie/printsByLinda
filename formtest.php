<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Store</title>
    <link rel="icon" href="Logos/VEDfavicon.png">
    <link rel="stylesheet" href="Bootstrap pure/Style.css">
    <script src="Bootstrap pure/b1.js"></script>
    <script src="Bootstrap pure/b2.js"></script>
    <script src="Bootstrap pure/b3.js"></script>

    <link rel="stylesheet" href="Bootstrap pure/myStyling.css">

</head>
<body>
<div class="container mt-4">
    <h2 class="mb-5">Bezorgadres</h2>
    <form method="post" action="formtest.php" >
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputVoornaam">voornaam</label>
                <input type="text" class="form-control" id="inputVoornaam">
            </div>
            <div class="form-group col-md-2">
                <label for="inputTussenvoegsel">tussenvoegsel</label>
                <input type="text" class="form-control" id="inputTussenvoegsel">
            </div>
            <div class="form-group col-md-6">
                <label for="inputAchternaam">achternaam</label>
                <input type="text" class="form-control" id="inputAchternaam">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-9">
                <label for="inputStraatNaam">straatnaam</label>
                <input type="text" class="form-control" id="inputStraatNaam">
            </div>
            <div class="form-group col-md-2">
                <label for="inputHuisNummer">huisnummer</label>
                <input type="text" class="form-control" id="inputHuisNummer">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-7">
                <label for="inputPlaats">plaats</label>
                <input type="text" class="form-control" id="inputPlaats">
            </div>
            <div class="form-group col-md-2">
                <label for="inputPostcode">postcode</label>
                <input type="text" class="form-control" id="inputPostcode">
            </div>
            <div class="form-group col-md-2">
                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="inputFactuurCheck">
                    <label class="form-check-label" for="inputFactuurCheck">
                        factuuradress zelde als bezorgadres
                    </label>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-11">
                <label for="inputInstructies">Instructies</label>
                <textarea class="form-control" id="inputInstructies" rows="3"></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Bestellen</button>
    </form>
</body>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //define input variables
    $voorNaam = filter_var($_POST['inputVoornaam'], FILTER_SANITIZE_STRING);
    $Tussenvoegsel = filter_var($_POST['inputTussenvoegsel'], FILTER_SANITIZE_STRING);
    $Achternaam = filter_var($_POST['inputAchternaam'], FILTER_SANITIZE_STRING);

    $eMail = filter_var(filter_var($_POST['inputEmail'], FILTER_SANITIZE_STRING), FILTER_VALIDATE_EMAIL);
    $straatNaam = filter_var($_POST['inputStraatNaam'], FILTER_SANITIZE_STRING);
    $huisNummer = filter_var($_POST['inputHuisNummer'], FILTER_SANITIZE_NUMBER_INT);
    $Plaats = filter_var($_POST['inputPlaats'], FILTER_SANITIZE_STRING);
    $Postcode = filter_var($_POST['inputPostcode'], FILTER_SANITIZE_STRING);
    $Instructies = filter_var($_POST['inputInstructies'], FILTER_SANITIZE_STRING);
}
    ?>
