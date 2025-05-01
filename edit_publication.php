<?php
require_once './includes/connect.php';

if (isset($_GET['id'])) {
    $id_publication = (int) $_GET['id'];  

    $sql = "SELECT * FROM publications WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_publication);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $publication = $result->fetch_assoc();
    } else {
        echo "Publication not found!";
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = trim($_POST['title']);
        $description = trim($_POST['description']);

        $update_sql = "UPDATE publications SET title = ?, description = ? WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ssi", $title, $description, $id_publication);
        $update_stmt->execute();

        header('Location: admin.php');
        exit();
    }
} else {
    echo "No publication ID provided!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Publication</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }

        input[type="text"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            color: #333;
        }

        input[type="text"]:focus {
            outline-color: #4A90E2;
            border-color: #4A90E2;
        }

        button {
            padding: 12px;
            background-color: #4A90E2;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #357ABD;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Publication</h1>
        <form method="POST">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="<?= htmlspecialchars($publication['title']) ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" id="description" name="description" value="<?= htmlspecialchars($publication['description']) ?>" required>
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
