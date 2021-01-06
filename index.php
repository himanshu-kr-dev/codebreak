<?php

session_start();
$conf = 0;
if (isset($_SESSION['sign']) && isset($_SESSION['uid']) && ($_SESSION['sign'] == 1 || $_SESSION['sign'] == "1")) {
    $conf = 1;
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@300&display=swap" rel="stylesheet">
    <title>Break Code</title>
    <style>
        .navbar-brand {
            font-family: 'Press Start 2P', cursive;
        }

        .nav-link {
            font-family: 'Press Start 2P', cursive;
        }

        .accordion {
            margin: 50px;
        }

        .answer {
            width: 300px;
            height: 50px;
            border: 1px solid black;
            border-radius: 10px;
            padding: 10px;
        }



        .body-text {
            font-family: 'Fira Code', monospace;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            color: #414141;
            font-family: 'Fira Code', monospace;
            text-align: center;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Code Break</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="problems/">Problems</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user/"><?php if($conf==1){echo $_SESSION['uid'];}?></a>
                </li>
                <?php
                if($conf==1){
                ?>
                <li class="nav-item">
                    <a class="body-text" style="font-size: 15px;text-decoration: none;color: #414141;" href="logout/">Logout</a>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>

</nav>
<br>
<div class="container">
    <center>
        <?php if ($conf == 0) { ?>
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Welcome Code Breaker!</strong> Please Login or Signup to solve problems and keep track of them.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <br><br>
        <div class="body-text">
            <p style="font-family: 'Press Start 2P', cursive;font-size:35px;">Break the walls</p><br>
            Are you the greatest code breaker? Can you break the encryption behind? Show us what you got.<br>
            Here you will be given various levels of encryption in which you will be given a raw data and <br>
            it's encrypted form, all you have to do is break the encryption and write a decryption algorithm<br>
            so that you can get back from the encrypted data to the actual data. So show the world your code <br>breaking skills.
        </div>
        <br><br><br><br>
        <?php if ($conf == 1) { ?>
            <a href="problems/"><button type="button" class="btn btn-primary">View Problems</button></a>
        <?php } else { ?>
            <a href="signup/"><button type="button" class="btn btn-success">Signup</button></a>
            <a href="login/"><button type="button" class="btn btn-primary">Login</button></a>
        <?php } ?>
    </center>

</div>
<!--<div class="footer">-->
<!--    <p>Copyright 2021 Daero | Privacy Policy</p>-->
<!--</div>-->
</body>

</html>