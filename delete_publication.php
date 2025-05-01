<?php
require_once './includes/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $id_publication = $_POST['id'];

        $delete_sql = "DELETE FROM publications WHERE id = ?";
        $stmt = $conn->prepare($delete_sql);
        $stmt->bind_param("i", $id_publication);

        if ($stmt->execute()) {
          
            header("Location: admin.php");
            exit();
        } else {
            echo "Error deleting publication.";
        }
    }
}


?>