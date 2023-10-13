<?php
include 'connect.php';
$lonch_id= $_GET['editid'];
$sql="select * from `lonch` where lonch_id=$lonch_id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

$lonch_name=$row['lonch_name'];
$lonch_id=$row['lonch_id'];
$deck=$row['deck'];
$cabin=$row['cabin'];

if (isset($_POST["update"])) {
    $lonch_name = $_POST["lonch_name"];
    $lonch_id = $_POST["lonch_id"];
    $deck = $_POST["deck"];
    $cabin = $_POST["cabin"];

    $sql = "UPDATE `lonch` set`lonch_name`='$lonch_name',`lonch_id`='$lonch_id',`deck`='$deck',`cabin`='$cabin'
    where lonch_id=$lonch_id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header("location: editdata.php?editdata=".$lonch_id);
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
                 <input type ="text"  name="lonch_name" id="name"
                 autocomplete="off" value=<?php echo $lonch_name;?>>
                 <br><br>

                 <label for="lonch_id">Lonch Id</label><br>
                 <input type ="text" name="lonch_id" id="name"
                 autocomplete="off" value=<?php echo $lonch_id;?>>
                 <br><br>

                 <label for="deck price">Deck price:</label><br>
                 <input type ="text" name="deck" id="name"
                 autocomplete="off" value=<?php echo $deck;?>>
                 <br><br>

                 <label for="cabin prize"> Cabin price:</label><br>
                 <input type ="text" name="cabin" id="name"
                 autocomplete="off" value=<?php echo $cabin;?>>
                 <br><br>
                 <a href="index.php" class="btn btn-danger">
                 Cancel
                 </a>
                 <button type="submit" class="btn 
                 btn-primary" name="update">Next</button>

                 
                
            </form>
        </div>
        
    </div>
</body>

</html>