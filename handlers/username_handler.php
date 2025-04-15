<?php
// Start or resume the session
session_start();

// Include database and creator class
include_once '../config/database.php';
include_once '../classes/Creator.php';

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['continue'])) {

    // Get database connection
    $database = new Database();
    $db = $database->getConnection();

    // Create creator object
    $creator = new Creator($db);

    // Set username property
    $creator->username = $_POST['username'];

    // Validate input
    if(empty($creator->username)) {
        $_SESSION['error_message'] = "Please enter a username";
        header("Location: ../views/registration/register.php");
        exit();
    }
    else if($creator->usernameExists()) {
        $_SESSION['error_message'] = "Username already taken";
        header("Location: ../views/registration/register.php");
        exit();
    } 
    else {
        // Store the username in the session
        $_SESSION['temp_username'] = $creator->username;

        // Redirect to signup options page
        header("Location: ../views/registration/signup_options.php");
        exit();
    }
}

// If not a POST request, redirect back to register page
header("Location: ../views/registration/register.php");
exit();
?>