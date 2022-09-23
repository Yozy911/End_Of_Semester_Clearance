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
    <title>Admin Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <input type="button" class="btn btn-danger btn-sm" style="margin-left: 10px;" value="Sign Out" onclick="window.location='http://localhost/clearance/logout.php';">

    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to the Dean of Students' clearance dashboard.</h1>
    

<div class="center">
    <h1>Clearance Queue</h1>

    <table id = "users" class="table table-bordered table-hover">'
        <tr>
            <th>Student Number</th>
            <th>Library</th>
            <th>Accounts</th>
            <th>Accommodation</th>
            <th>Action</th>
        </tr>

        <?php
            $query = "SELECT * FROM out_queue";
            $result = mysqli_query($link, $query);
            while($row = mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['libraryStatus'];?></td>
            <td><?php echo $row['accountsStatus'];?></td>
            <td><?php echo $row['accomodationStatus'];?></td>
            <td>
                <form action ="accountsWelcome.php" method ="POST">
                    <input type = "hidden" name  ="id" value = "<?php echo $row['student_Num'];?>"/>
                    <input type = "submit" name  ="approve" value = "Approve"/>
                    <input type = "submit" name  ="deny" value = "Deny"/>
                </form>
            </td>
        </tr>
    </table>

    <?php
            }
            ?>
</div>

<?php

if(isset($_POST['approve'])){
    $id = $_POST['student_Num'];

    $select = "UPDATE out_queue SET deanStatus = 'approved' WHERE id = '$id'";
    $result = mysqli_query($link, $select);

    echo '<script type = "text/javascript">';
    echo 'alert("User Approved!");';
    echo 'window.location.href = "deanWelcome.php"';
    echo '</script>';
}

if(isset($_POST['deny'])){
    $id = $_POST['student_Num'];

    $select1 = "UPDATE out_queue SET deanStatus = 'denied' WHERE id = '$id'";
    $result1 = mysqli_query($link, $select1);

    $select = "DELETE FROM out_queue WHERE id = '$id'";
    $result = mysqli_query($link, $select);

    echo '<script type = "text/javascript">';
    echo 'alert("User Denied!");';
    echo 'window.location.href = "deanWelcome.php"';
    echo '</script>';
}
?>

</body>
</html>