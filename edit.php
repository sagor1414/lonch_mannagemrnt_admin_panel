<?php
include 'connect.php';
$sl_no = $_GET['editid'];
$sql="select * from `data` where sl_no=$sl_no";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

$lonch_name=$row['lonch_name'];
$from=$row['from'];
$to=$row['to'];
$date=$row['date'];
$time=$row['time'];
$deck=$row['deck'];
$cabin=$row['cabin'];

if (isset($_POST["update"])) {
    $lonch_name = $_POST["lonch_name"];
    $from = $_POST["from"];
    $to = $_POST["to"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $deck = $_POST["deck"];
    $cabin = $_POST["cabin"];

    $sql = "UPDATE `data` set `sl_no`='$sl_no',`lonch_name`='$lonch_name',
    `from`='$from',`to`='$to',`date`='$date',`time`='$time',`deck`='$deck',`cabin`='$cabin'
    where sl_no=$sl_no";
    $result = mysqli_query($con, $sql);

    if ($result) {
     header("location: index.php");
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
                <label> Lonch Name:</label>
                <br>
                 <input type ="text"  name="lonch_name" id="name" placeholder="Update Launch name"
                 autocomplete="off" value=<?php echo $lonch_name;?>>
                 <br><br>

                 <label for="from">From:</label><br>
                 <input type ="text" name="from" id="name" placeholder="From where"
                 autocomplete="off" value=<?php echo $from;?>>
                 <br><br>

                 <label for="to"> To:</label><br>
                 <input type ="text" name="to" id="name" placeholder="Where to go"
                 autocomplete="off" value=<?php echo $to;?>>
                 <br><br>

                 <label for="launch date">Launch Date:</label><br>
                 <input type ="text" name="date" id="name" placeholder="Update Launch date"
                 autocomplete="off" value=<?php echo $date;?>>
                 <br><br>

                <label for="launch timer">Launch Time:</label><br>
                 <input type ="text"name="time" id="name" placeholder="Update Launch time"
                 autocomplete="off" value=<?php echo $time;?>>
                 <br><br>

                 <label for="deck price">Deck price:</label><br>
                 <input type ="text" name="deck" id="name" placeholder="Update  deck price"
                 autocomplete="off" value=<?php echo $deck;?>>
                 <br><br>

                 <label for="cabin prize"> Cabin price:</label><br>
                 <input type ="text" name="cabin" id="name" placeholder="Update cabin price"
                 autocomplete="off" value=<?php echo $cabin;?>>
                 <br><br>
                 <button type="submit" class="btn 
                 btn-primary" name="update">Update</button>

                 <a href="index.php" class="btn btn-danger">
                 Cancel
                 </a>
                
            </form>
        </div>
        
    </div>
</body>

</html>