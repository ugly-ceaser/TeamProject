<?php
session_start();
ob_start();
include_once "script/user.script.php";
if (!isset($_SESSION['id'])) {
    header("Location: auth");
} else {
    foreach (fetchWhere('user', 'id', $_SESSION['id']) as $row)
        extract($row);

}

?>

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
    <link rel="stylesheet" href="./assets/css/profile.css">
</head>

<body>
    <header>
        <h2>My Profile</h2>
        <img src="./assets/img/56bda8eac2e557228b8eecd613a13d47.jpg" alt="profile-image">
    </header>

    <aside>
        <ul>
            <li class="edit_profile active"><i class="fa fa-pencil"></i> Edit Profile <i class="fa fa-chevron-right" id="chev"></i></li>
            <li class="edit_password"><i class="fa fa-shield"></i> Password & Security <i class="fa fa-chevron-right" id="chev"></i></li>
        </ul>
    </aside>

    <section class="main" id="profile_form">
        <h1>Edit Profile</h1>

        <div class="form-section">
            <div class="profile-photo">
                <img src="./assets/img/dfc2bca3ff0746d36b76bb4de66eb8c1.jpg" alt="">
            </div>

            <div class="form-group">
                <label for="user_image">Select Image</label>
                <input type="file" name="user_image" id="user_image" class="p-1">
            </div>

            <div class="form-diff">
                <div class="form-group">
                    <label for="firstname">First name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" spellcheck="true" value="<?=$firstname?>">
                </div>

                <div class="form-group">
                    <label for="lastname">Last name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control"spellcheck="true" value="<?=$lastname?>">
                </div>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" spellcheck="true" value="<?=$username?>">
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" spellcheck="true" value="<?=$user_email?>">
            </div>

            <input type="submit" value="Save">
        </div>
    </section>

    <section class="main" id="passord_security_form">
        <div class="form-section">
            <button class="change-password-btn">Change Password</button>

            <div class="change-password-form">
                <div class="form-group">
                    <label for="old_password">Old Password</label>
                    <input type="password" name="oldpassword" id="oldpassword">
                </div>

                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" name="new_password" id="new_password">
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password">
                </div>

                <input type="submit" value="Update Password">
                <button class="reset-password-btn">Reset Password</button>
            </div>

            <!-- <div class="change-password">
                <div class="form-group">
                    <label for="old_password">Old Password</label>
                    <input type="password" name="oldpassword" id="oldpassword">
                </div>

                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" name="new_password" id="new_password">
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password">
                </div>

                <input type="submit" value="Update Password">
            </div> -->
        </div>
    </section>
    <!-- Assets -->
    <script src="./assets/vendor/aos/aos.js"></script>
    <script src="./assets/vendor/Font-awesome/js/all.min.js"></script>
    
    <script>
        const edit_profile = document.querySelector('.edit_profile');
        const profile_form =document.querySelector('#profile_form');
        const passord_security_form =document.querySelector('#passord_security_form');
        const edit_password = document.querySelector('.edit_password');
        const change_password_btn =document.querySelector('.change-password-btn');
        const reset_password_btn =document.querySelector('.reset-password-btn');
        const change_password_form =document.querySelector('.change-password-form');
        const edit_profile_chev = document.querySelector('#chev');
        const edit_password_chev = document.querySelector('#chev');

        let tf = false;
        edit_profile.addEventListener('click', (e) => {
            if (!tf) {
                edit_profile.classList.add('active');
                profile_form.style.display = 'block';
                passord_security_form.style.display = 'none';
                edit_password.classList.remove('active');
            }
        })

        edit_password.addEventListener('click', (e) => {
            if (!tf) {
                edit_password.classList.add('active');
                profile_form.style.display = 'none'
                edit_profile.classList.remove('active');
                passord_security_form.style.display = 'block';
            }
        })

        change_password_btn.addEventListener('click', (e) => {
            change_password_form.style.display = 'block'
        })
    </script>
</body>

</html>