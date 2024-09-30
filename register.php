<?php
    include("connection.php");
    if(isset($_POST['sub'])){

        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $grade = mysqli_real_escape_string($conn, $_POST['grade']);
        //$date = mysqli_real_escape_string($conn, $_POST['date']);
        $Student_ID=mysqli_real_escape_string($conn, $_POST['Student_ID']);
        $course_id=mysqli_real_escape_string($conn, $_POST['course_id']);

        $sql = "SELECT * FROM register WHERE Student_ID='$Student_ID' AND course_id='$course_id'";
        
        $result = mysqli_query($conn, $sql);
        $count_user = mysqli_num_rows($result);


             if($count_user == 0 ){
                $sql = "INSERT INTO register(status, grade, date, Student_ID, course_id) VALUES( '$status' , '$grade' , CURRENT_TIMESTAMP() , '$Student_ID' , '$course_id')";
                $result = mysqli_query($conn, $sql);

               
                if($result){
                    echo '<script>
                    window.location.href="register.php";
                    alert("Registration Successfull!!");
                </script>';
                }
            }
            else{
                if($count_user>0){
                    echo '<script>
                        window.location.href="register.php";
                        alert("Student already registered in this course!!");
                    </script>';
            }
        }

    }
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
        <a href="registerData.php" class="button-link-center big-prominent-button">View Register Info</a>
    </div>
    <div id="rform">
        <label class="heading-label">REGISTER INFO</label><br>
        <form name="form" action="register.php" method="POST">
            <label class="form-label required">Status: </label>
            <input type="text" id="status" name="status" class="form-control" required>
            <label class="form-label required">Grade: </label>
            <input type="text" id="grade" name="grade" class="form-control" required>
            <!-- <label class="form-label required">Date: </label>
            <input type="text" id="date" name="date" class="form-control" required> -->
            <label class="form-label required">Student_ID: </label>
            <input type="number" id="Student_ID" name="Student_ID" class="form-control" required>
            <label class="form-label required">Course_id: </label>
            <input type="text" id="course_id" name="course_id" class="form-control" required>
            <input type="submit" id="btn" value="SUBMIT" name="sub" class="btn btn-primary mt-3"/>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
