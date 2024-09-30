<?php
include("connection.php");

class InstructorManager {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function handleInstructorSubmission() {
        if (isset($_POST['sub'])) {
            $instructorData = $this->sanitizeInputData($_POST);
            if ($this->isInstructorExist($instructorData['Instructor_Code'])) {
                $this->redirectWithMessage("Instructor Already Exists!!");
            } else {
                $this->addInstructor($instructorData);
                $this->redirectWithMessage("Instructor Added!!");
            }
        }
    }

    private function sanitizeInputData($data) {
        return [
            'Instructor_Code' => mysqli_real_escape_string($this->conn, $data['Instructor_Code']),
            'FirstName' => mysqli_real_escape_string($this->conn, $data['FirstName']),
            'LastName' => mysqli_real_escape_string($this->conn, $data['LastName']),
            'Department' => mysqli_real_escape_string($this->conn, $data['Department'])
        ];
    }

    private function isInstructorExist($Instructor_Code) {
        $sql = "SELECT * FROM instructor WHERE Instructor_Code = ?";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $Instructor_Code);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_num_rows($result) > 0;
    }

    private function addInstructor($instructorData) {
        $sql = "INSERT INTO instructor (Instructor_Code, FirstName, LastName, Department) 
                VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param(
            $stmt, "ssss", 
            $instructorData['Instructor_Code'], 
            $instructorData['FirstName'], 
            $instructorData['LastName'], 
            $instructorData['Department']
        );
        mysqli_stmt_execute($stmt);
    }

    private function redirectWithMessage($message) {
        echo '<script>
                alert("' . $message . '");
                window.location.href="instructor.php";
              </script>';
        exit;
    }
}

$instructorManager = new InstructorManager($conn);
$instructorManager->handleInstructorSubmission();
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
        <a href="instructorData.php" class="button-link-center big-prominent-button">View Instructor Info</a>
    </div>
    <div id="iform">
        <label class="heading-label">ADD INSTRUCTOR INFO</label><br>
        <form name="form" action="instructor.php" method="POST">
            <label class="form-label required">Instructor Code: </label>
            <input type="text" id="Instructor_Code" name="Instructor_Code" class="form-control" required>
            <label class="form-label required">First Name: </label>
            <input type="text" id="FirstName" name="FirstName" class="form-control" required>
            <label class="form-label required">Last Name: </label>
            <input type="text" id="LastName" name="LastName" class="form-control" required>
            <label class="form-label required">Department: </label>
            <input type="text" id="Department" name="Department" class="form-control" required>
            <input type="submit" id="btn" value="ADD" name="sub" class="btn btn-primary mt-3"/>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
