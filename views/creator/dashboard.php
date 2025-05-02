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
        <div class="row row-deck row-cards">
            <!-- Add contents here -->
        </div>
    </div>
</div>

<?php include '../../includes/admin/admin_footer.php'; ?>