<?php
    session_start(); 
    include('database.php');
    include('code.php');

    $btnBack = filter_input(INPUT_POST, 'back');
    if(isset($btnBack)){
        header("Location: lecture.php");
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Questions</title>
    <link rel="stylesheet" href="weiv2.css">
    <style>
     
    </style>
</head>
<body>
    <div class="wrapper">
      <h1>UNISA EXAM PORTAL</h1>
        <h2>Add Examination question</h2>
            <div class="question-input" >
                <form action="" method="post">
                    <label>lectureID:</label> <input type="text" name="lectureID" id="text-input"><br>
                    <label>Module Code:</label> <input type="text" name="module" id="text-input"><br>
                    <label>Number of Questions:</label> <input type="number" name="numberOfQuestions" id="text-input"><br>
                    <label>Exam Date:</label> <input type="datetime-local" name="exam_date" id="text-input"><br>
                    <label>Stop Time:</label> <input type="time" name="stop_exam_time" id="text-input"><br>   
                    <label>Duration:</label> <input type="time" name="duration" id="text-input"><br>
                    <br><br>
                    <label>Question 1:</label> <br>
                    <textarea name="question_1" id="question" cols="50" rows="5"></textarea><br><br>
                   
                    <label>Question 2:</label> <br>
                    <textarea name="question_2" id="question" cols="50" rows="5"></textarea><br><br>
                    
                    <label>Question 3:</label> <br>
                    <textarea name="question_3" id="question" cols="50" rows="5"></textarea><br><br>
                    
                    <label>Question 4:</label> <br>
                    <textarea name="question_4" id="question" cols="50" rows="5"></textarea><br><br>
                    
                    
                    <input type="submit" id="btn-press" value="Upload" name="upload">
                    <input type="submit" id="btn-press" value="Back" name="back"> 
                    
                </form>
            </div>
            <?php 
    include('footer.php');
    ?>
    </div>

    
</body>
</html>