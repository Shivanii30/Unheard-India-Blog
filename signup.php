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
                <a href="about.php">about</a>
                <a href="email.php">connect</a>
                <a href = "login.php">login</a>
            </div>
        </div>
    </nav>
</header>
<!-- end of header --> 
<div class="container">
    <input id="signup_toggle" type="checkbox">
    <form class="form">
        <div class="form_front">
            <div class="form_details">Login</div>
            <input type="text" class="input" placeholder="Username">
            <input type="text" class="input" placeholder="Password">
            <button class="btn">Login</button>
            <span class="switch">Don't have an account? 
                <label for="signup_toggle" class="signup_tog">
                    Sign Up
                </label>
            </span>
        </div>
        <div class="form_back">
            <div class="form_details">SignUp</div>
            <input type="text" class="input" placeholder="Firstname">
            <input type="text" class="input" placeholder="Username">
            <input type="text" class="input" placeholder="Password">
            <input type="text" class="input" placeholder="Confirm Password">
            <button class="btn">Signup</button>
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
</body>
</html>