<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//Load Composer's autoloader
require 'vendor/autoload.php';
require 'config/EmailCredentials.php';

try {
    /*
     * Initialize the Mollie API library with your API key.
     *
     * See: https://www.mollie.com/dashboard/developers/api-keys
     */
    require "config/initialize.php";

    $paymentID = $_POST["id"];
    /*
     * Retrieve the payment's current state.
     */
    $payment = $mollie->payments->get($paymentID);
    $orderId = $payment->metadata->order_id;
    $eMailadress = $payment->metadata->emailAdress;

    if ($payment->isPaid() && ! $payment->hasRefunds() && ! $payment->hasChargebacks()) {
        /*
                 * The payment is paid and isn't refunded or charged back.
                 * At this point you'd probably want to start the process of delivering the product to the customer.
                 */
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
            $mail->addAddress($eMailadress);
            $mail->addReplyTo(EMAIL, 'Information');

            //Content
            $mail->Subject = 'confirmatie Bestelling #'. $orderId;
            $mail->Body = '<p>
                Hallo,
                We hebben uw betalling in goede orde ontvangen<br>
                en zijn nu hard bezig met uw bestelling<br>
                <br>
                Al onze producten worden met de hand gemaakt<br>
                Waardoor wij een leveringstijd hanteren van 3 a 4 dagen<br>
                alvast bedankt voor u geduld <br>
            </p>';
            $mail->AltBody = 'confirmatie van u bestelling';

            $mail->send();

        } catch (Exception $e) {
            echo $e;
        }
    } elseif ($payment->isOpen()) {
        /*
         * The payment is open.
         */
    } elseif ($payment->isPending()) {
        /*
         * The payment is pending.
         */
    } elseif ($payment->isFailed()) {
        /*
         * The payment has failed.
         */
    } elseif ($payment->isExpired()) {
        /*
         * The payment is expired.
         */
    } elseif ($payment->isCanceled()) {
        /*
         * The payment has been canceled.
         */
    } elseif ($payment->hasRefunds()) {
        /*
         * The payment has been (partially) refunded.
         * The status of the payment is still "paid"
         */
    } elseif ($payment->hasChargebacks()) {
        /*
         * The payment has been (partially) charged back.
         * The status of the payment is still "paid"
         */
    }
} catch (\Mollie\Api\Exceptions\ApiException $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}