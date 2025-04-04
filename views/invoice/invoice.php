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
                            <p>Amount: <?php echo number_format($payment->amount); ?> sats</p>

                            <div class="qr-container">
                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=<?php echo urlencode($payment->lightning_invoice); ?>" alt="Lightning Invoice QR Code">
                            </div>

                            <div class="invoice-text">
                                <p>Lightning Invoice:</p>
                                <textarea readonly onclick="this.select()"><?php echo $payment->lightning_invoice; ?></textarea>
                                <button class="btn copy-btn" onclick="copyInvoice()">Copy Invoice</button>
                            </div>

                            <div class="payment-instructions">
                                <p>1. Open your Lightning wallet</p>
                                <p>2. Scan the QR code or paste the invoice</p>
                                <p>3. Confirm the payment</p>
                                <p>This page will automatically update when payment is received</p>
                            </div>

                            <div class="payment-status">
                                <p>Status: <span id="status"><?php echo ucfirst($payment->status); ?></span></p>
                                <p>Expires in: <span id="countdown">Loading...</span></p>
                            </div>
                        </div>    
                    <?php endif; ?>    
                </div>
            </main>

            <footer>
                <p>&copy; <?php echo date('Y'); ?> BTCoffee - The easiest way to receive Bitcoin tips</p>
            </footer>
        </div>

        <script>
            // Copy invoice to clipboard
            function copyInvoice() {
                const invoiceText = document.querySelector('.invoice-text textarea');
                invoiceText.select();
                document.execCommand('copy');

                const copyBtn = document.querySelector('.copy-btn');
                copyBtn.textContent = 'Copied!';
                setTimeout(() => {
                    copyBtn.textContent = 'Copy Invoice';
                }, 2000);
            }

            // Set expiry countdown
            document.addEventListener('DOMContentLoaded', function() {
                // Set expiry time (15 minutes from now as an example)
                const expiryTime = new Date();
                expiryTime.setMinutes(expiryTime.getMinutes() + 15);

                // Update countdown every second
                const countdownElement = document.getElementById('countdown');

                function updateCountdown() {
                    const now = new Date();
                    const timeLeft = expiryTime - now;

                    if (timeLeft <= 0) {
                        countdownElement.textContent = 'Expired';
                        return;
                    }

                    const minutes = Math.floor(timeLeft / (1000 * 60));
                    const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

                    countdownElement.textContent = `${minutes}m ${seconds}s`;
                }

                // Initial update
                updateCountdown();

                // Update every second
                setInterval(updateCountdown, 1000); 
            })
        </script>
    </body>
</html>