<?php
require_once './includes/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $user_id = $_POST['id'];

        // Delete user from database
        $delete_sql = "DELETE FROM users WHERE id = ?";
        $stmt = $conn->prepare($delete_sql);
        $stmt->bind_param("i", $user_id);

        if ($stmt->execute()) {
            // Redirect to avoid resubmitting the form
            header("Location: admin.php");
            exit();
        } else {
            echo "Error deleting user.";
        }
    }
}


?>