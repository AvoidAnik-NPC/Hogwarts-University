<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Course Data</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styleedit.css">
    <link rel="stylesheet" href="stylez.css">
    <style>
        /* Add your custom styles here */
        body {
            background-color: #f8f9fa;
        }
        .container {
            width: 98%;
        }
       
      
    </style>
</head>
<body>
<?php include("navtrans1.php"); ?>

<h1 class="text-light">Find your desired courses</h1>

<!-- Search Code -->
<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <!-- Credit Search -->
            <form action="" method="GET">
                <div class="input-group mb-3">
                    <input type="float" name="search" value="<?php if(isset($_GET['search'])) {echo $_GET['search'];} ?>" class="form-control" placeholder="Search by Credit" aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-4">
            <!-- Department Search -->
            <form action="" method="GET">
                <div class="input-group mb-3">
                    <input type="text" name="search1" value="<?php if(isset($_GET['search1'])) {echo $_GET['search1'];} ?>" class="form-control" placeholder="Search by Department" aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit1">Search</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-4">
            <!-- Seat Search -->
            <form action="" method="GET">
                <div class="input-group mb-3">
                    <input type="number" name="search2" value="<?php if(isset($_GET['search2'])) {echo $_GET['search2'];} ?>" class="form-control" placeholder="Search by Seat Availability" aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit2">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Search Code End -->

<!-- Data Table -->
<div class="container mt-4">
    <div class="col-md-12">
        <div class="card mt-4">
            <div class="card-body">
                <table class="table table-bordered">
                     <thead class="thead-dark">
                        <tr>
                            <th> Course ID </th>
                            <th> Course Title </th>
                            <th> Course Credit </th>
                            <th> Department </th>
                            <th> Semester </th>
                            <th> Seats Available </th>
                            <th> Check In </th> 
                            <th> Check Out </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                                include("connection.php");
                                    if(isset($_GET['search']) OR isset($_GET['search1']) OR isset($_GET['search2']))
                                    {
                                        if(isset($_GET['search']))
                                            {
                                                $filtervalues = $_GET['search'];
                                                $query = "SELECT * FROM course where credit = '$filtervalues'";
                                                $query_run = mysqli_query($conn, $query);
                                            }
                                        
                                        else if(isset($_GET['search1']))
                                            {
                                                $filtervalues1 = $_GET['search1'];
                                                $query = "SELECT * FROM course where department = '$filtervalues1'";
                                                $query_run = mysqli_query($conn, $query);
                                            }
                                            
                                        else if(isset($_GET['search2']))
                                            {
                                                $filtervalues2 = $_GET['search2'];
                                                $query = "SELECT * FROM course where no_of_seats = '$filtervalues2'";
                                                $query_run = mysqli_query($conn, $query);
                                            }
                                        //$query = "SELECT course_id, title, credit, department, no_of_seats, CheckIn, CheckOut FROM course like '%$filtervalues'";
                                        //$query = "SELECT * FROM course where credit = '%$filtervalues'";
                                        
                                        
                                        
                                        //$query = "SELECT * FROM course where credit = '$filtervalues'";
                                        //$query_run = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['course_id']; ?></td>
                                                    <td><?= $items['title']; ?></td>
                                                    <td><?= $items['credit']; ?></td>
                                                    <td><?= $items['department']; ?></td>
                                                    <td><?= $items['semester']; ?></td>
                                                    <td><?= $items['no_of_seats']; ?></td>
                                                    <td><?= $items['CheckIn']; ?></td>
                                                    <td><?= $items['CheckOut']; ?></td>
                                                </tr>
                                                <?php
                                            }

                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">NO Record Found</td>
                                                </tr>
                                            <?php

                                        }
                                    }   
                            ?>
                            
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Additional Content -->
<div class="container mt-5">
<div id="sform">
        <h2>All courses</h2>
        
       

        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Course_ID</th>
                    <th>Course_Title</th>
                    <th>Credit</th>
                    <th>Department</th>
                    <th>Semester</th>
                    <th>No_of_seats</th>
                    <th>Check_In</th>
                    <th>Check_Out</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  // Establishing a connection to the database
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'db';

            // Creating a connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Checking the connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetching data from the database
            $sql = "SELECT course_id, title, credit, department, semester , no_of_seats,CheckIn,CheckOut FROM course";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Outputting data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["course_id"] . "</td>";
                    echo "<td>" . $row["title"] . "</td>";
                    echo "<td>" . $row["credit"] . "</td>";
                    echo "<td>" . $row["department"] . "</td>";
                    echo "<td>" . $row["semester"] . "</td>";
                    echo "<td>" . $row["no_of_seats"] . "</td>";
                    echo "<td>" . $row["CheckIn"] . "</td>";
                    echo "<td>" . $row["CheckOut"] . "</td>";

                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No records found</td></tr>";
            }
            $conn->close();
                ?>
                  </tbody>
        </table>
    </div>
</div>



</body>
</html>
