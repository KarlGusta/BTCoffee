<?php
// Show all errors for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database and creator class
include_once '../config/database.php';
include_once '../classes/Creator.php';

// Set content type to JSON
header('Content-Type: application/json');

// Check if username parameter is provided
if (!isset($_GET['username']) || empty($_GET['username'])) {
    echo json_encode(['error' => 'No username provided']);
    exit;
}

// Get and sanitize the username
$username = htmlspecialchars(strip_tags($_GET['username']));

// Get database connection
$database = new Database();
$db = $database->getConnection();

// Create Creator object
$creator = new Creator($db);

// Check if username exists
$result = ['available' => !$creator->usernameExists($username)];

// Return the result
echo json_encode($result);