<?php
// Include database, creator class, and paths configuration
include_once '../../config/database.php';
include_once '../../classes/Creator.php';
include_once '../../config/paths.php';

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
    header("Location: " . path('home'));
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $creator_username; ?>'s Profile</title>
    <link rel="stylesheet" href="<?php echo path('assets', 'css'); ?>/style.css">
</head>

<body>
    <div class="container">
        <header>
            <nav>
                <a href="<?php echo path('home'); ?>">Home</a>
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
                        <form action="<?php echo path('handlers'); ?>/payment_handler.php" method="post" class="payment-form">
                            <input type="hidden" name="creator_id" value="<?php echo $creator_id; ?>">
                            <input type="hidden" name="creator_username" value="<?php echo htmlspecialchars($creator_username); ?>">

                            <div class="form-group">
                                <label for="amount">Amount:</label>
                                <div class="amount-input-group">
                                    <input type="number" id="amount" name="amount" min="1000" step="1000" value="10000" required>
                                    <select id="currency" name="currency">
                                        <option value="sats">sats</option>
                                        <option value="usd">USD</option>
                                        <option value="eur">EUR</option>
                                    </select>
                                </div>
                                <p id="conversion-display">≈ $0.00 USD</p>
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
                                <?php
                                // Use a default address if the creator hasn't set one
                                $bitcoin_address = !empty($creator->bitcoin_address) ? $creator->bitcoin_address : "bc1q...address";
                                ?>
                                <!-- QR code will be inserted here via JavaScript -->
                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=bitcoin:<?php echo htmlspecialchars($bitcoin_address); ?>?amount=0.0001" alt="Bitcoin QR Code"> 
                            </div>
                            <p class="bitcoin-address"><?php echo htmlspecialchars($bitcoin_address); ?></p>
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
                const bitcoinAddress = document.querySelector('.bitcoin-address').textContent;
                qrImage.src = `https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=bitcoin:${bitcoinAddress}?amount=${amount}`;
            });

            // Currency conversion
            const currencySelect = document.getElementById('currency');
            const conversionDisplay = document.getElementById('conversion-display');

            // Bitcoin price in USD (you would fetch this from an API)
            let btcPriceUSD = 50000; // Example price

            // Fetch current Bitcoin price
            fetch('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd,eur')
                 .then(response => response.json())
                 .then(data => {
                    btcPriceUSD = data.bitcoin.usd;
                    updateConversionDisplay();
                 }) 
                 .catch(error => console.error('Error fetching Bitcoin price:', error));

            function updateConversionDisplay() {
                const amount = parseFloat(amountInput.value);
                const currency = currencySelect.value;

                if (currency === 'sats') {
                    // Convert sats to USD
                    const amountUSD = (amount / 100000000) * btcPriceUSD;
                    conversionDisplay.textContent = `≈ $${amountUSD.toFixed(2)} USD`;
                } else if (currency === 'usd') {
                    // Convert USD to sats
                    const amountSats = (amount / btcPriceUSD) * 100000000;
                    conversionDisplay.textContent = `≈ ${Math.round(amountSats)} sats`;
                } else if (currency === 'eur') {
                    // Convert EUR to sats (assuming we have EUR price from API)
                    const amountSats = (amount / btcPriceUSD * 0.85) * 100000000; // Rough EUR conversion
                    conversionDisplay.textContent = `≈ ${Math.round(amountSats)} sats`;  
                }
            }     

            amountInput.addEventListener('input', updateConversionDisplay);
            currencySelect.addEventListener('change', function() {
                if (currencySelect.value === 'usd') {
                    amountInput.value = 5; // Default USD amount
                    amountInput.min = 1;
                    amountInput.step = 1;
                } else if (currencySelect.value === 'eur') {
                    amountInput.value = 5; // Default EUR amount
                    amountInput.min = 1;
                    amountInput.step = 1;
                } else {
                    amountInput.value = 10000; // Default sats amount
                    amountInput.min = 1000;
                    amountInput.step = 1000; 
                }
                updateConversionDisplay();
            });            
        });
    </script>
</body>

</html>