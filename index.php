<?php
//code for reading and displaying blog posts will be added here

$blogsJson = file_get_contents('Unheard-India-Blog/blogs.json');

// Parse the JSON data into an array
$blogsArray = json_decode($blogsJson, true);

// Display each blog post using HTML and Bootstrap components
foreach ($blogsArray as $blog) {
    echo '<div class="blog-post">';
    echo '<h2>' . $blog['title'] . '</h2>';
    echo '<p>Author: ' . $blog['author'] . '</p>';
    echo '<p>Date: ' . $blog['date'] . '</p>';
    echo '<p>' . $blog['content'] . '</p>';
    echo '<img src="' . $blog['image'] . '" alt="Blog Image">';
    echo '</div>';
}
?>
