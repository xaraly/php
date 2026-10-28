<?php
session_start();
$pdo = new PDO("mysql:host=localhost; dbname=register", "root", "");
if(isset($_POST["btn"])){
    if(!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["email"])){
        $username = htmlspecialchars($_POST["username"]);
        $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
        $email = htmlspecialchars($_POST["email"]);

        $requette = $pdo->prepare("SELECT * FROM user WHERE username = ? OR email = ?");
        $requette->execute(array($username, $email));

        if($requette->rowCount() > 0) {
            echo "pas bon";
        } else {
            $requette = $pdo->prepare("INSERT INTO user (username, password, email)values(?,?,?)");
            $requette->execute(array($username, $password, $email));
            header("location: login.php");
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