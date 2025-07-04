CREATE TABLE creators (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    profile_link VARCHAR(100) UNIQUE NOT NULL,
    bitcoin_address VARCHAR(100),
    oauth_provider VARCHAR(50) NULL,
    oauth_uid VARCHAR(255) NULL,
    bio TEXT,
    name VARCHAR(255),
    profile_image VARCHAR(255),
    coffee_price INT DEFAULT 1000,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP  
);

CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    creator_id INT NOT NULL,
    amount INT NOT NULL,
    currency VARCHAR(10) NOT NULL,
    message TEXT,
    invoice_id VARCHAR(100) NOT NULL,
    lightning_invoice TEXT NOT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (creator_id) REFERENCES creators(id) 
);