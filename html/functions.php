<?php 
    session_start();
    class queries{
        
        private static $conn;
        private static $sId;
        private static $sName;
        private static $mainGuardian;
        private static $isAdmin_;
        
        function __construct(){
            $this->logInformation();
            $this->setId();
            $this->isAdmin();
        }

        function setId(){
            $this->sId = $_SESSION['studentIdentification'];
        }

        function isAdmin(){
            if($_SESSION['studentIdentification'] == '999999999'){
                $this->isAdmin_ = TRUE;
                $_SESSION['isAdmin'] = $this->isAdmin_ ;
            }
        }
        
        function logInformation(){
            $username = $_SESSION["username"];
            $password = $_SESSION["password"];

            $conn = new mysqli("localhost",$username,$password,"paradisc_db");
            $this->conn = $conn;
        }
        function searchDatabseStudent(){

            $sql = "SELECT * FROM project_students WHERE studentId='".$this->sId."'";
            $result = mysqli_query($this->conn, $sql);
            $students=mysqli_fetch_all($result, MYSQLI_BOTH);
            $this->sName=$students[0][1];;
            return $students;
        }
        
        function searchDatabseReports(){
            $sql = "SELECT * FROM project_students_reports WHERE sStudentId='".$this->sId."' ORDER BY sReportDate";
            $result = mysqli_query($this->conn, $sql);
            $reports = mysqli_fetch_all($result, MYSQLI_BOTH);
            return $reports;
        }
        
        function searchDatabseNotes(){
            $sql = "SELECT * FROM project_students_notes WHERE studentId='".$this->sId."' ORDER BY sNoteDate DESC";
            $result = mysqli_query($this->conn, $sql);
            $notes = mysqli_fetch_all($result, MYSQLI_BOTH);
            return $notes;
        }
        function searchDatabseGuardians(){
            $sql = "SELECT * FROM project_students_guardians WHERE sStudentId='".$this->sId."'";
            $result = mysqli_query($this->conn, $sql);
            $guardians = mysqli_fetch_all($result, MYSQLI_BOTH);
            return $guardians;
        }
        function searchDatabseCounselor(){
            $sql=   "SELECT sCounselorId,Count(sCounselorId) FROM project_students_reports WHERE sStudentId='".$this->sId."' ORDER BY COUNT(sCounselorId) DESC";
            $result = mysqli_query($this->conn, $sql);
            $guardians = mysqli_fetch_all($result, MYSQLI_BOTH);
            
            $this->mainGuardian = $guardians[0]["sCounselorId"];
            
            $sql = "SELECT * FROM project_students_counselors WHERE sCounselorId='".$this->mainGuardian."'";
            $result = mysqli_query($this->conn, $sql);
            $guardian = mysqli_fetch_all($result, MYSQLI_BOTH);
            return $guardian;
        }
        function searchDatabseCounselorCount(){
            $sql=   "SELECT sCounselorId,Count(sCounselorId) FROM project_students_reports GROUP BY sCounselorId ORDER BY COUNT(sCounselorId) DESC";
            $result = mysqli_query($this->conn, $sql);
            $guardians = mysqli_fetch_all($result, MYSQLI_BOTH);
            
            $count = $guardians[0][1];
            return $count;
        }
        function searchDatabseCounselorNotesCount(){
            $sql=   "SELECT sCounselorId,Count(sCounselorId) FROM project_students_notes WHERE sCounselorId='".$this->mainGuardian."' GROUP BY sCounselorId";
            $result = mysqli_query($this->conn, $sql);
            $notes = mysqli_fetch_all($result, MYSQLI_BOTH);
            
            $count = $notes[0][1];
            return $count;
        }
        
        function searchDatabseOccurenceLocation(){
            $sql=   "SELECT sReportLocation, COUNT(sReportLocation) FROM project_students_reports WHERE sStudentId = '".$this->sId."' GROUP BY sReportLocation ORDER BY COUNT(sReportLocation) DESC";
            $result = mysqli_query($this->conn, $sql);
            $Locations = mysqli_fetch_all($result, MYSQLI_BOTH);
            return $Locations;
        }
        
        function searchDatabseOccurenceCause(){
            $sql=   "SELECT sReportCause, COUNT(sReportCause) FROM project_students_reports WHERE sStudentId = '".$this->sId."' GROUP BY sReportCause ORDER BY COUNT(sReportCause) DESC";
            $result = mysqli_query($this->conn, $sql);
            $cause = mysqli_fetch_all($result, MYSQLI_BOTH);
            return $cause;
        }
        
        function searchDatabseOccurenceManifestation(){
            $sql=   "SELECT sReportManifestation, COUNT(sReportManifestation) FROM project_students_reports WHERE sStudentId = '".$this->sId."' GROUP BY sReportManifestation ORDER BY COUNT(sReportManifestation) DESC";
            $result = mysqli_query($this->conn, $sql);
            $Manifestation = mysqli_fetch_all($result, MYSQLI_BOTH);
            return $Manifestation;
        }
        function searchDatabseOccurenceTransition(){
            $sql=   "SELECT sReportTransition, COUNT(sReportTransition) FROM project_students_reports WHERE sStudentId = '".$this->sId."' GROUP BY sReportTransition ORDER BY COUNT(sReportTransition) DESC";
            $result = mysqli_query($this->conn, $sql);
            $transition = mysqli_fetch_all($result, MYSQLI_BOTH);
            return $transition;
        }
        
        function insertDatabaseNotes($sCounselorId, $sNoteTitle, $sNoteText){
            $date = date("Y-m-d");
            $id= $this-> sId;
            $sql = "INSERT INTO project_students_notes (studentId, sCounselorId, sNoteTitle, sNoteText, sNoteDate) VALUES ('".$this->sId."', '".$sCounselorId."', '".$sNoteTitle."', '".$sNoteText."', '".$date."')";
            mysqli_query($this->conn, $sql);
        }
        
        function insertDatabaseReports($rCounselor, $rLocation, $rContext, $rTransition, $rManifestation, $rCause, $rConsequence){
            $date = date("Y-m-d");
            $id= $this-> sId;
            $sql = "INSERT INTO project_students_reports (sCounselorId, sStudentId, sReportDate, sReportLocation, sReportContext, sReportTransition, sReportManifestation, sReportCause, sReportConsequence) VALUES ('".$rCounselor."', '".$id."', '".$date."', '".$rLocation."', '".$rContext."', '".$rTransition."', '".$rManifestation."', '".$rCause."', '".$rConsequence."')";
            mysqli_query($this->conn, $sql);
            
        }
        function insertDatabaseCounselor($rCounselorId, $rCounselorName, $rCounselorEmail, $rCounselorPhone){
            $sql = "INSERT INTO project_students_counselors (sCounselorId, sCounselorName, sCounselorEmail, sCounselorPhone) VALUES ('".$rCounselorId."', '".$rCounselorName."', '".$rCounselorEmail."', '".$rCounselorPhone."')";
            mysqli_query($this->conn, $sql);
        }
        function insertDatabaseStudent($nStudentId,$nStudentName,$nStudentSexe,$nStudentSchool,$nStudentBirthday,$nStudentYear){
            $sql = "INSERT INTO project_students(studentId, studentName, studentSexe, studentSchool, studentBirthday, studentYear) VALUES ('".$nStudentId."', '".$nStudentName."', '".$nStudentSexe."', '".$nStudentSchool."', '".$nStudentBirthday."', '".$nStudentYear."')";
            mysqli_query($this->conn, $sql);
        }
        
    }

?>