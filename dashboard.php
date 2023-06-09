<?php
session_start();
ob_start();
include_once "./script/db.script.php";
include_once "script/user.script.php";
if (!isset($_SESSION['id'])) {
    header("Location: auth");
} else {
    foreach (fetchWhere('user', 'id', $_SESSION['id']) as $row)
        extract($row);

}

$trx_id = random_gen(10,'Trx');
$sql = "SELECT * FROM `transactions` WHERE trx_id = '$trx_id'";
$result = $conn->query($sql);

if(mysqli_num_rows($result) > 0){
    $trx_id = random_gen(10,'Trx');
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
</head>

<body>
<div class="holder">
    <!-- Side Bar -->
    <aside class="sideBar">
        <div class="brand-logo">
            <img src="./assets/img/logo.png" alt="">
        </div>
        <a href="" title="dashboard"><i class="fa fa-house"></i></a>

        <ul class="red-menu">
            <li title="profile"><a href="profile"><i class="fa fa-user"></i></a></li>
            <li><a href="trade-history"><i class="fa fa-chart-line"></i></a></li>
        </ul>

        <a href="?logout=yes"><i class="fa fa-sign-out-alt" style="color: white; margin-top: 20px;"></i></a>
    </aside>
    <main class="main">
        <div class="left">
            <div class="box-content-list">
                <div class="search-box">
                   <h3><?=$username?></h2>
                </div>

                <div class="profile">
                    <div class="profile-header">
                        <span class="fa fa-chevron-down chg"></span>
                        <img src="./img/<?=$user_image ? $user_image : "sample.png"?>" alt="update profile">
                    </div>
                    <ul class="drop-down">
                        <li><a href="#">
                                <?= $username ?>
                            </a></li>
                        <li><i class="fa fa-envelope"></i>
                            <?= $user_email ?>
                        </li>
                        <li><a href="./profile"><i class="fa fa-user"></i> Profile</a></li>
                        <?php
                        if (isset($_GET['logout'])) {
                            logout();
                        }
                        ?>
                    </ul>
                </div>
                <span class="bi bi-justify" id="sideBarToggler"></span>
            </div>

            <div class="scrolly">
                <div class="scrolly-item">
                    <i class="fa fa-wallet"></i>
                    <div class="scrolly-item-text">
                        <p>Avaliable Balance</p>
                        <!--completed deposits minus completed withdrawals  -->
                        <h5>$<?=$balance?></h5>
                    </div>
                </div>
                <div class="scrolly-item">
                    <i class="fa fa-piggy-bank"></i>
                    <div class="scrolly-item-text">
                        <p>Total Balance</p>
                        <!-- All deposit minus completed withdrawal -->
                        <h5>$<?=totalTrx($_SESSION['id'],'deposit') - totalTrx($_SESSION['id'],'withdrawal','completed')?></h5>
                    </div>
                </div>
                <div class="scrolly-item">
                    <i class="fa fa-arrow-down"></i>
                    <div class="scrolly-item-text">
                        <p>Total Withdrawal</p>
                        <h5>$<?=totalTrx($_SESSION['id'],'withdraw')?></h5>
                    </div>
                </div>
                <div class="scrolly-item">
                    <i class="fa fa-dollar-sign"></i>
                    <div class="scrolly-item-text">
                        <p>Profit</p>
                        <h5>$<?=$profit?></h5>
                    </div>
                </div>
            </div>

            <div class="profile-details">
                <div class="profile-image">
                <img src="./img/<?=$user_image ? $user_image : "sample.png"?>" alt="update profile">
                </div>
                <div class="profile-info">
                    <h6>Full name: <?=$firstname . " " . $lastname?></h6>
                    <h6>Username: <?=$username?></h6>
                    <h6>Email: <?=$user_email?></h6>     
                </div>
            </div>
        </div>

        <div class="right">
            <div class="paprica">
                <button id="depositButton" style="color:white" style="color:white">Deposit</button>
                <button id="withdrawButton" style="color:white" style="color:white">Withdrawal</button>
                <div class="form-section" id="depositSection">
                    <form class="form" style="margin-top: 2rem;" method="post" action="">
                        <h4 style="color:white" style="color:white">Deposit</h4>
                        <!-- Deposit Form HTML -->
                        <div class="form-group" style="margin-bottom: 20px">
                            <label for="amount">Amount</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-dollar-sign"></i>
                                    </span>
                                </div>
                                <input type="number" class="form-control" id="amount" name="damount" placeholder="Enter the amount to deposit" required min="1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="amount">Transaction ID</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        ID
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="trx_id" name="trx_id" value="<?=$trx_id?>" readonly>
                            </div>
                        </div>
                        <input type="submit" class="dep" value="Deposit" name="trx">
                    </form>
                </div>

                <div class="form-section" id="withdrawalSection">
                <form class="form" style="margin-top: 2rem;" method="post" action="">
                        <h4 style="color:white">Withdraw</h4>
                        <!-- withdraw Form HTML -->
                        <div class="form-group" style="margin-bottom: 20px">
                            <label for="amount">Amount</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-dollar-sign"></i>
                                    </span>
                                </div>
                                <input type="number" class="form-control" id="amount" name="wamount" placeholder="Enter the amount to withdraw" required min="1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="amount">Transaction ID</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        ID
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="trx_id" name="trx_id" value="<?=$trx_id?>" readonly>
                            </div>
                        </div>
                        <input type="submit" class="dep" value="Withdraw" name="trx">
                    </form>
                </div>
            </div>

            <?php
                if(isset($_POST['trx'])){
                    if($_POST['trx'] == "Deposit"){
                       $amount = $_POST['damount'];
                       $trx_id = $_POST['trx_id'];
                        deposit($trx_id,$amount,$_SESSION['id']);
                   }elseif ($_POST['trx'] == "Withdraw") {
                        $amount = $_POST['wamount'];
                        $trx_id = $_POST['trx_id'];
                        withdraw($trx_id,$amount,$_SESSION['id'],$balance);
                   }
                }
            ?>

            <div class="trade-history">
                <div class="trade-history-header">
                    <h2 style="color:white">Latest Transaction</h2>
                </div>

                <div class="trade-history-body">
                    <table>
                        <thead>
                            <tr>
                                <th>Transaction Type</th>
                                <th>Transaction Id</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                      <tbody>
                      <?php 
                        $id = $_SESSION['id'];
                      $sql = "SELECT * FROM `transactions` WHERE `user_id` = $id ORDER BY `id` DESC LIMIT 5 ";
                      $result = $conn->query($sql);
                        foreach($result  as $key) {
                            extract($key);
                        ?>
                        <tr>
                            <td><?=$trx_type?></td>
                            <td><?=$trx_id?></td>
                            <td>$ <?=$amount?></td>
                            <td><?=$status?></td>
                            <td><?= substr($date,0,10) ?></td>
                        </tr>            
                        <?php }?>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

    <!-- Assets -->
    <script src="./assets/vendor/aos/aos.js"></script>
    <script src="./assets/vendor/Font-awesome/js/all.min.js"></script>
    <!-- Base Sripts File -->
    <script>
        // Dashboard Profile Dropdown
        const profile = document.querySelector(".profile-header");
        const dropdown_btn = document.querySelector(".chg");
        const dropdown_menu = document.querySelector(".drop-down");
        let tf = false;

        profile.addEventListener('click', (e) => {
            tf = !tf;
            if (tf) {
                dropdown_menu.classList.add('show');
            } else {
                dropdown_menu.classList.remove('show');
            }
        })

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


        // Deposit and withdrawal
        const depositSection = document.querySelector("#depositSection");
        const withdrawSection = document.querySelector("#withdrawalSection");
        const depositButton = document.querySelector("#depositButton");
        const withdrawButton = document.querySelector("#withdrawButton");

        depositButton.addEventListener('click', () => {
            depositSection.style.display = "block";
            withdrawSection.style.display = "none";
            depositButton.style.backgroundColor = "#6d6dff";
            depositButton.style.color = "#fff";
            withdrawButton.style.color = "#fff";
            withdrawButton.style.backgroundColor = "transparent";
        });

        withdrawButton.addEventListener('click', () => {
            withdrawSection.style.display = "block";
            depositSection.style.display = "none";
            withdrawButton.style.backgroundColor = "#6d6dff";
            depositButton.style.color = "#fff";
            withdrawButton.style.color = "#fff";
            depositButton.style.backgroundColor = "transparent";
        });

        // Show the deposit section by default
        depositButton.click();

    </script>
</body>

</html>