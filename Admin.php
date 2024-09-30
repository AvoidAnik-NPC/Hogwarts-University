<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || isset($_SESSION['loggedin'])!=true){
        header("location:login.php");
        exit;
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="admin1.css">

  <title>Admin Dashboard</title>
</head>
<body>

<div class="dashboard-container">
  <div class="sidebar">
    <div class="text-center">
      <img src="images/admin.jpg" alt="Admin Image">
      <p class="dashboard-title">Admin</p>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="text-center">
        <a href="courseData.php" class="card-title">Course </a>
    </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="text-center">
        <a href="deptData.php" class="card-title">Department</a>
      </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="text-center">
        <a href="instructorData.php" class="card-title">Instructor </a>
      </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="text-center">
        <a href="registerData.php" class="card-title">Register </a>
    </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="text-center">
        <a href="studentData.php" class="card-title">Student </a>
    </div>
      </div>
      
    </div>
  </div>

  <div class="content">
    <div class="dashboard-header">
      <span class="dashboard-title">Hogwarts University</span>
      <a class="btn btn-outline-danger mx-2" type="submit" href="logout.php">Logout</a>
    </div>

    <p class="welcome-message">Welcome, Admin! Manage your university course registration here.</p>

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Add New Course</h5>
        <p class="card-text">Use this option to add a new course to the university's course offerings.</p>
        <a href="course.php" class="btn btn-success add-new-button">Add Course</a>
        
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Add New Department</h5>
        <p class="card-text">Add a new department to the university's academic structure.</p>
        <a href="department1.php" class="btn btn-success add-new-button">Add Department</a>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Add New Instructor</h5>
        <p class="card-text">Add a new instructor to the university's faculty.</p>
        <a href="instructor.php" class="btn btn-success add-new-button">Add Instructor</a>
       
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Add New Student</h5>
        <p class="card-text">Add a new student to the university's student body.</p>
        <a href="studentsignup.php" class="btn btn-success add-new-button">Add Student</a>
      </div>
    </div>

    <!-- Content goes here -->
    <p>Main content goes here...</p>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>


