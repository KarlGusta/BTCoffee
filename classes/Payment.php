<?php
class Payment {
    private $conn;
    private $table_name = "payments";

    public $id;
    public $creator_id;
    public $amount;
    public $currency;
    public $message;
    public $invoice_id;
    public $lightning_invoice;
    public $status;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Create a new payment record
     * 
     * @return bool Success or failure
     */
    public function create() {
        $query = "INSERT INTO " . $this->table_name . "
                  SET creator_id = :creator_id,
                  amount = :amount,
                  currency = :currency,
                  message = :message,
                  invoice_id = :invoice_id,
                  lightning_invoice = :lightning_invoice,
                  status = :status";

        $stmt = $this->conn->prepare($query);
        
        // Sanitie inputs
        $this->creator_id = htmlspecialchars(strip_tags($this->creator_id));
        $this->amount = htmlspecialchars(strip_tags($this->amount));
        $this->currency = htmlspecialchars(strip_tags($this->currency));
        $this->message = htmlspecialchars(strip_tags($this->message));
        $this->invoice_id = htmlspecialchars(strip_tags($this->invoice_id));
        $this->lightning_invoice = htmlspecialchars(strip_tags($this->lightning_invoice));
        $this->status = htmlspecialchars(strip_tags($this->status));

        // Bind values
        $stmt->bindParam(":creator_id", $this->creator_id);
        $stmt->bindParam(":amount", $this->amount);
        $stmt->bindParam(":currency", $this->currency);
        $stmt->bindParam(":message", $this->message);
        $stmt->bindParam(":invoice_id", $this->invoice_id);
        $stmt->bindParam(":lightning_invoice", $this->lightning_invoice);
        $stmt->bindParam(":status", $this->status);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    /**
     * Get payment by invoice ID
     * 
     * @return bool Success or failure
     */
    public function readByInvoiceId() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE invoice_id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->invoice_id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $row['id'];
            $this->creator_id = $row['creator_id'];
            $this->amount = $row['amount'];
            $this->currency = $row['currency'];
            $this->message = $row['message'];
            $this->lightning_invoice = $row['lightning_invoice'];
            $this->status = $row['status'];
            $this->created_at = $row['created_at'];
            return true;
        }

        return false;
    }

    
}