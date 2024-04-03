<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Unheard India</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font awesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous"/>
    <link rel="stylesheet" href="styles.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="index.js"></script>
</head>

<body>
    <header> 

        <nav class = "navbar navbar-expand-lg navbar-light bg-light">
            <div class = "container">
                <a href = "new-index.php" class="navbar-brand">Unheard.India</a>
                <div class="navbar-nav">
                   <a href="#">home</a>
                   <a href="submit.php">submit</a>
                   <a href="about.php">about</a>
                   <a href="contact.php">connect</a>
                </div>
            </div> 
        </nav>

        <div class = "banner">
            <div class = "container">
                <h1 class = "banner-title"><span>Unheard</span> India </h1>
                <p>Discover the Spiritual Essence of India’s Hidden Sanctuaries</p>
                <form>
                <input type="text" class="search-input" placeholder="Begin your Pilgrimage . . .">
                <button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </header>

    <div class = "blog-content" id = "blog-content">
        <?php 

        $file = "blogPosts.json";

        $json_data = file_get_contents($file); //read file

        $blogs = json_decode( $json_data, true ); //parse JSON

        if($blogs!=NULL){
            foreach($blogs as $blog){
                echo '<div class = "blog-item">';
                echo '<div class = "blog-img">';

                // Check if 'image' key exists
                if (isset($blog['image'])) {
                    echo '<img src="images/' . $blog['image'] . '" alt="' . $blog['title'] . '">';
                } else {
                    echo '<img src="images/krishna-girl.jpg" alt="Image not found">';
                }

            echo '<span><i class="far fa-heart"></i></span>';
            echo '</div>';
            echo '<div class="blog-text">';

             // Check if 'title' key exists
             if (isset($blog['title'])) {
                echo '<h2>' . $blog['title'] . '</h2>';
            } else {
                echo '<h2>No Title</h2>';
            }

            // Check if 'content' key exists
            if (isset($blog['content'])) {
                echo '<p>' . $blog['content'] . '</p>';
            } else {
                echo '<p>No Content</p>';
            }

              // Check if 'author' key exists
            if (isset($blog['author'])) {
                echo '<p><strong>Author:</strong> ' . $blog['author'] . '</p>';
            } else {
                echo '<p><strong>Author:</strong> Unknown</p>';
            }
            echo '</div>';
            echo '</div>';


        }
    } else {
        echo '<p>No blog posts found.</p>';
    }
    ?>

    </div>