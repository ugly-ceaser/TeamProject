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
        .tables {
            margin-left: 100px;
            padding: 1rem;
        }

        .witdrawal_table,
        .deposit_table {
            margin: 2rem 0;
        }

        .witdrawal_table {
            margin-bottom: 2.5rem;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            overflow-x: scroll;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

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
    <aside class="sideBar">
        <div class="brand-logo">
            <a href="./dashboard.php">
                <img src="./assets/img/logo.png" alt="">
            </a>
        </div>
        <a href="./dashboard.php"><i class="fa fa-house"></i></a>

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

    <div class="tables">
        <div class="hd">
            <h1>Trade History</h1>
            <span class="bi bi-justify" id="sideBarToggler"></span>
        </div>

        <div class="witdrawal_table">
            <h3>Withdrawals and Pending Withdrawals</h3>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2023-05-27</td>
                        <td>$100.00</td>
                        <td>Completed</td>
                    </tr>
                    <tr>
                        <td>2023-05-25</td>
                        <td>$50.00</td>
                        <td>Pending</td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>

        <div class="deposit_table">
            <h3>Deposits and Pending Deposits</h3>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2023-05-26</td>
                        <td>$200.00</td>
                        <td>Completed</td>
                    </tr>
                    <tr>
                        <td>2023-05-24</td>
                        <td>$75.00</td>
                        <td>Pending</td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
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