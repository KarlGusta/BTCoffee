<?php
class LightningService {
    private $api_key;
    private $api_url;

    public function __construct() {
        // Load configuration from config file
        // In production, these should be stored securely
        $this->api_key = getenv('LIGHTNING_API_KEY') ?: 'your_test_api_key';
        $this->api_url = getenv('LIGHTNING_API_URL') ?: 'https://api.opennode.com/v1/';
    }

    /**
     * Generate a Lightning invoice
     * 
     * @param int $amount Amount in satoshis
     * @param string $description Payment description
     * @param string $creator_id Creator ID for callback identification
     * @return array|bool Invoice data or false on failure
     */
    public function createInvoice($amount, $description, $creator_id) {
        // Prepare the data for the API request
        $data = [
            'amount' => $amount,
            'description' => $description,
            'order_id' =>'btcoffee_' . $creator_id . '_' . time(),
            'callback_url' => 'http://localhost/BTCoffee/handlers/payment_callback.php'
        ];

        // Make the API request
        $response = $this->makeApiRequest('charges', $data, 'POST');

        if ($response && isset($response->data)) {
            return [
                'id' => $response->data->id,
                'lightning_invoice' => $response->data->lightning_invoice->payreq,
                'amount' => $amount,
                'expires_at' => $response->data->expires_at,
                'status' => $response->data->status
            ];
        }

        return false;
    }

    /**
     * Check the status of an invoice
     * 
     * @param string $invoice_id The invoice ID to check
     * @return string|bool The status or false on failure
     */
    public function checkInvoiceStatus($invoice_id) {
        $response = $this->makeApiRequest('charge/' . $invoice_id, [], 'GET');

        if ($response && isset($response->data)) {
            return $response->data->status;
        }

        return false;
    }

    /**
     * Make an API request to the Lightning provider
     * 
     * @param string $endpoint API endpoint
     * @param array $data Request data
     * @param string $method HTTP method (GET, POST)
     * @return object|bool Response object or false on failure
     */
    private function makeApiRequest($endpoint, $data = [], $method = 'GET') {
        $url = $this->api_url . $endpoint;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: ' . $this->api_key
        ]);

        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            error_log('Lightning API Error: ' . $error);
            return false;
        }

        return json_decode($response);
    }
}
?>