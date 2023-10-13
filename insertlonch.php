<?php
include 'connect.php';
if (isset($_POST["submit"])) {
    $lonch_name = $_POST["lonch_name"];
    $lonch_id = $_POST["lonch_id"];
    $deck = $_POST["deck"];
    $cabin = $_POST["cabin"];

    $sql = "INSERT INTO `lonch` (`lonch_name`,`lonch_id`,`deck`,`cabin`)
     VALUES ('$lonch_name','$lonch_id','$deck','$cabin')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header("location: insertdata.php");
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
                <label>Lonch Name:</label>
                <br>
                <input type ="text"  name="lonch_name" id="name" placeholder="Enter Lonch name"autocomplete="off">
                <br><br>

                <label for="lonch_id">lonch id:</label><br>
                <input type ="text" name="lonch_id" id="name" placeholder="Enter Lonch Id"autocomplete="off" required>
                <br><br>
                
                 <label for="deck prize">Deck price:</label><br>
                 <input type ="text" name="deck" id="name" placeholder="Enter  deck prize"autocomplete="off">
                 <br><br>
                 
                 <label for="cabin prize"> Cabin price:</label><br>
                 <input type ="text" name="cabin" id="name" placeholder="Enter cabin prize"autocomplete="off">
                 <br><br>
                 <div id="bt">
                 <a href="home.php" class="btn btn-danger">
                 Back
                </a>
                 <button type="submit" class="btn 
                 btn-primary" name="submit">Next</button>
                 
                </div>
            
            </form>
        </div>        
    </div>
</body>
</html>