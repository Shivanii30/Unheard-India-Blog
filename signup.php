<?php
// Include the database connection file
include_once 'db_connection.php';

// Initialize variables for alert message
$alert_message = "";
$alert_type = "";
$login_username = "";
$login_password = "";
$signup_firstname = "";
$signup_username = "";
$signup_password = "";
$signup_confirm_password = "";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login_submit'])) {
        // Handle login form submission
        $login_username = $_POST['login_username'];
        $login_password = $_POST['login_password'];

        // Query the database to check if the username exists
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $login_username);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user && password_verify($login_password, $user['password'])) {
            // User authenticated successfully
            $alert_message = "Login successful!";
            $alert_type = "success";
            // Redirect to the dashboard or another page
            header("Location: index.php");
            exit(); // Stop further execution
        } else {
            // Invalid credentials
            $alert_message = "Error: Invalid username or password.";
            $alert_type = "error";
        }
    } elseif (isset($_POST['signup_submit'])) {
        // Handle sign-up form submission
        $signup_email = $_POST['email'];
        $signup_username = $_POST['username'];
        $signup_password = $_POST['password'];
        $signup_confirm_password = $_POST['confirm_password'];

        // Validate form data (e.g., check if passwords match)
        if ($signup_password != $signup_confirm_password) {
            $alert_message = "Error: Passwords do not match.";
            $alert_type = "error";
        } else {
            // Hash the password before storing it in the database (for security)
            $hashed_password = password_hash($signup_password, PASSWORD_DEFAULT);

            // Insert the user data into the database
            $stmt = $pdo->prepare("INSERT INTO users (username,email, password) VALUES (:username, :email, :password)");
            $stmt->bindParam(':username', $signup_username);
            $stmt->bindParam(':email', $signup_email);
            $stmt->bindParam(':password', $hashed_password);
            

            // Execute the query
            if ($stmt->execute()) {
                $alert_message = "User registered successfully!";
                $alert_type = "success";
            } else {
                $alert_message = "Error: User registration failed.";
                $alert_type = "error";
            }
        }
    }
}
?>


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

    <script>
        // Display alert message
        function showAlert(message, type) {
            alert(message);
            // You can also customize the alert style based on the type (success, error, etc.)
        }

        // Check if there's an alert message from PHP and display it using JavaScript
        <?php if ($alert_message): ?>
            showAlert("<?php echo $alert_message; ?>", "<?php echo $alert_type; ?>");
        <?php endif; ?>
    </script>


    </head>

<body>

<!-- header -->
<header>
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
</header>
<!-- end of header --> 
<div class="container">
    <input id="signup_toggle" type="checkbox">
    <form class="form" method="POST" action="signup.php">
        <div class="form_front">
            <div class="form_details">Login</div>
            <input type="text" class="input"name="login_username" placeholder="Username">
            <input type="text" class="input" name="login_password" placeholder="Password">
            <button class="btn" name="login_submit" type = "submit">Login</button>
            <span class="switch">Don't have an account? 
                <label for="signup_toggle" class="signup_tog">
                    Sign Up
                </label>
            </span>
        </div>
        <div class="form_back">
            <div class="form_details">SignUp</div>
            <input type="email" class="input" placeholder="Email"  name="email">
            <input type="text" class="input" placeholder="Username" name="username">
            <input type="password" class="input" placeholder="Password"name="password">
            <input type="password" class="input" placeholder="Confirm Password" name="confirm_password">
            <button class="btn" name="signup_submit" type = "submit">Signup</button>
            <span class="switch">Already have an account? 
                <label for="signup_toggle" class="signup_tog">
                    Sign In
                </label>
            </span>
        </div>
    </form>
</div>

<style>
    .container {
  display: flex;
  justify-content: center;
  align-items: center;
}

.form {
  display: flex;
  justify-content: center;
  align-items: center;
  transform-style: preserve-3d;
  transition: all 1s ease;
}

.form .form_front {
    bottom: 75px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 20px;
  position: absolute;
  backface-visibility: hidden;
  padding: 65px 45px;
  border-radius: 15px;
  box-shadow: inset 2px 2px 10px rgba(0,0,0,1),
  inset -1px -1px 5px rgba(255, 255, 255, 0.6);
}

.form .form_back {
    bottom:40px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 20px;
  position: absolute;
  backface-visibility: hidden;
  transform: rotateY(-180deg);
  padding: 65px 45px;
  border-radius: 15px;
  box-shadow: inset 2px 2px 10px rgba(0,0,0,1),
  inset -1px -1px 5px rgba(255, 255, 255, 0.6);
}

.form_details {
  font-size: 25px;
  font-weight: 600;
  padding-bottom: 10px;
  color: white;
}

.input {
  width: 245px;
  min-height: 45px;
  color: #fff;
  outline: none;
  transition: 0.35s;
  padding: 0px 7px;
  background-color: #212121;
  border-radius: 6px;
  border: 2px solid #212121;
  box-shadow: 6px 6px 10px rgba(0,0,0,1),
  1px 1px 10px rgba(255, 255, 255, 0.6);
}

.input::placeholder {
  color: #999;
}

.input:focus.input::placeholder {
  transition: 0.3s;
  opacity: 0;
}

.input:focus {
  transform: scale(1.05);
  box-shadow: 6px 6px 10px rgba(0,0,0,1),
  1px 1px 10px rgba(255, 255, 255, 0.6),
  inset 2px 2px 10px rgba(0,0,0,1),
  inset -1px -1px 5px rgba(255, 255, 255, 0.6);
}

.btn {
  padding: 10px 35px;
  cursor: pointer;
  background-color: #212121;
  border-radius: 6px;
  border: 2px solid #212121;
  box-shadow: 6px 6px 10px rgba(0,0,0,1),
  1px 1px 10px rgba(255, 255, 255, 0.6);
  color: #fff;
  font-size: 15px;
  font-weight: bold;
  transition: 0.35s;
}

.btn:hover {
  transform: scale(1.05);
  box-shadow: 6px 6px 10px rgba(0,0,0,1),
  1px 1px 10px rgba(255, 255, 255, 0.6),
  inset 2px 2px 10px rgba(0,0,0,1),
  inset -1px -1px 5px rgba(255, 255, 255, 0.6);
}

.btn:focus {
  transform: scale(1.05);
  box-shadow: 6px 6px 10px rgba(0,0,0,1),
  1px 1px 10px rgba(255, 255, 255, 0.6),
  inset 2px 2px 10px rgba(0,0,0,1),
  inset -1px -1px 5px rgba(255, 255, 255, 0.6);
}

.form .switch {
  font-size: 13px;
  color: white;
}

.form .switch .signup_tog {
  font-weight: 700;
  cursor: pointer;
  text-decoration: underline;
}

.container #signup_toggle {
  display: none;
}

.container #signup_toggle:checked + .form {
  transform: rotateY(-180deg);
}
</style>

<script>
     // Display alert message
     function showAlert(message, type) {
            alert(message);
            // You can also customize the alert style based on the type (success, error, etc.)
        }

        // Check if there's an alert message from PHP and display it using JavaScript
        <?php if ($alert_message): ?>
            showAlert("<?php echo $alert_message; ?>", "<?php echo $alert_type; ?>");
        <?php endif; ?>
</script>
</body>
</html>