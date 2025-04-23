<?php
class Creator {
    private $conn;
    private $table_name = "creators";

    public $id;
    public $username;
    public $email;
    public $password;
    public $profile_link;
    public $bitcoin_address; 
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        // Generate unique profile link
        $this->profile_link = "http://localhost/BTCoffee/" . $this->username;

        // Hash the password
        $password_hash = password_hash($this->password, PASSWORD_BCRYPT);

        $query = "INSERT INTO " . $this->table_name . "
                 SET username = :username,
                 email = :email,
                 password_hash = :password_hash,
                 profile_link = :profile_link";

        $stmt = $this->conn->prepare($query);
        
        // Sanitize inputs
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->profile_link = htmlspecialchars(strip_tags($this->profile_link));

        // Bind values
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password_hash", $password_hash);
        $stmt->bindParam(":profile_link", $this->profile_link);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $row['id'];
            $this->username = $row['username'];
            $this->email = $row['email'];
            $this->profile_link = $row['profile_link'];
            $this->bitcoin_address = $row['bitcoin_address'];
            $this->created_at = $row['created_at'];
            return true;
        }
        return false;
    }

    public function usernameExists($username) {
        // Query to check if username exists
        $query = "SELECT id FROM creators WHERE username = ?";

        // Prepare the statement
        $stmt = $this->conn->prepare($query);

        // Sanitize
        $username = htmlspecialchars(strip_tags($username));

        // Bind the parameter
        $stmt->bindParam(1, $username);

        // Execute the query
        $stmt->execute();

        // Check if any row was found
        return $stmt->rowCount() > 0;
    }

    public function emailExists() {
        $query = "SELECT id FROM " . $this->table_name . " WHERE email = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->email);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function createWithOAuth() {
        // Generate a random password for OAuth users
        $this->password = bin2hex(random_bytes(16));

        // Hash the password
        $password_hash = password_hash($this->password, PASSWORD_DEFAULT);

        // Generate unique profile link
        $this->profile_link = "http://localhost/BTCoffee/" . $this->username;

        // Insert query with OAuth fields - using password_hash column instead of password
        $query = "INSERT INTO " . $this->table_name . " 
                  (username, email, password_hash, oauth_provider, oauth_uid, profile_link, created_at)
                  VALUES (:username, :email, :password_hash, :oauth_provider, :oauth_uid, :profile_link, NOW())";

        // Prepare the statement
        $stmt = $this->conn->prepare($query);
        
        // Sanitize inputs
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->profile_link = htmlspecialchars(strip_tags($this->profile_link));
        
        // Bind parameters
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password_hash', $password_hash);
        $stmt->bindParam(':oauth_provider', $this->oauth_provider);
        $stmt->bindParam(':oauth_uid', $this->oauth_uid);
        $stmt->bindParam(':profile_link', $this->profile_link);

        // Execute the query
        if ($stmt->execute()) {
            // Get the ID of the newly created user
            $this->id = $this->conn->lastInsertId();
            return true;
        }

        return false;
    }
}
?>