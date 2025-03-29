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
        <header>
            <nav>
                <a href="../index.php">Home</a>
            </nav>
        </header>
        <main>
            <div class="profile-header">
                <h1><?php echo htmlspecialchars($creator_username); ?>'s Creator Profile</h1>
                <p class="join-date">Member since: <?php echo date('F j, Y', strtotime($creator->created_at)); ?></p>
            </div>

            <div class="profile-content">
                <div class="profile-section">
                    <h2>About</h2>
                    <p>Profile Link: <a href="<?php echo htmlspecialchars($creator_profile_link); ?>"><?php echo htmlspecialchars($creator_profile_link); ?></a></p>
                    <!-- You could add a bio field to your creators table -->
                </div>

                <div class="profile-section">
                    <h2>Support <?php echo $creator_username; ?></h2>
                    <!-- Bitcoin donation button/QR code would go here -->
                     <div class="donation-options">
                        <button class="btn donate-btn">Send Bitcoin Tip</button>
                     </div>
                </div>
            </div>
        </main>

        <footer>
            <p>&copy; <?php echo date('Y'); ?> BTCoffee - The easiest way to receive Bitcoin tips</p>
        </footer>
    </div>
</body>

</html>