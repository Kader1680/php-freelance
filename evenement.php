<?php 
include 'includes/header.php'; 
require_once './includes/connect.php';
?>

<main>
    <div class="image-header">
        <img src="img/evenement/Life Coach.jpeg" alt="Les Événements">
        <div class="overlay">
            <h1>LES EVENEMENTS</h1>
        </div>
    </div>
    
    <section class="news-section">
        <div class="container-grid">
            <?php
            $pub_sql = "SELECT id, title, description, image_path FROM publications";
            $pub_result = $conn->query($pub_sql);
            
            if ($pub_result->num_rows > 0) {
                while($row = $pub_result->fetch_assoc()) {
            ?>
                    <div class="card">
                        <div class="image-container">
                            <img src="<?php echo htmlspecialchars($row['image_path']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
                            <div class="overlay-2">
                            </div>
                        </div>
                        <h3 class='card-title'><?php echo htmlspecialchars($row['title']); ?> </h3>
                        <p class='card-description'><?php echo htmlspecialchars(substr($row['description'], 0, 350)); ?>...</p>
                    </div>
            <?php
                }
            } else {
                echo '<p>No publications found.</p>';
            }
            ?>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>