<?php
session_start();
ob_start();
    include_once"script/user.script.php";
    if (!isset($_SESSION['id'])) {
        header("Location: auth");
    }else {
       foreach(fetchWhere('user','id',$_SESSION['id']) as $row)
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
    <link rel="stylesheet" href="./assets/css/dashboard.css">
</head>

<body>
    <!-- Side Bar -->
    <aside class="sideBar">
        <div class="brand-logo">
            <img src="./assets/img/logo.png" alt="">
        </div>
        <a href="#"><i class="fa fa-house"></i></a>

        <ul class="red-menu">
            <li><a href="#"><i class="fa fa-search"></i></a></li>
            <li><a href="#"><i class="fa fa-plug"></i></a></li>
            <li><a href="#"><i class="fa fa-layer-group"></i></a></li>
            <li><a href="#"><i class="fa fa-tv"></i></a></li>
        </ul>

        <ul class="blue-menu">
            <li><a href="#"><i class="fa fa-bolt"></i></a></li>
            <li><a href="#"><i class="fa fa-arrows-spin"></i></a></li>
            <li><a href="#"><i class="fa fa-arrow-down"></i></a></li>
        </ul>

        <a href=""><i class="fa fa-chart-line"></i></a>
        <a href=""><i class="fa fa-shield"></i></a>
    </aside>

    <!-- Main Section -->
    <main>
        <div class="left">
            <div class="box-content">
                <p class="text">PancakeSwap Pair</p>
                <p><i class="fa fa-chevron-down"></i></p>
            </div>

            <div class="chilli">
                <div class="chilli-powder">
                    <img src="./assets/img/705d515eda7b99e7e02956938661be23.jpg" alt="">
                    <div class="chilli-sauce">
                        <span class="bbc">BSC/<span class="cake">Cake</span></span>
                        <span class="txt">Lorem ipsum dolor sit amet consectetur.</span>
                    </div>
                    <i class="fa fa-plus"></i>
                </div>

                <div class="chilli-meat">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
            </div>

            <div class="curry">
                <h2>903,37520<span><small>$</small></span></h2>
                <div class="curry-spice">
                    <p>0.34000</p>
                </div>
            </div>

            <div class="scrolly">
                <div class="scrolly-item">
                    <i class="fa fa-wallet"></i>
                    <div class="scrolly-item-text">
                        <p>Avaliable Balance</p>
                        <h5>$200,000.89</h5>
                    </div>
                </div>
                <div class="scrolly-item">
                    <i class="fa fa-piggy-bank"></i>
                    <div class="scrolly-item-text">
                        <p>Total Balance</p>
                        <h5>3,002</h5>
                    </div>
                </div>
                <div class="scrolly-item">
                    <i class="fa fa-chart-line"></i>
                    <div class="scrolly-item-text">
                        <p>Total Withdrawal</p>
                        <h5>4,2020</h5>
                    </div>
                </div>
                <div class="scrolly-item">
                    <i class="fa fa-dollar-sign"></i>
                    <div class="scrolly-item-text">
                        <p>Pending Deposits</p>
                        <h5>2,100</h5>
                    </div>
                </div>
            </div>

            <div class="chart-section">
                <div class="upper">
                    <div class="follow-come">
                        <h3>Total Score</h3>
                        <h2>95</h2>
                    </div>

                    <div class="if-no-be-you">
                            <img src="./assets/img/pie.png" alt="" width="200">
                    </div>
                </div>

                <div class="lower">
                    <div class="marijuana">
                        <p>Community stats</p>
                        <p class="icon"><i class="bi bi-heart-fill"></i> 95%</p>
                        <p>24 Youths</p>
                    </div>
                    <div class="line">
                        <div class="inner-line"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="right">
            <div class="box-content-list">
                <div class="search-box">
                    <form>
                        <i class="fa fa-search"></i>
                        <input type="search" placeholder="search" class="search-input">
                    </form>
                </div>

                <div class="profile">
                    <i class="fa fa-chevron-down"></i>
                    <img src="./assets/img/d256e8494750efbcab3f4cde67fc1dc1.webp" alt="">
                    <ul class="drop-down">
                        <li><a href="#"><?=$username?></a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i><?=$user_email?></a></li>
                        <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                        <li><a href="#"><i class="fa fa-door-open"></i> Logout</a></li>
                    </ul>
                </div>
            </div>

            <div class="paprica">

            </div>

            <div class="trade-history">
                <div class="trade-history-header">
                    <h2>Trade History</h2>
                    <div class="trade-filter">
                        <i class="fa fa-filter"></i>
                        <h5>BSC</h5>
                    </div>
                </div>

                <div class="trade-history-body">
                    <table>
                        <tr>
                            <td>28.80%</td>
                            <td>000000</td>
                            <td>0.00120</td>
                            <td>21</td>
                            <td>20th</td>
                            <td>020190</td>
                        </tr>
                        <tr>
                            <td>28.80%</td>
                            <td>000000</td>
                            <td>0.00120</td>
                            <td>21</td>
                            <td>20th</td>
                            <td>020190</td>
                        </tr>
                        <tr>
                            <td>28.80%</td>
                            <td>000000</td>
                            <td>0.00120</td>
                            <td>21</td>
                            <td>20th</td>
                            <td>020190</td>
                        </tr>
                        <tr>
                            <td>28.80%</td>
                            <td>000000</td>
                            <td>0.00120</td>
                            <td>21</td>
                            <td>20th</td>
                            <td>020190</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </main>



    <!-- Assets -->
    <script src="./assets/vendor/aos/aos.js"></script>
    <script src="./assets/vendor/Font-awesome/js/all.min.js"></script>
    <!-- Base Sripts File -->
    <script>
        // Dashboard Profile Dropdown
        const profile = document.querySelector(".profile");
        const dropdown_btn = document.querySelector(".fa-chevron-down");
        const dropdown_menu = document.querySelector(".drop-down");
        let tf = false;

        profile.addEventListener('click', (e) => {
            tf = !tf;
            if (tf) {
                dropdown_btn.classList.add('rotate_90');
                dropdown_menu.classList.add('show');
            }
            else {
                e.target.classList.remove('rotate');
                dropdown_menu.classList.remove('show');
            }
        })
    </script>
</body>

</html>