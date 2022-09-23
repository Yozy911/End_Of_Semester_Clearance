<?php
  include 'db.php'; 
    $id = (int)$_GET['id'];
    
    $accommodationStatusApproved = "Your have been cleared by the accommodation office.";
    
 $select = "DELETE FROM queue WHERE id = '$id'";
 $select1 = "UPDATE out_queue SET accomodationStatus = '$accommodationStatusApproved' WHERE id = '$id'";
    $result = mysqli_query($link, $select);
    $result1 = mysqli_query($link, $select1);
    if($result1){

    echo '<script type = "text/javascript">';
    echo 'alert("User Approved!");';
    echo 'window.location.href = "accommodationWelcome.php"';
    echo '</script>';
}
 ?>