<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Submit Blog Post</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<?php
// Define variables and initialize with empty values
$title = $author = $content = $image = "";
$title_err = $author_err = $content_err = $image_err = "";

// Process form submission when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate title
    if (empty(trim($_POST["title"]))) {
        $title_err = "Please enter a title.";
    } else {
        $title = trim($_POST["title"]);
    }

    // Validate author
    if (empty(trim($_POST["author"]))) {
        $author_err = "Please enter an author.";
    } else {
        $author = trim($_POST["author"]);
    }

    // Validate content
    if (empty(trim($_POST["content"]))) {
        $content_err = "Please enter content.";
    } else {
        $content = trim($_POST["content"]);
    }

    // Validate image
    if (!empty($_FILES["image"]["name"])) {
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            // Check file size
            if ($_FILES["image"]["size"] > 5000000) {
                $image_err = "Sorry, your file is too large.";
            } else {
                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                    $image_err = "Sorry, only JPG, JPEG, and PNG files are allowed.";
                } else {
                    // Move uploaded file to designated folder
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        $image = basename($_FILES["image"]["name"]);
                    } else {
                        $image_err = "Sorry, there was an error uploading your file.";
                    }
                }
            }
        } else {
            $image_err = "File is not an image.";
        }
    }

    // If no validation errors, append blog post to JSON file
    if (empty($title_err) && empty($author_err) && empty($content_err) && empty($image_err)) {
        $blogs_file = 'blogPosts.json';
        $blogs_data = json_decode(file_get_contents($blogs_file), true);
        $new_blog = array(
            "title" => $title,
            "content" => $content,
            "author" => $author,
            "image" => $image
        );
        $blogs_data[] = $new_blog;
        file_put_contents($blogs_file, json_encode($blogs_data));
        echo "Blog post submitted successfully.";
    }
}
?>

<h2>Submit Blog Post</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <div>
        <label>Title:</label>
        <input type="text" name="title" value="<?php echo $title; ?>">
        <span><?php echo $title_err; ?></span>
    </div>
    <div>
        <label>Author:</label>
        <input type="text" name="author" value="<?php echo $author; ?>">
        <span><?php echo $author_err; ?></span>
    </div>
    <div>
        <label>Content:</label>
        <textarea name="content"><?php echo $content; ?></textarea>
        <span><?php echo $content_err; ?></span>
    </div>
    <div>
        <label>Image:</label>
        <input type="file" name="image">
        <span><?php echo $image_err; ?></span>
    </div>
    <div>
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </div>
</form>

</body>
</html>
