<?php 
include('database.php');

$sql = "SELECT `Date of the exam`,`MODULE CODE` FROM `exam-info`
        WHERE `Date of the exam` = '2021-03-01' 
        ORDER BY `exam-info`.`MODULE CODE` ASC";
$stores =$db->query($sql);

$sql1 = "SELECT `Date of the exam`,`MODULE CODE` FROM `exam-info`
        WHERE `Date of the exam` = '2021-03-01' 
        ORDER BY `exam-info`.`MODULE CODE` ASC";
$results =$db->query($sql1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNISA Exam Reports</title>

</head>
<body>
    <div class="container">
        <div class="header">
        <h1>Exam Reports</h1>
        </div>
      <form action="search.php" >
        <div class="search_input">
           <input type="search" name="search" id="search" placeholder="Search for report....">
           <input type="button" name="btnSeach" value="Search">
        </div><br>
      </form>

        <div class="choose_report">
        <form action="test.php" method="POST">
             <h2>Type of Report</h2>

           <select name="reportType">
              <option value="none"></option>
              <option value="Sreport1">Summary Report 1</option>
              <option value="Sreport2">Summary Report 2</option>
              <option value="Treport1">Trend Report 1</option>
              <option value="Treport2">Trend Report 2</option>
              <option value="Ereport">Exception Report </option>

              
              <input type="submit" name="generate" value="Generate">
           </select>

           <table align="center" border="1px" style="width:600px; line-hieght:50px">
                  <h2 align="center">The Number of Student Exam Submission for a Specific Day Summary Report</h2>
                      <h3 align="center">01 March 2021</h3>
                            <tr>
                               <th>Date of the exam</th>
                               <th>MODULE CODE</th>
                            </tr>
                            <?php foreach ($stores as $store){?>
                            <tr>
                                    <td><?php echo $store['Date of the exam']; ?></td>
                                    <td><?php echo $store['MODULE CODE']; ?></td>
                                  </tr>
                                  <?php } ?>
                            </table>

                            <?php
            $statement = filter_input(INPUT_POST, 'reportType');

               if($statement != NULL){
                  if($statement == "Sreport"){
                      echo '<table align="center" border="1px" style="width:600px; line-hieght:50px">
                            <h2 align="center">The Number of Student Exam Submission for a Specific Day Summary Report</h2>
                            <h3>01 March 2021</h3>
                            <tr>
                               <th>Date of the exam</th>
                               <th>MODULE CODE</th>
                            </tr>';
                            foreach($results as $result){
                            echo '<tr>
                                    <td>'. $result['Date of the exam']. '</td>
                                    <td>'. $result['MODULE CODE']. '</td>
                                  </tr>
                            </table>';
                            }
                  }
               }
            
         ?>

           </form>
        </div><br>
        <div class="logout">
           <input type="submit" name="btnLogout" value="Logout">
        </div>
    </div>
</body>
</html>