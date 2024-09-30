

<?php
    session_start();
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
        header("location:studentlogin.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hogwarts University Student Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <link rel="stylesheet" href="Admin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,700;1,600&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
    <link rel="stylesheet" href="student.css">
</head>
<body>

<div class="header">
    <nav>
        <a href="student.php" class="logo">
            <h1>Hogwarts University</h1>
            <img src="images/hogwartslogo1.png" alt="logo">
        </a>
        <div class="logout">
        <a class="btn btn-outline-danger mx-2" type="submit" href="logoutstudent.php">Logout</a>
    </div>
        
    </nav>
</div>

<div class="allback">
    <div class="hello">
        <h1>Hello Learner!</h1>
    </div>

    <div class="dashboard">
        <div class="card">
            <h3>View Courses</h3>
            <p>Explore the available courses at Hogwarts University.</p>
            <a href="viewcoursestudent.php" class="btn btn-primary">View Courses</a>
        </div>

        <div class="card">
            <h3>Register for Courses</h3>
            <p>Enroll in your desired courses for the upcoming semester.</p>
            <a href="registerforstudent.php" class="btn btn-primary">Register Now</a>
        </div>
        <div class="card">
            <h3>Registered Courses</h3>
            <p>View your registered courses.</p>
            <a href="registeredCourses.php" class="btn btn-primary">Registered Courses</a>
        </div>

        <div class="card">
            <h3>Your Info</h3>
            <p>View your academic information.</p>
            <a href="studentprofile.php" class="btn btn-primary">View Profile</a>
        </div>
       
    </div>

   
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
