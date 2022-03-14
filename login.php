<?php 
session_start();
include('database.php');
include('admin.php');
include('student.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNISA exam portal</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
<div class="container">
     <div class="title-text">
            <div class="title login">
               UNISA Exam Portal(Student)
            </div>
            <div class="title signup">
               UNISA Exam Portal(Admin)
            </div>
        </div> 
    <div class="form-container">
           <div class="slide-controls">
                <input type="radio" name="slide" id="login" checked>
                <input type="radio" name="slide" id="signup" >
                <label for="login" class="slide login">Student</label>
                <label for="signup" class="slide signup">Admin</label>
                <div class="slider-tab"></div>
            </div>
          <div class="form-inner">

          <form action="login.php" method="POST" class="login">
          <h1>Login Page</h1> 
              <div class="input-login">
             <label for="email">Email</label>
             <input type="email" name="StudentEmail" id="email_login" class="form_input" placeholder="Enter Email Address" ></br>
             <label for="password">Password</label>
             <input type="password" name="password" id="password_login" class="form_input" placeholder="Enter Your Password"></br>
             </div>
             <div class="buttons-login">
             <input type="submit" value="Login" id="btnLogin">
             </div>
          </form>

          
          <form action="login.php" method="POST" class="adminLogin">
          <h1>Login Page</h1>
          <div class="input-login">
             <label for="email">Email</label>
             <input type="email" name="lectureEmail" id="email_admin" class="form_input" placeholder="Enter Email Address"></br>
             <label for="password">Password</label>
             <input type="password" name="adminPassword" id="password_admin" class="form_input" placeholder="Enter Your Password"></br>
             </div>
             <div class="buttons-login">
             <input type="submit" name="btnLogin" value="Login" id="btnAdminLogin">
             </div>
                </form>
          </div>
        </div>
        
    </div>
    <script src="script.js"></script>


</body>
</html>