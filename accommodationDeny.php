<?php
  include 'db.php'; 
    $id = (int)$_GET['id'];
    $accommodationStatusDenied = "Your clearance has been denied by accommodation office, please follow up the issue physically!";
 $select = "DELETE FROM queue WHERE id = '$id'";
 $select1 = "UPDATE out_queue SET accomodationStatus = '$accommodationStatusDenied' WHERE id = '$id'";
    $result = mysqli_query($link, $select);
    $result1 = mysqli_query($link, $select1);
    if($result1){

    echo '<script type = "text/javascript">';
    echo 'alert("User Denied!");';
    echo 'window.location.href = "accountsWelcome.php"';
    echo '</script>';
}
 ?>