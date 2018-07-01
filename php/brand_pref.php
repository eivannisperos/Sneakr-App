<?php
  session_start();

  $brand = trim($_POST['brand']);
  $current_user = $_SESSION['valid_user'];

  $conn = new mysqli('localhost', 'root', 'enispero', 'enispero');

  $test = "SELECT username FROM userpref WHERE username='$current_user'";
  $result = mysqli_query($conn, $test);

  if (!$result) {
    echo "Cannot run update";
    exit;
  }

  $count = mysqli_num_rows($result);
  if ($count > 0) {
    $query = "UPDATE userpref SET brand='$brand' WHERE username='$current_user'";
    $update = mysqli_query($conn, $query);
  } else {
    $query = "INSERT INTO userpref (username, brand) VALUES ('$current_user','$brand')";
    $update = mysqli_query($conn, $query);
  }

  echo "<p>Your new brand preference is $brand.</p>";
  echo '<a href="../index.php">Back to Home Page</a>';

  mysqli_close($conn);

?>
