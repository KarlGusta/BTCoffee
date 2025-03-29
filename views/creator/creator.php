<?php
// Include database and creator class
include_once '../../config/database.php';
include_once '../../classes/Creator.php';

// Get username from URL
$username = isset($_GET['username']) ? $_GET['username'] : die('ERROR: Missing username.');

// Get database connection
$database = new Database();
$db = $database->getConnection();

// Create creator object
$creator = new Creator($db);
$creator->username = $username;

// Try to fetch creator details
if ($creator->readOne()) {
    $creator_id = $creator->id;
    $creator_username = $creator->username;
    $creator_email = $creator->email;
    $creator_profile_link = $creator->profile_link;
} else {
    // Creator not found
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $creator_username; ?>'s Profile</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="container">
        <h1><?php echo $creator_username; ?>'s Creator Profile</h1>
        <p>Profile Link: <a href="<?php echo $creator_profile_link; ?>"><?php echo $creator_profile_link; ?></a></p>
        <!-- Add more profile information here -->
    </div>
</body>

</html>