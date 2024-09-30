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


<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0">Edit Course Record</h2>
        </div>
        <div class="card-body">
            <?php
             include("connection.php");
         
             if (isset($_GET['course_id']) && is_numeric($_GET['course_id'])) {
                 $course_id = $_GET['course_id'];
         
                 // Fetching data based on the provided ID
                 $sql = "SELECT course_id, title, credit, department,no_of_seats,CheckIn,CheckOut FROM course WHERE course_id = $course_id";
                 $result = $conn->query($sql);
         
                 if ($result->num_rows > 0) {
                     $row = $result->fetch_assoc();
            ?>
            <form method="post" action="updateCourse.php">
                <input type="hidden" name="course_id" value="<?php echo $row['course_id']; ?>">
                <div class="form-group">
                    <label for="title">Course Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title']; ?>">
                </div>
                <div class="form-group">
                    <label for="credit">Credit:</label>
                    <input type="text" class="form-control" id="credit" name="credit" value="<?php echo $row['credit']; ?>">
                </div>
                <div class="form-group">
                    <label for="department">Department:</label>
                    <input type="text" class="form-control" id="department" name="department" value="<?php echo $row['department']; ?>">
                </div>
                <div class="form-group">
                    <label for="no_of_seats">No. of Seats:</label>
                    <input type="number" class="form-control" id="no_of_seats" name="no_of_seats" value="<?php echo $row['no_of_seats']; ?>">
                </div>
                <div class="form-group">
                    <label for="CheckIn">Check-In:</label>
                    <input type="time" class="form-control" id="CheckIn" name="CheckIn" value="<?php echo $row['CheckIn']; ?>">
                </div>
                <div class="form-group">
                    <label for="CheckOut">Check-Out:</label>
                    <input type="time" class="form-control" id="CheckOut" name="CheckOut" value="<?php echo $row['CheckOut']; ?>">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                </form>
            <br>
            <div class="back mt-3">
            <a href="courseData.php" class="button-link-right">Back</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>

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

</body>
</html>


