<?php 
session_start();

if(!isset($_SESSION['lectureEmail'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNISA EXAM PORTAL(Admin)</title>
    <link rel="stylesheet" href="view5.css">
</head>
<body>
  <div class="wrapper">

        <ul class="nav">
        <li><a href="logout.php">Logout</a></li><br>
        </ul></br>
        </br>

    <h1>UNISA EXAM PORTAL (Admin)</h1>
         <h3>Home</h3> 
    <h4>WELCOME LECTURE <?=$_SESSION['lectureName']?></h4>
   
    <ul class="navlist">
      <li><a href="reports.php">Old System Reports</a></li>
      <li><a href="reports2.php">New System Reports</a></li>
      <li><a href="questions.php">Add Exam</a></li>
      <li><a href="uploadResults.php">Upload Results</a></li>  
    </ul>

    
  
  
    
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
?>