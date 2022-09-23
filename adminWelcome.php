<?php
// Initialize the session
session_start();
 
include 'db.php';

$username = $_SESSION['username'];


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
   
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to the Admin dashboard.</h1>
    <p>
        <a href="register.php" class="btn btn-success ">Add New User</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
         <a href="accountsWelcome.php" class="btn btn-warning ml-5">Accounts</a>
          <a href="accommodationWelcome.php" class="btn btn-success ml-5">Accommodation</a>
           <a href="libraryWelcome.php" class="btn btn-danger ml-5">Library</a>
            

           <h1>User Information</h1>
<div >
    

    </p>

    <table id = "users" class="table table-bordered table-hover">'
        '
        <tr>
            <th>id</th>
            <th>Username</th>
            <th>Email / Programme </th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php
            $query = "SELECT * FROM tbl_users";
            $result = mysqli_query($link, $query);
            while($row = mysqli_fetch_array($result)){
        ?>
        <tr  class="table-primary">
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['username'];?></td>
            <td><?php echo $row['email_address'];?></td>
            <td><?php echo $row['status'];?></td>
            <td>
                
              <a href="reset-password.php?id=<?php echo $row['id'];?>" class="btn btn-warning ">Reset Password</a>  
               <a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger ">Delete</a>  
            </td>
        </tr>
<?php 
            }
            ?>
    </table>
    </div>

<?php

if(isset($_POST['Reset Password'])){
  
    header("location: reset-password.php");
    
}

if(isset($_POST['Delete User'])){
        session_start();

        $id = $row['id'];
        $_SESSION['id'] =  $id;
        header("location: delete.php");
}
?>

</body>
</html>