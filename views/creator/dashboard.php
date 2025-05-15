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
            <!-- Add contents here -->
            <div class="col-md-8 mx-auto">
                <div class="card card-custom">
                    <div class="card-header">
                        <div>
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="avatar avatar-rounded avatar-md" style="background-image: url(../../assets/img/karl_image.png)"></span>
                                </div>
                                <div class="col">
                                    <div class="card-title">Hi, Karlgusta</div>
                                    <div class="card-subtitle">btcoffee.com/Karl</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-actions">
                            <a href="#" class="btn btn-github w-100">
                                <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-external-link" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M11 7h-5a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-5" />
                                    <path d="M10 14l10 -10" />
                                    <path d="M15 4h5v5" />
                                </svg>
                                Share page
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="d-flex align-items-center">
                            <div class="h2 p-3">Earnings</div>
                            <div class="ms-auto lh-1 p-3">
                                <div class="dropdown">
                                    <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 30 days</a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item active" href="#">Last 30 days</a>
                                        <a class="dropdown-item" href="#">Last 90 days</a>
                                        <a class="dropdown-item" href="#">All time</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="h1 mb-3 p-3">$0</div>
                        <div class="row p-3">
                            <div class="col-auto d-flex align-items-center pe-2">
                                <span class="legend me-2 bg-yellow"></span>
                                <span>$0 Supporters</span>
                            </div>
                            <div class="col-auto d-flex align-items-center px-2">
                                <span class="legend me-2 bg-rose"></span>
                                <span>$0 Membership</span>
                            </div>
                            <div class="col-auto d-flex align-items-center px-2">
                                <span class="legend me-2 bg-cyan"></span>
                                <span>$0 Shop</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 mx-auto">
                <div class="card card-custom">
                    <div class="card-body text-center py-4 p-sm-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                        </svg>
                        <h1 class="mt-1">You don't have any supporters yet</h1>
                        <p class="text-muted">Share your page with your audience to get started.</p>
                    </div>
                </div>
            </div>

            <div class="col-8 mx-auto">
                <!-- Page title -->
                <div class="page-header d-print-none">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                More ways to earn
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row row-cards row-deck">
                    <div class="col">
                        <div class="card card-custom">
                            <div class="card-body">
                                <p class="icon-custom">🔒</p>
                                <h3 class="card-title"><strong>Membership</strong></h3>
                                <p class="text-muted">Monthly membership for your biggest fans and supporters.</p>
                            </div>
                            <!-- Card footer -->
                            <div class="card-footer">
                                <a href="#" class="btn btn-github w-100">
                                    View &nbsp;&nbsp;                                    
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-right">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M5 12l14 0" />
                                        <path d="M15 16l4 -4" />
                                        <path d="M15 8l4 4" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-custom">
                            <div class="card-body">
                                <p class="icon-custom">🛍️</p>
                                <h3 class="card-title"><strong>Shop</strong></h3>
                                <p class="text-muted">Introducing Shop, the creative way to sell.</p>
                            </div>
                            <!-- Card footer -->
                            <div class="card-footer">
                                <a href="#" class="btn btn-github w-100">
                                    Enable &nbsp;&nbsp;                                     
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-right">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M5 12l14 0" />
                                        <path d="M15 16l4 -4" />
                                        <path d="M15 8l4 4" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-custom">
                            <div class="card-body">
                                <p class="icon-custom">📝</p>
                                <h3 class="card-title"><strong>Exclusive posts</strong></h3>
                                <p class="text-muted">Publish your best content exclusively for your supporters and members.</p>
                            </div>
                            <!-- Card footer -->
                            <div class="card-footer">
                                <a href="#" class="btn btn-github w-100">
                                    Write a post &nbsp;&nbsp;                                     
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-right">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M5 12l14 0" />
                                        <path d="M15 16l4 -4" />
                                        <path d="M15 8l4 4" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../../includes/admin/admin_footer.php'; ?>