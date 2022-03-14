<?php 
    include('database.php');

    
    /////////////////////////////////////////////////////exam.php
    $query = "SELECT Module_Code FROM questions";
    $result1 = $db->query($query);
   
    $btnstart = filter_input(INPUT_POST, 'start');
 

    if(isset($btnstart)){
        $Module_code = filter_input(INPUT_POST, 'module_code');
        $declaration = filter_input(INPUT_POST, 'declaration'); 

            if($Module_code !== NULL && $declaration !== NULL){
                header("Location: myExam.php");
            } else {
                header("Location: exam.php?=Click on the honor pledge or select module code");
            }
        
    }

    ////////////////////////////////////////////////questions.php
    $lectureID = filter_input(INPUT_POST, 'lectureID');
    $module_code = filter_input(INPUT_POST, 'module');
    $number_of_Questions = filter_input(INPUT_POST, 'numberOfQuestions');
    $examDate = filter_input(INPUT_POST, 'exam_date');
    $stopTime = filter_input(INPUT_POST, 'stop_exam_time');
    $duration = filter_input(INPUT_POST, 'duration');
    $question1 = filter_input(INPUT_POST, 'question_1');
    $question2 = filter_input(INPUT_POST, 'question_2');
    $question3 = filter_input(INPUT_POST, 'question_3');
    $question4 = filter_input(INPUT_POST, 'question_4');
    $btnUpload = filter_input(INPUT_POST, 'upload');
    if(isset($btnUpload)){
        $sql = "INSERT INTO questions (lectureID,Module_Code,number_of_Questions,Exam_date,stop_exam_time,Duration,question_1,question_2,question_3,question_4)
                VALUES ('$lectureID','$module_code','$number_of_Questions','$examDate','$stopTime','$duration','$question1','$question2','$question3','$question4')";
        $display = $db->query($sql);

        if($display){
            echo "<p>Questions successfully uploaded!!!</p>";
            header("Location: questions.php?=Questions successfully uploaded");
        } else {
            echo "<p>Questions Not uploaded!!!</p>";
            header("Location: questions.php?=Questions Not uploaded");
        }
    }

    

    



    