<?php
$conn = new mysqli("localhost", "root", "", "my_form_db");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (!isset($_POST['id'])) {
  die("No ID provided.");
}

$id = intval($_POST['id']);
$sql = "DELETE FROM messages WHERE id = $id";

if ($conn->query($sql) === TRUE) {
  header("Location: view.php");
  exit;
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
