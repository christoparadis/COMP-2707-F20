<?php
    session_start();

    if(isset($_POST['but_submit'])){
      $id = $_POST['id'];
      
      $_SESSION['studentIdentification'] = $id;
      header("Location: http://paradisc.myweb.cs.uwindsor.ca/COMP-2707-F20/project/html/home.php");
      exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<title>Search</title>
    	<link rel="stylesheet" href="../css/search.css">
    	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Source+Sans+Pro&display=swap" rel="stylesheet" />
    </head>
    <body>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <div class="wrapper">
          <div class="search_box">
                <input type="text" name="id" placeholder="Enter Student ID">
                <i class="fas fa-search"></i>
          </div>
        </div>
        <input type="submit" name="but_submit" class="btn" style="position: absolute; left: -9999px; width: 1px; height: 1px;" tabindex="-1" />
        </form>
    </body>
</html>
