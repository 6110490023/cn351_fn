<?php
session_start();
include('server.php');

if (!isset($_SESSION['username'])) {
    header('location: login.php');
}
if (!isset($_SESSION['confirm'])){
     header('location: index.php');
}
$username = $_SESSION['username'];
$product = $_GET['product'];
$countpay = $_GET['count'];
$total = $_GET['total'];
$query = "SELECT * FROM product WHERE name = '$product' ";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
$count = $row['count'];

$query = "SELECT * FROM user WHERE username = '$username'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
$money = $row['money'];

$totalmoney = $money - (int)$total;
$query = "UPDATE product SET count='$totalcount' WHERE name ='$product'";
$result = mysqli_query($conn, $query);
$query = "UPDATE user SET money='$totalmoney' WHERE username ='$username'";
$result = mysqli_query($conn, $query);
$_SESSION['money'] = $totalmoney;

echo $total ."</br>";
echo $money ."</br>";
echo $countpay ."</br>";    
echo $count."</br>";
echo $totalcount ."</br>";
echo $totalmoney."</br>";
echo "<form action = 'index.php' methon='post'>";
echo "<input type = 'submit' value= 'submit'>";
echo "</form>";


?>

