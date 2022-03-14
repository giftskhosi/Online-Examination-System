<?php
session_start();
include('database.php');
include('code.php');


if(!isset($_SESSION['Email'])){

////////////////////////////////////////SUBMIT ANSWERS///////////////////////////////////////////
           //this part of the examination stores student answers to the database 

            $answer1 = filter_input(INPUT_POST, 'answer1');
            $answer2 = filter_input(INPUT_POST, 'answer2');
            $answer3 = filter_input(INPUT_POST, 'answer3');
            $answer4 = filter_input(INPUT_POST, 'answer4');
            $btnSubmit = filter_input(INPUT_POST, 'submit');
            $student_number = $_SESSION['STUDENT NUMBER'];
            

            if(isset($btnSubmit)){
                $sql = "UPDATE answer_script
                        SET Question_1 = '$answer1',Question_2 = '$answer2',Question_3 = '$answer3',Question_4 = '$answer4'
                        WHERE Student_Number = '$student_number' "; 
                $save = $db->query($sql);

                if($save){
                    header("Location: Confirm.php?=Exam answers successfully uploaded");

                } else {
                    header("Location: examination.php?=Theres_been_an_Error in submiting Exam answers Not uploaded");
                }
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 



            } 
           
////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////
$btnCancel = filter_input(INPUT_POST, 'cancel');
if(isset($btnCancel)){
    header("Location: myExam.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examination</title>
    <link rel="stylesheet" href="weiv2.css">
</head>
<body>
<div class="wrapper">
    <p id="welcome" style="text-align: center;">Examination for: <?=$_SESSION['STUDENT NAME']?><p>

    <div class="time">
        <h2 style="text-align: center;">Online Exam (Time Left):</h2>
        <div class="timer">
        <p style="text-align: center;"><span id="hour">0</span> : <span id="minute">0</span> : <span id="second">0</span></p>
        </div>
    </div>

<form action="examination.php" method="post">
        <?php
        //this part is the part that displays the examination questions

            $begin = filter_input(INPUT_POST, 'begin');
            $module_code = filter_input(INPUT_POST, 'module_code');

            if(isset($begin)){

                

            ///////////////////////////////////////////////////////////////////////////////////////////////////////////
                $sql1 = "SELECT Module_Code, number_of_Questions , question_1, question_2, question_3, question_4 FROM questions
                         WHERE Module_Code ='$module_code' ";
                $display1 = $db->query($sql1);

                    foreach($display1 as $des){         
                        echo '<p>Answer: ' . $des['number_of_Questions'] . ' of 4 Questions</p>
                           <h2>' . $des['Module_Code'] . ' Examination</h2>    
                        <p><br> Question 1 <br><br>' . $des['question_1'] .'</p>
                        <textarea name="answer1" id="answer" cols="60" rows="10"></textarea> 
                
                        <p><br> Question 2 <br><br>' . $des['question_2'] . '</p>
                        <textarea name="answer2" id="answer" cols="60" rows="10"></textarea>
                
                        <p><br>Question 3 <br><br>' . $des['question_3'] . '</p>
                        <textarea name="answer3" id="answer" cols="60" rows="10"></textarea> 
                
                        <p><br>Question 4 <br><br>' . $des['question_4'] . '</p>
                        <textarea name="answer4" id="answer" cols="60" rows="10"></textarea>';
                            
                    }   

                    
               
            }

            //this part is the one that stores the student number, date 
            $preBegin = filter_input(INPUT_POST, 'preBegin');
            if(isset($preBegin)){
                $insert = "INSERT INTO answer_script (Student_Number,Module_Code)
                           VALUES ('$student_number','$module_code')";
                $insert1 = $db->query($insert);
                if($insert1){
                   header("Location: myExam.php?=Exam Starting");
                } else {
                   header("Location: myExam.php?=Free mode gang");
                }

            }

            
        ?>
            <br><br><input type="submit" id="btn-press" value="Submit " name="submit">
            <input type="submit" id="btn-press" value="Cancel" name="cancel">
</form>
        <div class="footer">
            <footer>
                <p style="text-align: center;">Copyright &copy; 2021 Gift Sekhosana</p>
            </footer>
        </div>
        </div>
 <script src="countdown.js"></script>
</body>
</html>
<?php
} else {
    header("Location: login.php");
}