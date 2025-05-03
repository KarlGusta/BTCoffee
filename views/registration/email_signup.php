<?php
// Show all errors, warnings, and notices
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the path config
include __DIR__ . '/../../config/paths.php';

// Start or resume the session
session_start();

// Check if username is set in session
if (!isset($_SESSION['temp_username'])) {
    // Redirect to the first step if username is not set
    header("Location: register.php");
    exit();
}

$username = $_SESSION['temp_username'];
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>BTCoffee - Easiest way to tip with Bitcoin</title>

    <!-- Favicon -->
    <link rel="icon" href="<?php echo path('assets', 'img'); ?>favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo path('assets', 'img'); ?>favicon.ico" type="image/x-icon">

    <!-- CSS files -->
    <link rel="stylesheet" href="<?php echo path('assets', 'dist'); ?>css/tabler.min.css" />
    <link rel="stylesheet" href="<?php echo path('assets', 'dist'); ?>css/tabler-flags.min.css" />
    <link rel="stylesheet" href="<?php echo path('assets', 'dist'); ?>css/tabler-payments.min.css" />
    <link rel="stylesheet" href="<?php echo path('assets', 'dist'); ?>css/tabler-vendors.min.css" />
    <link rel="stylesheet" href="<?php echo path('assets', 'dist'); ?>css/demo.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo path('assets', 'css'); ?>style.css" />
</head>

<body class="border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
        <div class="container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36" alt=""></a>
            </div>
            <form class="card card-md card-custom" action="../../handlers/register_handler.php" method="post">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4"><strong>Step 3: Complete Your Registration</strong></h2>
                    <p class="text-center mb-4">Username: <strong><?php echo htmlspecialchars($username); ?></strong></p>

                    <?php if (isset($_SESSION['error_message'])): ?>
                        <div class="alert alert-danger">
                            <?php echo $_SESSION['error_message'];
                            unset($_SESSION['error_message']); ?>
                        </div>
                    <?php endif; ?>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="you@example.com" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <small class="form-hint">Password must be at least 8 characters long</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                    </div>

                    <!-- Hidden field to pass the username -->
                    <input type="hidden" name="username" value="<?php echo htmlspecialchars($username); ?>">
                    
                    <div class="form-footer">
                        <button type="submit" name="register" class="btn btn-primary w-100">Create account</button>
                    </div>

                    <div class="text-center text-muted mt-3">
                        <a href="signup_options.php" class="text-muted">← Back to signup options</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Libs JS -->
    <script src="<?php echo path('assets', 'dist'); ?>js/tabler.min.js" defer></script>
    <script src="<?php echo path('assets', 'dist'); ?>js/demo.min.js" defer></script> 
</body>

</html>