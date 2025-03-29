<?php
// Include database and creator class
include_once '../../config/database.php';
include_once '../../classes/Creator.php';

// Get username from URL
$username = isset($_GET['username']) ? $_GET['username'] : die('ERROR: Missing username.');

// Get database connection
$database = new Database();
$db = $database->getConnection();

// Query to get creator details
$query = "SELECT * FROM creators WHERE username = ? LIMIT 0,1";
$stmt = $db->prepare($query);
$stmt->bindParam(1, $username);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $creator_id = $row['id'];
    $creator_username = $row['username'];
    $creator_email = $row['email'];
    $creator_profile_link = $row['profile_link'];
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