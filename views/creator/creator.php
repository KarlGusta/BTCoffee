<?php
// Include database and creator class
include_once '../../config/database.php';
include_once '../../classes/Creator.php';

// Get username from URL
$username = isset($_GET['username']) ? $_GET['username'] : die('ERROR: Missing username.');

// Get database connection
$database = new Database();
$db = $database->getConnection();

// Create creator object
$creator = new Creator($db);
$creator->username = $username;

// Try to fetch creator details
if ($creator->readOne()) {
    $creator_id = $creator->id;
    $creator_username = $creator->username;
    $creator_email = $creator->email;
    $creator_profile_link = $creator->profile_link;
} else {
    // Creator not found
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $creator_username; ?>'s Profile</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="container">
        <header>
            <nav>
                <a href="../index.php">Home</a>
            </nav>
        </header>
        <main>
            <div class="profile-header">
                <h1><?php echo htmlspecialchars($creator_username); ?>'s Creator Profile</h1>
                <p class="join-date">Member since: <?php echo date('F j, Y', strtotime($creator->created_at)); ?></p>
            </div>

            <div class="profile-content">
                <div class="profile-section">
                    <h2>About</h2>
                    <p>Profile Link: <a href="<?php echo htmlspecialchars($creator_profile_link); ?>"><?php echo htmlspecialchars($creator_profile_link); ?></a></p>
                    <!-- You could add a bio field to your creators table -->
                </div>

                <div class="profile-section">
                    <h2>Support <?php echo htmlspecialchars($creator_username); ?></h2>
                    
                     <div class="donation-options">
                        <form action="../../handlers/payment_handler.php" method="post" class="payment-form">
                            <input type="hidden" name="creator_id" value="<?php echo $creator_id; ?>">
                            <input type="hidden" name="creator_username" value="<?php echo htmlspecialchars($creator_username); ?>">

                            <div class="form-group">
                                <label for="amount">Amount (in sats):</label>
                                <input type="number" id="amount" name="amount" min="1000" step="1000" value="10000" required>
                            </div>

                            <div class="form-group">
                                <label for="message">Message (optional):</label>
                                <textarea name="message" id="message" rows="2" maxlength="200"></textarea>
                            </div>

                            <div class="payment-buttons">
                                <button type="submit" class="btn donate-btn">Send Bitcoin Tip</button>
                                <button type="button" class="btn qr-btn" id="showQR">Show QR Code</button>
                            </div>
                        </form>

                        <div id="bitcoin-qr" class="bitcoin-qr" style="display: none;">
                            <h3>Scan to Pay</h3>
                            <div class="qr-container">
                                <!-- QR code will be inserted here via JavaScript -->
                                 <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=bitcoin:<?php echo htmlspecialchars($creator_username); ?>?amount=0.0001" alt="Bitcoin QR Code">
                            </div>
                            <p class="bitcoin-address">bc1q...address</p>
                            <p class="payment-note">Scan with any Bitcoin wallet to send a tip</p>
                        </div>
                     </div>
                </div>
            </div>
        </main>

        <footer>
            <p>&copy; <?php echo date('Y'); ?> BTCoffee - The easiest way to receive Bitcoin tips</p>
        </footer>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const showQRButton = document.getElementById('showQR');
            const bitcoinQR = document.getElementById('bitcoin-qr');

            showQRButton.addEventListener('click', function() {
                if (bitcoinQR.style.display === 'none') {
                    bitcoinQR.style.display = 'block';
                    showQRButton.textContent = 'Hide QR Code';
                } else {
                    bitcoinQR.style.display = 'none';
                    showQRButton.textContent = 'Show QR Code';
                }
            });

            // Update QR code when amount changes
            const amountInput = document.getElementById('amount');
            amountInput.addEventListener('change', function() {
                const amount = parseFloat(amountInput.value) / 100000000; // Convert sats to BTC
                const qrImage = document.querySelector('.qr-container img');
                qrImage.src = `https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=bitcoin:bc1q...address?amount=${amount}`;
            });
        });
    </script>
</body>

</html>