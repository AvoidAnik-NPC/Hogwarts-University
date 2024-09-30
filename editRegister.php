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
    <h2>Edit Register Record</h2>
    <?php
   include("connection.php");
    if (isset($_GET['reg_id']) && is_numeric($_GET['reg_id'])) {
        $reg_id = $_GET['reg_id'];

        // Fetching data based on the provided ID
        $sql = "SELECT reg_id, status, grade, date, Student_ID, course_id FROM register WHERE reg_id = $reg_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>
            <form method="post" action="updateRegister.php">
                <input type="hidden" name="reg_id" value="<?php echo $row['reg_id']; ?>">
                <div class="form-group">
                    <label for="status">Status:</label>
                    <input type="text" class="form-control" id="status" name="status" value="<?php echo $row['status']; ?>">
                </div>
                <div class="form-group">
                    <label for="grade">Grade:</label>
                    <input type="text" class="form-control" id="grade" name="grade" value="<?php echo $row['grade']; ?>">
                </div>
                <div class="form-group">
                    <label for="date">Date:</label>
                    <input type="date" class="form-control" id="date" name="date" value="<?php echo $row['date']; ?>">
                </div>
                <div class="form-group">
                <label for="Student_ID">Student_ID:</label>
                    <input type="number" class="form-control" id="Student_ID" name="Student_ID" value="<?php echo $row['Student_ID']; ?>">
                </div>
                <div class="form-group">
                <label for="course_id">course_id:</label>
                    <input type="number" class="form-control" id="course_id" name="course_id" value="<?php echo $row['course_id']; ?>">
                </div>
               
                  <button type="submit" class="btn btn-primary">Update</button>
            </form>

            
            <br>
            <div class="back">
            <a href="registerData.php" class="button-link-right">Back</a>
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
