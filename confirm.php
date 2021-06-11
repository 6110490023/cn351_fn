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
          <div class="homeheader">
               <p> Infomation of your cart </p>
          </div>
          <div class="homecontent">
               <form action="success.php" method="GET">
               <p> Product name : <?php $product = $_GET['product']; echo $product; ?></p>
               <p> Count : <?php $count = $_GET['count']; echo $count; ?></p>
               <p> Total cost : <?php $total = $_GET['total']; echo $total; ?> $</p>

               <input type="hidden" name = "product" value='<?php echo "$product"; ?>'>
               <input type="hidden" name = "count" value='<?php echo " $count"; ?>'>
               <input type="hidden" name = "total" value='<?php echo " $total"; ?>'>
               <input type="submit" value="confirm">
               </form>
          </div>
</body>

</html>