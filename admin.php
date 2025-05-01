<?php

// Check if admin is logged in
// if (!isset($_SESSION['admin_logged_in'])) {
//     header('Location: admin_login.php');
//     exit();
// }
// include 'includes/header.php'; 
session_start();
include './delete_user.php'; 
$role = $_SESSION['role'] ?? null;
require_once './includes/connect.php';
// || $_SESSION['role'] !== 'admin'
if (!isset($_SESSION['id'])) {
    echo "Access denied. Admins only.";
    exit;
}
echo $_SESSION['role']


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Dashboard</title>
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #b58e53;
            --accent-color: #3498db;
            --danger-color: #e74c3c;
            --success-color: #2ecc71;
            --light-bg: #f8f9fa;
            --dark-text: #333;
            --light-text: #f8f9fa;
            --border-color: #dee2e6;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-bg);
            color: var(--dark-text);
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        /* Header Styles */
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border-color);
        }
        
        .admin-header h1 {
            color: var(--primary-color);
            font-size: 28px;
        }
        
        .logout-btn {
            background-color: var(--danger-color);
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.3s;
        }
        
 
        .section {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 25px;
            margin-bottom: 30px;
        }
        
        .section-title {
            color: var(--primary-color);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--border-color);
            font-size: 22px;
        }
        
        /* Table Styles */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        
        .data-table th, 
        .data-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }
        
        .data-table th {
            background-color: var(--primary-color);
            color: white;
            font-weight: 500;
        }
        
        .data-table tr:hover {
            background-color: rgba(0, 0, 0, 0.02);
        }
        
        /* Action Buttons */
        .action-btn {
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            margin-right: 5px;
            transition: all 0.2s;
        }
        
        .edit-btn {
            background-color: var(--accent-color);
            color: white;
        }
        
        .edit-btn:hover {
            background-color: #2980b9;
        }
        
        .delete-btn {
            background-color: var(--danger-color);
            color: white;
        }
        
        .delete-btn:hover {
            background-color: #c0392b;
        }
        
        /* Form Styles */
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }
        
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            font-size: 16px;
            transition: border 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--accent-color);
            outline: none;
        }
        
        .submit-btn {
            background-color: var(--success-color);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        
        .submit-btn:hover {
            background-color: #27ae60;
        }
        
        /* Publications Grid */
        .publications-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }
        
        .publication-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .publication-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .card-image {
            height: 180px;
            overflow: hidden;
        }
        
        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }
        
        .publication-card:hover .card-image img {
            transform: scale(1.05);
        }
        
        .card-content {
            padding: 20px;
        }
        
        .card-title {
            font-size: 18px;
            margin-bottom: 10px;
            color: var(--primary-color);
        }
        
        .card-description {
            color: #666;
            margin-bottom: 15px;
            font-size: 14px;
        }
        
        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 15px;
            border-top: 1px solid var(--border-color);
        }
        
        .card-date {
            font-size: 12px;
            color: #999;
        }
        
        /* No Content Message */
        .no-content {
            text-align: center;
            padding: 40px 20px;
            color: #666;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            grid-column: 1 / -1;
        }
        
 
        @media (max-width: 768px) {
            .publications-grid {
                grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            }
            
            .data-table {
                display: block;
                overflow-x: auto;
            }
        }
        
        @media (max-width: 480px) {
            .publications-grid {
                grid-template-columns: 1fr;
            }
            
            .admin-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .logout-btn {
                margin-top: 15px;
            }
        }

        
    </style>
</head>
<body>
    <div class="container">
        <header class="admin-header">
            <h1 style="color: white;">Admin Dashboard</h1>
        </header>
        
        <!-- Users Section -->
        <section class="section">
            <h2 class="section-title">Manage Users</h2>
            <?php
            $user_sql = "SELECT id, fname, lname, email FROM users";
            $user_result = $conn->query($user_sql);
            
            if ($user_result->num_rows > 0): ?>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $user_result->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['id']) ?></td>
                                <td><?= htmlspecialchars($row['fname']) ?></td>
                                <td><?= htmlspecialchars($row['lname']) ?></td>
                                <td><?= htmlspecialchars($row['email']) ?></td>
                                <td>

                                <form action="delete_user.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')" class="action-container">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    <button type="submit" class="action-btn delete-btn">Delete</button>
</form>
<a href="edit_user.php?id=<?= $row['id'] ?>" class="action-btn edit-btn">Edit</a>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="no-content">No users found.</p>
            <?php endif; ?>
        </section>
        
        <!-- Publications Section -->
        <section class="section">
            <h2 class="section-title">Manage Publications</h2>
            
            <!-- Add Publication Form -->
            <form action="add_publication.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" class="form-control" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" class="form-control" accept="image/*" required>
                </div>
                <button type="submit" class="submit-btn">Add Publication</button>
            </form>
            
            <!-- Publications Grid -->
            <div class="publications-grid">
                <?php
                $pub_sql = "SELECT id, title, description, image_path, created_at FROM publications ORDER BY created_at DESC";
                $pub_result = $conn->query($pub_sql);
                
                if ($pub_result->num_rows > 0):
                    while($row = $pub_result->fetch_assoc()): ?>
                        <div class="publication-card">
                            <div class="card-image">
                                <img src="<?= htmlspecialchars($row['image_path']) ?>" alt="<?= htmlspecialchars($row['title']) ?>">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title"><?= htmlspecialchars($row['title']) ?></h3>
                                <p class="card-description"><?= htmlspecialchars($row['description']) ?></p>
                                <div class="card-footer">
                                    <span class="card-date"><?= date('M d, Y', strtotime($row['created_at'])) ?></span>
                                    <div class="actions">
                                        <a href="edit_publication.php?id=<?= $row['id'] ?>" class="action-btn edit-btn">Edit</a>
                                        <a href="delete_publication.php?id=<?= $row['id'] ?>" class="action-btn delete-btn" onclick="return confirm('Delete this publication?')">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                else: ?>
                    <p class="no-content">No publications found</p>
                <?php endif; ?>
            </div>
        </section>
    </div>
    
    <?php $conn->close(); ?>
</body>
</html>