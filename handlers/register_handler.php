<?php
// Start or resume the session
session_start();

// Include database and creator class
include_once '../config/database.php';
include_once '../classes/Creator.php';

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
        $_SESSION['error_message'] = "Please fill in all fields";
        header("Location: ../views/registration/email_signup.php");
        exit();
    }
    else if($_POST['password'] !== $_POST['confirm_password']) {
        $_SESSION['error_message'] = "Passwords do not match";
        header("Location: ../views/registration/email_signup.php");
        exit();
    } 
    else if(strlen($_POST['password']) < 8) {
        $_SESSION['error_message'] = "Password must be at least 8 characters long";
        header("Location: ../views/registration/email_signup.php");
        exit();
    }
    else if(!filter_var($creator->email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_message'] = "Invalid email format";
        header("Location: ../views/registration/email_signup.php");
        exit();
    }
    else if($creator->usernameExists()) {
        $_SESSION['error_message'] = "Username already taken";
        header("Location: ../views/registration/email_signup.php");
        exit();        
    } 
    else if($creator->emailExists()) {
        $_SESSION['error_message'] = "Email already registered";
        header("Location: ../views/registration/email_signup.php");
        exit();        
    }
    else {
        // Create the creator
        if($creator->create()) {
            // Clear the temporary session variables
            unset($_SESSION['temp_username']);

            // Set success message
            $_SESSION['success_message'] = "Registration successful!";

            // Redirect to dashboard or profile page
            header("Location: ../views/dashboard/index.php");
            exit();            
        } else {
            $_SESSION['error_message'] = "Unable to register. Please try again.";
            header("Location: ../views/registration/email_signup.php");
            exit();            
        }
    }
}

// If not a POST request, redirect back to register page
header("Location: ../views/registration/register.php");
exit();
?>