<?php
  include 'db.php'; 
    $id = (int)$_GET['id'];

     $libraryStatusApproved = "Your have been cleared by the library.";
   
    
 $select = "DELETE FROM `library` WHERE student_Num = '$id'";
 $select1 = "UPDATE out_queue SET libraryStatus = '$libraryStatusApproved' WHERE id = '$id'";
    $result = mysqli_query($link, $select);
    $result1 = mysqli_query($link, $select1);
    if($result1){

    echo '<script type = "text/javascript">';
    echo 'alert("User Approved!");';
    echo 'window.location.href = "libraryWelcome.php"';
    echo '</script>';
}
 ?>