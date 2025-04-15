<?php
// Show all errors, warnings, and notices
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the path config. This is to make it easy to manage my URLs when I upload to production, that is cpanel
// require_once __DIR__ . '/../config/paths.php';
include __DIR__ . '/../config/paths.php';
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

<body>
  <div class="page">
    <header class="navbar navbar-expand-md navbar-light d-print-none">
      <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
          <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
          <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
            <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
            <div class="d-none d-xl-block ps-2">
              <div><?php echo htmlspecialchars($creator_username); ?></div>
              <div class="mt-1 small text-muted">132 supporters</div>
            </div>
          </a>
        </h1>
        <div class="navbar-nav flex-row order-md-last">
          <div class="nav-item d-none d-md-flex me-3">
            <div class="btn-list">
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
                    <a class="dropdown-item" href="#">👥 Follow</a>
                    <a class="dropdown-item" href="#">🔗 Share</a>
                    <a class="dropdown-item" href="#">🚩 Report</a>
                  </div>
                </div>
              </div>
              <a href="#" class="btn btn-link text-dark" target="_blank" rel="noreferrer">
                Login
              </a>
            </div>
          </div>
        </div>
      </div>
    </header>