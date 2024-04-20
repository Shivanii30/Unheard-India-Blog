
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
    <script src = "container.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/boxicons/2.0.7/css/boxicons.min.css">
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
                <a href="about.html">about</a>
                <a href="contact.html">connect</a>
                <a href = "signup.php">login</a>
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
<div class = "container">

<?php
// Include the database connection file
include_once 'db_connection.php';

// Fetch blog posts from the database
$stmt = $pdo->query("SELECT * FROM blog_posts");
$blog_posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- blog -->
<div class="blog-content" id="blog-content">
<?php foreach ($blog_posts as $post): ?>
            <div class="card">
                <div class="card__image" style="background-image: url('<?php echo $post['cover']; ?>')"></div>
                <div class="card__content">
                    <p class="card__title"><?php echo $post['title']; ?></p>
                    <p class="card__description"><?php echo substr($post['content'], 0, 100); ?>...</p>
                    <p><b>Author:</b> <?php echo $post['author']; ?></p>
                    <!-- Link to view full blog post -->
                    <a href="full_blog_post.php?id=<?php echo $post['id']; ?>" class="card__button secondary">Read More</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

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
background-image: url('');
background-size: cover;

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
  transform: rotateX(-90deg);
  transform-origin: bottom;
  transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.card:hover .card__content {
  background-color: white;
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
 width: 100px;
 height: 20px;
 color: #fff;
 border-radius: 5px;
 padding: 10px 25px;
 font-family: 'Lato', sans-serif;
 font-weight: 500;
 background: transparent;
 text-decoration:none;
 cursor: pointer;
 transition: all 0.3s ease;
 position: absolute;
 display: inline-block;
 box-shadow: inset 2px 2px 2px 0px rgba(255,255,255,.5),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
 outline: none;
 bottom:30px;
}

.secondary {
 background: rgb(96,9,240);
 background: #5a6771;
 border: none;
}

.card__button:hover {
    background:#818674;
 box-shadow: 4px 4px 6px 0 rgba(255,255,255,.5),
              -4px -4px 6px 0 rgba(116, 125, 136, .5), 
    inset -4px -4px 6px 0 rgba(255,255,255,.2),
    inset 4px 4px 6px 0 rgba(0, 0, 0, .4);
}

</style>

<div class="card">
    <div class = "card__image"></div>
    <div class="card__content">
        <p class="card__title"></p>
        <p class="card__description"></p>
        <button class="card__button secondary">Read More</button>
    </div>
</div>

</div>
</div>

    <!-- End of provided card snippet -->
</div>


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
