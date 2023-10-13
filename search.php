<?php
  include 'connect.php';
    if(isset($_POST['search'])){
      $searchkey = $_POST['search'];
      $sql="SELECT * FROM `data` WHERE `lonch_name` LIKE '%$searchkey%'";
    }
    else{
        echo "no data found";
    }
      $result=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <title>search</title>
</head>
<body>
    <h2>This is search result</h2>

    <form action="index.php">
          <div>
            <button class="btn btn-danger">Back to home page</button>
          </div>
        </form>
    <div><br></div>
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Sl no</th>
      <th scope="col">Lonch Name</th>
      <th scope="col">From</th>
      <th scope="col">To</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Deck Price</th>
      <th scope="col">Cabin Price</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
    <?php
if($result){
    while($row=mysqli_fetch_assoc($result)){
        $sl_no=$row['sl_no'];
        $lonch_name=$row['lonch_name'];
        $from=$row['from'];
        $to=$row['to'];
        $date=$row['date'];
        $time=$row['time'];
        $deck=$row['deck'];
        $cabin=$row['cabin'];
        echo'<tr>
        <th scope="row">'.$sl_no.'</th>
        <td>'.$lonch_name.'</td>
        <td>'.$from.'</td>
        <td>'.$to.'</td>
        <td>'.$date.'</td>
        <td>'.$time.'</td>
        <td>'.$deck.'</td>
        <td>'.$cabin.'</td>
        <td>
        <button class="btn btn-primary"><a href="edit.php?editid='.$sl_no.'"
        class="text-light">Edit</a></button>

        <button class="btn btn-danger"><a href="delete.php?
        deleteid='.$sl_no.'"
        class="text-light">Delete</a></button>

        <button class="btn btn-info"><a href="view.php?
        viewid='.$sl_no.'"
        class="text-light">View</a></button>

        </td>
        </tr>';
    }
}
else{
    echo"no data found";
}
?>
  </tbody>
</table>
</body>
</html>