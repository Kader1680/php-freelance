<?php
session_start();
require_once './includes/connect.php';

// Optional: Check if the user is authenticated
// if (!isset($_SESSION['user_id'])) {
//     die('Unauthorized access');
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = htmlspecialchars(strip_tags($_POST['title'] ?? ''));
    $description = htmlspecialchars(strip_tags($_POST['description'] ?? ''));

    if (empty($title) || empty($description) || empty($_FILES['image']['name'])) {
        die('Please fill all fields');
    }

    
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];
    $fileTmpPath = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileMime = mime_content_type($fileTmpPath);
    $fileExt = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

    if (!in_array($fileMime, $allowedTypes) || !in_array($fileExt, $allowedExts)) {
        die('Invalid file type. Only JPG, PNG, and GIF are allowed.');
    }

    $maxSize = 2 * 1024 * 1024; 
    if ($fileSize > $maxSize) {
        die('File size exceeds 2MB limit');
    }
 
    $uploadDir = 'uploads/publications/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
    $targetPath = $uploadDir . $fileName;

    if (move_uploaded_file($fileTmpPath, $targetPath)) {
        chmod($targetPath, 0644);

        $stmt = $conn->prepare("INSERT INTO publications (title, description, image_path) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $description, $targetPath);

        if ($stmt->execute()) {
            header('Location: admin.php');
            exit();
        } else {
            unlink($targetPath);  
            error_log("Database error: " . $stmt->error);
            die('An error occurred while saving the publication.');
        }
    } else {
        die('File upload failed');
    }
}
?>
