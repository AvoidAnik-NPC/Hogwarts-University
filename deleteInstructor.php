<?php

include("connection.php");
// Checking if 'id' parameter is set in the URL
if (isset($_GET['Instructor_ID']) && is_numeric($_GET['Instructor_ID'])) {
    $Instructor_ID = $_GET['Instructor_ID'];

    // SQL query to delete a record with the given ID
    $sql = "DELETE FROM instructor WHERE Instructor_ID = $Instructor_ID";

    if ($conn->query($sql) === TRUE) {
      //  echo "Record deleted successfully";
      echo '<script>
      window.location.href="InstructorData.php";
      alert("Instructor Info Deleted Successfully!!");
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
