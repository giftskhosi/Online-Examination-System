<?php 
session_start();

if(!isset($_SESSION['Email'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNISA EXAM PORTAL</title>
    <link rel="stylesheet" href="view5.css">
</head>
<body>
    <div class="wrapper">

        <ul class="nav">
        <li><a href="logout.php">Logout</a></li><br>
        </ul></br>
        </br>

         <h1>UNISA EXAMINATION PORTAL (Student)</h1>
          <h2>Home</h2>
         <p id="welcome">Welcome <?=$_SESSION['STUDENT NAME']?><p>
         

            <ul class="navlist">
               
               <li><a href="startExam.php">Online assessment</a></li>
               <li><a href="timetable.php">Time Table</a></li>
               <li><a href="results.php">View Results</a></li>
            </ul>

            <h2>2021 Super Examination</h2>
            <div id="text">
            <p>These are fully online Examinations. Questions will only be presented on myExams.</p>
            <li>Click on the "Online Assessment" tool in the navigation to be directed to the Exam link to open it.</li>
            <li>Click on the "Time Table" tool in the navigation to be directed to the Exam Schedue for exam date.</li>
            </div>

            <div class="footer">
        <footer>
            <p style="text-align: center;">Copyright &copy; 2021 Gift Sekhosana</p>
        </footer>
    </div>
    </div>

    
</body>
</html>
<?php
} else {
    header("Location: login.php");
}
