<?php
session_start(); 
include('database.php');
//include('code.php');
if(!isset($_SESSION['Email'])){
//////////////////////////////////////////////////////////////
$btnBack = filter_input(INPUT_POST, 'back');
if(isset($btnBack)){
    header("Location: startExam.php");
}
//////////////////////////////////////////////////////////////
    $query = "SELECT Module_Code FROM questions";
    $result1 = $db->query($query);

////////////////////////////////////////////////////////////



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNISA myExam</title>
    <link rel="stylesheet" href="weiv1.css">
</head>
<body>
<div class="wrapper">
    <form action="myExam.php" method="post">
            <h1>UNISA EXAM PORTAL</h1>
            <div id="text">
            <p>Select a Module Code</p>
            <li>Click on the "Pre-Select" Button to choose a module code to write.</li>
            <li>Click on the "Begin" Button to be directed to the Exam Schedue for exam date.</li>
            </div>
             
            <select class="mod-Select" name="module_code">  
                <option value="NULL">----SELECT MODULE CODE----</option>
                <?php foreach($result1 as $result) {?>
                    <option value="<?php echo $result['Module_Code'];?>"><?php echo $result['Module_Code'];?></option>
                <?php } ?>
            </select> <br><br>
            <input type="submit" id="btn-press" value="Pre Select" name="preBegin">
            <input type="submit" id="btn-press" value="Begin" name="begin" ><br>
            <input type="submit" id="btn-cancel" value="Cancel" name="back">
    </form>

    <div class="footer">
        <footer>
            <p style="text-align: center;">Copyright &copy; 2021 Gift Sekhosana</p>
        </footer>
    </div>
</div>
</body>
</html>
<?php
} else {
    header("Location: login.php");
}












































































