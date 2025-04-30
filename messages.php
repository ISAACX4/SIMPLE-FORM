<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "my_form_db");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch messages
$sql = "SELECT * FROM messages ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['phone']}</td>
            <td>{$row['message']}</td>
            <td class='action-buttons'>
              <form action='actions/edit.php' method='GET' style='display:inline;'>
                <input type='hidden' name='id' value='{$row['id']}'>
                <button type='submit' class='edit-button'>Edit</button>
              </form>
              <form action='actions/delete.php' method='POST' style='display:inline;'>
                <input type='hidden' name='id' value='{$row['id']}'>
                <button type='submit' class='delete-button'>Delete</button>
              </form>
            </td>
          </tr>";
  }
} else {
  echo "<tr><td colspan='6' style='text-align:center;'>No messages found.</td></tr>";
}

$conn->close();
?>
