<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database, creator class, and paths configuration
include_once '../../config/paths.php';

// Only include header files after all potential redirects
include '../../includes/admin/admin_header.php';
?>
<div class="page-body">
    <div class="container-xl">

        <div class="row row-cards">
            <div class="col-md-8 mx-auto">
                <!-- Page title -->
                <div class="page-header d-print-none mb-2">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                Shop
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="card card-custom">
                    <div class="card-body text-center py-4 p-sm-5">
                        <h1 class="mt-1">Add a new listing</h1>
                        <p class="text-muted">Pick a template or start from scratch</p>
                        <div class="row row-deck text-center">
                            <div class="col-sm-6 col-lg-4 mb-3">
                                <div class="card" style="background-color: #F4F4F4;">
                                    <div class="card-body">
                                        <p class="text-muted">Start from scratch</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 mb-3">
                                <div class="card" style="background-color: #F3FAF4;">
                                    <div class="card-body">
                                        <p class="text-muted">Digital product</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 mb-3">
                                <div class="card" style="background-color: #FFFEF3;">
                                    <div class="card-body">
                                        <p class="text-muted">Instagram close friends access</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 mb-3">
                                <div class="card" style="background-color: #F9F2FA;">
                                    <div class="card-body">
                                        <p class="text-muted">1-on-1 Zoom call</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 mb-3">
                                <div class="card" style="background-color: #E8EAF6;">
                                    <div class="card-body">
                                        <p class="text-muted">Ticket for an event</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 mb-3">
                                <div class="card" style="background-color: #E3F2FD;">
                                    <div class="card-body">
                                        <p class="text-muted">Physical good</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 mx-auto">
                <div class="card card-custom">
                    <div class="card-body text-center py-4 p-sm-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-building-store">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 21l18 0" />
                            <path d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4" />
                            <path d="M5 21l0 -10.15" />
                            <path d="M19 21l0 -10.15" />
                            <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />
                        </svg>
                        <h1 class="mt-1">You haven't added anything yet.</h1>
                        <p class="text-muted">Shop is a simple and effective way to offer something to your audience. It could be anything. See some examples here, here, and here</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../../includes/admin/admin_footer.php'; ?>