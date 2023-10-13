<?php
include 'connect.php';
if (isset($_POST['search'])) {
  $searchkey = $_POST['search'];
  $sql = "SELECT lonch.lonch_name,lonch.lonch_id,lonch.deck,lonch.cabin,data.from,data.to,data.date 
      FROM `lonch`,`data`
      WHERE lonch.lonch_id = data.lonch_id AND `lonch_name` LIKE '%$searchkey%'";
} else {
  $sql = "SELECT lonch.lonch_name,lonch.lonch_id,lonch.deck,lonch.cabin,data.from,data.to,data.date 
      FROM `lonch`,`data`
      WHERE lonch.lonch_id=data.lonch_id";
  $searchkey = "";
}
$result = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lonch Mnagement System</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="navbarstyle.css">
</head>

<body>
  <nav class="menu">
    <ul>
      <li><a href="home.php">Home</a></li>
      <li><a href="insertlonch.php">Add new</a></li>
      <li><a href="sort.php">Sort</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="index.php">Log out</a></li>
    </ul>
    <form action="" method="POST" class="from-control">
      <input type="text" name="search" placeholder="search by lonch name" autocomplete="off"
      value="<?php echo $searchkey; ?>">
      <button>search</button>
    </form>
  </nav>
  <div class="container pt-4 pt-4">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Lonch Name</th>
          <th scope="col">Lonch Id</th>
          <th scope="col">From Where</th>
          <th scope="col">were to go</th>
          <th scope="col">Entry-date</th>
          <th scope="col">Deck Price</th>
          <th scope="col">Cabin Price</th>
          <th scope="col">&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;Operations</th>
        </tr>
      </thead>
      <tbody>

        <?php

        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            $lonch_name = $row['lonch_name'];
            $lonch_id = $row['lonch_id'];
            $from = $row['from'];
            $to = $row['to'];
            $date = $row['date'];
            $deck = $row['deck'];
            $cabin = $row['cabin'];
            echo '<tr>
        <th scope="row">'.$lonch_name.'</th>
        <td>' . $lonch_id . '</td>
        <td>' . $from . '</td>
        <td>' . $to . '</td>
        <td>' . $date . '</td>
        <td>' . $deck . '</td>
        <td>' . $cabin . '</td>
        <td>
        <div>
        <button class="btn btn-danger" style="margin-left: 10px;"><a href="delete.php?
        deleteid=' . $lonch_id . '"
        class="text-light">Delete</a></button>
        
        <button class="btn btn-primary" style="margin-left: 10px;">
        <a href="editlonch.php?editid=' . $lonch_id . '"
        class="text-light">Edit</a></button>
        </div>
        </td>
        </tr>';
          }
        }
        $fire = mysqli_num_rows($result);
        if ($fire <= 0) {
          echo "
        <td>🧐No Data🧐</td>
        ";
        }
        ?>
      </tbody>
    </table>
  </div>  

  </div>
</body>

</html>