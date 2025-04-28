<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database, creator class, and paths configuration
include_once '../../config/database.php';
include_once '../../classes/Creator.php';
include_once '../../config/paths.php';

// Check if user is logged in and get their user ID
// This assumes you have a session mechanism to track logged-in users
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirect to login if not logged in
    header("Location: " . path('login'));
    exit();
}

$user_id = $_SESSION['user_id'];

// Get database connection
$database = new Database();
$db = $database->getConnection();

// Create creator object
$creator = new Creator($db);
$creator->id = $user_id;

// Try to fetch creator details
if ($creator->readOne()) {
    $creator_username = $creator->username;
    $creator_email = $creator->email;
    $profile_image = $creator->profile_image ?? null;
    $creator_bio = $creator->bio ?? '';
    $creator_name = $creator->name ?? '';     
} else {
    // Creator not found
    header("Location: " . path('home'));
    exit();
}

// Only include header files after all potential redirects
include '../../includes/header.php';
?>

<div class="page-wrapper">
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">Complete Your Profile</h2>
                    <p class="text-muted">Finish setting up your creator page</p>
                </div>
            </div>
        </div> 
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-lg-8 mx-auto">
                    <div class="card card-custom">
                        <div class="card-header">
                            <h3 class="card-title">Your Creator Profile</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo path('handlers'); ?>/profile_update_handler.php" method="post" enctype="multipart/form-data">
                                <div class="form-group mb-3 text-center">
                                    <div class="mb-3">
                                        <?php if ($profile_image): ?>
                                            <img src="<?php echo path('uploads') . '/' . htmlspecialchars($profile_image); ?>" class="avatar avatar-xl mb-3" id="profile-preview">
                                        <?php else: ?>
                                            <img src="<?php echo path('assets', 'img'); ?>/default-avatar.png" class="avatar avatar-xl mb-3" id="profile-preview">    
                                        <?php endif; ?>    
                                    </div>
                                    <div class="mb-3">
                                        <label class="btn btn-outline-primary">
                                            Upload Profile Picture
                                            <input type="file" name="profile_image" id="profile-upload" class="d-none" accept="image/*">
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Display Name</label>
                                    <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($creator_name); ?>" placeholder="How you want to be known">
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Username</label>
                                    <div class="input-group">
                                        <span class="input-group-text">@</span>
                                        <input type="text" class="form-control" value="<?php echo htmlspecialchars($creator_username); ?>" readonly>
                                    </div>
                                    <small class="form-hint">Your username cannot be changed</small>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">About You</label>
                                    <textarea name="bio" rows="5" class="form-control" placeholder="Tell your supporters about yourself and what you create"><?php echo htmlspecialchars($creator_bio); ?></textarea>
                                    <small class="form-hint">This will appear on your creator page</small>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" value="<?php echo htmlspecialchars($creator_email); ?>" readonly>
                                    <small class="form-hint">Your email is not displayed publicly</small>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Coffee Price (in sats)</label>
                                    <input type="number" class="form-control" name="coffee_price" value="1000" min="100">
                                    <small class="form-hint">This is the price for one coffee that supporters can buy you</small>
                                </div>

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary w-100 form-control-rounded btn-custom">Save Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card card-custom mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Preview Your Page</h3>
                        </div>
                        <div class="card-body">
                            <p>See how your creator page will look to supporters.</p>
                            <a href="<?php echo path('creator') . '?username=' . urlencode($creator_username); ?>" class="btn btn-outline-primary">
                                View Creator Page
                            </a>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Profile image preview
            const profileUpload = document.getElementById('profile-upload');
            const profilePreview = document.getElementById('profile-preview');

            profileUpload.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        profilePreview.src = e.target.result;
                    }

                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>
</div>

<?php include '../../includes/footer.php'; ?>