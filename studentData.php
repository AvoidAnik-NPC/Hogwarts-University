<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Data</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styleedit.css">
    <script>
        function confirmDeletion(studentId) {
            if (confirm('Are you sure you want to delete this student?')) {
                window.location.href = 'deleteStudent.php?Student_ID=' + studentId;
            }
        }
    </script>
</head>
<body>
<?php include("navtrans.php"); ?>

<div class="container mt-5">
    <!-- Search Form in a Card -->
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Search in Student Data</h3>
            <form action="" method="GET">
                <div class="input-group mb-3">
                    <input type="text" name="search" value="<?php if(isset($_GET['search'])) {echo $_GET['search'];} ?>" class="form-control" placeholder="Search by Student ID" aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Search Result Table -->
    <h4 class="mb-4"style="color:white;">Search Result</h4>
    <div class="card mb-4">
       
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Student ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Semester</th>
                        <th>CGPA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include("connection.php");
                        if(isset($_GET['search'])) {
                            $filtervalues = $_GET['search'];
                            $query = "SELECT * FROM student WHERE Student_ID = '$filtervalues'";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0) {
                                foreach($query_run as $items) {
                                    ?>
                                    <tr>
                                        <td><?= $items['Student_ID']; ?></td>
                                        <td><?= $items['FirstName']; ?></td>
                                        <td><?= $items['LastName']; ?></td>
                                        <td><?= $items['Address']; ?></td>
                                        <td><?= $items['Email']; ?></td>
                                        <td><?= $items['department']; ?></td>
                                        <td><?= $items['semester']; ?></td>
                                        <td><?= $items['cgpa']; ?></td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="8">No Record Found</td>
                                </tr>
                                <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        
    </div>

    <!-- Main Data Table -->
    <h1 class="mb-4" style="color:white;">Student Data</h1>
    
        
            <table class="table table-dark table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Student ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Semester</th>
                        <th>CGPA</th>
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
                    $sql = "SELECT Student_ID, FirstName, LastName, Address, Email, department, semester, cgpa FROM student";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Outputting data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["Student_ID"] . "</td>";
                            echo "<td>" . $row["FirstName"] . "</td>";
                            echo "<td>" . $row["LastName"] . "</td>";
                            echo "<td>" . $row["Address"] . "</td>";
                            echo "<td>" . $row["Email"] . "</td>";
                            echo "<td>" . $row["department"] . "</td>";
                            echo "<td>" . $row["semester"] . "</td>";
                            echo "<td>" . $row["cgpa"] . "</td>";
                            echo "<td><a href='editStudent.php?Student_ID=" . $row["Student_ID"] . "' class='btn btn-primary'>Edit</a></td>";
                            echo "<td><a href='#' onclick='confirmDeletion(" . $row["Student_ID"] . ")' class='btn btn-danger mr-2'>Delete</a></td>";
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

    <!-- Add New Button -->
    <div class="mt-4">
        <a href="studentsignup.php" class="btn btn-primary">Add New</a>
    </div>
</div>

</body>
</html>