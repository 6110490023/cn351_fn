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
                $total = $row['cost']*$count;
                if($row['count'] >= $count and  $total <= $_SESSION['money']){
                    $_SESSION['confirm']= "confirm";
                    $_SESSION['total'] = $total;
                    $_SESSION['product'] = $product;
                    $_SESSION['count'] = $count;
                    header("location: confirm.php");
                }
                else{
                    $_SESSION['error'] = " count or tatal invalid";
                    header("location: index.php");
                }
                
            } else {
                
                header("location: index.php");
            }
        } else {
            header("location: index.php");
        }
