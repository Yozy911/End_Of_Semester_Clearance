 <?php
 include 'db.php';
 session_start();
$username1 = $_SESSION['username'];
$id1 = $_SESSION['id'];
$page = $_SERVER['PHP_SELF'];
$sec = "10";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    <title>Student Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>

    <input type="button" class="btn btn-danger btn-sm" style="margin-left: 10px;" value="Sign Out" onclick="window.location='http://localhost/clearance/logout.php';">

    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to your clearance progress page.</h1>
   
     <div class="center">
    <h1>Clearance Report</h1>

    <table id = "users" class="table table-bordered table-hover">'

        <?php
            $query = "SELECT * FROM out_queue where id = '$id1'";
            $result = mysqli_query($link, $query);
            while($row = mysqli_fetch_array($result)){
        ?>
        <tr  class="table-primary">
            <td><?php echo $row['libraryStatus'];?></td>
            <td><?php echo $row['accountsStatus'];?></td>
            <td><?php echo $row['accomodationStatus'];?></td>
            </td>
        </tr>
<?php 
            }
            ?>
    </table>
<button class="btn btn-success btn-sm" onClick="window.print()">Print</button>
    
</div>
</html>
