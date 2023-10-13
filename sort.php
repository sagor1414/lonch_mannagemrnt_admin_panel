<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lonch Mnagement System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h4>Sort data in Alphabetical Order (Assending / Desceending)</h4>
                </div>
                
                <div class="card-body">
                    <form action="" method="GET">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <a href="home.php" class="btn btn-danger">
                                     Back
                                    </a>
                                    <div class="input-group-append">
                                        <select name="sort_alphabet" class="form-control">
                                            <option value="">--Select Option</option>
                                            <option value="a-z" <?php if (isset($_GET['sort_alphabet']) && 
                                            $_GET['sort_alphabet'] == "a-z") {
                                            echo "selected";
                                            } ?>>A-Z Ascending Order</option>
                                            <option value="z-a" <?php if (isset($_GET['sort_alphabet']) && 
                                            $_GET['sort_alphabet'] == "z-a") {
                                                                    echo "selected";
                                                                } ?>>Z-A Descending Order</option>
                                        </select>
                                        <button type="submit" class="input-group-text btn btn-primary" id="basic-addon2">
                                            Sort
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                
                    
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Lonch Name</th>
                                    <th>Lonch Id</th>
                                    <th>From Where</th>
                                    <th>were to go</th>
                                    <th>Entry-date</th>
                                    <th>Deck Price</th>
                                    <th>Cabin Price</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                include 'connect.php';

                                $sort_option = "";

                                if(isset($_GET['sort_alphabet']))
                                {
                                    if($_GET['sort_alphabet'] =="a-z")
                                    {
                                        $sort_option ="ASC";
                                    }
                                    elseif($_GET['sort_alphabet'] == "z-a")
                                    {
                                    $sort_option ="DESC";
                                    }                                   
                                }
                                
                                $sql="SELECT lonch.lonch_name,lonch.lonch_id,lonch.deck,lonch.cabin,data.from,data.to,data.date 
                                FROM `lonch`,`data`
                                WHERE lonch.lonch_id=data.lonch_id  ORDER BY lonch_name $sort_option";
                                
                                $result = mysqli_query($con,$sql);
                                
                                if(mysqli_num_rows($result) > 0)
                                {
                                    foreach($result as $row)
                                    {
                                        ?>
                                        <tr>
                                            <td><?= $row['lonch_name'];?></td>
                                            <td><?= $row['lonch_id'];?></td>
                                            <td><?= $row['from'];?></td>
                                            <td><?= $row['to'];?></td>
                                            <td><?= $row['date'];?></td>
                                            <td><?= $row['deck'];?></td>
                                            <td><?= $row['cabin'];?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <tr>
                                        <td colspan="7">No Record Found</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>