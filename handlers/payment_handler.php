<?php
// Include database and necessary classes
include_once '../config/database.php';
include_once '../classes/Creator.php';
// You might need to create a Payment class later

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
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    // Validate input
    if(empty($creator_id) || empty($amount)) {
        $error_message = "Missing required payment information";
    }
    else if($amount < 1000) {
        $error_message = "Minimum tip amount is 1000 sats";
    } 
    else {
        // Here you would integrate with a Bitcoin payment processor
        // For now we'll just simulate a successful payment

        // In a real implementation, you would:
        // 1. Generate a Bitcoin address or Lightning invoice
        // 2. Store the payment request in your database
        // 3. Redirect to a payment confirmation page
        
        $success_message = "Payment of {$amount} sats initiated for {$creator_username}!";

        // Redirect to a payment confirmation page
        header("Location: ../views/payment/confirmation.php?creator={$creator_username}&amount={$amount}");
        exit();
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