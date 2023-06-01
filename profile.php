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
        <!-- Side Bar -->
        <div class="sideBar">
            <div class="brand-logo">
                <img src="./assets/img/logo.png" alt="">
            </div>
            <a href="./dashboard.php" title="dashboard"><i class="fa fa-house"></i></a>

            <ul class="red-menu">
                <li title="profile"><a href="profile"><i class="fa fa-user"></i></a></li>
                <li><a href="#"><i class="fa fa-plug"></i></a></li>
                <li><a href="#"><i class="fa fa-layer-group"></i></a></li>
                <li><a href="./trade-history.php"><i class="fa fa-chart-line"></i></a></li>
            </ul>

            <a href=""><i class="fa fa-shield"></i></a>
            <a href="?logout=yes"><i class="fa fa-sign-out-alt" style="color: white; margin-top: 20px;"></i></a>
        </div>
        <ul class="pages" id="pages">
            <li class="edit_profile active"><i class="fa fa-pencil"></i> Edit Profile <i class="fa fa-chevron-right" id="chev"></i></li>
            <li class="edit_password"><i class="fa fa-shield" id="shd"></i> Password & Security <i class="fa fa-chevron-right" id="chev"></i></li>
        </ul>
    </aside>

    <section class="main" id="profile_form">
        <div class="main-header">
            <h1>Edit Profile</h1>
            <a href="#" class="menu not-active" id="toggleSideBar">Menu</a>
        </div>

        <div class="form-section">
            <div class="profile-photo">
                <img src="./assets/img/dfc2bca3ff0746d36b76bb4de66eb8c1.jpg" alt="">
            </div>

            <<<<<<< HEAD <input type="file" name="profile_photo" id="profile_photo">
                =======
                <div class="form-group">
                    <label for="user_image">Select Image</label>
                    <input type="file" name="user_image" id="user_image" class="p-1">
                </div>
                >>>>>>> ea28218f5359827785ce1f53bdcf4e183d0e26d9

                <div class="form-diff">
                    <div class="form-group">
                        <label for="firstname">First name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" spellcheck="true" value="<?= $firstname ?>">
                    </div>

                    <div class="form-group">
                        <label for="lastname">Last name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" spellcheck="true" value="<?= $lastname ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" spellcheck="true" value="<?= $username ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" spellcheck="true" value="<?= $user_email ?>">
                </div>

                <input type="submit" value="Save">
        </div>
    </section>

    <section class="main" id="password_security_form">
        <div class="form-section">
            <div class="main-header">
                <h1>Password And Security</h1>
                <a href="#" class="menu not-active" id="toggleSideBar">Menu</a>
            </div>
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
        const editProfile = document.querySelector('.edit_profile');
        const profileForm = document.querySelector('#profile_form');
        const passwordSecurityForm = document.querySelector('#password_security_form');
        const editPassword = document.querySelector('.edit_password');
        const changePasswordBtn = document.querySelector('.change-password-btn');
        const changePasswordForm = document.querySelector('.change-password-form');
        const toggleSideBar = document.querySelectorAll("#toggleSideBar");
        const aside = document.querySelector('aside');

        let showOrHideAside = false;

        editProfile.addEventListener('click', () => {
            setActive(editProfile);
            showForm(profileForm);
            hideForm(passwordSecurityForm);
            removeActive(editPassword);
        });

        editPassword.addEventListener('click', () => {
            setActive(editPassword);
            showForm(passwordSecurityForm);
            hideForm(profileForm);
            removeActive(editProfile);
        });

        changePasswordBtn.addEventListener('click', () => {
            showForm(changePasswordForm);
        });

        toggleSideBar.forEach(toggle => {
            toggle.addEventListener('click', (e) => {
                showOrHideAside = !showOrHideAside;
                if (showOrHideAside) {
                    aside.style.width = '70%'
                    aside.style.display = "flex"
                    e.target.textContent = "Hide";
                } else {
                    hideElement(aside);
                    e.target.textContent = "Menu";
                }
            });
        });

        function setActive(element) {
            element.classList.add('active');
        }

        function removeActive(element) {
            element.classList.remove('active');
        }

        function showForm(form) {
            form.style.display = 'block';
        }

        function hideForm(form) {
            form.style.display = 'none';
        }

        function showElement(element) {
            element.style.display = 'block';
        }

        function hideElement(element) {
            element.style.display = 'none';
        }
    </script>

</body>

</html>