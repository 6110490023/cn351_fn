<?php 
    session_start();
    include('server.php');

    $errors = array();

    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if (empty($username)) {
            array_push($errors, "Username is required");
        }

        if (empty($password)) {
            array_push($errors, "Password is required");
        }
        
        if (count($errors) == 0) {
            $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {

                $row = mysqli_fetch_array($result);
                $_SESSION['username'] = $username;
                $_SESSION['money'] = $row['money'];
                $_SESSION['success'] = "You are now logged in";
                header("location: index.php");
            } else {
                
                array_push($errors, "Username & Password");
                $_SESSION['error'] = "Username or Password is Wrong";
                header("location: login.php");
            }
        } else {
            array_push($errors, "Username & Password is required");
            $_SESSION['error'] = "Username & Password is required";
            header("location: login.php");
        }
    }
