<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $_POST["username"];
    $password = $_post['password'];
    if(empty($username)){
        $error1="Username Missing </br>";
    }
    if(empty($password)){
        $error2="Password Missing";
    }
    $errorResult = $error1.$error2;

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/login.css" />
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Source+Sans+Pro&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/f3517f0eb4.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <title>Login</title>
</head>

<body>
    <div class="login-box">
        <h1>Login</h1>
        <h3><?php echo $errorResult ?></h3>
        <form action="" method="POST">
            <div class="textbox">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" name="username"/>
            </div>

            <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="password"/>
            </div>

            <input type="button" class="btn" value="Sign in" />
        </form>
    </div>
</body>

</html>
