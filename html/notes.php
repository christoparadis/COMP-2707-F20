<?php

    session_start();
    include 'functions.php';
    $query = new queries;
    
    $students =$query->searchDatabseStudent();
    $notes = $query-> searchDatabseNotes();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Source+Sans+Pro&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/f3517f0eb4.js" crossorigin="anonymous"></script>
    <title>Notes</title>
    <style>
         :root {
            --bg-color: #EA4335;
        }
    </style>
</head>

<body>
    <?php include "nav.php";?>
    <main class="note">
        <?php 
            for ($i=0; $i<count($notes); $i++ ){
                echo '<div class="post">';
                echo '<div class="tag">'.$notes[$i]['sNoteTitle'].'</div>';
                echo '<p>'.$notes[$i]['sNoteText'].'</p><h6 class="date">'.$notes[$i]['sNoteDate'].'</h6></div>';
            }
        ?>
    </main>
</body>

</html>
