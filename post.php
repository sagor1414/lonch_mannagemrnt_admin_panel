<?php
include 'connect.php';
if (isset($_POST["submit"])) {
    $lonch_name = $_POST["lonch_name"];
    $from = $_POST["from"];
    $to = $_POST["to"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $deck = $_POST["deck"];
    $cabin = $_POST["cabin"];

    $sql = "INSERT INTO `data` (`id`, `lonch_name`, `from`) VALUES (NULL, '$lonch_name', '$from')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "data insert successfully";
    } else {
        die(mysqli_error($con));
    }
}
?>