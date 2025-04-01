<?php
// Include database and necessary classes
include_once '../config/database.php';
include_once '../classes/Creator.php';
include_once '../classes/Payment.php';
include_once '../classes/LightningService.php';

// Initialize variables
$error_message = "";
$success_message = "";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get database connection
    $database = new Database();
    $db = $database->getConnection();

    // Get form data
    $creator_id = isset($_POST['creator_id']) ? $_POST['creator_id'] : null;
    $creator_username = isset($_POST['creator_username']) ? $_POST['creator_username'] : null;
    $amount = isset($_POST['amount']) ? (int)$_POST['amount'] : 0;
    $currency = isset($_POST['currency']) ? $_POST['currency'] : 'sats';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    // Validate input
    if(empty($creator_id) || empty($amount)) {
        $error_message = "Missing required payment information";
    }
    else if($amount < 1000 && $currency === 'sats') {
        $error_message = "Minimum tip amount is 1000 sats";
    } 
    else {
        // Convert to satoshis if needed
        if ($currency !== 'sats') {
            // Fetch currency BTC price
            $btc_price_data = file_get_contents('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd,eur');
            $btc_price = json_decode($btc_price_data, true);

            if ($currency === 'usd') {
                $amount = round(($amount / $btc_price['bitcoin']['usd']) * 100000000);
            } else if ($currency === 'eur') {
                $amount = round(($amount / $btc_price['bitcoin']['eur']) * 100000000);
            }
        }

        // Create Lightning service
        $lightning = new LightningService();

        // Generate invoice
        $invoice_data = $lightning->createInvoice(
            $amount,
            "Tip for {$creator_username} on BTCoffee",
            $creator_id
        );

        if ($invoice_data) {
            // Store payment information
            $payment = new Payment($db);
            $payment->creator_id = $creator_id;
            $payment->amount = $amount;
            $payment->currency = 'sats'; // Always store in sats
            $payment->message = $message;
            $payment->invoice_id = $invoice_data['id'];
            $payment->lightning_invoice = $invoice_data['lightning_invoice'];
            $payment->status = 'pending';

            if ($payment->create()) {
                // Redirect to payment page
                header("Location: ../views/payment/invoice.php?id=" . $invoice_data['id']);
                exit();
            } else {
                $error_message = "Failed to create payment record";
            }
        } else {
            $error_message = "Failed to generate Lightning invoice";
        }
    }

    // If there was an error, redirect back to the creator page with the error
    if(!empty($error_message)) {
        header("Location: ../views/creator/creator.php?username={$creator_username}&error=" . urlencode($error_message));
        exit();
    }
}
else {
    // If not a POST request, redirect to home
    header("Location: ../index.php");
    exit();
}
?>