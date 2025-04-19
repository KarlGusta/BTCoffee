<?php
// Start or resume the session
session_start();

// Check if username is set in session
if (!isset($_SESSION['temp_username'])) {
    // Redirect to the first step if username is not set
    header("Location: ../views/registration/register.php");
    exit();
} 

// Include database and creator class
include_once '../config/database.php';
include_once '../classes/Creator.php';

// First, you'll need to set up the Google Client
// You'd need to install the Google Client Library via Composer:
// composer require google/apiclient

require_once '../vendor/autoload.php';

// Create client object
$client = new Google_Client();
$client->setClientId('YOUR_CLIENT_ID');
$client->setClientSecret('YOUR_CLIENT_SECRET');
$client->setRedirectUri('https://yourapp.com/handlers/google_callback.php');
$client->addScope('email');
$client->addScope('profile');

// Generate the Google login URL and redirect
$auth_url = $client->createAuthUrl();
header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
exit;
?>