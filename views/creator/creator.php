<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

// Only include header files after all potential redirects
include '../../includes/header.php';
?>

<div class="page-wrapper">
  <div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
      <div class="row g-2 align-items-center">
        <!-- Empty for spacing purposes -->
      </div>
    </div>
  </div>
  <div class="page-body">
    <div class="container-xl">
      <div class="row row-deck row-cards">
        <div class="col-lg-6">
          <div class="card card-custom">
            <div class="card-body">
              <div class="col">
                <h2 class="h3">About <?php echo htmlspecialchars($creator_username); ?></h2>
                <p class="mb-2 text-muted">I create a variety of content but mainly thrifting videos.</p>
                <a href="#" class="d-block"><img src="<?php echo path('assets', 'img'); ?>karl_image.png" class="card-img-top" style="max-height: 320px; object-fit: cover;"></a>
                <p class="mt-2 text-muted">I am an avid thrifter & reseller on Youtube Ebay & Mercari. I offer a variety of content including Thrift Hauls, Shop Along's, Diy's, Crafts, Cooking & Baking. </p>
                <hr>
                <h2 class="h3">Recent supporters</h2>
                <div class="divide-y">
                  <div>
                    <div class="row">
                      <div class="col-auto">
                        <span class="avatar">JL</span>
                      </div>
                      <div class="col">
                        <div class="text-truncate">
                          <strong>Someone </strong>bought 5 coffees.
                        </div>
                        <div class="text-muted">Thanks so much!</div>
                      </div>
                      <div class="col-auto align-self-center">
                        <div class="dropdown">
                          <a href="#" class="btn-action dropdown-toggle fw-bold" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-dots">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path d="M5 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                              <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                              <path d="M19 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                            </svg>
                          </a>
                          <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Share</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="row">
                      <div class="col-auto">
                        <span class="avatar" style="background-image: url(./static/avatars/002m.jpg)"></span>
                      </div>
                      <div class="col">
                        <div class="text-truncate">
                          <strong>Someone </strong>bought 5 coffees.
                        </div>
                      </div>
                      <div class="col-auto align-self-center">
                        <div class="dropdown">
                          <a href="#" class="btn-action dropdown-toggle fw-bold" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-dots">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path d="M5 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                              <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                              <path d="M19 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                            </svg>
                          </a>
                          <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Share</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="row">
                      <div class="col-auto">
                        <span class="avatar" style="background-image: url(./static/avatars/003m.jpg)"></span>
                      </div>
                      <div class="col">
                        <div class="text-truncate">
                          <strong>Someone </strong>bought 5 coffees.
                        </div>
                      </div>
                      <div class="col-auto align-self-center">
                        <div class="dropdown">
                          <a href="#" class="btn-action dropdown-toggle fw-bold" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-dots">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path d="M5 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                              <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                              <path d="M19 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                            </svg>
                          </a>
                          <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Share</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="row">
                      <div class="col-auto">
                        <span class="avatar" style="background-image: url(./static/avatars/003m.jpg)"></span>
                      </div>
                      <div class="col">
                        <div class="text-truncate">
                          <strong>Someone </strong>bought 5 coffees.
                        </div>
                        <div class="text-muted">Thanks so much!</div>
                      </div>
                      <div class="col-auto align-self-center">
                        <div class="dropdown">
                          <a href="#" class="btn-action dropdown-toggle fw-bold" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-dots">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path d="M5 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                              <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                              <path d="M19 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                            </svg>
                          </a>
                          <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Share</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="row">
                      <div class="col-auto">
                        <span class="avatar">AA</span>
                      </div>
                      <div class="col">
                        <div class="text-truncate">
                          <strong>Someone </strong>bought 5 coffees.
                        </div>
                        <div class="text-muted">Thanks so much!</div>
                      </div>
                      <div class="col-auto align-self-center">
                        <div class="dropdown">
                          <a href="#" class="btn-action dropdown-toggle fw-bold" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-dots">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path d="M5 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                              <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                              <path d="M19 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                            </svg>
                          </a>
                          <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Share</a>
                          </div>
                        </div>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card card-custom">
            <div class="card-header">
              <h3 class="card-title">Buy <?php echo htmlspecialchars($creator_username); ?> a coffee</h3>
            </div>
            <div class="card-body">
              <form action="<?php echo path('handlers'); ?>/payment_handler.php" method="post" class="payment-form">
                <input type="hidden" name="creator_id" value="<?php echo $creator_id; ?>">
                <input type="hidden" name="creator_username" value="<?php echo htmlspecialchars($creator_username); ?>">

                <div class="form-group mb-3">
                  <div class="form-selectgroup">
                    <label class="form-selectgroup-item">
                      <span class="form-selectgroup-label-coffee">☕</span>
                    </label>
                    <label class="form-selectgroup-item">
                      <span class="form-selectgroup-label-x-sign">X</span>
                    </label>
                    <label class="form-selectgroup-item">
                      <input type="radio" name="coffee_count" value="1" class="form-selectgroup-input" checked>
                      <span class="form-selectgroup-label-input">1</span>
                    </label>
                    <label class="form-selectgroup-item">
                      <input type="radio" name="coffee_count" value="2" class="form-selectgroup-input">
                      <span class="form-selectgroup-label-input">2</span>
                    </label>
                    <label class="form-selectgroup-item">
                      <input type="radio" name="coffee_count" value="3" class="form-selectgroup-input">
                      <span class="form-selectgroup-label-input">3</span>
                    </label>
                    <label class="form-selectgroup-item">
                      <input type="number" id="custom_count" name="custom_count" class="form-selectgroup-input-custom" min="1" placeholder="10">
                    </label>
                  </div>
                  <input type="hidden" name="amount" id="amount" value="1000">
                </div>

                <div class="form-group mb-3">
                  <input type="text" class="form-control" placeholder="Name or @yoursocial">
                </div>

                <div class="form-group mb-3">
                  <textarea name="message" id="message" rows="5" maxlength="200" placeholder="Say something nice..."></textarea>
                </div>
                <div class="form-footer">
                  <button type="submit" id="support-button" class="btn btn-primary w-100 form-control-rounded btn-custom">Support with 1,000 sats</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include '../../includes/footer.php'; ?>
  
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Base amount per coffee in sats
      const baseCoffeeAmount = 1000;
      
      // Get all coffee count radio buttons
      const coffeeRadios = document.querySelectorAll('input[name="coffee_count"]');
      const customCountInput = document.getElementById('custom_count');
      const amountInput = document.getElementById('amount');
      const supportButton = document.getElementById('support-button');
      
      // Function to update amount and button text
      function updateAmount() {
        let coffeeCount = 1; // Default to 1
        
        // Check if any radio is selected
        const selectedRadio = document.querySelector('input[name="coffee_count"]:checked');
        if (selectedRadio) {
          coffeeCount = parseInt(selectedRadio.value);
          // Update custom input placeholder to match selected value
          customCountInput.placeholder = coffeeCount;
        } else if (customCountInput.value) {
          // Use custom count if no radio selected and custom has a value
          coffeeCount = parseInt(customCountInput.value);
        }
        
        // Calculate total amount
        const totalAmount = baseCoffeeAmount * coffeeCount;
        
        // Update hidden amount input
        amountInput.value = totalAmount;
        
        // Update button text
        supportButton.textContent = `Support with ${totalAmount.toLocaleString()} sats`;
      }
      
      // Add event listeners to all inputs
      coffeeRadios.forEach(radio => {
        radio.addEventListener('change', function() {
          // When a radio is selected, clear the custom input
          customCountInput.value = '';
          updateAmount();
        });
      });
      
      customCountInput.addEventListener('input', function() {
        // When custom input changes, uncheck any selected radio
        coffeeRadios.forEach(radio => {
          radio.checked = false;
        });
        updateAmount();
      });
      
      // Don't update automatically on page load - only when user interacts with inputs
      // Initial amount should match the checked radio button (which defaults to 1)
      const initialSelectedRadio = document.querySelector('input[name="coffee_count"]:checked');
      if (initialSelectedRadio) {
        const initialAmount = baseCoffeeAmount * parseInt(initialSelectedRadio.value);
        amountInput.value = initialAmount;
        supportButton.textContent = `Support with ${initialAmount.toLocaleString()} sats`;
      }
    });
  </script>
</div>