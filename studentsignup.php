<?php
    include("connection.php");
    if(isset($_POST['sub'])){

        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $mail = mysqli_real_escape_string($conn, $_POST['mail']);
        $dept = mysqli_real_escape_string($conn, $_POST['dept']);
        $semester = mysqli_real_escape_string($conn, $_POST['semester']);
        $cgpa = mysqli_real_escape_string($conn, $_POST['cgpa']);
        $psw = mysqli_real_escape_string($conn, $_POST['psw']);

        /*$sql="select * from student where FirstName='$firstname'";
        $sql="select * from student where LastName='$lastname'";
        $sql="select * from student where Address='$address'";
        $sql="select * from student where Email='$mail'";
        $sql="select * from student where department='$dept'";
        $sql="select * from student where semester='$semester'";
        $sql="select * from student where cgpa='$cgpa'";*/

        $sql = "SELECT * FROM student WHERE Email='$mail'";
        //echo $sql;


        
        $result = mysqli_query($conn, $sql);
        $count_user = mysqli_num_rows($result);


        if($count_user == 0 ){
                $hash = password_hash($psw, PASSWORD_DEFAULT);
                $sql = "INSERT INTO student(FirstName, LastName, Address, Email, department, semester, cgpa, password) VALUES('$firstname', '$lastname', '$address', '$mail', '$dept', '$semester', '$cgpa', '$hash')";
                
                $result = mysqli_query($conn, $sql);

                if($result){
                    echo '<script>
                    alert("Submission Successful!!");
                </script>';
            }
        }

        else{
            if($count_user>0){
                echo '<script>
                    window.location.href="studentsignup.php";
                    alert("Mail already exists!!");
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
        <a href="studentData.php" class="button-link-center big-prominent-button">View Student Info</a>
    </div>
    <div id="sform">
        <label class="heading-label">ADD STUDENT INFO</label><br>
        <form name="form" action="studentsignup.php" method="POST">
            <label class="form-label required">First Name: </label>
            <input type="text" id="firstname" name="firstname" class="form-control" required>
            <label class="form-label required">Last Name: </label>
            <input type="text" id="lastname" name="lastname" class="form-control" required>
            <label class="form-label required">Address: </label>
            <input type="text" id="address" name="address" class="form-control" required>
            <label class="form-label required">Email: </label>
            <input type="email" id="mail" name="mail" class="form-control" required>
            <label class="form-label required">Department: </label>
            <input type="text" id="dept" name="dept" class="form-control" required>
            <label class="form-label required">Semester: </label>
            <input type="text" id="semester" name="semester" class="form-control" required>
            <label class="form-label required">CGPA: </label>
            <input type="text" id="cgpa" name="cgpa" class="form-control" required>
            <label class="form-label required">Password: </label>
            <input type="password" id="psw" name="psw" class="form-control" required>
            <input type="submit" id="btn" value="SUBMIT" name="sub" class="btn btn-primary mt-3"/>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
