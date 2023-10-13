<?php
include 'connect.php';
if (isset($_POST["submit"])) {
    $lonch_id = $_POST["lonch_id"];
    $from = $_POST["from"];
    $to = $_POST["to"];
    $date = $_POST["date"];

    $sql = "INSERT INTO `data` (`lonch_id`,`from`,`to`,`date`)
     VALUES ('$lonch_id','$from','$to','$date')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header("location:home.php");
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
    <link rel="stylesheet" href="styles.css">
    <title>Register Here</title>
</head>
<body>
<img  src="img/lonch.jpg" height="680" width="1250">
    <div class="main">
        <div class="register">
            <h2> Register Here</h2>
            <form id="register" method="post">
                <label>Lonch Id</label>
                <br>
                <input type ="text"  name="lonch_id" id="name" placeholder="Enter Same Lonch-id"autocomplete="off" required>
                <br><br>

                <label for="from">From Where</label><br>
                <input type ="text" name="from" id="name" placeholder="From Where"autocomplete="off">
                <br><br>
                
                 <label for="to">Where to go</label><br>
                 <input type ="text" name="to" id="name" placeholder="Where to go"autocomplete="off">
                 <br><br>
                 
                 <label for="date">Lonch Emtry Date</label><br>
                 <input type ="text" name="date" id="name" placeholder="Enter Lonch Entry Date"autocomplete="off">
                 <br><br>
                 <div id="bt">
                 <a href="insertlonch.php" class="btn btn-danger">
                 Back
                 </a>
                 <button type="submit" class="btn 
                 btn-primary" name="submit">Submit</button>
                 
                </div>
            
            </form>
        </div>        
    </div>
</body>
</html>