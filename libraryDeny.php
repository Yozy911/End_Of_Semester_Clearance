<?php
  include 'db.php'; 
    $id = (int)$_GET['id'];
     $libraryStatusDenied = "Your clearance has been denied by the library, please follow up the issue physically.";
 $select = "DELETE FROM library WHERE student_Num = '$id'";
 $select1 = "UPDATE out_queue SET libraryStatus = '$libraryStatusDenied' WHERE id = '$id'";
    $result = mysqli_query($link, $select);
    $result1 = mysqli_query($link, $select1);
    if($result1){

    echo '<script type = "text/javascript">';
    echo 'alert("User Denied!");';
    echo 'window.location.href = "libraryWelcome.php"';
    echo '</script>';
}
 ?>