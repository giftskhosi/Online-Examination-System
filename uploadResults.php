<?php
session_start();
include('database.php');

if(!isset($_SESSION['lectureEmail'])){

    $back = filter_input(INPUT_POST, 'back');
    if(isset($back)){
    header("Location: lecture.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark Allocation and Upload results</title>
    <link rel="stylesheet" href="weiv4.css">

</head>
<body>
    <div class="wrapper">
        <div class="allocations">
            <form action="uploadResults.php" method="post">
                <h2 id="header">Mark Allocation and Upload results</h2>

                <div class="fill-out">
                    Student Number: <input type="text" name="studentNumber" class="input-text" id="studentNumber"><br>
                    Module Code: <input type="text" name="moduleCode" class="input-text" id="moduleCode"><br>
                    <input type="submit" value="Upload" id="btn-press" name="upload">
                    <input type="submit" value="Back" id="btn-press" name="back">
                </div>
                <?php
                $studentNo = filter_input(INPUT_POST, 'studentNumber');
                $moduleC = filter_input(INPUT_POST, 'moduleCode');
                $upload = filter_input(INPUT_POST, 'upload');
               

                if(isset($upload)){
                   //this MySQL code retrieves the answer script of the specified student and module code
                    $sql = "SELECT * FROM answer_script
                           WHERE Module_Code = '$moduleC' AND Student_Number = '$studentNo'";
                    $fetch = $db->query($sql);
                   
                    //this MySQL code displays the student number of the student you are allocating marks for
                    $sql2 = "SELECT * FROM student
                             WHERE `STUDENT NUMBER` = '$studentNo'";
                    $fetch2 = $db->query($sql2);

                    //this MySQL code displays the questions that corresponds to the answer script of the examination that the student wrote 
                    $sql3 = "SELECT * FROM questions
                             WHERE Module_Code = '$moduleC'";
                    $fetch3 = $db->query($sql3);

                    //fetchs the questions
                    foreach($fetch3 as $get3){
                        echo '<div class="allocate">
                        <h3>Questions</h3>
                        <p>Question 1: ' . $get3['question_1'] . '</p><br>
                        <p>Question 2: ' . $get3['question_2'] . '</p><br>
                        <p>Question 3: ' . $get3['question_3'] . '</p><br>
                        <p>Question 4: ' . $get3['question_4'] . '</p><br>
                        </div>';
                    }

                    //fetches the student's name
                    foreach($fetch2 as $get2){
                        echo '<h3>Answers From ' . $get2['STUDENT NAME'] . '</h3>';
                    }

                    //fetches the student's answer script
                    foreach($fetch as $get){
                        echo '<div class="allocate">
                                <h5>Exam Date: ' . $get['submission_date'] . '</h5>
                                <div class="answers">
                                    <p>Question 1 <br> Answer: ' . $get['Question_1'] . '</p><br>
                                    <input type="text" class="input-text" name="mark1" id="mark1"><br>
                                    <p>Question 2 <br> Answer: ' . $get['Question_2'] . '</p><br>
                                    <input type="text" class="input-text" name="mark2" id="mark2"><br>
                                    <p>Question 3 <br> Answer: ' . $get['Question_3'] . '</p><br>
                                    <input type="text" class="input-text" name="mark3" id="mark3"><br>
                                    <p>Question 4 <br> Answer: ' . $get['Question_4'] . '</p><br>
                                    <input type="text" class="input-text" name="mark4" id="mark4"><br><br> 
                                    <input type="submit" value="Allocate Marks" id="btn-press" name="allocate"><br>
                                </div>
                              </div>'; 
                    }

                    
               }

               //Allocate and calculates the marks for the student
                    $allocate = filter_input(INPUT_POST, 'allocate');
                    $mark1 = filter_input(INPUT_POST, 'mark1');
                    $mark2 = filter_input(INPUT_POST, 'mark2');
                    $mark3 = filter_input(INPUT_POST, 'mark3');
                    $mark4 = filter_input(INPUT_POST, 'mark4');
                    $results = filter_input(INPUT_POST, 'results');

                    if(isset($allocate)){
                            $total = ($mark1 + $mark2 + $mark3 + $mark4)/80 * 100;
                            
                                echo "<p>Total: " . $total . "</p>";

                    }
                    
               

               ?>
                <div class="total">
                    <h2>Total</h2>
                    <input type="text" name="results" class="input-text" id="results">
                    <input type="submit" id="btn-press" value="Store" name="store">
                </div>
               <?php

               //this code stores the marks allocated to the student to the database
                $store = filter_input(INPUT_POST, 'store');
                $results = filter_input(INPUT_POST, 'results');

                if(isset($store)){
                    $sql3 = "UPDATE answer_script
                             SET Results = '$results'
                             WHERE Student_Number = '$studentNo' AND Module_Code = '$moduleC'";
                    $fetch3 = $db->query($sql3);
                }
 
               ?>

               
           </form>
        </div>

        <?php 
          include('footer.php');
        ?>

    </div>
</body>
</html>
<?php
} else {
    header("Location: login.php");
}
?>