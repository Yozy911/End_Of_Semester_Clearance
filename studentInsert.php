<?php
// Initialize the session
session_start();
$username = $_SESSION['username'];
$studentNum = $_SESSION['id'];

include 'db.php';

//status of clearance in accommodation office
    $accommodationStatusPending = "The accommodation office is still processing your clearance, please wait!";

//status of clearance in accounts office
    $accountsStatusPending = "The accounts office is still processing your clearance, please wait!";

//status of clearance in the library
    $libraryStatusPending = "The library is still processing your clearance, please wait!";
   
    $select = mysqli_query($link, "SELECT * FROM tbl_users WHERE id = '$studentNum'");
    $users = mysqli_fetch_array($select);

    $room = $users['password'];
    


    $sql0 = "INSERT INTO `out_queue`(`id`, `libraryStatus`, `accountsStatus`, `accomodationStatus`) VALUES ('$studentNum','$libraryStatusPending','$accountsStatusPending','$accommodationStatusPending')";
    $val0 = $link->query($sql0);

    $sql1 ="INSERT INTO queue(id, Name, Room) VALUES ('$studentNum', '$username', '$room')";
     $val1 = $link->query($sql1);

    $sql2 = "INSERT INTO `library`( `student_Num`, `borrowed_items`, `returned_items`) VALUES ('$studentNum','0','0')";
    $val2 = $link->query($sql2);

    $sql3 = "INSERT INTO `accounts`( `id`, `Name`, `Current_Balance`) VALUES ('$studentNum','$username','0')";
    $val3 = $link->query($sql3);

    
 	if($val0){
        session_start();
        $username1 = $users['username'];
        $_SESSION['username'] =  $username1;

        $id1 = $users['id'];
        $_SESSION['id'] =  $id1;
      echo '<script type = "text/javascript">';
    echo 'alert("Clearance Form Submitted!");';
    echo 'window.location.href = "studentWelcome.php"';
    echo '</script>';
                } else {
                    echo "Error: " . $sql0 . "<br>" . $link->error;
                }
  
?>
