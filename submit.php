<?php
// 1. Database connection settings
$host = "localhost";
$user = "root";
$pass = "";
$db = "my_form_db";

// 2. Connect to the database
$conn = new mysqli($host, $user, $pass, $db);

// 3. Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 4. Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// 5. Prepare and execute SQL query
$stmt = $conn->prepare("INSERT INTO messages (name, email, phone, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $phone, $message);

if ($stmt->execute()) {
    echo "Message saved successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// 6. Close connection
$stmt->close();
$conn->close();
?>
