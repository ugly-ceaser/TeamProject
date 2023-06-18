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

if (isset($_GET['logout'])) {
    logout();
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
    <link rel="stylesheet" href="./assets/css/dashboard.css">

    <style>
  

        .hd {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .hd h1 {
            margin: 0;
            font-weight: 800;
        }

        #sideBarToggler {
            position: relative;
            top: 0;
        }
    </style>
</head>

<body>
    <!-- Side Bar -->
    <div class="holder">

    <aside class="sideBar">
        <div class="brand-logo">
            <a href="./dashboard">
                <img src="./assets/img/logo.png" alt="">
            </a>
        </div>
        <a href="./dashboard"><i class="fa fa-house"></i></a>

        <ul class="red-menu">
            <li><a href="profile"><i class="fa fa-user"></i></a></li>
            <li><a href="#"><i class="fa fa-chart-line"></i></a></li>
        </ul>

        <a href="?logout=yes"><i class="fa fa-sign-out-alt" style="color: white;"></i></a>
    </aside>

    <div class="mainContainer">
        <div class="hd caption">
            <h1>Trade History</h1>
            <span class="bi bi-justify" id="sideBarToggler"></span>
        </div>

        <div class="mainTables">

        <div class="Withdraw">
            <h3>Withdrawals </h3>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                        $id = $_SESSION['id'];
                      $sql = "SELECT * FROM `transactions` WHERE `user_id` = $id AND `trx_type` = 'withdraw' ORDER BY `id` DESC ";
                      $result = $conn->query($sql);
                        foreach($result  as $key) {
                            extract($key);
                        ?>
                    <tr>
                        <td><?= substr($date,0,10) ?></td>
                        <td>$<?=$amount?></td>
                        <td><?=$status?></td>
                    </tr>
                    <?php }?>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>

                      

        <div class="deposit">
            <h3>Deposits </h3>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                        $id = $_SESSION['id'];
                      $sql = "SELECT * FROM `transactions` WHERE `user_id` = $id AND `trx_type` = 'deposit' ORDER BY `id` DESC ";
                      $result = $conn->query($sql);
                        foreach($result  as $key) {
                            extract($key);
                        ?>
                    <tr>
                        <td><?= substr($date,0,10) ?></td>
                        <td>$<?=$amount?></td>
                        <td><?=$status?></td>
                    </tr>
                    <?php }?>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>

        </div>

       
    </div>
        
    </div>
   
    <!-- Assets -->
    <script src="./assets/vendor/aos/aos.js"></script>
    <script src="./assets/vendor/Font-awesome/js/all.min.js"></script>

    <script>
        const sideBarToggle = document.querySelector("#sideBarToggler");
        const sideBar = document.querySelector(".sideBar");
        let shwOrNot = false;

        sideBarToggle.addEventListener('click', (e) => {
            shwOrNot = !shwOrNot;
            if (shwOrNot) {
                sideBar.style.display = 'flex';
            } else {
                sideBar.style.display = 'none';
                e.target.style.marginLeft = "1.5rem";
            }
        })
    </script>
</body>

</html>