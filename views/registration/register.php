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
                            <input type="text" class="form-control ps-0 text-muted is-valid is-valid-lite" value="yourname" autocomplete="off">
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
</body>

</html>