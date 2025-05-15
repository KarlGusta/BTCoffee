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
                                <div class="col">
                                    <div class="card-title">OUTSTANDING BALANCE</div>
                                    <h1 class="card-subtitle"><strong>$0</strong></h1>
                                </div>
                            </div>
                        </div>
                        <div class="card-actions">
                            <a href="#" class="btn btn-github w-100">
                                Withdraw
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 mx-auto">
                <div class="card card-custom">
                    <div class="card-header">
                        <div>
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="card-title">Payout history</div>
                                    <h1 class="card-subtitle"><strong>$0</strong></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../../includes/admin/admin_footer.php'; ?>