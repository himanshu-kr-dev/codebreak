<?php
session_start();

$conf = 0;
if (isset($_SESSION['sign']) && isset($_SESSION['uid']) && ($_SESSION['sign'] == 1 || $_SESSION['sign'] == "1")) {
    $conf = 1;
}
$idver = 0;
$conn = mysqli_connect("localhost", "root", "", "codebreak");
$sql = "SELECT * FROM problems";
$query = mysqli_query($conn, $sql);
$id;
$problem_data;
if ($_GET['id'] && !is_nan($_GET['id'])) {

    $id = $_GET['id'];
    $idcheck = "select * from problems where id = $id";
    $idcheck_query = mysqli_query($conn, $idcheck);
    if (mysqli_num_rows($idcheck_query) == 1) {
        $idver = 1;
        $problem_data = mysqli_fetch_assoc($idcheck_query);
    }
}

if ($idver == 0) {
    header("HTTP/1.0 404 Not Found");
    die("The Problem could not be found");
}

$probname = $problem_data['name'];
$probstat = $problem_data['statement'];
$probtest = $problem_data['sample_testcase'];
$probtask = $problem_data['task'];

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
            width: 600px;
            height: 50px;
            border: 1px solid black;
            border-radius: 10px;
            padding: 10px;
        }

        .alert {
            width: 800px;
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

        .heading {
            font-family: 'Fira Code', monospace;
            font-size: 20px;
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
                        <a class="nav-link" href="#">Forum</a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
    <br>
    <center>
        <span class="heading"> <?php echo $probname; ?></span>
    </center>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Encryption
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <?php echo $probstat; ?>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Sample Encrypted data
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <?php echo $probtest; ?>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    User Task
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <?php echo $probtask; ?>
                    <br><br>
                    <?php if ($conf == 1) { ?>
                        <form>
                            <textarea class="answer" name="solution" type="text" required></textarea><br>
                            <button type="submit">Submit</button>
                        </form>

                    <?php  } else { ?>
                        Login to Submit your solution
                    <?php  } ?>



                </div>
            </div>
        </div>
    </div>
    <br><br>
    <center>


    </center>
    <br>

</body>

</html>