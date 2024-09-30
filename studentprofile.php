<?php

include("connection.php");
    session_start();
    
    if(!isset($_SESSION['loggedin']) || isset($_SESSION['loggedin'])!=true){
        header("location:studentprofile.php");
        exit;
    }

    $email = $_SESSION['Email'];
    //echo $email;

    $Student_ID = "SELECT Student_ID FROM student WHERE Email = '$email'";
    $result1 = mysqli_query($conn, $Student_ID);
    $row = mysqli_fetch_assoc($result1);
    //echo $row['Student_ID']; 
    $Std_ID = $row['Student_ID'];



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styleedit.css">
    <link rel="stylesheet" href="stylestudent.css">
</head>
<body>


<!-- Header Section -->
<div class="header">


    <nav class="navbar navbar-dark bg-primary">
        <span class="navbar-text">Profile</span>
    </nav>
</div>

<!-- Main Content Section -->
<div class="container mt-5">
<h2 class="text-center mb-4">Student Profile</h2>
    <div class="row justify-content-center">
        <div class="col-md-4 text-center">
            <!-- Profile Image -->
            <div class="profile-image-container">
                <img src='images/default_profile_image.jpg' class="profile-image img-fluid">
            </div>
        </div>
        <div class="col-md-8">
            <!-- Profile Information -->
            <?php
             $servername = 'localhost';
             $username = 'root';
             $password = '';
             $dbname = 'db';
        
             // Creating a connection
             $conn = new mysqli($servername, $username, $password, $dbname);
        
             // Checking the connection
             if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
             }
        
             // Fetching data from the database
             $sql = "SELECT Student_ID,FirstName,LastName,Address,Email,department,semester,cgpa FROM student where Student_ID='$Std_ID'";
             $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='profile-info'><strong>Student ID:</strong> " . $row["Student_ID"] . "</div>";
                    echo "<div class='profile-info'><strong>Name:</strong> " . $row["FirstName"] . " " . $row["LastName"] . "</div>";
                    echo "<div class='profile-info'><strong>Email:</strong> " . $row["Email"] . "</div>";
                    echo "<div class='profile-info'><strong>Address:</strong> " . $row["Address"] . "</div>";
                    echo "<div class='profile-info'><strong>Department:</strong> " . $row["department"] . "</div>";
                    echo "<div class='profile-info'><strong>Semester:</strong> " . $row["semester"] . "</div>";
                    echo "<div class='profile-info'><strong>CGPA:</strong> " . $row["cgpa"] . "</div>";
                }
            } else {
                echo "<div class='profile-info text-center'>No records found</div>";
            }
            $conn->close();
            ?>
        </div>
            
       
    </div>
</div>


<div class="bottom-navbar">
    <a href="student.php" class="button-link-left">Back</a>
    <a href="logoutstudent.php" class="button-link-right">Logout</a>
</div>

</body>
</html>
