<?php
session_start(); 
include('database.php');
///////////////////////////////////////////////////////////////////////////////////
if(!isset($_SESSION['Email'])){
//////////////////////////////////////////////////////////////////////////////////
$btnBack = filter_input(INPUT_POST, 'back');
if(isset($btnBack)){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width= device-width, initial-scale=1.0">
    <title>View Results</title>
    <link rel="stylesheet" href="weiv3.css">

</head>
<body>
<div class="container">
    <form action="results.php" method="post" >
         <div class="header">
            <h2>View Your Results</h2>
         </div>
         <div class="instruction">
         <p>Please enter the relevant information required for the displaying of the results.</p>
         <p>----Required items marked with*----</p>
         </div>

         Exam Year*
         <input type="text" name="year" id="year" class="input-text" ><br><br>
         Examination Period*
         <select name="period" id="period" class="input-text">
              <option value=""></option>
              <option value="Oct/Nov">October/November</option>
              <option value="May/June">May/June</option>
              <option value="Jan/Feb">January/February</option>
         </select><br><br>
         <input type="submit" id="btn-press" value="Extract Results" name="extract">
         <input type="submit" id="btn-press" value="Back" name="back"><br><br><br>


         <?php
            $extract = filter_input(INPUT_POST, 'extract');
            $year = filter_input(INPUT_POST, 'year');
            $period = filter_input(INPUT_POST, 'period');
            $stud_number = $_SESSION['STUDENT NUMBER'];
            $name = $_SESSION['STUDENT NAME'];
            
            if(isset($extract)){
               if($period != NULL){
                   if($period == "Oct/Nov"){
                        $sql = "SELECT Student_Number, submission_date, Module_Code, Results FROM answer_script
                                WHERE submission_date >= '2021-10-01 00:00:00' AND submission_date <= '2021-11-30 00:00:00' AND Student_Number = '$stud_number'";
                        $display =$db->query($sql);
                                    
                                foreach($display as $result){            
                                    echo ' <h2>Exam Results: '. $name . '</h2>
                                            <p>Student No: '. $result['Student_Number']. '</p
                                            <p>Exam Date: '. $result['submission_date']. '</p>
                                            <p>Module Code: '. $result['Module_Code']. '</p>
                                            <p>Result: '. $result['Results']. '%</p><br><br>
                                         ';
                        
                                }
                       

                    } else if ($period == "May/June"){
                        $sql = "SELECT * FROM answer_script
                                WHERE Submission_date BETWEEN '2021-05-01 00:00:00' AND '2021-07-31 00:00:00' AND Student_Number = '$stud_number'
                                ORDER BY answer_script.Submission_date ASC";
                        $display1 =$db->query($sql);

                            foreach($display1 as $result){            
                                echo ' <h2>Exam Results: '. $name . '</h2>
                                        <p>Student No: '. $result['Student_Number']. '</p
                                        <p>Exam Date: '. $result['submission_date']. '</p>
                                        <p>Module Code: '. $result['Module_Code']. '</p>
                                        <p>Result: '. $result['Results']. '%</p><br><br>
                                        ';                 
                            }

                    } else if ($period == "Jan/Feb"){
                        $sql = "SELECT * FROM answer_script
                                WHERE Submission_date BETWEEN '2021-01-01 00:00:00' AND '2021-02-28 00:00:00' AND Student_Number = '$stud_number'
                                ORDER BY answer_script.Submission_date ASC";
                        $display2 =$db->query($sql);

                            foreach($display2 as $result){            
                                echo ' <h2>Exam Results: '. $name . '</h2>
                                        <p>Student No: '. $result['Student_Number']. '</p
                                        <p>Exam Date: '. $result['submission_date']. '</p>
                                        <p>Module Code: '. $result['Module_Code']. '</p>
                                        <p>Result: '. $result['Results']. '%</p><br><br>
                                        ';
                        
                            }
                            
                    } else {
                        echo "Exam Results Not Found";
                      
                    }
                
                } else {
                    echo "Exam Results Not Found";
                    
                }
            }

         ?>
    </form>
    
    <?php include('footer.php'); ?>
</div>
</body>
</html>
<?php
} else {
    header("Location: login.php");
}
?>