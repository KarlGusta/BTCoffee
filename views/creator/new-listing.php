<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database, creator class, and paths configuration
include_once '../../config/paths.php';
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
        <header class="navbar navbar-expand-md navbar-light d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="extras.php" class="btn btn-light btn-icon w-100" rel="noreferrer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M15 6l-6 6l6 6" />
                        </svg>
                    </a>
                </h1>
                <h2>What are you offering?</h2>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item d-none d-md-flex me-3">
                        <div class="btn-list">
                            <a href="https://github.com/tabler/tabler" class="btn btn-light btn-icon" target="_blank" rel="noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="12" cy="12" r="2" />
                                    <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                </svg>
                            </a>
                            <a href="https://github.com/tabler/tabler" class="btn btn-light" target="_blank" rel="noreferrer">
                                Save as draft
                            </a>
                            <a href="https://github.com/sponsors/codecalm" class="btn btn-orange" target="_blank" rel="noreferrer">
                                Publish
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="page-wrapper">
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-cards">
                        <div class="col-md-8 mx-auto">
                            <div class="card card-custom">
                                <div class="card-body py-4 p-sm-5">
                                    <form action="" method="post" class="">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" placeholder="What are you offering?">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="form-label">Description &nbsp;
                                                <span class="form-help" data-bs-toggle="popover" data-bs-placement="top" data-bs-html="true"
                                                    data-bs-content="<p>If you'd like to add some pip and pizzazz to make your extra sound exciting, this is the place to do it</p>
                                                  ">?</span>
                                            </label>
                                            <div class="btn-group w-100">
                                                <a href="#" class="btn btn-white btn-icon" aria-label="Button">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/bold -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M7 5h6a3.5 3.5 0 0 1 0 7h-6z" />
                                                        <path d="M13 12h1a3.5 3.5 0 0 1 0 7h-7v-7" />
                                                    </svg>
                                                </a>
                                                <a href="#" class="btn btn-white btn-icon" aria-label="Button">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/italic -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <line x1="11" y1="5" x2="17" y2="5" />
                                                        <line x1="7" y1="19" x2="13" y2="19" />
                                                        <line x1="14" y1="5" x2="10" y2="19" />
                                                    </svg>
                                                </a>
                                                <a href="#" class="btn btn-white btn-icon" aria-label="Button">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/underline -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M7 5v5a5 5 0 0 0 10 0v-5" />
                                                        <path d="M5 19h14" />
                                                    </svg>
                                                </a>
                                                <a href="#" class="btn btn-white btn-icon" aria-label="Button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-list">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M9 6l11 0" />
                                                        <path d="M9 12l11 0" />
                                                        <path d="M9 18l11 0" />
                                                        <path d="M5 6l0 .01" />
                                                        <path d="M5 12l0 .01" />
                                                        <path d="M5 18l0 .01" />
                                                    </svg>
                                                </a>
                                                <a href="#" class="btn btn-white btn-icon" aria-label="Button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-link">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M9 15l6 -6" />
                                                        <path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" />
                                                        <path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" />
                                                    </svg>
                                                </a>
                                            </div>
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

            <?php include '../../includes/admin/admin-footer.php'; ?>