<?php

include("connection.php");

// Checking if 'id' parameter is set in the URL
if (isset($_GET['Student_ID']) && is_numeric($_GET['Student_ID'])) {
    $Student_ID= $_GET['Student_ID'];

    // SQL query to delete a record with the given ID
    $sql = "DELETE FROM student WHERE Student_ID= $Student_ID";

    if ($conn->query($sql) === TRUE) {
      //  echo "Record deleted successfully";
      echo '<script>
      window.location.href="studentData.php";
      alert("Student Info Deleted Successfully!!");
     </script>';
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request";
}


// Closing the connection
$conn->close();
?>
