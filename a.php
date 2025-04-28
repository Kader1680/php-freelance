<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel - Manage Users</title>
  <link rel="stylesheet" href="admin.css">
</head>
<body>

  <h1>Manage Users</h1>

  <table border="1">
    <thead>
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Registration Date</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>" . $row['id'] . "</td>
                  <td>" . $row['first_name'] . "</td>
                  <td>" . $row['last_name'] . "</td>
                  <td>" . $row['email'] . "</td>
                  <td>" . $row['registration_date'] . "</td>
                  <td>
                    <a href='edit_user.php?type=user&id=" . $row['id'] . "'>Edit</a> | 
                    <a href='delete_user.php?id=" . $row['id'] . "'>Delete</a>
                  </td>



                </tr>";
        }
      } else {
        echo "<tr><td colspan='6'>No users found.</td></tr>";
      }

      $conn->close();
      ?>
    </tbody>
  </table>
  <h2>Add New User</h2>
<form action="add_user.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username" required><br><br>
    <label for="email">Email:</label>
    <input type="email" name="email" required><br><br>
    <label for="password">Password:</label>
    <input type="password" name="password" required><br><br>
    <input type="submit" value="Add User">
</form>


</body>
</html>
