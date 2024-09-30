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
    <h2>Edit Instructor Record</h2>
    <?php
   include("connection.php");
    if (isset($_GET['Instructor_ID']) && is_numeric($_GET['Instructor_ID'])) {
        $Instructor_ID = $_GET['Instructor_ID'];

        // Fetching data based on the provided ID
        $sql = "SELECT Instructor_ID, Instructor_Code, FirstName,LastName,Department FROM instructor WHERE Instructor_ID= $Instructor_ID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>
            <form method="post" action="updateInstructor.php">
                <input type="hidden" name="Instructor_ID" value="<?php echo $row['Instructor_ID']; ?>">
                <div class="form-group">
                    <label for="Instructor_Code">Instructor_Code:</label>
                    <input type="text" class="form-control" id="Instructor_Code" name="Instructor_Code" value="<?php echo $row['Instructor_Code']; ?>">
                </div>
                <div class="form-group">
                    <label for=" FirstName"> FirstName:</label>
                    <input type="text" class="form-control" id=" FirstName" name="FirstName" value="<?php echo $row['FirstName']; ?>">
                </div>
                <div class="form-group">
                    <label for="LastName">LastName:</label>
                    <input type="text" class="form-control" id="LastName" name="LastName" value="<?php echo $row['LastName']; ?>">
                </div>
                <div class="form-group">
                    <label for="Department">Department:</label>
                    <input type="text" class="form-control" id="Department" name="Department" value="<?php echo $row['Department']; ?>">
                </div>
              
                  <button type="submit" class="btn btn-primary">Update</button>
            </form>

            <br>
            <div class="back">
            <a href="InstructorData.php" class="button-link-right">Back</a>
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
