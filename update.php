<?php
// Connect to DB
$conn = new mysqli("localhost", "root", "", "my_form_db");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Sanitize inputs
$id = intval($_POST['id']);
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$phone = $conn->real_escape_string($_POST['phone']);
$message = $conn->real_escape_string($_POST['message']);

// Update query
$sql = "UPDATE messages SET 
          name = '$name', 
          email = '$email', 
          phone = '$phone', 
          message = '$message' 
        WHERE id = $id";

if ($conn->query($sql) === TRUE) {
  header("Location: view.php");
  exit;
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
