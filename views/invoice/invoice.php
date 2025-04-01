<?php
// Include database and necessary classes
include_once '../../config/database.php';
include_once '../../classes/Payment.php';
include_once '../../classes/Creator.php';
include_once '../../classes/LightningService.php';

// Get invoice ID from URL
$invoice_id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Missing invoice ID.');

// Get database connection
$database = new Database();
$db = $database->getConnection();

// Create payment object
$payment = new Payment($db);
$payment->invoice_id = $invoice_id;

// Try to fetch payment details
if ($payment->readByInvoiceId()) {
    // Get creator details
    $creator = new Creator($db);
    $creator->id = $payment->creator_id;
    $creator->readOne();

    // Check if payment is still pending
    $lightning = new LightningService();
    $current_status = $lightning->checkInvoiceStatus($invoice_id);

    if ($current_status && $current_status !== $payment->status) {
        $payment->status = $current_status;
        $payment->updateStatus();
    }
} else {
    // Payment not found
    header("Location: ../../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lightning Payment</title>
        <link rel="stylesheet" href="../../assets/css/style.css">
        <meta http-equiv="refresh" content="30"> <!-- Auto-refresh to check payment status -->
    </head>
    <body>
        <div class="container">
            <header>
                <nav>
                    <a href="../../index.php">Home</a>
                </nav>
            </header>
            <main>
                <div class="payment-header">
                    <h1>Lightning Payment</h1>
                    <p>Tipping <?php echo htmlspecialchars($creator->username); ?></p>
                </div>

                <div class="payment-content">
                    <?php if ($payment->status === 'paid' || $payment->status === 'confirmed'): ?>
                        <div class="payment-success">
                            <h2>Payment Successful!</h2>
                            <p>Thank you for supporting <?php echo htmlspecialchars($creator->username); ?>!</p>
                            <p>Amount: <?php echo number_format($payment->amount); ?> sats</p>
                            <a href="../creator/creator.php?username=<?php echo htmlspecialchars($creator->username); ?>" class="btn">Return to Creator Page</a>
                        </div>
                    <?php else: ?>
                        <div class="payment-pending">
                            <h2>Scan to Pay</h2>
                        </div>    
                </div>
            </main>
        </div>
    </body>
</html>