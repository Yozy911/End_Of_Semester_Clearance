<?php
  include 'db.php'; 
    $id = (int)$_GET['id'];
     $accountsStatusDenied = "Your clearance has been denied by accounts office, please follow up the issue physically!";
 $select = "DELETE FROM accounts WHERE id = '$id'";
 $select1 = "UPDATE out_queue SET accountsStatus = ' $accountsStatusDenied' WHERE id = '$id'";
    $result = mysqli_query($link, $select);
    $result1 = mysqli_query($link, $select1);
    if($result1){

    echo '<script type = "text/javascript">';
    echo 'alert("User Denied!");';
    echo 'window.location.href = "accountsWelcome.php"';
    echo '</script>';
}
 ?>