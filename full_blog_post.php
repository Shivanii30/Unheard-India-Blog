<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Full Blog Post</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>

<?php
// Read the blog post ID from the query string
if (isset($_GET['id'])) {
    $blog_id = $_GET['id'];

    // Read and parse JSON data from new-blogs.json
    $json_data = file_get_contents('new-blogs.json');
    $blogs = json_decode($json_data, true);

     // Check if the specified blog post ID exists
     foreach ($blogs as $blog) {
        if (isset($blog['id']) && $blog['id'] === $blog_id) {
            // Display the full content of the blog post
            echo '<div class="full-blog-post">';
            echo '<h2>' . $blog['title'] . '</h2>';
            echo '<p><strong>Author:</strong> ' . $blog['author'] . '</p>';
            if (!empty($blog['image'])) {
                echo '<img src="images/' . $blog['image'] . '" alt="' . $blog['title'] . '">';
            }
            echo '<p>' . $blog['content'] . '</p>';
            echo '</div>';

            // Go back button 
            echo '<a href="index.php" class="go-back-button">Go Back</a>';

            // Exit the loop once the post is found
            break;
        }
    }
    // If the loop completes without finding the post
    if (!isset($blog) || (isset($blog) && !isset($blog['id']))) {
        echo '<p>Blog post not found.</p>';
    }
} else {
    echo '<p>Invalid request.</p>';
}
?>

</body>
</html>
