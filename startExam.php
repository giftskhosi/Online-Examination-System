<?php
    session_start(); 
    include('database.php');
   

    $query = "SELECT Module_Code FROM questions";
    $result1 = $db->query($query);
   ///////////////////////////////////////////////////////////////////////////
   $error = "Please tick on the plage";
   //////////////////////////////////////////////////////////////////////
    $btnstart = filter_input(INPUT_POST, 'start');
 

    
    ///////////////////////////////////////////////
    $btnBack = filter_input(INPUT_POST, 'back');
    if(isset($btnBack)){
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNISA EXAM PORTAL</title>
    <link rel="stylesheet" href="weiv.css">
</head>
<body>
    <div class="wrapper">
        <ul class="nav">
            <li><a href="logout.php">Logout</a></li>
            </ul>

        <h1>UNISA EXAMINATION PORTAL</h1>
        <h3>Declaration page</h3>
        
        <form action="startExam.php" method="post">
             <div class="instructions">
               <p>Once you click "Begin Exam" you will have 2 hours to complete this assessment.
                  <br>It will be submitted at that time, regardless of whether you have answered all the questions.  
                  <br>You can submit this assessment only TWICE. Answers from this attempt will
                  <br>replace all previous answers submitted. Your highest score will be recorded.</p>
             </div><br>
                <?php
                if(isset($btnstart)){
                    $declaration = filter_input(INPUT_POST, 'declaration'); 
                    
                    if($declaration !== NULL){
                        header("Location: myExam.php?=Pick_a_module");
                    } else {
                        echo "<p id='error'>" . $error . "</p>";

                    }   
                }
                ?>
                 <input type="checkbox" name="declaration" id="declaration"> Honor Pledge: I will neither give nor recieve aid on this assessment.
                <br>
                
            
                <input type="submit" id="btn-press" value="Begin Exam" name="start">
                <input type="submit" id="btn-press" value="Cancel" name="back">
        </form>
        <div class="footer">
            <footer>
                <p style="text-align: center;">Copyright &copy; 2021 Gift Sekhosana</p>
            </footer>
        </div>
    </div>

    
</body>
</html>