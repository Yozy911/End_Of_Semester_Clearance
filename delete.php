<?php
  include 'db.php'; 
    $id = (int)$_GET['id'];
    
 $select = "DELETE FROM tbl_users WHERE id = '$id'";
    $result = mysqli_query($link, $select);

    echo '<script type = "text/javascript">';
    echo 'alert("User Deleted!");';
    echo 'window.location.href = "adminWelcome.php"';
    echo '</script>';
 ?>