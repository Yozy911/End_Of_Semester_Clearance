<?php
include 'db.php';
// Initialize the session

session_start();
$username = $_SESSION['username'];



?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accounts Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <input type="button" class="btn btn-danger btn-sm" style="margin-left: 10px;" value="Sign Out" onclick="window.location='http://localhost/clearance/logout.php';">

    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to the Accounts clearance dashboard.</h1>
    

<div class="center">
    <h1>Clearance Queue</h1>

    <table id = "users" class="table table-bordered table-hover">'
        <tr>
            <th>Student Number</th>
            <th>Name</th>
            <th>Current Balance</th>
            <th>Action</th>
        </tr>

        <?php
            $query = "SELECT * FROM accounts";
            $result = mysqli_query($link, $query);
            while($row = mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['Name'];?></td>
            <td><?php echo $row['Current_Balance'];?></td>
            <td>
                
              <a href="accountsApprove.php?id=<?php echo $row['id'];?>" class="btn btn-warning ">Approve</a>  
               <a href="accountsDeny.php?id=<?php echo $row['id'];?>" class="btn btn-danger ">Deny</a>  
            </td>
        </tr>
    </table>

    <?php
            }
            ?>
</div>


</body>
</html>