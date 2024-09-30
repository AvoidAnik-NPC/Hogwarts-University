<?php

include("connection.php");

// Checking if 'id' parameter is set in the URL
if (isset($_GET['dept_ID']) && is_numeric($_GET['dept_ID'])) {
    $dept_ID = $_GET['dept_ID'];

    // SQL query to delete a record with the given ID
    $sql = "DELETE FROM department WHERE dept_ID = $dept_ID";

    if ($conn->query($sql) === TRUE) {
      //  echo "Record deleted successfully";
      echo '<script>
      window.location.href="deptData.php";
      alert("Dept. Info Deleted Successfully!!");
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
