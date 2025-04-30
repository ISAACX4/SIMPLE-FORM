<?php
// Connect to DB
$conn = new mysqli("localhost", "root", "", "my_form_db");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the message ID from POST
if (!isset($_POST['id'])) {
  die("No ID provided.");
}

$id = intval($_POST['id']);

// Fetch the record to edit
$sql = "SELECT * FROM messages WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows != 1) {
  die("Message not found.");
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Message</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 30px;
      background-color: #f4f4f4;
    }
    form {
      width: 50%;
      margin: auto;
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    input, textarea {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    button {
      padding: 10px 20px;
      background-color: #007BFF;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>

<h2 style="text-align:center;">Edit Message</h2>

<form action="update.php" method="post">
  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

  Name:
  <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>

  Email:
  <input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>

  Phone:
  <input type="text" name="phone" value="<?php echo htmlspecialchars($row['phone']); ?>">

  Message:
  <textarea name="message" rows="5"><?php echo htmlspecialchars($row['message']); ?></textarea>

  <button type="submit">Update Message</button>
</form>

</body>
</html>
