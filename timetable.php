<?php
session_start(); 
include('database.php');
////////////////////////////////////////////////////

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNISA EXAM Time Table</title>
    <link rel="stylesheet" href="crazy4.css">
</head>
<body>
    <div class="wrapper">
        <h1>UNISA EXAM Portal (Time Table)</h1>
       
       <form action="timetable.php" method="post">

       <div class="search_input">
            <input type="text" name="tSearch" id="tSearch" placeholder="Enter student number to search....">
            <input type="submit" value="Search" id="btn-press" name="search">
            <br><br><input type="submit" value="Back" id="btn-press" name="back"><br><br>
        <?php
            $tSearch = filter_input(INPUT_POST, 'tSearch');  //student will enter their student number or email address in this text box to search for their examination schedule
            $search = filter_input(INPUT_POST, 'search');
            $timetable = filter_input(INPUT_POST, 'timetable');
            $back = filter_input(INPUT_POST, 'back');

            if(isset($search)){
                $sql = "SELECT * FROM `schedule` WHERE Email LIKE '%$tSearch%'";
                $goto =$db->query($sql);

                if($tSearch){
                    echo '</br><table align="center" border="1px" style="width:700px; line-hieght:50px; float: left">
                            <h2 align="center"> </h2>
                            <tr>
                            <th>Email</th>
                            <th>MODULE CODE</th>
                            <th>Question Types</th>
                            <th>Date of the exam</th>
                            <th>Start time</th>
                            <th>End time</th>
                            </tr>';
                        foreach($goto as $go){

                        echo '<tr>
                                <td>'. $go['Email']. '</td>
                                <td>'. $go['Module_code']. '</td>
                                <td>'. $go['Question_Type']. '</td>
                                <td>'. $go['Date_of_the_exam']. '</td>
                                <td>'. $go['Start_time']. '</td>
                                <td>'. $go['Completion_time']. '</td>
                            </tr>';
                        }
                } else {
                    echo " Enter Valid information";
                }
        }

//////////////////////////////////////////////////////////////////////////back button funcionality/////////////////////////////////////////////
            if(isset($back)){
                header("Location: index.php");
              }

        ?>

        
        </div><br>
        </form>
        
  
    </div>


    
</body>
</html>