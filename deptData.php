<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dept. Data</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styleedit.css">
    <script>
        function confirmDeletion(deptId) {
            if (confirm('Are you sure you want to delete this department?')) {
                window.location.href = 'deleteDept.php?dept_ID=' + deptId;
            }
        }
    </script>
</head>
<body>
<?php include("navtrans.php"); ?>

<div class="container mt-5">
    <h1 class="text-light">Department Data</h1>
    <table class="table table-dark">
        <thead class="thead-dark">
            <tr>
                <th>Dept_ID</th>
                <th>Dept_Name</th>
                <th>Location</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("connection.php");
            // Fetching data from the database
            $sql = "SELECT dept_ID, name, location FROM department";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Outputting data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["dept_ID"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["location"] . "</td>";
                    echo "<td><a href='editDept.php?dept_ID=" . $row["dept_ID"] . "' class='btn btn-primary'>Edit</a></td>";
                    echo "<td><a href='#' onclick='confirmDeletion(" . $row["dept_ID"] . ")' class='btn btn-danger mr-2'>Delete</a></td>";
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

<div class="bottom-navbar">
    <a href="department1.php" class="button-link-left">Add New</a>
</div>


</body>
</html>
