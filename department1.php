<?php
include("connection.php");

class DepartmentManager {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function handleDepartmentSubmission() {
        if (isset($_POST['sub'])) {
            $departmentData = $this->sanitizeInputData($_POST);
            if ($this->isDepartmentExist($departmentData['name'], $departmentData['location'])) {
                $this->redirectWithMessage("DEPARTMENT Already Exists!!");
            } else {
                $this->addDepartment($departmentData);
                $this->redirectWithMessage("DEPARTMENT ADDED!!");
            }
        }
    }

    private function sanitizeInputData($data) {
        return [
            'name' => mysqli_real_escape_string($this->conn, $data['name']),
            'location' => mysqli_real_escape_string($this->conn, $data['location'])
        ];
    }

    private function isDepartmentExist($name, $location) {
        $sql = "SELECT * FROM department WHERE name = ? AND location = ?";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $name, $location);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_num_rows($result) > 0;
    }

    private function addDepartment($departmentData) {
        $sql = "INSERT INTO department (name, location) VALUES (?, ?)";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $departmentData['name'], $departmentData['location']);
        mysqli_stmt_execute($stmt);
    }

    private function redirectWithMessage($message) {
        echo '<script>
                alert("' . $message . '");
                window.location.href="department1.php";
              </script>';
        exit;
    }
}

$departmentManager = new DepartmentManager($conn);
$departmentManager->handleDepartmentSubmission();
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hogwarts University</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="stylez.css">
    <link rel="stylesheet" href="stylec.css">
    <link rel="stylesheet" href="stylenew.css">
    
</head>
<body>

<div class="header">
    <?php include("navtrans.php"); ?>
    <nav>
        <a href="Admin.php">
            <h1 style="color:azure;">HU</h1>
            <img src="images/hogwartslogo1.png" alt="logo">
        </a>
        <div class="nav-links">
            <ul>
                <li><a href="course.php">COURSE</a></li>
                <li><a href="department1.php">DEPARTMENT</a></li>
                <li><a href="instructor.php">INSTRUCTOR</a></li>
                <li><a href="register.php">REGISTER</a></li>
                <li><a href="studentsignup.php">STUDENT</a></li>
            </ul>
        </div>
    </nav>
</div>

<div class="view" style="text-align: center;">
    <a href="deptData.php" class="button-link-center big-prominent-button">View Department Info</a>
</div>

<div id="dform">
<label class="heading-label">ADD DEPARTMENT INFO</label><br>
    <form name="form" action="department1.php" method="POST">
        <label class="form-label required">Dept. Name:</label>
        <input type="text" id="name" name="name" class="form-control" required>
        <label class="form-label required">Dept. Location:</label>
        <input type="text" id="location" name="location" class="form-control" required>
        <input type="submit" id="btn" value="SUBMIT" name="sub" class="btn btn-primary mt-3"/>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>
