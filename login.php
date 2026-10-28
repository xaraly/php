<?php
session_start();
include 'register.php';
if(isset($_POST["btn"])) {
    if(!empty($_POST["username"]) && !empty($_POST["email"])){
        $username = htmlspecialchars($_POST["username"]);
        $email = htmlspecialchars($_POST["email"]);

        $requette = $pdo->prepare("SELECT * FROM user WHERE username = ? and email = ?");
        $requette->execute(array($username, $email));

        if($requette->rowcount() > 0) {
            $user = $requette->fetch(PDO::FETCH_ASSOC);
            $_SESSION["login"] = $user;
            header("location: profile.php");
        } else {
            echo "pas bon";
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
        <p>email</p>
        <input type="text" placeholder="email" name="email">
        <button name="btn">creé</button>
    </form>
</body>
</html>