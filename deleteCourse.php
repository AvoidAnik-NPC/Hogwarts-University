<?php

include("connection.php");

// Checking if 'id' parameter is set in the URL
if (isset($_GET['course_id']) && is_numeric($_GET['course_id'])) {
    $course_id = $_GET['course_id'];

    // SQL query to delete a record with the given ID
    $sql = "DELETE FROM course WHERE course_id = $course_id";

    if ($conn->query($sql) === TRUE) {
      //  echo "Record deleted successfully";
      echo '<script>
      window.location.href="courseData.php";
      alert("Course Deleted Successfully!!");
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
