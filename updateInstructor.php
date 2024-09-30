<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Instructor_ID = $_POST['Instructor_ID'];
    $Instructor_Code = $_POST['Instructor_Code'];
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Department = $_POST['Department'];
    

    $sql = "UPDATE instructor SET Instructor_Code ='$Instructor_Code ', FirstName='$FirstName', LastName='$LastName', Department='$Department' WHERE Instructor_ID=$Instructor_ID";

    if ($conn->query($sql) === TRUE) {
        //  echo "Record updated successfully";
        echo '<script>
                 window.location.href="InstructorData.php";
                 alert("Instructor Info Updated Successfully!!");
             </script>';
    }
} else {
    echo "Error updating record: " . $conn->error;
}



$conn->close();
?>