<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Full Blog Post</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
     <!-- Font awesome icon -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="index.js"></script>
</head>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a href="index.php" class="navbar-brand">Unheard.India</a>
            <div class="navbar-nav">
                <a href="index.php">home</a>
                <a href="submit.php">submit</a>
                <a href="about.html">about</a>
                <a href="contact.html">connect</a>
                <a href = "signup.php">login</a>
            </div>
        </div>
    </nav>
<body>

    <div class = "container">
<?php
// Include the database connection file
include_once 'db_connection.php';

// Get the blog post ID from the URL parameter
$blog_post_id = $_GET['id'];

// Fetch the blog post from the database using the ID
$stmt = $pdo->prepare("SELECT * FROM blog_posts WHERE id = ?");
$stmt->execute([$blog_post_id]);
$blog_post = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the blog post exists
if ($blog_post) {
    ?>

<div class="blog-post">
<h1><?php echo $blog_post['title']; ?></h1>
        <div class="blog-image">
        <?php
            // Fetch image path from the database
            $image_path = $blog_post['image']; // Assuming 'image_path' is the column name in your database
            
            // Check if image_path is not empty
            if (!empty($image_path)) {
                // Output the image tag with the dynamically fetched image path
                echo '<img src="' . $image_path . '" alt="Blog Image">';
            } else {
                // If image path is empty or not found, you can provide a default image or a placeholder
                echo '<img src="images/404 error with portals-rafiki.png" alt="Default Image">';
            }
            ?>
        </div>
        <div class="post-content">
           <br> <p><?php echo $blog_post['content']; ?></p><br>
            <p><strong>Author:</strong> <?php echo $blog_post['author']; ?></p>
        </div>
    </div>
<?php
} else {
    echo 'Blog post not found.';
}
?>
</div>

<!-- Main Content Section with image and blog post content -->

</body>


<!-- footer -->
<footer>
    <div class="social-links">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-pinterest"></i></a>
    </div>
    <span>Unheard.India Blog Page</span>
</footer>
</body>
</html>


