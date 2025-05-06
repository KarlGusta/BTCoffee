<?php
// Show all errors, warnings, and notices
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the path config. This is to make it easy to manage my URLs when I upload to production, that is cpanel
// require_once __DIR__ . '/../config/paths.php';
include __DIR__ . '/../../config/paths.php';
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
        <aside class="navbar navbar-vertical navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark">
                    <a href=".">
                        <img src="<?php echo path('assets', 'img'); ?>coffee_transparent.png" width="110" height="32" alt="BTCoffee" class="navbar-brand-image-custom">
                    </a>
                </h1>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="navbar-nav pt-lg-3">
                        <li class="nav-item">
                            <a class="nav-link" href="./index.html">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Home icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Home
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.html">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Eye/View icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="12" cy="12" r="2" />
                                        <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    View page
                                </span>
                                <span class="nav-link-icon d-md-none d-lg-inline-block ms-auto">
                                    <!-- Alternative share icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-external-link" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M11 7h-5a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-5" />
                                        <path d="M10 14l10 -10" />
                                        <path d="M15 4h5v5" />
                                    </svg>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.html">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Users/Explore icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="12" cy="7" r="4" />
                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Explore Creators
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.html">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Heart/Supporters icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Supporters
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.html">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- ID/Membership icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <rect x="3" y="4" width="18" height="16" rx="3" />
                                        <circle cx="9" cy="10" r="2" />
                                        <line x1="15" y1="8" x2="17" y2="8" />
                                        <line x1="15" y1="12" x2="17" y2="12" />
                                        <line x1="7" y1="16" x2="17" y2="16" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Memberships
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.html">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Shopping cart icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="6" cy="19" r="2" />
                                        <circle cx="17" cy="19" r="2" />
                                        <path d="M17 17h-11v-14h-2" />
                                        <path d="M6 5l14 1l-1 7h-13" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Shop
                                </span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Edit/Publish icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                        <line x1="9" y1="9" x2="10" y2="9" />
                                        <line x1="9" y1="13" x2="15" y2="13" />
                                        <line x1="9" y1="17" x2="15" y2="17" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Publish
                                </span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="dropdown-menu-columns">
                                    <div class="dropdown-menu-column">
                                        <a class="dropdown-item" href="./empty.html">
                                            Posts
                                        </a>
                                        <a class="dropdown-item" href="./buttons.html">
                                            Gallery
                                        </a>
                                        <a class="dropdown-item" href="./buttons.html">
                                            Messages
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.html">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Palette/Graphics icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 21a9 9 0 1 1 0 -18a9 8 0 0 1 9 8a4.5 4 0 0 1 -4.5 4h-2.5a2 2 0 0 0 -1 3.75a1.3 1.3 0 0 1 -1 2.25" />
                                        <circle cx="7.5" cy="10.5" r=".5" fill="currentColor" />
                                        <circle cx="12" cy="7.5" r=".5" fill="currentColor" />
                                        <circle cx="16.5" cy="10.5" r=".5" fill="currentColor" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Buttons & Graphics
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.html">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Plug/Integrations icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M7 12l5 5l-1.5 1.5a3.536 3.536 0 1 1 -5 -5l1.5 -1.5z" />
                                        <path d="M17 12l-5 -5l1.5 -1.5a3.536 3.536 0 1 1 5 5l-1.5 1.5z" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Integrations
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.html">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Money/Cash icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <rect x="3" y="5" width="18" height="14" rx="3" />
                                        <circle cx="12" cy="12" r="3" />
                                        <path d="M3 10h18m-9 -3v11" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Payouts
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.html">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Settings/Gear icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Settings
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header d-print-none">
                    <div class="row g-2 align-items-center">
                        <!-- Page title actions -->
                        <div class="col-12 col-md-auto ms-auto d-print-none">
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 6l16 0" /><path d="M4 12l16 0" /><path d="M4 18l16 0" /></svg>
                                    <span class="avatar avatar-sm" style="background-image: url(../../assets/img/karl_image.png)"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <a href="#" class="dropdown-item">Set status</a>
                                    <a href="#" class="dropdown-item">Profile & account</a>
                                    <a href="#" class="dropdown-item">Feedback</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item">Settings</a>
                                    <a href="#" class="dropdown-item">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>