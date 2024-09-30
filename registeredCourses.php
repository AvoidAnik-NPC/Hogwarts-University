<?php
// Start session at the very beginning
session_start();

// Check if the user is logged in
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header("location:registeredCourses.php");
    exit;
}

include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registered Courses</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styleedit.css">
</head>
<body>
<?php include("navtrans1.php"); ?>

<div class="container mt-5">
    <!-- Search Form in a Card -->
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Search in Registered Course Data</h3>
            <form action="" method="GET">
                <div class="input-group mb-3">
                    <input type="text" name="search" value="<?php if(isset($_GET['search'])) {echo htmlspecialchars($_GET['search']);} ?>" class="form-control" placeholder="Search by Reg_ID" aria-label="Search" aria-describedby="basic-addon2">
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
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Reg_ID</th>
                        <th>Status</th>
                        <th>Grade</th>
                        <th>Date</th>
                        <th>Student ID</th>
                        <th>Course ID</th>
                        <th>Course Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(isset($_GET['search'])) {
                            $filtervalues = $_GET['search'];

                            // Prepare statement
                            $stmt = $conn->prepare("SELECT register.reg_id, register.status, register.grade, register.date, register.Student_ID, register.course_id, course.title
                                                    FROM register 
                                                    JOIN course ON register.course_id = course.course_id
                                                    WHERE register.reg_id = ?");
                            
                            if ($stmt === false) {
                                die('Prepare failed: ' . htmlspecialchars($conn->error));
                            }
                            
                            // Bind parameter
                            $stmt->bind_param("s", $filtervalues);
                            
                            // Execute statement
                            $stmt->execute();
                            
                            // Get result
                            $query_run = $stmt->get_result();

                            if($query_run->num_rows > 0) {
                                while($items = $query_run->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><?= htmlspecialchars($items['reg_id']); ?></td>
                                        <td><?= htmlspecialchars($items['status']); ?></td>
                                        <td><?= htmlspecialchars($items['grade']); ?></td>
                                        <td><?= htmlspecialchars($items['date']); ?></td>
                                        <td><?= htmlspecialchars($items['Student_ID']); ?></td>
                                        <td><?= htmlspecialchars($items['course_id']); ?></td>
                                        <td><?= htmlspecialchars($items['title']); ?></td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="7">No Record Found</td>
                                </tr>
                                <?php
                            }
                            
                            // Close statement
                            $stmt->close();
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Main Data Table -->
    <h1 class="mb-4"style="color:white;">Registered Courses</h1>
    <div class="card">
        <div class="card-body">
            <table class="table table-dark table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Reg_ID</th>
                        <th>Status</th>
                        <th>Grade</th>
                        <th>Date</th>
                        <th>Student ID</th>
                        <th>Course ID</th>
                        <th>Course Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $email = $_SESSION['Email'];
                    $Student_ID = "SELECT Student_ID FROM student WHERE Email = '$email'";
                    $result = mysqli_query($conn, $Student_ID);
                    $row = mysqli_fetch_assoc($result);
                    $Std_ID = $row['Student_ID'];

                    // Fetching data from the database
                    $sql = "SELECT register.reg_id, register.status, register.grade, register.date, register.Student_ID, register.course_id, course.title
                            FROM register
                            JOIN course ON register.course_id = course.course_id
                            WHERE register.Student_ID='$Std_ID'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row["reg_id"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["status"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["grade"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["date"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["Student_ID"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["course_id"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["title"]) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No records found</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
