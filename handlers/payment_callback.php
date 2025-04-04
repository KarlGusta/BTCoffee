<?php
// Include database and necessary classes
include_once '../config/database.php';
include_once '../classes/Payment.php';

// Get the raw POST data
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Verify the callback data
if ($data && isset($data['id'])) {
    // Get database connection
    $database = new Database();
    $db = $database->getConnection();

    // Create payment object
    $payment = new Payment($db);
    $payment->invoice_id = $data['id'];

    // Check if payment exists
    if ($payment->readByInvoiceId()) {
        // Update payment status
        $payment->status = $data['status'];

        if ($payment->updateStatus()) {
            // Success - return 200 OK
            http_response_code(200);
            echo json_encode(['status' => 'success']);
        } else {
            // Failed to update
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Failed to update payment']);
        } 
    } else {
        // Payment not found
        http_response_code(404);
        echo json_encode(['status' => 'error', 'message' => 'Payment not found']);
    }
} else {
    // Invalid data
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid callback data']);
}
?>
