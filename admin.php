<?php
session_start();
if(!isset($_SESSION["login"])){
    header("location: login.php");
    exit();
}

$_SESSION["login"] = $user;

if(isset($_POST["btn"])){
    if(!empty($_POST["username"]) && !empty($_POST["password"])) {
        $user1 = "admin123";
        $user2 = "admin123";

        $conn1 = htmlspecialchars($_POST["username"]);
        $conn2 = htmlspecialchars($_POST["password"]);

        if($user1 == $conn1 && $user2 == $conn2) {
            $_SESSION["admin"] = $conn1;
            header("location: admin1.php");
        } else {
            echo "information pas bonne !";
        }
    } else {
        echo "pas bon";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <p>username</p>
        <input type="text" placeholder="username" name="username">
        <p>password</p>
        <input type="text" placeholder="password" name="password">
        <button name="btn">creé</button>
    </form>
</body>
</html>