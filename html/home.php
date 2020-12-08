<?php
    session_start();
    include 'functions.php';
    $query = new queries;
    
    if(isset($_SESSION["guardianId"])){
        
    }

    $students =$query->searchDatabseStudent();
    $sId= $_SESSION['studentIdentification'];
    $_SESSION['studentName']= $students[0][1];
    
    $notes = $query-> searchDatabseNotes();
    $reports = $query -> searchDatabseReports();
    $guardian = $query -> searchDatabseGuardians();
    $counselor= $query -> searchDatabseCounselor();
    $causeCount = $query -> searchDatabseOccurenceCause();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Source+Sans+Pro&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/f3517f0eb4.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawCauseChart);
        
        function drawCauseChart() {
            var data = google.visualization.arrayToDataTable([
                ['Cause', 'Occurences'],
                <?php echo "['".$causeCount[0][0]."',".$causeCount[0][1]."],";?>
                <?php echo "['".$causeCount[1][0]."',".$causeCount[1][1]."],";?>
                <?php echo "['".$causeCount[2][0]."',".$causeCount[2][1]."],";?>
                <?php echo "['".$causeCount[3][0]."',".$causeCount[3][1]."]";?>
            ]);
            var options = {
                title: 'Causes',
                backgroundColor: '#66bb6a'
            };
            var chart = new google.visualization.PieChart(document.getElementById('CauseChart'));
            chart.draw(data, options);
        }
        function doALoadOfStuff() {
            drawCauseChart();
        }
    </script>
    <title>Home</title>
    <style>
         :root {
            --bg-color: #4285F4;
        }
    </style>
</head>

<body>
    <?php include "nav.php";?>
    <main class="dashboard">
        <div class="report">
            <div class="post">
                <div class="tag report-bg-fl">Report</div>
                <div class="dash-spacing">
                    <div class="report-titles" id="reports">
                        <span class="main-report-title">
                            Transition
                        </span>
                        <span class="main-report-title">
                            Phys. Manifestation
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
                            <?php echo $reports[0]['sReportTransition'] ?>
                        </span>
                        <span class="main-report">
                            <?php echo $reports[0]['sReportManifestation'] ?>
                        </span>
                        <span class="main-report">
                            <?php echo $reports[0]['sReportCause'] ?>
                        </span>
                        <span class="main-report">
                            <?php echo $reports[0]['sReportConsequence'] ?>
                        </span>
                    </div>
                   <h6 class="date">
                    <?php echo $reports[0]['sReportDate'];?>
                    </h6>
                </div>
            </div>
        </div>
        <div class="stat">
        <div class="post">
            <div class="stat-bg-fl tag tag-extended">
                Statistics
                <div id="CauseChart" class="chart" style="width: 100%; height: 90%; background:transparent;"></div>
            </div>
            <p>
            </p>
        </div>
        </div>
        <div class="note">
            <div class="post"> <?php ?>
                <div class="tag note-bg-fl">
                    <?php echo $notes[0]['sNoteTitle'];?>
                </div>
                <p>
                    <?php echo $notes[0]['sNoteText'];?>
                </p>
                <h6 class="date">
                    <?php echo $notes[0]['sNoteDate'];?>
                </h6>
            </div>
        </div>
        <div class="info">
            <div class="post">
                <div class="tag">Student Info</div>
                <div class="dash-spacing">
                    <div class="info-guardian" id="info">
                        <h3>
                            Guardian
                        </h3>
                        <h4>
                            Name
                        </h4>
                        <?php echo $guardian[0]['sGuardianName']?>
                        <h4>
                            Email
                        </h4>
                        <?php echo $guardian[0]['sGuardianEmail']?>
                        <h4>
                            Phone
                        </h4>
                        <?php echo $guardian[0]['sGuardianPhone']?>
                    </div>
                    <div class="info-student" id="info">
                        <h3>
                            Student
                        </h3>
                        <h4>
                            School
                        </h4>
                        <?php echo $students[0]['studentSchool']?>
                        <h4>
                            Birthday
                        </h4>
                        <?php echo $students[0]['studentBirthday']?>
                        <h4>
                            Year
                        </h4>
                        <?php echo $students[0]['studentYear']?>
                    </div>
                </div>
            </div>
        </div>
        <div class="teacher">
            <div class="post">
                <div class="tag tag-extended">
                    Counselor
                    <h5>
                        <?php echo $counselor[0]["sCounselorName"];?>
                    </h5>
                    <h6>
                        Report Inputs:
                        <?php echo ($query->searchDatabseCounselorCount());?>
                    </h6>
                    <h6>
                        Note Inputs:
                        <?php echo ($query->searchDatabseCounselorNotesCount());?>
                    </h6>
                    
                </div>
                <p></p>
            </div>
        </div>
    </main>
</body>

</html>
