<?php 
session_start();
include('database.php');
///summary report 1 query
$sql = "SELECT `Date of the exam`,`MODULE CODE`, COUNT(*) FROM `exam-info`
        WHERE `Date of the exam` = '2021-03-01' 
        GROUP BY `MODULE CODE`
        ORDER BY `exam-info`.`MODULE CODE` ASC";
$results =$db->query($sql);

$sql = "SELECT `Date of the exam`, `MODULE CODE`, COUNT(*) FROM `exam-info`
        WHERE `Date of the exam` = '2021-03-10' 
        GROUP BY `MODULE CODE`
        ORDER BY `exam-info`.`MODULE CODE` ASC";
$results2 =$db->query($sql);

///Summary report 2 query
$sql = "SELECT `MODULE CODE`, COUNT(*) FROM `exam-info`
        WHERE `MODULE CODE` = 'ICT3715'";
$results3 =$db->query($sql);
$sql = "SELECT `MODULE CODE`, COUNT(*) FROM `exam-info`
        WHERE `MODULE CODE` = 'ICT3611'";
$results4 =$db->query($sql);

///Trend report 1 query

$sql = "SELECT `MODULE CODE`, `Date of the exam` FROM `raw-data`
        WHERE `Date of the exam` >= '2021-03-01' AND `Date of the exam` <= '2021-03-31'
        ORDER BY `raw-data`.`Date of the exam` ASC";
$results5 =$db->query($sql);

///Trend report 2 query

$sql = "SELECT `Email`, `STUDENT NAME`, `STUDENT SURNAME`, `MODULE CODE`, `Date of the exam` FROM `raw-data`
        WHERE `Email` IN
        (SELECT `Email` FROM `raw-data`
         WHERE `Email` IN (31877281, 51548283, 54756731, 64317765)
         ORDER BY `raw-data`.`Date of the exam` ASC)";
$results6 = $db->query($sql);

///Exception Report

$sql = "SELECT * FROM `exam-info` 
        WHERE `Email` = 51548283";
$results7 =$db->query($sql);

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
    <title>UNISA Exam Reports</title>

    <link rel="stylesheet" href="style5.css">
</head>
<body>
    <div class="container">
        <div class="header">
        <h1>Exam Reports</h1>
        </div>

        <form action="search.php" method="POST">
        <div class="search_input">
           <input type="search" name="search" id="search" placeholder="Search for report....">
           <input type="submit" name="btnSearch" id="btn-search" value="Search">
        </div><br>
      </form>

        <div class="choose_report">
        <form action="reports.php" method="POST">
             <h2>Type of Report</h2></br></br>
           <input type="radio" class="radio" name="report_type" value="Summary Report 1" checked>Exam Submission on the 1st of March 2021 and 10th of March 2021</br></br>
           <input type="radio" class="radio" name="report_type" value="Summary Report 2">Exam Submission for Module 1CT3715 and ICT3611</br></br>
           <input type="radio" class="radio" name="report_type" value="Trend Report 1">Modules written in the month of March 2021</br></br>
           <input type="radio" class="radio" name="report_type" value="Trend Report 2">Students who wrote multiple examinations per week</br></br>
           <input type="radio" class="radio" name="report_type" value="Exception Report">Students that submitted more than once for the same module</br></br>        
           <input type="submit" class="btn-press" name="generate" value="Generate" >
           <input type="submit" class="btn-press" name="btnLogout" value="Back">
        

           <?php
              $statement = filter_input(INPUT_POST, 'report_type');
              $button = filter_input(INPUT_POST, 'generate');
              ////Summary Report 1
            if(isset($button)){
              if($statement != NULL){
                  if($statement == "Summary Report 1"){
                      echo '<table align="center" border="1px" style="width:700px; line-hieght:50px">
                            <h2 align="center">The Number of Student Exam Submission for a Specific Day Summary Report</h2>
                            <h3 align="center">01 March 2021</h3>
                            <tr>
                               <th>Date of the exam</th>
                               <th>MODULE CODE</th>
                               <th>Total</th>
                            </tr>';
                            foreach($results as $result){

                            echo '<tr>
                                    <td>'. $result['Date of the exam']. '</td>
                                    <td>'. $result['MODULE CODE']. '</td>
                                    <td>'. $result['COUNT(*)']. '</td>
                                  </tr>
                                  ';
                                }
                                echo '<table align="center" border="1px" style="width:700px; line-hieght:50px">
                        <h2 align="center">The Number of Student Exam Submission for a Specific Day Summary Report</h2>
                        <h3 align="center">10 March 2021</h3>
                        <tr>
                           <th>Date of the exam</th>
                           <th>MODULE CODE</th>
                           <th>Total</th>
                        </tr>';
                        foreach($results2 as $result){

                        echo '<tr>
                                <td>'. $result['Date of the exam']. '</td>
                                <td>'. $result['MODULE CODE']. '</td>
                                <td>'. $result['COUNT(*)']. '</td>
                              </tr>';
                        
                            }
                    } 

                    ///////Summary Report 2
                    if ($statement == "Summary Report 2") {

                        echo '<table align="center" border="1px" style="width:700px; line-hieght:50px">
                        <h2 align="center">The Number of Student Exam Submission for a Specific Module Code Summary Report</h2>
                        <h3 align="center">ICT3715</h3>
                        <tr>
                           <th>MODULE CODE</th>
                           <th>Total Submission</th>
                        </tr>';
                        foreach($results3 as $result){

                        echo '<tr>
                                <td>'. $result['MODULE CODE']. '</td>
                                <td>'. $result['COUNT(*)']. '</td>
                              </tr>';
                        
                            }
                        
                            echo '<table align="center" border="1px" style="width:700px; line-hieght:50px">
                            <h2 align="center">The Number of Student Exam Submission for a Specific Module Code Summary Report</h2>
                            <h3 align="center">ICT3611</h3>
                            <tr>
                               <th>MODULE CODE</th>
                               <th>Total Submission</th>
                            </tr>';
                            foreach($results4 as $result){
    
                            echo '<tr>
                                    <td>'. $result['MODULE CODE']. '</td>
                                    <td>'. $result['COUNT(*)']. '</td>
                                  </tr>';
                            
                                }
                    }
                    ///////Trend Report 1
                    if ($statement == "Trend Report 1") {

                        echo '<table align="center" border="1px" style="width:700px; line-hieght:50px">
                        <h2 align="center">Trend Report for Exam Pattern(Module codes written in the month of March 2021)</h2>
                        <h3 align="center">March 2021</h3>
                        <tr>
                           <th>MODULE CODE</th>
                           <th>Date of the exam</th>
                        </tr>';
                        foreach($results5 as $result){

                        echo '<tr>
                                <td>'. $result['MODULE CODE']. '</td>
                                <td>'. $result['Date of the exam']. '</td>
                              </tr>';
                        
                            }
                        
                    }
                    ///////Trend report 2
                    if ($statement == "Trend Report 2") {

                        echo '<table align="center" border="1px" style="width:700px; line-hieght:50px">
                        <h2 align="center">Trend Report for Exam Pattern(Students who wrote multiple examinations per week)</h2>
                        <tr>
                           <th>Email</th>
                           <th>Name</th>
                           <th>Surname</th>
                           <th>MODULE CODE</th>
                           <th>Date of the exam</th>
                        </tr>';
                        foreach($results6 as $result){

                        echo '<tr>
                                <td>'. $result['Email']. '</td>
                                <td>'. $result['STUDENT NAME']. '</td>
                                <td>'. $result['STUDENT SURNAME']. '</td>
                                <td>'. $result['MODULE CODE']. '</td>
                                <td>'. $result['Date of the exam']. '</td>
                              </tr>';
                        
                            }
                        
                    }
                    ////////Exception report
                    if ($statement == "Exception Report") {

                        echo '<table align="center" border="1px" style="width:800px; line-hieght:50px">
                        <h2 align="center">Exception Report of Students that Submitted More than Once for the Same Module.</h2>
                        <tr>
                           <th>Exam ID</th>
                           <th>Answer ID</th>
                           <th>Email</th>
                           <th>MODULE CODE</th>
                           <th>Question Types</th>
                           <th>Date of the exam</th>
                           <th>Start time</th>
                           <th>Completion time</th>
                           <th>Decleration</th>
                        </tr>';
                        foreach($results7 as $result){

                        echo '<tr>
                                <td>'. $result['examID']. '</td>
                                <td>'. $result['answerID']. '</td>
                                <td>'. $result['Email']. '</td>
                                <td>'. $result['MODULE CODE']. '</td>
                                <td>'. $result['Questions Type']. '</td>
                                <td>'. $result['Date of the exam']. '</td>
                                <td>'. $result['Start time']. '</td>
                                <td>'. $result['Completion time']. '</td>
                                <td>'. $result['declaration']. '</td>
                              </tr>';
                        
                            }
                        
                    }
                }
            }

            
           
           ?>
           </form>
        </div><br>
        <div class="footer">
        <?php 
          include('footer.php');
        ?>
       </div>
    </div>
</body>
</html>