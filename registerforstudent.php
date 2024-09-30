<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hogwarts University</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="stylez.css">
    <link rel="stylesheet" href="styleedit.css">
    <link rel="stylesheet" href="styles1.css">
  </head>
  <body>
    <div class="header">
      <nav>
        <a href="student.php">
          <h1 style="color: azure;">HU</h1>
          <img src="images/hogwartslogo1.png" alt="logo">
        </a>
        <div class="nav-links">
          <ul>
            <li><a href="viewcoursestudent.php">VIEW COURSES</a></li>
            <li><a href="registerforstudent.php">REGISTER FOR COURSES</a></li>
            <li><a href="registeredCourses.php">REGISTERED COURSES</a></li>
            <li><a href="studentprofile.php">YOUR INFO</a></li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="dark-theme">
      <div class="container mt-5">
        <div class="card mb-4">
          <div class="card-body">
            <h1 class="card-title">REGISTER FOR COURSE</h1>
            <form name="form" action="registerforstudent.php" method="POST">
              <div class="mb-3">
                <label for="course_id" class="form-label">Course ID:</label>
                <select class="form-control" id="course_id" name="course_id" required>
                  <?php
                  include("connection.php");
                  $query = "SELECT course_id, title FROM course WHERE no_of_seats > 0";
                  $result = mysqli_query($conn, $query);
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['course_id'] . '">' . $row['title'] . ' (' . $row['course_id'] . ')</option>';
                  }
                  ?>
                </select>
              </div>
              <button type="submit" class="btn btn-primary" name="sub">SUBMIT</button>
            </form>
          </div>
        </div>
        <h4 class="text-light">Search for courses</h4>
        <!-- Search Form -->
        <form action="" method="GET" class="mb-3">
          <div class="input-group">
            <input type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search']; } ?>" class="form-control" placeholder="Search by Credit, Department or Title" aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-secondary" type="submit">Search</button>
            </div>
          </div>
        </form>
        <!-- Data Table -->
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Search result</h4>
            <table class="table table-bordered">
              <thead class="thead-dark">
                <tr>
                  <th>Course ID</th>
                  <th>Course Title</th>
                  <th>Course Credit</th>
                  <th>Department</th>
                  <th>Semester</th>
                  <th>Seats Available</th>
                  <th>Check In</th>
                  <th>Check Out</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include("connection.php");
                class CourseSearch {
                  private $conn;
                  public function __construct($conn) {
                    $this->conn = $conn;
                  }
                  public function searchCourses($filterValue) {
                    $query = "SELECT * FROM course WHERE 
                    credit LIKE '%$filterValue%' OR 
                    department LIKE '%$filterValue%' OR 
                    title LIKE '%$filterValue%' OR 
                    no_of_seats LIKE '%$filterValue%'";
                    $query_run = mysqli_query($this->conn, $query);
                    return $query_run;
                  }
                }
                if (isset($_GET['search'])) {
                  $filterValue = $_GET['search'];
                  $courseSearch = new CourseSearch($conn);
                  $query_run = $courseSearch->searchCourses($filterValue);
                  if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $item) {
                      ?>
                      <tr>
                        <td><?= $item['course_id']; ?></td>
                        <td><?= $item['title']; ?></td>
                        <td><?= $item['credit']; ?></td>
                        <td><?= $item['department']; ?></td>
                        <td><?= $item['semester']; ?></td>
                        <td><?= $item['no_of_seats']; ?></td>
                        <td><?= $item['CheckIn']; ?></td>
                        <td><?= $item['CheckOut']; ?></td>
                      </tr>
                      <?php
                    }
                  } else {
                    ?>
                    <tr>
                      <td colspan="8">No Record Found</td>
                    </tr>
                    <?php
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <h1 class="text-light">All Courses</h1>
      <div class="container mt-5">
        <table class="table table-dark">
          <thead>
            <tr>
              <th>Course_ID</th>
              <th>Course_Title</th>
              <th>Credit</th>
              <th>Department</th>
              <th>Semester</th>
              <th>No_of_seats</th>
              <th>Check_In</th>
              <th>Check_Out</th>
            </tr>
          </thead>
          <tbody>
            <?php
           include("connection.php");
            // Fetching data from the database
            $sql = "SELECT course_id, title, credit, department, semester, no_of_seats,CheckIn,CheckOut FROM course";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              // Outputting data of each row
              while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["course_id"] . "</td>";
                echo "<td>" . $row["title"] . "</td>";
                echo "<td>" . $row["credit"] . "</td>";
                echo "<td>" . $row["department"] . "</td>";
                echo "<td>" . $row["semester"] . "</td>";
                echo "<td>" . $row["no_of_seats"] . "</td>";
                echo "<td>" . $row["CheckIn"] . "</td>";
                echo "<td>" . $row["CheckOut"] . "</td>";
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='5'>No records found</td></tr>";
            }
            $conn->close();
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="bottom-navbar">
      <a href="student.php" class="button-link-left">Back</a>
      <a href="logoutstudent.php" class="button-link-right">Logout</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>

