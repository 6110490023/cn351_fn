<?php
session_start();
include('server.php');
$errors = array();

$count =  $_POST['count'];
$product = $_POST['product'];

if (empty($count)) {
    array_push($errors, "count is required");
}

if (empty($product)) {
    array_push($errors, "product is required");
}
if (count($errors) == 0) {
    $query = "SELECT * FROM product WHERE name = '$product'";
    $result = mysqli_query($conn, $query);
    if (!empty($result)) {
        $row = mysqli_fetch_array($result);
        if (is_numeric($count)){
            $total = $row['cost'] * (int)$count;
            if ($row['count'] >= $count and $count > 0 and  $total <= $_SESSION['money']) {
                $_SESSION['confirm'] = "confirm";
                
                header("location: confirm.php?product=$product&count=$count&total=$total");
            } else {
                $_SESSION['error'] = " count or tatal invalid";
                header("location: index.php");
            }
        }
        else{
            $_SESSION['error'] = "count is not integer";
            header("location: index.php");
        }

        
    } else {

        header("location: index.php");
    }
} else {
    header("location: index.php");
}
