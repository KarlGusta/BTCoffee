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

// Include Google Client
require_once '../vendor/autoload.php';

// Create client object
$client = new Google_Client();
$client->setClientId('YOUR_CLIENT_ID');
$client->setClientSecret('YOUR_CLIENT_SECRET');
$client->setRedirectUri('https://yourapp.com/handlers/google_callback.php');

// Process the code from Google
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    // Get profile info
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();

    // Get user data from Google
    $email = $google_account_info->email;

    // Create database connection
    $database = new Database();
    $db = $database->getConnection();

    // Create creator object
    $creator = new Creator($db);

    // Set creator properties
    $creator->username = $_SESSION['temp_username'];
    $creator->email = $email;
    $creator->oauth_provider = 'google';
    $creator->oauth_uid = $google_account_info->id;
    
    // Check if email exists
    if ($creator->emailExists()) {
        $_SESSION['error_message'] = "Email already registered";
        header("Location: ../views/registration/signup_options.php");
        exit();
    }

    // Create the account
    if ($creator->createWithOAuth()) {
        // Clear the temporary session variables
        unset($_SESSION['temp_username']);

        // Set success message
        $_SESSION['success_message'] = "Registration successful!";
        
        // Redirect to dashboard or profile page
        header("Location: ../views.dashboard/index.php");
        exit(); 
    } else {
        $_SESSION['error_message'] = "Unable to register. Please try again.";
        header("Location: ../views.registration/signup_options.php");
        exit();
    }
} else {
    // No code was received
    $_SESSION['error_message'] = "Google authentication failed";
    header("Location: ../views/registration/signup_options.php");
    exit();
}
?>