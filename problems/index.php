<?php
$conn = mysqli_connect("localhost","root","","codebreak");
$sql = "SELECT * FROM problems";
$query = mysqli_query($conn,$sql);
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
    <title>Break Code</title>
    <style>
        .navbar-brand{
            font-family: 'Press Start 2P', cursive;
        }
        .nav-link{
            font-family: 'Press Start 2P', cursive;
        }
        .accordion{
            margin:50px;
        }
        .answer{
            width: 300px;
            height: 50px;
            border: 1px solid black;
            border-radius: 10px;
            padding: 10px;
        }
        .table{
            margin: 0 auto;
            width: 400px;
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
                    <a class="nav-link" aria-current="page" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Problems</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Forum</a>
                </li>
            </ul>
        </div>
    </div>

</nav>
<br><br><br><br>
<table class="table table-hover">
    <thead>
    <td>Problem ID</td><td>Problem Name</td><td>Problem Link</td>
    </thead>
    <tbody>
<?php
$c = mysqli_num_rows($query);
while ($c>0){
    $sq = "SELECT * FROM problems WHERE id=$c";
    $query = mysqli_query($conn,$sq);
    $row = mysqli_fetch_assoc($query);
    ?>
    <tr><td><?php echo $row["id"];?></td><td><?php echo $row["name"];?></td><td><a href="#">View</a> </td></tr>
<?php
    $c--;
}
?>




    </tbody>

</table>
</body>
</html>