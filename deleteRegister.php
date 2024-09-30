<?php

include("connection.php");

// Checking if 'id' parameter is set in the URL
if (isset($_GET['reg_id']) && is_numeric($_GET['reg_id'])) {
    $reg_id = $_GET['reg_id'];

    // SQL query to delete a record with the given ID
    $sql = "DELETE FROM register WHERE reg_id = $reg_id";

    if ($conn->query($sql) === TRUE) {
      //  echo "Record deleted successfully";
      echo '<script>
      window.location.href="registerData.php";
      alert("Register Info Deleted Successfully!!");
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
