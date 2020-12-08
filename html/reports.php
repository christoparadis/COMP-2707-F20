<?php

    session_start();
    include 'functions.php';
    $query = new queries;
   
    $students =$query->searchDatabseStudent();
    $reports = $query -> searchDatabseReports();
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Source+Sans+Pro&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/f3517f0eb4.js" crossorigin="anonymous"></script>
    <title>Report</title>
    <style>
         :root {
            --bg-color: #FBBC05;
        }
    </style>
</head>

<body>
    <?php include "nav.php";?>
    <main class="report">
        <?php for ($i=0; $i<count($reports); $i++ ){
        echo ' 
        <div class="post report-post">
            <div class="tag report-bg-fl">Report</div>
            <div class="report-content dash-spacing">
                <div class="report-titles" id="reports">
                    <span class="main-report-title">
                        Location
                    </span>
                    <span class="main-report-title">
                        Context
                    </span>
                    <span class="main-report-title">
                        Phys. Manifestation
                    </span>
                    <span class="main-report-title">
                        Transition
                    </span>
                    <span class="main-report-title">
                        Cause
                    </span>
                    <span class="main-report-title">
                        Consequence
                    </span>
                </div>
                <div class="report-inputs" id="reports">
                    <span class="main-report">
                        '.$reports[$i]['sReportLocation'].'
                    </span>
                    <span class="main-report">
                        '.$reports[$i]['sReportContext'].'
                    </span>
                    <span class="main-report">
                    	'.$reports[$i]['sReportManifestation'].'
                    </span>
                    <span class="main-report">
                    	'.$reports[$i]['sReportTransition'].'
                    </span>
                    <span class="main-report">
                        '.$reports[$i]['sReportCause'].'
                    </span>
                    <span class="main-report">
                        '.$reports[$i]['sReportConsequence'].'
                    </span>
                </div>
                <h6 class="date">
                    '.$reports[$i]['sReportDate'].'
                </h6>
            </div>
        </div>
        ';}
        ?>
    </main>
</body>

</html>
