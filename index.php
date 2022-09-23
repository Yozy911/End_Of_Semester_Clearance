<?php
session_start();
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel ="stylesheet" type ="text/css" href = "main.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <title>Login</title>
    </head>
    <body onload="template()" style="background-image: url('user-background.jpg'); background-size: cover; ">
        <div class="container d-flex justify-content-center align-items-center"
            style="min-height: 100vh">
            <form class="border shadow p-3 rounded"
                action="index.php"
                method="POST"
                style="width: 450px; background-color: white;">
                <h1 class="text-center p-3">Mulungushi University Clearance</h1>
                
                <div class="mb-3">
                    <label for="email"
                    class="form-label">Email / Student Number</label>
                    <input type="text"
                    class="form-control"
                    name="email"
                    required />
                </div>
                <div class="mb-3">
                    <label for="password"
                    class="form-label">Password / Room Number</label>
                    <input type="password"
                    name="password"
                    class="form-control"
                    required>
                </div>
                
                <input type ="submit" name ="login" value = "Login"
                class="btn btn-success" />
                <!-- <a href = "register.php">Register here</a>
 -->            </form>
        </div>

        <?php

        if(isset($_POST['login'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $select = mysqli_query($link, "SELECT * FROM tbl_users WHERE email_address = '$email' AND password = '$password'");
        $row = mysqli_fetch_array($select);
        $status =$row['status'];

        $select2 = mysqli_query($link, "SELECT * FROM tbl_users WHERE email_address = '$email' AND password = '$password'");
        $check_user=mysqli_num_rows($select2);

        $select3 = mysqli_query($link, "SELECT * FROM tbl_users WHERE id = '$email'");
        $row1 = mysqli_fetch_array($select3);
        $check_user1=mysqli_num_rows($select3);
        if($check_user1==1){
        $_SESSION["status"]=$row1['status'];
        $_SESSION["email"]=$row1['id'];
        $_SESSION["password"]=$row1['password'];

        if($_SESSION["status"]=="student"){

        session_start();
        $username = $row1['username'];
        $_SESSION['username'] =  $username;

        $studentNum = $row1['id'];
        $_SESSION['id'] =  $studentNum;
       
        echo '<script type  = "text/javascript">';
        echo 'alert("Log in Success!!");';
        echo 'window.location.href = "studentInsert.php"';
        echo '</script>';
        }
    }

        if($check_user==1){
        $_SESSION["status"]=$row['status'];
        $_SESSION["email"]=$row['email_address'];
        $_SESSION["password"]=$row['password'];

        if($status=="admin"){
            session_start();
            $username = $row['username'];
        $_SESSION['username'] =  $username;
        echo '<script type  = "text/javascript">';
        echo 'alert("Login Success!");';
        echo 'window.location.href = "adminWelcome.php"';
        echo '</script>';
        }
        elseif ($status=="accounts"){
            session_start();
            $username = $row['username'];
        $_SESSION['username'] =  $username;
        echo '<script type  = "text/javascript">';
        echo 'alert("Login Success!");';
        echo 'window.location.href = "accountswelcome.php"';
        echo '</script>';
        }
        elseif  ($status=="library"){
            session_start();
            $username = $row['username'];
        $_SESSION['username'] =  $username;
        echo '<script type  = "text/javascript">';
        echo 'alert("Login Success!");';
        echo 'window.location.href = "libraryWelcome.php"';
        echo '</script>';
        }
        elseif ($status=="accomodation"){
            session_start();
            $username = $row['username'];
        $_SESSION['username'] =  $username;
        echo '<script type  = "text/javascript">';
        echo 'alert("Login Success!");';
        echo 'window.location.href = "accommodationWelcome.php"';
        echo '</script>';
        }
         /*elseif ($status=="Dean of Students"){
            session_start();
            $username = $row['username'];
        $_SESSION['username'] =  $username;
        echo '<script type  = "text/javascript">';
        echo 'alert("Login Success!");';
        echo 'window.location.href = "deanWelcome.php"';
        echo '</script>';
        }
        elseif($status=="pending"){
        echo '<script type  = "text/javascript">';
        echo 'alert("Your account is still pending for approval!");';
        echo 'window.location.href = "index.php"';
        echo '</script>';
        }*/else{
        echo "Incorrect email or password!";
        }
        }
        }


        
        ?>
    </body>
</html>