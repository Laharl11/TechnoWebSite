<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="assets/img/180.png" rel="icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhilNance - Admin Page</title>
    <link rel="stylesheet" href="loginAdminPage.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    <div class="container">
        <h2 id="error-message">
        </h2>
        <div class="title">Admin Login</div>
        <div class="content">
          <form action="loginAdmin.php" method="post">
            <p id="error-message"></p>
            <div class="user-details">
              <div class="input-box">
                <span class="details">Username</span>
                <input type="text" id="AdminEmail" name="AdminEmail" placeholder="Enter your username" required>
              </div>

              <div class="input-box">
                <span class="details">Password</span>
                <input type="password" id="AdminPassword" name="AdminPassword" placeholder="Enter your password" required>
              </div>

              
              
              <div class="button input-box">
                <input type="submit" value="Submit">
              </div>
              
        </div>
    </div>
    <script src="js/script.js"></script>
    <?php
     if (isset($_SESSION['LoginError']) && $_SESSION['LoginError'] == "yes") {
      echo '<script>document.getElementById("error-message").textContent = "Incorrect Login Details";</script>';
      }
    ?>
</body>
</html>