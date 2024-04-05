<?php
// Include database connection file
include 'db_connection.php';

session_start();

// Handle signup form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the email already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<p style='color: red;'>Email already exists. Please choose a different email.</p>";
    } else {
        // Insert new user into database
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashed_password);
        if ($stmt->execute()) {
            echo "<p style='color: green;'>Account created successfully. You can now login.</p>";
        } else {
            echo "<p style='color: red;'>Error creating account. Please try again later.</p>";
        }
    }
}

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["signup"])) {
    // Get input data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL statement to fetch user from the database
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User found, verify password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password is correct, set session variables and redirect to dashboard
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("Location: index.php");
            exit();
        } else {
            // Password is incorrect, display error message
            echo "<p style='color: red;'>Invalid email or password.</p>";
        }
    } else {
        // User not found, display error message
        echo "<p style='color: red;'>Invalid email or password.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body style="background-color: #000;">

<div class = "container">
<h2>Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>

    <p id="signup-link">Don't have an account? <a href="#" onclick="toggleSignUpForm()">Signup</a></p>

    <!-- Sign-up form -->
    <div id="signup-form" style="display: none;">
        <h2>Sign Up</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="signup" value="true">
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="email_signup">Email:</label>
                <input type="email" id="email_signup" name="email" required>
            </div>
            <div>
                <label for="password_signup">Password:</label>
                <input type="password" id="password_signup" name="password" required>
            </div>
            <div>
                <button type="submit">Sign Up</button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleSignUpForm() {
        var signupForm = document.getElementById("signup-form");
        if (signupForm.style.display === "none") {
            signupForm.style.display = "block";
        } else {
            signupForm.style.display = "none";
        }
    }
</script>
</body>
</html>
