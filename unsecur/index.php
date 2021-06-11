<?php
session_start();
include('server.php');
if (isset($_SESSION['confirm'])){
     unset($_SESSION['confirm']);
     unset($_SESSION['total']);
}
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST LOGIC FLAWS</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="homeheader">
        <h2>Home Page</h2>
    </div>
    <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
    <div class="homecontent">

        <?php if (isset($_SESSION['username'])) : ?>
            <div class="profile">Welcome <strong><?php echo $_SESSION['username']; ?></strong></div>
            <div class="profile">Your money: <strong><?php echo $_SESSION['money']; ?></strong> $</div>
            <form action= "check.php" method="POST">
                <label for="product">Product</label>
                <select name="product" id="product">
                    <?php
                    $_SESSION['statepay'] = "You are not pay.";
                    $query = "SELECT * FROM product";

                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='" . $row["name"] . "'>" . $row["name"] . "," . $row["cost"] . " $ </option>";
                    }
                    ?>
                </select></br>

                <label for="count">count</label>
                <input type="text" name="count" size="20"></br>
                <input type="submit" value="Submit">
            </form>
            
            <p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>

        <?php endif ?>
    </div>


</body>

</html>