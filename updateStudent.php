<?php
include("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Student_ID = $_POST['Student_ID'];
    $FirstName= $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Address = $_POST['Address'];
    $Email = $_POST['Email'];
    $department = $_POST['department'];
    $semester = $_POST['semester'];
    $cgpa = $_POST['cgpa'];

    $sql = "UPDATE student SET FirstName='$FirstName', LastName='$LastName', Address='$Address',Email='$Email',department='$department',semester='$semester',cgpa='$cgpa' WHERE Student_ID=$Student_ID";

    if ($conn->query($sql) === TRUE) {
        //  echo "Record updated successfully";
        echo '<script>
                 window.location.href="studentData.php";
                 alert("Student info Updated Successfully!!");
             </script>';
    }
} else {
    echo "Error updating record: " . $conn->error;
}



$conn->close();
?>