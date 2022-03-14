<?php
session_start(); 
include('database.php');



// if ($statement == "Summary Report 3") {

//   echo '<table align="center" border="1px" style="width:800px; line-hieght:50px">
//   <h2 align="center">Exception Report of Students that Submitted More than Once for the Same Module.</h2>
//   <tr>
//      <th>Mark obtained</th>
//      <th>Total number of Students</th>
//   </tr>';
//   foreach($results8 as $result){

//   echo '<tr>
//           <td>'. $result['Results']. '</td>
//           <td>'. $result['COUNT(*)']. '</td>
//         </tr>';
  
//       }

// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
      <div class="wrapper">
      <h2>Search Page</h2>
      <div class="results">
      <form  method="POST" action="search.php">
        <?php
           $btnSearch = filter_input(INPUT_POST, 'btnSearch');
           $look = filter_input(INPUT_POST, 'search');

           if(isset($btnSearch)){
              $sql = "SELECT * FROM `exam-info` WHERE Email LIKE '$look%' OR `MODULE CODE` LIKE '%$look%' OR `Date of the exam` LIKE '%$look%' ";
              $answer =$db->query($sql);

              
              if($look > 0){
                echo '</br><table align="center" border="1px" style="width:1000px; line-hieght:50px">
                <h2 align="center"> </h2>
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
                foreach($answer as $result){

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
              } else {
                  echo "There are no Results matching your search!";
              
              }
           }
        ?>
        
      </div>
      
      <input type="submit" name="back" value="Back"></br>
      <?php 
        $back = filter_input(INPUT_POST, 'back');
        if(isset($back)){
          header("Location: reports.php");
        }
      ?>
    </form>
  </div>
    
</body>
</html>