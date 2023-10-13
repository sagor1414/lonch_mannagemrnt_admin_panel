<?php
    session_start();
    $db = new mysqli("localhost","root","","lonch_management_system");

    if(isset($_POST['submit'])){
        $username =$_POST['username'];
        $password =$_POST['password'];
        $email =$_POST['email'];

        $query = "INSERT INTO `information` (`username`, `password`, `email`)
        VALUES ('$username','$password','$email')";
         $run=mysqli_query($db,$query);
         if($run){
            echo "Registration successful.!";
         }
         else{
            echo "error".mysqli_errno($db);
         }
    }
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $mysqli = new mysqli("localhost","root","","lonch_management_system");
        $result =$mysqli->query("SELECT * FROM `information` 
        WHERE `username` = '$username' AND `password` = '$password'");

        $row = $result->fetch_assoc();

        if($row['username'] == $username && $row['password'] == $password){
            header("location:home.php");
        }
        else{
            $message1 = "login Unsuccessful.!";
            echo "<script type = 'text/javascript'>alert('$message1');</script>";
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="logstyle.css">
</head>

<body>
    <div class="lonin-page">
        <div class="form">
            <form action="index.php" method="POST" class="register-form">
                <input type="text" name="username" placeholder="User Name"autocomplete="off"required>
                <input type="password" name="password" placeholder="password"autocomplete="off"required>
                <input type="text" name="email" placeholder="email id"autocomplete="off"required>
                <button name="submit">Create </button>
                <p class="message">Already Registered?<a href="#">Login</a></p>
            </form>
            <form action="index.php" method="POST" class="login-form">
                <input type="text" name="username" placeholder="user name"autocomplete="off" required>
                <input type="password" name="password" placeholder="password"autocomplete="off">
                <button name="login">Log in</button>
                <p class="message">Not Registered? <a href="#">Register</a></p>
            </form>
        </div>
    </div>
    <script src='http://code.jquery.com/jquery-3.3.1.main.js'></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

    <script>
        $('.message a').click(function(){
            $('form').animate({height:"toggle",opacity:"toggle"},"slow");
        });
    </script>
</body>
</html>