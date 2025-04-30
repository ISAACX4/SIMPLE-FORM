<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  <link rel="stylesheet" href="styles.css" />
</head>

<body>
<?php
    if(isset($_POST['id'])){
        $id = $_POST['id'];
      echo "<script>
                    alert($id);
           </script>";
    }
?>
  <div class="container">
    <h2>Contact Us</h2>
    <form action="submit.php" method="POST">
      <label for="name">Name:</label>
      <input type="text" name="name" required />

      <label for="email">Email:</label>
      <input type="email" name="email" required />

      <label for="phone">Phone:</label>
      <input type="text" name="phone" required />

      <label for="message">Message:</label>
      <textarea name="message" rows="5" required></textarea>

      <button type="submit">Send</button>
     <button type="submit"><a href="view.php">View Messages</a></button> 
    </form>
  </div>
</body>
</html>
