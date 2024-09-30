<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Course Data</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styleedit.css">
    <link rel="stylesheet" href="navtrans.css">
    <script>
        function confirmDeletion(courseId) {
            if (confirm('Are you sure you want to delete this course?')) {
                window.location.href = 'deleteCourse.php?course_id=' + courseId;
            }
        }
    </script>
</head>
<body>
<?php include("navtrans.php"); ?>
<div class="container mt-7">
    <br>
    <h3 class="text-light">Search in Course Data</h3>
    <br>

    <!--Search Code-->
    <div class="row">
        <!-- First Column - Credit-->
        <div class="col-md-4">
            <form action="" method="GET">
                <div class="input-group mb-3">
                    <input type="float" name="search" value="<?php if(isset($_GET['search'])) {echo $_GET['search'];} ?>" class="form-control" placeholder="Search by Credit" aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Second Column - Dept-->
        <div class="col-md-4">
            <form action="" method="GET">
                <div class="input-group mb-3">
                    <input type="text" name="search1" value="<?php if(isset($_GET['search1'])) {echo $_GET['search1'];} ?>" class="form-control" placeholder="Search by Department" aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit1">Search</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Third Column - Seat-->
        <div class="col-md-4">
            <form action="" method="GET">
                <div class="input-group mb-3">
                    <input type="number" name="search2" value="<?php if(isset($_GET['search2'])) {echo $_GET['search2'];} ?>" class="form-control" placeholder="Search by Seat Availability" aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit2">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <h4 class="text-light">Combined search </h4>
    <!-- Search By All 3 -->
    <form action="" method="GET">
        <div class="input-group mb-20">
            <input type="float" name="search3" value="<?php if(isset($_GET['search3'])) {echo $_GET['search3'];} ?>" class="form-control" placeholder="Credit">
            <input type="text" name="search4" value="<?php if(isset($_GET['search4'])) {echo $_GET['search4'];} ?>" class="form-control" placeholder="Department">
            <input type="number" name="search5" value="<?php if(isset($_GET['search5'])) {echo $_GET['search5'];} ?>" class="form-control" placeholder="Seat Availability">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" name="submit_combined">Search</button>
            </div>
        </div>
    </form>

    <br>
    <h4 class="text-light">Search result table</h4>

    <!--Data Table-->
    <div class="card mt-5">
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
                        if(isset($_GET['search']) OR isset($_GET['search1']) OR isset($_GET['search2']) OR isset($_GET['search3']))
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
                            else if(isset($_GET['search3']) AND isset($_GET['search4']) AND isset($_GET['search5']))
                            {
                                $filtervalues = $_GET['search3'];
                                $filtervalues1 = $_GET['search4'];
                                $filtervalues2 = $_GET['search5'];
                                $query = "SELECT * FROM course where credit = '$filtervalues' 
                                AND department = '$filtervalues1' 
                                AND no_of_seats = '$filtervalues2'";
                                $query_run = mysqli_query($conn, $query);
                            }
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
                                        <td colspan="8">NO Record Found</td>
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

<div class="container mt-5">
    <h1 class="text-light">Course Data</h1>
    <table class="table table-dark">
        <thead class="thead-dark">
            <tr>
                <th>Course ID</th>
                <th>Course Title</th>
                <th>Credit</th>
                <th>Department</th>
                <th>Semester</th>
                <th>No. of Seats</th>
                <th>Check-In</th>
                <th>Check-Out</th>
                <th colspan="2">Actions</th>
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
            $sql = "SELECT course_id, title, credit, department, semester, no_of_seats, CheckIn, CheckOut FROM course";
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
                    echo "<td><a href='editCourse.php?course_id=" . $row["course_id"] . "' class='btn btn-primary'>Edit</a></td>";
                    echo "<td><a href='#' onclick='confirmDeletion(" . $row["course_id"] . ")' class='btn btn-danger mr-2'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='10'>No records found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>
<div class="mt-4">
        <a href="course.php" class="btn btn-primary">Add New</a>
    </div>


<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<!-- Font Awesome Icons (optional) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
