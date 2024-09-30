<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Instructor Data</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styleedit.css">
    <script>
        function confirmDeletion(instructorId) {
            if (confirm('Are you sure you want to delete this instructor?')) {
                window.location.href = 'deleteInstructor.php?Instructor_ID=' + instructorId;
            }
        }
    </script>
</head>
<body>
<?php include("navtrans.php"); ?>

<div class="container mt-5">
    <h1 class="text-light">Instructor Data</h1>
    <table class="table table-dark">
        <thead class="thead-dark">
            <tr>
                <th>Instructor_ID</th>
                <th>Instructor_Code</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Department</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("connection.php");

            // Fetching data from the database
            $sql = "SELECT Instructor_ID, Instructor_Code, FirstName, LastName, Department FROM instructor";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Outputting data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Instructor_ID"] . "</td>";
                    echo "<td>" . $row["Instructor_Code"] . "</td>";
                    echo "<td>" . $row["FirstName"] . "</td>";
                    echo "<td>" . $row["LastName"] . "</td>";
                    echo "<td>" . $row["Department"] . "</td>";
                    echo "<td><a href='editInstructor.php?Instructor_ID=" . $row["Instructor_ID"] . "' class='btn btn-primary'>Edit</a></td>";
                    echo "<td><a href='#' onclick='confirmDeletion(" . $row["Instructor_ID"] . ")' class='btn btn-danger mr-2'>Delete</a></td>";
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
<div class="bottom-navbar">
    <a href="instructor.php" class="button-link-left">Add New</a>
</div>
</body>
</html>
