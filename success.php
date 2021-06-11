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

$totalcount = $count - (int)$countpay;
$totalmoney = $money - (int)$total;
echo $total ."</br>";
echo $money ."</br>";
echo $countpay ."</br>";    
echo $count."</br>";
echo $totalcount ."</br>";
echo $totalmoney."</br>";

?>

