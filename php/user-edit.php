<?php
  session_start();

  $username = $_SESSION['valid_user'];

  $pwd1 = trim($_GET['password1']);
  $pwd2 = trim($_GET['password2']);
  //checks to see if passwords match
  if ($pwd1 == $pwd2) {

      //connect to database
      $db_conn = new mysqli('localhost', 'root', 'enispero', 'enispero');

      //search database for log-in information
      $query = "UPDATE users SET password='$pwd1' WHERE username='$username'";

      //checks to see if query returned properly
      if (mysqli_query($db_conn, $query)) {
        echo "Password updated successfully!";
        echo '<p><a href="../index_members.php">Back to Home Page</a></p>';
        echo '<p><a href="log_out.php">Log out</a></p>';
      } else {
        echo "Error updating record:".mysqli_error($conn);
        echo '<p><a href="../index_members.php">Back to Home Page</a></p>';
        echo '<p><a href="log_out.php">Log out</a></p>';
      }
      //close database connection
      mysqli_close($db_conn);
  } else {
    echo 'Password does not match! Please try again.';
    echo '<a href="../index_members.php">Back to Home Page</a>';
    echo '<a href="log_out.php">Log out</a>';
  }
?>
