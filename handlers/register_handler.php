<?php
// Include database and creator class
include_once '../config/database.php';
include_once '../classes/Creator.php';

// Initialize variables
$error_message = "";
$success_message = "";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    
    // Get database connection
    $database = new Database();
    $db = $database->getConnection();

    // Create creator object
    $creator = new Creator($db);

    // Set creator properties
    $creator->username = $_POST['username'];
    $creator->email = $_POST['email'];
    $creator->password = $_POST['password'];

    // Validate input
    if(empty($creator->username) || empty($creator->email) || empty($creator->password)) {
        $error_message = "Please fill in all fields";
    }
    else if($_POST['password'] !== $_POST['confirm_password']) {
        $error_message = "Passwords do not match";
    } 
    else if(strlen($_POST['password']) < 8) {
        $error_message = "Password must be at least 8 characters long";
    }
    else if(!filter_var($creator->email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format";
    }
    else if($creator->usernameExists()) {
        $error_message = "Username already taken";
    } 
    else if($creator->emailExists()) {
        $error_message = "Email already registered";
    }
    else {
        // Create the creator
        if($creator->create()) {
            $success_message = "Registration successful! Your profile link is: " . $creator->profile_link;
        } else {
            $error_message = "Unable to register. Please try again.";
        }
    }
}

// Include the view
include_once '../views/registration/register.php';
?>