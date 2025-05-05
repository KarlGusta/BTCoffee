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
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3 class="card-title">
                                Hi, Karlgusta
                            </h3>
                            <p class="card-subtitle">
                                btcoffee.com/Karl
                            </p>
                        </div>
                        <div class="card-actions">
                            <a href="#" class="btn btn-primary">
                                <!-- Alternative share icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-external-link" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M11 7h-5a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-5" />
                                    <path d="M10 14l10 -10" />
                                    <path d="M15 4h5v5" />
                                </svg>
                                Share page
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-100" preserveAspectRatio="none" width="400" height="200" viewBox="0 0 400 200" stroke="var(--tblr-border-color, #b8cef1)">
                            <!--	<rect x=".5" y=".5" width="399" height="199" fill="#fff" rx="2"></rect>-->
                            <line x1="0" y1="0" x2="400" y2="200"></line>
                            <line x1="0" y1="200" x2="400" y2="0"></line>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../../includes/admin/admin_footer.php'; ?>