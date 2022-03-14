<?php 

include('database.php');

if(isset($_POST['lectureEmail']) && isset($_POST['adminPassword'])){
    $lecture_email = filter_input(INPUT_POST, 'lectureEmail');
    $lecture_password = filter_input(INPUT_POST, 'adminPassword');
    
    if(empty($lecture_email)){
        header("Location: login.php?error=Email is required");
    } else if (empty($lecture_password)){
        header("Location: login.php?error=Password is required&email=$lecture_email");
    } else {
        $stmt = $db->prepare("SELECT * FROM lecture WHERE lectureEmail = '$lecture_email' LIMIT 1");
        $stmt->execute([$lecture_email]);

        if ($stmt->rowCount() == 1){
            $user = $stmt->fetch();

            $lecture_id = $user['lectureID'];
            $admin_email = $user['lectureEmail'];
            $lecture_name = $user['lectureName'];

            if($lecture_email === $admin_email){
                $_SESSION['lectureID'] = $lecture_id;
                $_SESSION['lectureName'] = $lecture_name;

                header("Location: lecture.php");
            } else {
                header("Location: login.php?error=Incorrect User name or Password");
            }
        } else {
            header("Location: login.php?error=Incorrect User name or Password");
        }
    } 
}

 

?>
<?php
// if($_SERVER['REQUEST_METHOD'] == "POST"){
//     $lecture_email = filter_input(INPUT_POST, 'lectureEmail');
//     $lecture_password = filter_input(INPUT_POST, 'adminPassword');

//     if(!empty($lecture_email) && !empty($lecture_password)){
//         $query = "SELECT * FROM lecture WHERE lectureEmail = '$lecture_email' LIMIT 1";
//         $result = $db->query($query);

//         if($result){
//             header("Location: lecture.php");
//             die;
//         } else {
//             echo "Please Enter correct credentials";
//         }   
//     }
    
// }
?>