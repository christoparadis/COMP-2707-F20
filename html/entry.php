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
        <title>Entry</title>
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
                    <div class="tag">Reports</div>
                    <div class="dash-spacing">
                        <?php
                            if(isset($_POST["submit-report"])){
                                $rLocation = htmlspecialchars($_POST["rLocation"]);
                                $rContext = htmlspecialchars($_POST["rContext"]);
                                $rTransition = htmlspecialchars($_POST["rTransition"]);
                                $rManifestation = htmlspecialchars($_POST["rManifestation"]);
                                $rCause = htmlspecialchars($_POST["rCause"]);
                                $rConsequence = htmlspecialchars($_POST["rConsequence"]);
                                $rCounselor = htmlspecialchars($_POST["rCounselorId"]);
                                $query->insertDatabaseReports($rCounselor, $rLocation, $rContext, $rTransition, $rManifestation, $rCause, $rConsequence);
                            }
                        ?>
                        <form method="POST" action="<?php $_PHP_SELF ?>" class="entry-form">
                            <div class="entry-select">
                                <label for="sReportLocation">Location</label>
                                <select id="sReportLocation" name="rLocation">
                                    <option value="Classroom">Classroom</option>
                                    <option value="Recess">Recess</option>
                                    <option value="Gym">Gym</option>
                                    <option value="Hallway">Hallway</option>
                                </select>
                            </div>
                            <hr class="rule">
                            <div class="entry-select">
                                <label for="sReportContext">Context</label>
                                <select id="sReportContext" name="rContext">
                                    <option value="Late">Late</option>
                                    <option value="Tired">Tired</option>
                                    <option value="Feeling ill">Feeling ill</option>
                                    <option value="Hungry">Hallway</option>
                                    <option value="Substitute">Substitute</option>
                                    <option value="Unorganized">Unorganized</option>
                                </select>
                            </div>
                            <hr class="rule">
                            <div class="entry-select">
                                <label for="sReportTransition">Transition</label>
                                <select id="sReportTransition" name="rTransition">
                                    <option value="Morning">Morning</option>
                                    <option value="Between activities">Between activities</option>
                                    <option value="Leaving">Leaving</option>
                                    <option value="Between rooms">Between rooms</option>
                                    <option value="Between counselors">Between counselors</option>
                                    <option value="Activities & bathroom">Activities & bathroom</option>
                                    <option value="Activities & lunch">Activities & lunch</option>
                                </select>
                            </div>
                            <hr class="rule">
                            <div class="entry-select">
                                <label for="sReportManifestation">Display</label>
                                <select id="sReportManifestation" name="rManifestation">
                                    <option value="Crying">Crying</option>
                                    <option value="Closed fist">Closed fist</option>
                                    <option value="Moves in less than a metre">Moves in less closer</option>
                                    <option value="Negations">Negations</option>
                                    <option value="Leaves room">Leaves room</option>
                                    <option value="Repeated gestures">Repeated gestures</option>
                                    <option value="Repeated words">Repeated words</option>
                                </select>
                            </div>
                            <hr class="rule">
                            <div class="entry-select">
                                <label for="sReportCause">Cause</label>
                                <select id="sReportCause" name="rCause">
                                    <option value="Request from adult">Request from adult</option>
                                    <option value="Request of work">Request of work</option>
                                    <option value="Request from routine">Request from routine</option>
                                    <option value="Request social norms">Request social norms</option>
                                    <option value="Waitting time">Waitting time</option>
                                    <option value="Demanding attention">Demanding attention</option>
                                    <option value="Habit correction">Habit correction</option>
                                    <option value="Reschedule">Reschedule</option>
                                    <option value="Activity choice">Activity choice</option>
                                    <option value="Report consequence">Report consequence</option>
                                    <option value="Deprived activity">Deprived activity</option>
                                </select>
                            </div>
                            <hr class="rule">
                            <div class="entry-select">
                                <label for="sReportConsequence">Consequence</label>
                                <select id="sReportConsequence" name="rConsequence">
                                    <option value="Reprimanded">Reprimanded</option>
                                    <option value="Apologize">Apologize</option>
                                    <option value="Discussion">Discussion</option>
                                    <option value="Offer choices">Offer choices</option>
                                    <option value="Recives item">Recives item</option>
                                    <option value="Activity">Activity</option>
                                    <option value="Ignored">Ignored</option>
                                    <option value="Redirect task">Redirect task</option>
                                    <option value="Time out">Time out</option>
                                    <option value="Relaxing plan">Relaxing plan</option>
                                    <option value="Calm room">Calm room</option>
                                    <option value="Evacuate room">Evacuate room</option>
                                    <option value="Visual direction">Visual direction</option>
                                    <option value="Peer reaction">Peer reaction</option>
                                    <option value="Task reduction">Task reduction</option>
                                    <option value="Intervention">Intervention</option>
                                </select>
                            </div>
                            <hr class="rule">
                            <div class="entry-select">
                                <label for="CounselorId">Counselor</label>
                                <select id="CounselorId" name="rCounselorId">
                                    <option value="1">Nancy Drouin</option>
                                    <option value="839">Chantal Bouleau</option>
                                </select>
                            </div>
                            <hr class="rule">
                            <input type="submit" name="submit-report" class="entry-submit">
                        </form>
                    </div>
                </div>
            </div>
           <div class="entry">
                <div class="post">
                    <div class="tag">Notes</div>
                    <div class="dash-spacing">
                        <?php
                            if(isset($_POST['submit-note'])){
                                $nTitle = htmlspecialchars($_POST["NoteTitle"]);
                                $nText = htmlspecialchars($_POST["NoteText"]);
                                $nCounselor = htmlspecialchars($_POST["CounselorId"]);
                                $query->insertDatabaseNotes($nCounselor,$nTitle,$nText);
                            }
                        ?>
                        <form method="POST" action="<?php $_PHP_SELF ?>" class="entry-form">
                            <div class="entry-select">
                                <label for="NoteTitle">Title</label>
                                <input type="text" name="NoteTitle" class="entry-notes" id="sNoteTitle">
                            </div>
                            <hr class="rule">
                            <div class="entry-select">
                                <label for="NoteText">Text</label>
                                <textarea name="NoteText" id="sNoteText"></textarea>
                            </div>
                            <hr class="rule">
                            <div class="entry-select">
                                <label for="sCounselorId">Counselor</label>
                                <select id="sCounselorId" name="CounselorId">
                                    <option value="1">Nancy Drouin</option>
                                    <option value="839">Chantal Bouleau</option>
                                </select>
                            </div>
                            <hr class="rule">
                            <input type="submit" name="submit-note" class="entry-submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
