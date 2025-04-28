<?php
session_start();
require_once './includes/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    
    if (empty($title) || empty($description) || empty($_FILES['image']['name'])) {
        die('Please fill all fields');
    }

    $uploadDir = 'uploads/publications/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    
    $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
    $targetPath = $uploadDir . $fileName;
    
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
        $stmt = $conn->prepare("INSERT INTO publications (title, description, image_path) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $description, $targetPath);
        
        if ($stmt->execute()) {
            header('Location: admin.php');
            exit();
        } else {
            unlink($targetPath);  
            die('Database error: ' . $conn->error);
        }
    } else {
        die('File upload failed');
    }
}
?>