<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Submitted Messages</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 30px;
      background-color: #f4f4f4;
    }
    h2 {
      text-align: center;
    }
    table {
      border-collapse: collapse;
      width: 80%;
      margin: auto;
      background-color: white;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    th, td {
      padding: 12px 15px;
      text-align: left;
      border: 1px solid #ddd;
    }
    th {
      background-color: #007BFF;
      color: white;
    }
    tr:hover {
      background-color: #f1f1f1;
    }
    .edit-button {
      background-color: blue;
      color: white;
      padding: 5px 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-right: 5px;
    }
    .delete-button {
      background-color: red;
      color: white;
      padding: 5px 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .action-buttons {
      display: flex;
      gap: 5px;
    }
  </style>
</head>
<body>

<h2>All Submitted Messages</h2>

<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Message</th>
    <th>Action</th>
  </tr>

<?php
// DB connection
$conn = new mysqli("localhost", "root", "", "my_form_db");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch data
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
              <form action='edit.php' method='post' style='display:inline;'>
                <input type='hidden' name='id' value='{$row['id']}'>
                <button type='submit' class='edit-button'>Edit</button>
              </form>
              <form action='delete.php' method='post' style='display:inline;'>
                <input type='hidden' name='id' value='{$row['id']}'>
                <button type='submit' class='delete-button' onclick='return confirm(\"Are you sure you want to delete this message?\");'>Delete</button>
              </form>
            </td>
          </tr>";
  }
} else {
  echo "<tr><td colspan='6' style='text-align:center;'>No messages found.</td></tr>";
}

$conn->close();
?>

</table>

</body>
</html>
