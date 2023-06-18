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
        <div class="form-panel ">
            <div class="form-header">
                <h1>Register</h1>
            </div>
            <div class="form-content">
            <form  action="" method="post">
                <?php 
                if (isset($message)) {
                    echo"<h5 style='color:red'>$message</h5>";
                }?>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" required="required" style="color: black;" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required="required" style="color: black;"/>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required="required" style="color: black;"/>
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" id="cpassword" name="cpassword" required="required" style="color: black;"/>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="register" id="reg">Register</button>
                    </div>
                    <a class="form-recovery" style="text-decoration: none;" href="auth">Login instead</a>
                </form>
            </div>

            <?php
                        if (isset($_POST['register'])) {
                            $name = $_POST['username'];
                            $email = $_POST['email'];
                            $pwd = $_POST['password'];
                            $cpwd = $_POST['cpassword'];
                            register($name,$email,$pwd,$cpwd);
                        }
                ?>
        </div>
    </div>

    <!-- Assets -->
    <script src="./assets/vendor/aos/aos.js"></script>
    <script src="./assets/vendor/Font-awesome/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <!-- Base Sripts File -->
</body>

</html>