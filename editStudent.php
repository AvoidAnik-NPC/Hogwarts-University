<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styleedit.css">
    <link rel="stylesheet" href="stylez1.css">
</head>
<body>

<div class="container">
<div class="card">
    <h2>Edit Student Record</h2>
    <?php
   include("connection.php");

    if (isset($_GET['Student_ID']) && is_numeric($_GET['Student_ID'])) {
        $Student_ID = $_GET['Student_ID'];

        // Fetching data based on the provided ID
        $sql = "SELECT Student_ID,FirstName,LastName,Address,Email,department,semester,cgpa FROM student WHERE Student_ID = $Student_ID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>
            <form method="post" action="updateStudent.php">
                <input type="hidden" name="Student_ID" value="<?php echo $row['Student_ID']; ?>">
                <div class="form-group">
                    <label for="FirstName">FirstName:</label>
                    <input type="text" class="form-control" id="FirstName" name="FirstName" value="<?php echo $row['FirstName']; ?>">
                </div>
                <div class="form-group">
                    <label for="LastName">LastName:</label>
                    <input type="text" class="form-control" id="LastName" name="LastName" value="<?php echo $row['LastName']; ?>">
                </div>
                <div class="form-group">
                    <label for="Address">Address:</label>
                    <input type="text" class="form-control" id="Address" name="Address" value="<?php echo $row['Address']; ?>">
                </div>
                <div class="form-group">
                    <label for="Email">Email:</label>
                    <input type="email" class="form-control" id="Email" name="Email" value="<?php echo $row['Email']; ?>">
                </div>
                <div class="form-group">
                    <label for="Department">Department:</label>
                    <input type="text" class="form-control" id="department" name="department" value="<?php echo $row['department']; ?>">
                </div>
                <div class="form-group">
                    <label for="Semester">Semester:</label>
                    <input type="text" class="form-control" id="semester" name="semester" value="<?php echo $row['semester']; ?>">
                </div>
                <div class="form-group">
                    <label for="cgpa">cgpa:</label>
                    <input type="text" class="form-control" id="cgpa" name="cgpa" value="<?php echo $row['cgpa']; ?>">
                </div>

                  <button type="submit" class="btn btn-primary">Update</button>
            </form>
            <br>
            <div class="back">
            <a href="studentData.php" class="button-link-right">Back</a>
        </div>
           
    <?php
        } else {
            echo "No record found";
        }
    } else {
        echo "Invalid request";
    }

    $conn->close();
    ?>
  </div>
</div>

</body>
</html>
