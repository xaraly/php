<?php
session_start();
if(!isset($_SESSION["login"])){
    header("location: login.php");
    exit();
}

$_SESSION["login"] = $user;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue<?php echo htmlspecialchars($user["username"]); ?> !</title>
</head>
<body>
    
</body>
</html>