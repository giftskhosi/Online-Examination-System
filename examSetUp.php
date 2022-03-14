<?php 
$timeStamp = mktime(0, 0, 0, 1, 10, 2013);
echo '<br>Timestamp for 10 January 2013 at midnight: ', $timeStamp;
echo '<br>Date of Timestamp: ', date('l, d F Y', $timeStamp);
?>
