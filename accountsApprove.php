<?php
  include 'db.php'; 
    $id = (int)$_GET['id'];
     $accountsStatusApproved = "Your have been cleared by the accounts office.";
   
 $select = "DELETE FROM accounts WHERE id = '$id'";
 $select1 = "UPDATE out_queue SET accountsStatus = '$accountsStatusApproved' WHERE id = '$id'";
    $result = mysqli_query($link, $select);
    $result1 = mysqli_query($link, $select1);
    if($result1){

    echo '<script type = "text/javascript">';
    echo 'alert("User Approved!");';
    echo 'window.location.href = "accountsWelcome.php"';
    echo '</script>';
}
 ?>