<?php
// Show all errors, warnings, and notices
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the path config. This is to make it easy to manage my URLs when I upload to production, that is cpanel
// require_once __DIR__ . '/../config/paths.php';
include __DIR__ . '/../../config/paths.php';
?>

<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta10
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>BTCoffee - Easiest way to tip with Bitcoin</title>

    <!-- Favicon -->
    <link rel="icon" href="<?php echo path('assets', 'img'); ?>favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo path('assets', 'img'); ?>favicon.ico" type="image/x-icon">

    <!-- CSS files - Updated with path() function -->
    <link href="<?php echo path('assets', 'dist'); ?>css/tabler.min.css" rel="stylesheet" />
    <link href="<?php echo path('assets', 'dist'); ?>css/tabler-flags.min.css" rel="stylesheet" />
    <link href="<?php echo path('assets', 'dist'); ?>css/tabler-payments.min.css" rel="stylesheet" />
    <link href="<?php echo path('assets', 'dist'); ?>css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="<?php echo path('assets', 'dist'); ?>css/demo.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="<?php echo path('assets', 'css'); ?>style.css" rel="stylesheet" />
</head>

<body class=" border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
        <div class="container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36" alt=""></a>
            </div>
            <form class="card card-md card-custom" action="." method="get">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4"><strong>Create your account</strong></h2>
                    <div class="mb-3">
                        <label class="form-label">Choose a username for your page</label>
                        <div class="input-group input-group-flat">
                            <span class="input-group-text">
                                <strong>https://btcoffee.com/</strong>
                            </span>
                            <input type="text" id="username" name="username" class="form-control ps-0 text-muted is-valid is-valid-lite" placeholder="yourname" autocomplete="off">
                            <div id="username-feedback" class="invalid-feedback"></div>
                        </div>
                        <div class="mt-1">
                            <span id="username-status"></span>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100 btn-custom">Sign Up</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="<?php echo path('assets', 'dist'); ?>js/tabler.min.js" defer></script>
    <script src="<?php echo path('assets', 'dist'); ?>js/demo.min.js" defer></script>

    <!-- Check if username exists -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const usernameInput = document.getElementById('username');
            const usernameStatus = document.getElementById('username-status');
            const usernameFeedback = document.getElementById('username-feedback');
            let checkUsernameTimeout = null;

            usernameInput.addEventListener('input', function() {
                // Clear any previous timeout
                if (checkUsernameTimeout) {
                    clearTimeout(checkUsernameTimeout);
                }

                const username = this.value.trim();

                // Reset styling
                usernameInput.classList.remove('is-valid', 'is-valid');
                usernameStatus.innerHTML = '';

                // Only check if there's a username entered
                if (username.length > 0) {
                    // Show "checking..." status 
                    usernameStatus.innerHTML = '<small class="text-muted">Checking availability...</small>';

                    // Set a timeout to check username after typing stops
                    checkUsernameTimeout = setTimeout(() => {
                        checkUsernameAvailability(username);
                    }, 500); // 500ms delay
                }
            });

            function checkUsernameAvailability(username) {
                // Make AJAX request to check username
                fetch('../../handlers/check_username.php?username=' + encodeURIComponent(username))
                    .then(response => response.json())
                    .then(data => {
                        if (data.available) {
                            // Username is available
                            usernameInput.classList.add('is-valid');
                            usernameInput.classList.remove('is-invalid');
                            usernameStatus.innerHTML = '<small class="text-success">Username available! ✓</small>';
                        } else {
                            // Username is taken
                            usernameInput.classList.add('is-invalid');
                            usernameInput.classList.remove('is-valid');
                            usernameFeedback.textContent = 'This username is already taken.';
                            usernameStatus.innerHTML = '<small class="text-danger">Username already taken ✗</small>';
                        }
                    })
                    .catch(error => {
                        console.error('Error checking username:', error);
                        usernameStatus.innerHTML = '<small class="text-danger">Error checking availability</small>';
                    });
            }
        });
    </script>
</body>

</html>