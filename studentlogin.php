<?php
include('connection.php');

if (isset($_POST['submit'])) {
    $Email = $_POST['Email'];
    $password = $_POST['pass'];

    $sql = "SELECT * FROM student WHERE Email = '$Email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($row && password_verify($password, $row["password"])) {
        // Valid login
        session_start();
        session_regenerate_id(true); // Regenerate the session ID for security

        $_SESSION['Email'] = $row['Email'];
        $_SESSION['loggedin'] = true;

        header("Location: student.php");
        exit(); // Ensure that no further code is executed after redirect
    } else {
        // Invalid login
        echo  '<script>
                    alert("Login failed. Invalid username or password!!")
                    window.location.href = "studentlogin.php";
                </script>';
    }
}

include("connection.php");
//include("navbar.php");
?>

<html>
<head>
    <title>Student Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="stylez.css">
</head>
<body>
    <br><br>
    <div id="form">
        <h1 id="heading">Student Login Form</h1>
        <form name="form" action="studentlogin.php" method="POST" required onsubmit="return isValid()">
            <label>Enter Email: </label>
            <input type="email" id="Email" name="Email" required><br><br>
            <label>Password: </label>
            <input type="password" id="pass" name="pass" required><br><br>
            <input type="submit" id="btn" value="Login" name="submit">
           
        </form>
        <div class="back">
   <a class="btn btn-outline-primary" type="submit" href="home.php">Back</a>
    </div>
    </div>
    
    

    <script>
        function isValid() {
            var user = document.form.Email.value;
            if (user.length == "") {
                alert("Enter Email!!");
                return false;
            }
        }
    </script>
</body>
</html>