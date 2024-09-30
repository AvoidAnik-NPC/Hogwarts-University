<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom styles for the transparent navbar */
    .navbar {
      background-color: transparent !important;
    }
  </style>
  <title>Transparent Navbar</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <!-- Back icon link on the top left -->
    <a href="student.php" class="btn btn-outline-primary mx-2">
      <i class="bi bi-arrow-left"></i> Back
    </a>

    <!-- Spacer to push links to the right -->
    <div class="flex-grow-1"></div>

    <!-- Logout link on the top right -->
    <a href="logoutstudent.php" class="btn btn-outline-danger">
      Logout <i class="bi bi-box-arrow-right"></i>
    </a>
  </div>
</nav>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<!-- Font Awesome Icons (optional) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

</body>
</html>
