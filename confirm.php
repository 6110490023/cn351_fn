<?php
session_start();
include('server.php');

if (!isset($_SESSION['username'])) {
     header('location: login.php');
}
if (!isset($_SESSION['confirm'])) {
     header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="style.css">
     <title>Document</title>
</head>

<body>
     <form action="success.php" method="POST">
          <div class="homeheader">
               <p> Infomation of your cart </p>
          </div>
          <div class="homecontent">
               <p> Product name : <?php $product = $_GET['product']; echo $product; ?></p>
               <p> Count : <?php $count = $_GET['count']; echo $count; ?></p>
               <p> Total cost : <?php $cost = $_GET['total']; echo $cost; ?> $</p>
               
               <input type="submit" value="confirm">
          </div>
     </form>
</body>

</html>