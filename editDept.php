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
            <h2>Edit Department Record</h2>
            <?php
          include("connection.php");

    if (isset($_GET['dept_ID']) && is_numeric($_GET['dept_ID'])) {
        $dept_ID = $_GET['dept_ID'];

        // Fetching data based on the provided ID
        $sql = "SELECT dept_ID, name, location FROM department WHERE dept_ID = $dept_ID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>
            <form method="post" action="updateDept.php">
                <input type="hidden" name="dept_ID" value="<?php echo $row['dept_ID']; ?>">
                <div class="form-group">
                    <label for="Dept_name">Dept_name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>">
                </div>
                <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" class="form-control" id="location" name="location" value="<?php echo $row['location']; ?>">
                    </div>
                <!-- ... (form fields remain the same) -->
                <button type="submit" class="btn btn-primary">Update</button>
            </form>

            <div class="back">
                <a href="deptData.php" class="button-link-right">Back</a>
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
