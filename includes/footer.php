<footer class="footer footer-transparent d-print-none">
  <div class="container-xl">
    <div class="row text-center align-items-center flex-row-reverse">
      <div class="col-12 col-lg-auto mt-3 mt-lg-0">
        <ul class="list-inline list-inline-dots mb-0 footer-text-small">
          <li class="list-inline-item">
            Copyright &copy; <script>
              document.write(new Date().getFullYear())
            </script>
            <a href="." class="link-secondary">BTCoffee - The easiest way to receive Bitcoin tips</a>            
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
</div>
</div>
<!-- Libs JS -->
<script src="<?php echo path('assets', 'dist'); ?>libs/apexcharts/dist/apexcharts.min.js" defer></script>
<!-- Datepicker -->
<script src="<?php echo path('assets', 'dist'); ?>libs/litepicker/dist/litepicker.js" defer></script>
<script src="<?php echo path('assets', 'dist'); ?>libs/jsvectormap/dist/js/jsvectormap.min.js" defer></script>
<script src="<?php echo path('assets', 'dist'); ?>libs/jsvectormap/dist/maps/world.js" defer></script>
<script src="<?php echo path('assets', 'dist'); ?>libs/jsvectormap/dist/maps/world-merc.js" defer></script>
<!-- Tabler Core -->
<script src="<?php echo path('assets', 'dist'); ?>js/tabler.min.js" defer></script>
<script src="<?php echo path('assets', 'dist'); ?>js/demo.min.js" defer></script>

<!-- The BTC Coffee Scripts -->
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