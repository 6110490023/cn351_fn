
<?php
session_start();
include('server.php');

if (!isset($_SESSION['username'])) {
    header('location: login.php');
}
if (!isset($_SESSION['confirm'])){
     header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
     <?php
      echo $_SESSION['confirm'];
      echo $_SESSION['total'];
      echo $_SESSION['count'];
      echo $_SESSION['product'];

     ?>
</body>
</html>