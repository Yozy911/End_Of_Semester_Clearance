<?php
// Include config file
require_once "db.php";

// Initialize the session

 session_start();

$id = $_SESSION['id'];

 
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        } else {
            $new_pwd = $new_password;
            $sql = "UPDATE tbl_users SET password = $new_pwd WHERE id = $id";
            $rows = $link->query($sql);
            /*$row= $rows->fetch_assoc();*/
            if($rows){
                 echo '<script type = "text/javascript">';
    echo 'alert("Password Has Been Successfully Reset!");';
    echo 'window.location.href = "adminWelcome.php"';
    echo '</script>';
            }else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
    }
}
        
    /*// Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        

               
                
                exit();
            } 

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}*/
?>