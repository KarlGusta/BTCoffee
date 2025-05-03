<?php
// Include required files
include_once '../config/database.php';
include_once '../classes/Creator.php';
include_once '../config/paths.php';

session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: " . path('auth', 'login'));
    exit();
} 

// Get database connection
$database = new Database();
$db = $database->getConnection();

// Create Creator object
$creator = new Creator($db);
$creator->id = $_SESSION['user_id'];

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $creator->name = $_POST['name'] ?? '';
    $creator->bio = $_POST['bio'] ?? '';
    $creator->coffee_price = isset($_POST['coffee_price']) ? (int)$_POST['coffee_price'] : 1000;

    // Handle file upload if a new image was provided
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = '../uploads/';

        // Create directory if it doesn't exist
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        } 

        // Generate unique filename
        $file_extension = pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION);
        $new_filename = uniqid('profile_') . '.' . $file_extension;
        $upload_path = $upload_dir . $new_filename;

        // Move uploaded file to destination
        if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $upload_path)) {
            $creator->profile_image = $new_filename;
        }
    }

    // Update creator profile
    if ($creator->updateProfile()) {
        // Redirect to creator page on success
        header("Location: " . path('creator') . "?username=" . urlencode($creator->username));
        exit();
    } else {
        // Handle error
        $_SESSION['error'] = "Failed to update profile. Please try again.";
        header("Location: " . path('views', 'registration') . "/complete_your_page.php");
        exit();
    }
} else {
    // If not POST request, redirect back to the form
    header("Location: " . path('views', 'registration') . "/complete_your_page.php");
    exit();
}
?>