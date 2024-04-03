
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
</head>

<body>

<!-- header -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a href="index.php" class="navbar-brand">Unheard.India</a>
            <div class="navbar-nav">
                <a href="#">home</a>
                <a href="submit.php">submit</a>
                <a href="about.php">about</a>
                <a href="contact.php">connect</a>
            </div>
        </div>
    </nav>
    <div class="banner">
        <div class="container">
            <h1 class="banner-title">
                <span>Unheard</span> India
            </h1>
            <p>Discover the Spiritual Essence of India’s Hidden Sanctuaries </p>
            <form>
                <input type="text" class="search-input" placeholder="Begin your Pilgrimage . . .">
                <button type="submit" class="search-btn">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </div>
</header>
<!-- end of header -->

<!-- blog -->
<div class="blog-content" id="blog-content">
    <?php
    $file = 'blogPosts.json';
    // Read the content of the JSON file
    $json_data = file_get_contents($file);

    // Parse the JSON data into an array
    $blogs = json_decode($json_data, true);

    // Check if $blogs is not null
    if ($blogs !== null) {
        // Dynamically display each blog post using HTML and Bootstrap components
        foreach ($blogs as $blog) {
            echo '<div class="blog-item">';
            echo '<div class="blog-img">';

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

<!--New Card-->

<!--styling for new card-->
<style>
    .card {
  position: relative;
  width: 450px;
  height: 330px;
  aspect-ratio: 16/9;
  background-color: #f2f2f2;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  perspective: 1000px;
  box-shadow: 0 0 0 5px #ffffff80;
  transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.card svg {
  width: 48px;
  fill: #333;
  transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.card__image {
width: 100%;
height: 100%;
background-image: url('images/datta.jpg');

background-size: cover;
background-position: center;

}

.card:hover {
  transform: scale(1.05);
  box-shadow: 0 8px 16px rgba(255, 255, 255, 0.2);
}

.card__content {
  position: absolute;
  top: 10;
  left: 0;
  width: 100%;
  height: 100%;
  padding: 20px;
  box-sizing: border-box;
  background-color: #f2f2f2;
  transform: rotateX(-90deg);
  transform-origin: bottom;
  transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.card:hover .card__content {
    background-color: #ffff;
  transform: rotateX(0deg);
}

.card__title {
  margin: 50;
  font-size: 20px;
  color: #333;
  font-weight: 700;
}

.card:hover svg {
  scale: 0;
}

.card__description {
  margin: 10px 0 10px;
  font-size: 12px;
  color: #777;
  line-height: 1.4;
}

.card__button {
  padding: 15px;
  border-radius: 8px;
  background: #777;
  border: none;
  color: white;
}

.secondary {
  background: transparent;
  color: #777;
  border: 1px solid #777;
}
</style>
<div class="card">
    <div class = "card__image"></div>
    <div class="card__content">
        <p class="card__title">Project Name</p>
        <p class="card__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. <br></br>
        <b>Author <b> : Shivani <br></br> <b>Date</b> : 16/04/24</p>
        <button class="card__button secondary">Read More</button>
    </div>
</div>

</div>
</div>

    <!-- End of provided card snippet -->
</div>


</div>
<!-- end of blog -->

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
<!-- end of footer -->

</body>
</html>
