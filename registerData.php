<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Data</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styleedit.css">
    <script>
        function confirmDeletion(registerId) {
            if (confirm('Are you sure you want to delete this register entry?')) {
                window.location.href = 'deleteRegister.php?reg_id=' + registerId;
            }
        }
    </script>
</head>
<body>
<?php include("navtrans.php"); ?>

<div class="container mt-5">
    <h1 class="text-light">Register Data</h1>
    <table class="table table-dark">
        <thead class="thead-dark">
            <tr>
                <th>Reg_ID</th>
                <th>Status</th>
                <th>Grade</th>
                <th>Date</th>
                <th>Student ID</th>
                <th>Course ID</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
           include("connection.php");

            // Fetching data from the database
            $sql = "SELECT reg_id, status, grade, date, Student_ID, course_id FROM register";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Outputting data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["reg_id"] . "</td>";
                    echo "<td>" . $row["status"] . "</td>";
                    echo "<td>" . $row["grade"] . "</td>";
                    echo "<td>" . $row["date"] . "</td>";
                    echo "<td>" . $row["Student_ID"] . "</td>";
                    echo "<td>" . $row["course_id"] . "</td>";
                    echo "<td><a href='editRegister.php?reg_id=" . $row["reg_id"] . "' class='btn btn-primary'>Edit</a></td>";
                    echo "<td><a href='#' onclick='confirmDeletion(" . $row["reg_id"] . ")' class='btn btn-danger mr-2'>Delete</a></td>";
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
<!-- Add New Button -->
<div class="mt-4">
        <a href="register.php" class="btn btn-primary">Add New</a>
    </div>
</body>
</html>
