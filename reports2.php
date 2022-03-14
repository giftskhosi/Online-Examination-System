<?php 
session_start();
include('database.php');

$sql = "SELECT Results, COUNT(*) FROM `answer_script`
        WHERE `Results` <= 50.00 ";
$results8 = $db->query($sql);

$sql = "SELECT Student_Number, submission_date, Module_Code, Results FROM answer_script
        WHERE Results BETWEEN 40.00 AND 49.99";
$results9 = $db->query($sql);

$sql = "SELECT Student_Number, submission_date, Module_Code, Results FROM answer_script
        WHERE Results >= 50 AND Results <= 79";
$results10 = $db->query($sql);

$sql = "SELECT Student_Number, submission_date, Module_Code, Results FROM answer_script
        WHERE Results >= 80";
$results11 = $db->query($sql);

$sql = "SELECT Student_Number, submission_date, Module_Code, Results FROM answer_script
        WHERE Results <= 39";
$results12 = $db->query($sql);
/////////////////////////////////////////////      Search     ///////////////////////////////////////////////////////


/////////////////////////////////////////////      Logout     ///////////////////////////////////////////////////////
$logout = filter_input(INPUT_POST, 'btnLogout');
        if(isset($logout)){
          header("Location: lecture.php");
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style5.css">
</head>
<body>
        <div class="container">
        <div class="header">
        <h1>Exam Reports</h1>
        </div>

        <form action="reports2.php" method="POST">
        <div class="search_input">
           <input type="search" name="search" id="search" placeholder="Search for report....">
           <input type="submit" name="btnSearch" id="btn-search" value="Search">
        </div><br>
        <?php 
             $btnSearch = filter_input(INPUT_POST, 'btnSearch');
             $search = filter_input(INPUT_POST, 'search');
             
             if(isset($btnSearch)){
                  $siquel = "SELECT * FROM answer_script
                             WHERE Student_Number LIKE '%$search%' OR Module_Code = '$search' OR submission_date LIKE '%$search%'";
                  $show = $db->query($siquel);

                  if(!empty($search)){
                        echo '</br><table align="center" border="1px" style="width:1000px; line-hieght:50px">
                        <h2 align="center"> </h2>
                        <tr>
                           <th>Student Number</th>
                           <th>Submission Date</th>
                           <th>Module Code</th>
                           <th>Results</th>
                        </tr>';
                  foreach($show as $value){
                        echo '<tr>
                                <td>'. $value['Student_Number']. '</td>
                                <td>'. $value['submission_date']. '</td>
                                <td>'. $value['Module_Code']. '</td>
                                <td>'. $value['Results']. '</td>
                             </tr>';

                  }
                } else {
                        echo 'results not found...try again!!!';
                }
             }
        ?>
        </form>

        <div class="choose_report">
        <form action="reports2.php" method="POST">
        <h4>New System Reports</h4><br><br>
           <input type="radio" class="radio" name="report_type" value="Summary Report 3">Number of students who obtained mark below 50%.<br><br>
           <input type="radio" class="radio" name="report_type" value="Summary Report 4">Students who qualify for a supplementary examination <br><br>
           <input type="radio" class="radio" name="report_type" value="Summary Report 5">Students Who obtained a pass<br><br>
           <input type="radio" class="radio" name="report_type" value="Summary Report 6">Students who obtained a distinction<br><br>
           <input type="radio" class="radio" name="report_type" value="Summary Report 7">Students who Failed<br><br>
           <input type="submit" class="btn-press"  name="view" value="Generate" >
           <input type="submit" class="btn-press"  name="btnLogout" value="Back">

        <?php
        $view = filter_input(INPUT_POST, 'view');
        $display = filter_input(INPUT_POST, 'report_type');




        if(isset($view)){
             if($display != NULL){
                     if($display == "Summary Report 3"){
                             echo '<table align="center" border="1px" style="width:600px; line-hieght:50px">
                                     <h2 align="center">Number of students who obtained a mark below 50%.</h2>
                                     <tr>
                                     <th>Mark obtained</th>
                                     <th>Total number of Students</th>
                                     </tr>';
             
                                     foreach($results8 as $result){
                                        echo '<tr>
                                             <td>'. $result['Results']. '</td>
                                             <td>'. $result['COUNT(*)']. '</td>
                                             </tr>';
                                             
                                     }
                         }
             /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                         if($display == "Summary Report 4"){
                             echo '<table align="center" border="1px" style="width:800px; line-hieght:50px">
                                     <h2 align="center">Students who qualify for a supplementary examination</h2>
                                     <tr>
                                     <th>Student Number</th>
                                     <th>Submission Date</th>
                                     <th>Module Code</th>
                                     <th>Mark Obtained</th>
                                     </tr>';
             
                                     foreach($results9 as $result){
                                        echo '<tr>
                                             <td>'. $result['Student_Number']. '</td>
                                             <td>'. $result['submission_date']. '</td>
                                             <td>'. $result['Module_Code']. '</td>
                                             <td>'. $result['Results']. '</td>
                                             </tr>';
                                             
                                     }
                         }
             
                         if($display == "Summary Report 5"){
                             echo '<table align="center" border="1px" style="width:800px; line-hieght:50px">
                                     <h2 align="center">Students Who obtained a pass.</h2>
                                     <tr>
                                     <th>Student Number</th>
                                     <th>Submission Date</th>
                                     <th>Module Code</th>
                                     <th>Mark Obtained</th>
                                     </tr>';
             
                                     foreach($results10 as $result){
                                        echo '<tr>
                                        <td>'. $result['Student_Number']. '</td>
                                        <td>'. $result['submission_date']. '</td>
                                        <td>'. $result['Module_Code']. '</td>
                                        <td>'. $result['Results']. '</td>
                                        </tr>';
                                             
                                     }
                         }
             
                         if($display == "Summary Report 6"){
                             echo '<table align="center" border="1px" style="width:800px; line-hieght:50px">
                                     <h2 align="center">Students who obtained a distinction</h2>
                                     <tr>
                                     <th>Student Number</th>
                                     <th>Submission Date</th>
                                     <th>Module Code</th>
                                     <th>Mark Obtained</th>
                                     </tr>';
             
                                     foreach($results11 as $result){
                                        echo '<tr>
                                        <td>'. $result['Student_Number']. '</td>
                                        <td>'. $result['submission_date']. '</td>
                                        <td>'. $result['Module_Code']. '</td>
                                        <td>'. $result['Results']. '</td>
                                        </tr>';
                                             
                                     }
                         }
             
                         if($display == "Summary Report 7"){
                             echo '<table align="center" border="1px" style="width:800px; line-hieght:50px">
                                     <h2 align="center">Students who Failed.</h2>
                                     <tr>
                                     <th>Student Number</th>
                                     <th>Submission Date</th>
                                     <th>Module Code</th>
                                     <th>Mark Obtained</th>
                                     </tr>';
             
                                     foreach($results12 as $result){
                                        echo '<tr>
                                        <td>'. $result['Student_Number']. '</td>
                                        <td>'. $result['submission_date']. '</td>
                                        <td>'. $result['Module_Code']. '</td>
                                        <td>'. $result['Results']. '</td>
                                        </tr>';
                                             
                                     }
                         }

             }
        }
         

        ?>
        </form>
        <?php 
          include('footer.php');
        ?>

        

</body>
</html>