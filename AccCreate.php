<?php

$dsn = "sqlite:c:/xampp/htdocs/TACWebApp/BankSysDB.sqlite";

try {
    // Create connection
    $conn = new PDO($dsn);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO User (full_name, email, password_hash, phone_num, address) 
                            VALUES (:full_name, :email, :password_hash, :phone_num, :address)");

    $stmt->bindParam(':full_name', $full_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password_hash', $password_hash);
    $stmt->bindParam(':phone_num', $phone_num);
    $stmt->bindParam(':address', $address);

    // Set parameters and execute
    $full_name = "John Doe";
    $email = "john.doe@example.com";
    $password_hash = password_hash("password123", PASSWORD_DEFAULT);
    $phone_num = "1234567890";
    $address = "123 Main St";
    $stmt->execute();

    echo "New account created successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Close the connection
$conn = null;
?>