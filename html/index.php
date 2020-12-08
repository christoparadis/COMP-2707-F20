<?php
    session_start();

     if (isset($_REQUEST['signin'])){
        
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        $_SESSION["guardianId"] = NULL;

        if(empty($username)){
            $error1="Username Missing </br>";
        }
        if(empty($password)){
            $error2="Password Missing";
        }
        $errorResult = $error1.$error2;
        header("Location: http://paradisc.myweb.cs.uwindsor.ca/COMP-2707-F20/project/html/search.php");
        exit();
    }
    if (isset($_REQUEST['parent'])){
        
        $_SESSION["guardianId"] = $_POST['username'];
        $_SESSION["username"] = 'paradisc_parent';
        $_SESSION["password"] = '12345';
        
        $username = $_SESSION["username"];
        $password = $_SESSION["password"];
    
        $conn = new mysqli("localhost",$username,$password,"paradisc_db");
        $sql="SELECT sStudentId FROM project_students_guardians WHERE sGuardianId='".$_SESSION["guardianId"]."'";
        $result = mysqli_query($conn, $sql);
        $student=mysqli_fetch_all($result, MYSQLI_BOTH);
        $_SESSION['studentIdentification'] = $student[0][0];
        
        header("Location: http://paradisc.myweb.cs.uwindsor.ca/COMP-2707-F20/project/html/home.php");
        exit();
    
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
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="textbox">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" name="username"/>
            </div>
            <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="password"/>
            </div>
            <input type="submit" name="signin" class="btn" value="Sign in" />
            <input type="submit" name="parent" class="btn" value="Parent" />
        </form>
    </div>
</body>

</html>
