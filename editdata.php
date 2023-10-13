<?php
include 'connect.php';
// session_start();
// $lonch_id=$_SESSION['editdata'];
$lonch_id = $_GET['editdata'];
$sql="select * from `data` where lonch_id=$lonch_id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);


$lonch_id=$row['lonch_id'];
$from=$row['from'];
$to=$row['to'];
$date=$row['date'];

if (isset($_POST["update"])) {
    $lonch_id = $_POST["lonch_id"];
    $from = $_POST["from"];
    $to = $_POST["to"];
    $date = $_POST["date"];

    $sql = "UPDATE `data` set`lonch_id`='$lonch_id',`from`='$from',`to`='$to',`date`='$date'
    where lonch_id=$lonch_id";
    $result = mysqli_query($con, $sql);

    if ($result) {
     header("location: home.php");
    } else {
        die(mysqli_error($con));
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="editStyle.css">
    <title>Update here</title>
</head>

<body>
<img  src="img/lonchedit.jpg" height="680" width="1250">
<div class="main">
        <div class="register">
            <h2> Update Here</h2>
            <form id="register" method="POST">
                <label>Lonch Id:</label>
                <br>
                 <input type ="text"  name="lonch_id" id="name"
                 autocomplete="off" value=<?php echo $lonch_id;?>>
                 <br><br>

                 <label for="from">From Where</label><br>
                 <input type ="text" name="from" id="name"
                 autocomplete="off" value=<?php echo $from;?>>
                 <br><br>

                 <label for="to">Where to go</label><br>
                 <input type ="text" name="to" id="name"
                 autocomplete="off" value=<?php echo $to;?>>
                 <br><br>

                 <label for="date">Date</label><br>
                 <input type ="text" name="date" id="name"
                 autocomplete="off" value=<?php echo $date;?>>
                 <br><br>
                 <a href="editlonch.php" class="btn btn-danger">
                 Back
                 </a>
                 <button type="submit" class="btn 
                 btn-primary" name="update">Update</button>
                
            </form>
        </div>
        
    </div>
</body>

</html>