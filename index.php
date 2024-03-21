<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unheard India</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Add custom styles here */
    </style>
</head>
<body>

    <!-- Header Section -->
    <header>
        <!-- Add your header content here -->
    </header>

    <!-- Blog Section -->
    <section class="container mt-5">
        <div class="row">
            <?php

            $json_file = __DIR__ . "/blogs.json";
            // Step 1: Read the content of the "blogs.json" file
            $json_data = file_get_contents($json_file);

            // Step 2: Parse the JSON data into an array
            $blog_posts = json_decode($json_data, true);

            // Step 3: Dynamically display each blog post
            foreach ($blog_posts as $post) {
                ?>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="<?php echo $post['image']; ?>" class="card-img-top" alt="Blog Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $post['title']; ?></h5>
                            <p class="card-text"><?php echo $post['content']; ?></p>
                            <p class="card-text"><small class="text-muted">Author: <?php echo $post['author']; ?> | Date: <?php echo $post['date']; ?></small></p>
                            <!-- Add additional HTML elements as needed -->
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        <!-- Add your footer content here -->
    </footer>

</body>
</html>
