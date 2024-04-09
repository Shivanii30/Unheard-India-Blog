<?php
// Initialize variables
$title = "";
$content = "";
$author = "";
$alert_message = "";
$alert_type = "";

// Include the database connection file
include_once 'db_connection.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = isset($_POST['title']) ? $_POST['title'] : "";
    $content = isset($_POST['content']) ? $_POST['content'] : "";
    $author = isset($_POST['author']) ? $_POST['author'] : "";

    // Check if files were uploaded
    if (isset($_FILES['cover']) && isset($_FILES['image'])) {
        // Define upload directory
        $upload_directory = 'upload/';

        // Retrieve file names and temporary paths
        $cover_name = $_FILES['cover']['name'];
        $image_name = $_FILES['image']['name'];
        $cover_tmp_name = $_FILES['cover']['tmp_name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];

        // Generate unique filenames to prevent conflicts
        $cover_path = $upload_directory . uniqid() . '_' . $cover_name;
        $image_path = $upload_directory . uniqid() . '_' . $image_name;

        // Move uploaded files to desired directory
        if (move_uploaded_file($cover_tmp_name, $cover_path) && move_uploaded_file($image_tmp_name, $image_path)) {
            // Prepare SQL statement to insert data into database
            $stmt = $pdo->prepare("INSERT INTO blog_posts (title, content, author, cover, image) VALUES (:title, :content, :author, :cover, :image)");
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':author', $author);
            $stmt->bindParam(':cover', $cover_path);
            $stmt->bindParam(':image', $image_path);

            // Execute the query
            if ($stmt->execute()) {
                $alert_message = "Blog post submitted successfully!";
                $alert_type = "success";
            } else {
                $alert_message = "Error: Unable to submit blog post.";
                $alert_type = "error";
            }
        } else {
            // Error moving files
            $alert_message = "Error: Unable to upload files.";
            $alert_type = "error";
        }
    } else {
        // No files uploaded
        $alert_message = "Error: Please select both cover photo and image.";
        $alert_type = "error";
    }
}
?>
<DOCTYPE html>
<form method="post" action="submit.php" enctype="multipart/form-data">
    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title"><br>
    
    <label for="content">Content:</label><br>
    <textarea id="content" name="content"></textarea><br>
    
    <label for="author">Author:</label><br>
    <input type="text" id="author" name="author"><br>
    
    <label for="cover">Cover Photo:</label><br>
    <input type="file" id="cover" name="cover"><br>
    
    <label for="image">Image:</label><br>
    <input type="file" id="image" name="image"><br>
    
    <input type="submit" value="Submit">
</form>
</html>
