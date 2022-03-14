<?php
session_start(); 
include('database.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
///////////////////////////////////////////////////////////////////////////////////
if(!isset($_SESSION['Email'])){
/*Extracts information saved on the database about a student who just completed an exam*/

$sql = "SELECT * FROM questions q, answer_script a  
        WHERE q.Module_Code = a.Module_Code LIMIT 1";
$sql1 = $db->query($sql);

$student = $_SESSION['STUDENT NUMBER'];
$sql2 = "SELECT * FROM answer_script a, questions q
         WHERE a.Student_Number = '$student' AND a.Module_Code = q.Module_Code LIMIT 2,1";
$sql3 = $db->query($sql2);

//////////////////////////////////////////////////////////////////////////////////////

/*After clicking the confirm button the student will recieve a confirmation email
  which is activated when the student press the confirm button email */

$confirmation = filter_input(INPUT_POST, 'confirmation');
$done = filter_input(INPUT_POST, 'done');
$student = filter_input(INPUT_POST, 'student');
$confirm = filter_input(INPUT_POST, 'confirm');

if(isset($confirm)){

    require_once 'PHPMailer.php';
    require_once 'SMTP.php';
    require_once 'Exception.php';

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "skhosanamthokozisi546@gmail.com";
    $mail->Password = "Mthoko1227+";
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    $mail->isHTML(true);
    $mail->setFrom("examDepartment@example.com', 'exam department");
    $mail->addAddress("skhosanamthokozisi546@gmail.com");
    $mail->Subject = "Confirmation Email";
    $mail->Body = "THANK YOU!!! Your Exam has been submitted successfully" ;

    if($mail->send()){
        $status = "success";
        $response = "Email is sent";
    } else {
        $status = "failed";
        $response = "Something is wrong: <br>" . $mail->ErrorInfo;
    }

    //exit(json_encode(array("status" => $status, "response" => $response)));    

    header("Location: login.php");
}

$back = filter_input(INPUT_POST, 'back');
if(isset($back)){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="confirm.php" method="post"  id="confirm_form">
          <h4 id="done" name="done">THANK YOU!!! Your Exam has been submitted successfully</h4>
          <h5 class="sent-notification"></h5>
          <p id="welcome" name="student">Student: <?=$_SESSION['STUDENT NAME'] . " (" . $_SESSION['STUDENT NUMBER'] . ")"?><p>
          
          <div id="confirmation" name="confirmation">
        <?php

          foreach($sql1 as $sq){
              echo '<p id="confirmation" name="confirmation">Exam Due Date: ' . $sq['Exam_date'] . '</p><br>';
          }
         

          
          foreach($sql3 as $sq){
            echo '<p id="confirmation" name="confirmation">Submission Date: ' . $sq['submission_date'] . '<br>
                  Module Code: ' . $sq['Module_Code'] . '</p><br>';
        }

        ?>
        </div>
         <p>click confirm in order to recieve a confimation email </p>
          <input type="submit" value="Confirm" name="confirm"> <input type="submit" value="back" name="back">
    </form>
    <?php 
    include('footer.php');
    ?>

    <script type="text/javascript">
    
    function sendEmail(){
        var confirmation = $("#confirmation");
        var done = $("#done");

        if(isNotEmpty(confirmation) && isNotEmpty(done)){
           $.ajax({
               url: 'confirm.php',
               method: 'POST',
               dataType: 'json',
               data:{
                   done: done.val(),
                   confirmation: confirmation.val(),
               }, success: function(response){
                   $('#confirm_form')[0].reset();
                   $('.sent-notification').text("Message sent successfully.");
               }
           })           
        }
    }
    function isNotEmpty(caller){
        if(caller.val() == ""){
            caller.css('border','1px solid red');
            return false;
        }
        else
        {
            caller.css('border', '');
            return true;
        }
    }
    </script>
</body>
</html>
<?php
} else {
    header("Location: login.php");
}