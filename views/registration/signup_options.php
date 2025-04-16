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
            <div class="card card-md card-custom">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4"><strong>Step 2: Choose how to sign up</strong></h2>
                    <p class="text-center mb-4">Username selected: <strong><?php echo htmlspecialchars($username); ?></strong></p>

                    <?php if (isset($_SESSION['error_message'])): ?>
                        <div class="alert alert-danger">
                            <?php echo $_SESSION['error_message'];
                            unset($_SESSION['error_message']); ?>
                        </div>
                    <?php endif; ?>

                    <div class="d-flex flex-column mb-3">
                        <a href="../../handlers/google_auth.php" class="btn btn-google w-100 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-google" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M17.788 5.108a9 9 0 1 0 3.212 6.892h-8"></path>
                            </svg>
                            Sign up with Google
                        </a>

                        <div class="text-center my-3">
                            <span class="text-muted">OR</span>
                        </div>

                        <a href="email_signup.php" class="btn btn-primary w-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z"></path>
                                <path d="M3 719 619 -6"></path>
                            </svg>
                            Sign up with Email
                        </a>
                    </div>

                    <div class="text-center text-muted mt-3">
                        <a href="register.php" class="text-muted">← Go back to username selection</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Libs JS -->
    <script src="<?php echo path('assets', 'dist'); ?>js/tabler.min.js" defer></script>
    <script src="<?php echo path('assets', 'dist'); ?>js/demo.min.js" defer></script> 
</body>

</html>