<?php session_start()?>
<?php ob_start()?>
<?php include_once"script/user.script.php"?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>None yet</title>
    <!-- Assets -->
    <link rel="stylesheet" href="./assets/vendor/aos/aos.css">
    <link rel="stylesheet" href="./assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="./assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/vendor/Font-awesome/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope&family=Merriweather:wght@700&display=swap" rel="stylesheet">
    <!-- Base Css File -->
    <link rel="stylesheet" href="./assets/css/main.css">
</head>

<body>
    <div class="form">    
        <div class="form-panel one">
            <div class="form-header">
                <h1>Login</h1>
            </div>
            <div class="form-content">
                <form  action="" method="post">
                    <div class="form-group">
                        <label for="username">Email Address</label>
                        <input type="email" id="email" name="email" required="required" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required="required" />
                    </div>
                    <div class="form-group">
                        <label class="form-remember">
                            <input type="checkbox" />Remember Me
                        </label><a class="form-recovery" href="#">Forgot Password?</a>
                        <a class="form-recovery" href="reg">Create an accountt?</a>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="login">Log In</button>
                    </div>
                </form>
                
            </div>
        </div>
        <?php
                        if (isset($_POST['login'])) {
                            $name = $_POST['email'];
                            $password = $_POST['password'];
                            login($name, $password);
                        }
                ?>
    
    </div>

    <!-- Assets -->
    <script src="./assets/vendor/aos/aos.js"></script>
    <script src="./assets/vendor/Font-awesome/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <!-- Base Sripts File -->


</body>

</html>