<?php
    session_start();
    include 'functions.php';
    $query = new queries;

    $students =$query->searchDatabseStudent();
    $locationsCount = $query->searchDatabseOccurenceLocation();
    $causeCount = $query -> searchDatabseOccurenceCause();
    $manifestationCount = $query -> searchDatabseOccurenceManifestation();
    $transitionCount = $query -> searchDatabseOccurenceTransition();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Source+Sans+Pro&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/f3517f0eb4.js" crossorigin="anonymous"></script>
    <title>Stats</title>
    <style>
         :root {
            --bg-color: #66bb6a;
        }
    </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawLocationChart);
        google.charts.setOnLoadCallback(drawCauseChart);
        google.charts.setOnLoadCallback(drawManifestationChart);
        google.charts.setOnLoadCallback(drawTransitionChart);
        function drawLocationChart() {
            var data = google.visualization.arrayToDataTable([
                ['Location', 'Occurences'],
                <?php echo "['".$locationsCount[0][0]."',".$locationsCount[0][1]."],";?>
                <?php echo "['".$locationsCount[1][0]."',".$locationsCount[1][1]."],";?>
                <?php echo "['".$locationsCount[2][0]."',".$locationsCount[2][1]."],";?>
                <?php echo "['".$locationsCount[3][0]."',".$locationsCount[3][1]."]";?>
            ]);
            var options = {
                title: 'Locations',
                backgroundColor: '#66bb6a'
            };
            var chart = new google.visualization.PieChart(document.getElementById('LocationChart'));
            chart.draw(data, options);
        }
        
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
        
        function drawManifestationChart() {
            var data = google.visualization.arrayToDataTable([
                ['Manifestation', 'Occurences'],
                <?php echo "['".$manifestationCount[0][0]."',".$manifestationCount[0][1]."],";?>
                <?php echo "['".$manifestationCount[1][0]."',".$manifestationCount[1][1]."],";?>
                <?php echo "['".$manifestationCount[2][0]."',".$manifestationCount[2][1]."],";?>
                <?php echo "['".$manifestationCount[3][0]."',".$manifestationCount[3][1]."]";?>
            ]);
            var options = {
                title: 'Manifestations',
                backgroundColor: '#66bb6a'
            };
            var chart = new google.visualization.PieChart(document.getElementById('ManifestationChart'));
            chart.draw(data, options);
        }
        function drawTransitionChart() {
            var data = google.visualization.arrayToDataTable([
                ['Manifestation', 'Occurences'],
                <?php echo "['".$transitionCount[0][0]."',".$transitionCount[0][1]."],";?>
                <?php echo "['".$transitionCount[1][0]."',".$transitionCount[1][1]."],";?>
                <?php echo "['".$transitionCount[2][0]."',".$transitionCount[2][1]."],";?>
                <?php echo "['".$transitionCount[3][0]."',".$transitionCount[3][1]."]";?>
            ]);
            var options = {
                title: 'Transition',
                backgroundColor: '#66bb6a'
                
            };
            var chart = new google.visualization.PieChart(document.getElementById('TransitionChart'));
            chart.draw(data, options);
        }
        window.onresize = doALoadOfStuff;

        function doALoadOfStuff() {
            //do a load of stuff
            drawLocationChart();
            drawCauseChart();
            drawManifestationChart();
            drawTransitionChart();
        }
    </script>
</head>

<body>
   <?php include "nav.php";?>   
    <main class="statistic">
        <div class="post">
            <div class="stat-bg-fl tag tag-extended">
                Statistics
                <div id="LocationChart" class="chart" style="width: 100%; height: 90%; background:transparent;"></div>
            </div>
        </div>
         <div class="post">
            <div class="stat-bg-fl tag tag-extended">
                Statistics
                <div id="CauseChart" style="width: 100%; height: 90%;"></div>
            </div>
        </div>
         <div class="post">
            <div class="stat-bg-fl tag tag-extended">
                Statistics
                <div id="ManifestationChart" style="width: 100%; height: 90%;"></div>
            </div>
        </div>
        <div class="post">
            <div class="stat-bg-fl tag tag-extended">
                Statistics
                <div id="TransitionChart" style="width: 100%; height: 90%;"></div>
            </div>
        </div>
    </main>
</body>

</html>
