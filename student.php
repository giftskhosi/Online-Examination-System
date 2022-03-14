<?php 
include('database.php');

if(isset($_POST['StudentEmail']) && isset($_POST['password'])){
    $student_email = filter_input(INPUT_POST, 'StudentEmail');
    $student_password = filter_input(INPUT_POST, 'password');
    
    if(empty($student_email)){
        header("Location: login.php?error=Email is required");
    } else if (empty($student_password)){
        header("Location: login.php?error=Password is required&email=$student_email");
    } else {
        $stmt1 = $db->prepare("SELECT * FROM student WHERE Email = '$student_email' LIMIT 1");
        $stmt1->execute([$student_email]);

        if ($stmt1->rowCount() == 1){
            $user1 = $stmt1->fetch();

            $student_number = $user1['STUDENT NUMBER'];
            $email = $user1['Email'];
            $student_name = $user1['STUDENT NAME'];
            $student_surname = $user1['STUDENT SURNAME'];

            if($student_email === $email){
                $_SESSION['STUDENT NUMBER'] = $student_number;
                $_SESSION['STUDENT NAME'] = $student_name;
                $_SESSION['STUDENT SURNAME'] = $student_surname;
                $_SESSION['Email'] = $stud_email;
                
                header("Location: index.php");
            } else {
                header("Location: login.php?error=Incorrect User name or Password");
            }
        } else {
            header("Location: login.php?error=Incorrect User name or Password");
        }
    } 
}

?>
