<?php
    session_start();
    include 'functions.php';
    $query = new queries;
    
    
    $students = $query->searchDatabseStudent(); 
    $notes = $query-> searchDatabseNotes(); 
    $reports = $query -> searchDatabseReports(); 
    $guardian = $query -> searchDatabseGuardians();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../css/style.css" />
        <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Source+Sans+Pro&display=swap" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/f3517f0eb4.js" crossorigin="anonymous"></script>
        <title>Admin Entry</title>
        <style>
             :root {
                --bg-color: #4285f4;
            }
        </style>
    </head>

<body>
    <?php include "nav.php";?>
    <div id="entry">
           <div class="entry">
                <div class="post">
                    <div class="tag">Counselor</div>
                    <div class="dash-spacing">
                        <?php
                            if(isset($_POST["submit-counselor"])){
                                $rCounselorId = htmlspecialchars($_POST["CounselorId"]);
                                $rCounselorName = htmlspecialchars($_POST["CounselorName"]);
                                $rCounselorEmail = htmlspecialchars($_POST["CounselorEmail"]);
                                $rCounselorPhone = htmlspecialchars($_POST["CounselorPhone"]);
                                $query->insertDatabaseCounselor($rCounselorId, $rCounselorName, $rCounselorEmail, $rCounselorPhone);
                            }
                        ?>
                        <form method="POST" action="<?php $_PHP_SELF ?>" class="entry-form">
                            <div class="entry-select">
                                <label for="CounselorId">ID</label>
                                <input type="text" name="CounselorId" class="entry-notes" id="CounselorId" maxlength="9">
                            </div>
                            <hr class="rule">
                            <div class="entry-select">
                                <label for="CounselorName">Name</label>
                                <input type="text" name="CounselorName" class="entry-notes" id="CounselorName" maxlength="25">
                            </div>
                            <hr class="rule">
                            <div class="entry-select">
                                <label for="CounselorEmail">Email</label>
                                <input type="text" name="CounselorEmail" class="entry-notes" id="CounselorEmail"maxlength="35">
                            </div>
                            <hr class="rule">
                            <div class="entry-select">
                                <label for="CounselorPhone">Phone</label>
                                <input type="text" name="CounselorPhone" class="entry-notes" id="CounselorPhone" 
                                maxlength="11">
                            </div>
                            <input type="submit" name="submit-counselor" class="entry-submit">
                        </form>
                    </div>
                </div>
            </div>
           <div class="entry">
                <div class="post">
                    <div class="tag">Student</div>
                    <div class="dash-spacing">
                        <?php
                            if(isset($_POST['submit-student'])){
                                $nStudentId = htmlspecialchars($_POST["StudentId"]);
                                $nStudentName = htmlspecialchars($_POST["StudentName"]);
                                $nStudentSexe = htmlspecialchars($_POST["StudentSexe"]);
                                $nStudentSchool = htmlspecialchars($_POST["StudentSchool"]);
                                $nStudentBirthday = htmlspecialchars($_POST["StudentBirthday"]);
                                $nStudentYear = htmlspecialchars($_POST["StudentYear"]);
                                $query->insertDatabaseStudent($nStudentId,$nStudentName,$nStudentSexe,$nStudentSchool,$nStudentBirthday,$nStudentYear);
                            }
                        ?>
                        <form method="POST" action="<?php $_PHP_SELF ?>" class="entry-form">
                            <div class="entry-select">
                                <label for="StudentId">ID</label>
                                <input type="text" name="StudentId" class="entry-notes" id="StudentId" maxlength="9">
                            </div>
                            <hr class="rule">
                            <div class="entry-select">
                                <label for="StudentName">Name</label>
                                <input type="text" name="StudentName" class="entry-notes" id="StudentName"
                                maxlength="30">
                            </div>
                            <hr class="rule">
                            <div class="entry-select">
                                <label for="StudentSexe">Sexe</label>
                                <input type="text" name="StudentSexe" class="entry-notes" id="StudentSexe"
                                maxlength="1">
                            </div>
                            <hr class="rule">
                            <div class="entry-select">
                                <label for="StudentSchool">School</label>
                                <input type="text" name="StudentSchool" class="entry-notes" id="StudentSchool"
                                maxlength="25">
                            </div>
                            <hr class="rule">
                            <div class="entry-select">
                                <label for="StudentBirthday">Birthday(yyyy-mm-dd)</label>
                                <input type="date" name="StudentBirthday" class="entry-notes" id="StudentBirthday">
                            </div>
                            <hr class="rule">
                            <div class="entry-select">
                                <label for="StudentYear">Year</label>
                                <input type="text" name="StudentYear" class="entry-notes" id="StudentYear"
                                maxlength="11">
                            </div>
                            <input type="submit" name="submit-student" class="entry-submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</body>

</html>
