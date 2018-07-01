<?php
  session_start();

  //if the user has entered in their username and password
  if (isset($_POST['user-name']) && isset($_POST['password'])) {
    //asign them to variables so that php can handle them
    $username = trim($_POST['user-name']);
    $password = trim($_POST['password']);

    //connect to database
    $db_conn = new mysqli('localhost', 'root', 'enispero', 'enispero');

    //search database for log-in information
    $query = "SELECT * FROM users WHERE username='$username' and password='$password'";

    $result = mysqli_query($db_conn, $query);

    //if the result is empty
    if (!$result) {
      echo "Cannot run query.";
      exit;
    }

    $count = mysqli_num_rows($result);
    if ($count > 0) {
      //if the user is in the Databse
      $_SESSION['valid_user']=$username;
    }

    //close database connection
    mysqli_close($db_conn);
  }
?>

<html>
  <head>
    <title>Welcome</title>
  </head>
  <body>
      <?php
        //checks to see if there is a valid user in session
        if (isset($_SESSION['valid_user'])) {
          echo '<h1>Welcome.</h1>';
          echo '<p>You are logged in as: '.$_SESSION['valid_user'].' <br />';
          echo '<a href="../index_members.php">Go to Members Section</a><br />';
          echo '<a href="log_out.php">Log out</a></p>';
        } else {
          //user still tried loggin in
          if (isset($username)) {
            echo '<p>Could not log you in.</p>';
            echo '<a href="../index.php">Back to Home Page</a>';
          } else {
            echo '<p>You are not logged in. </p>';
            echo '<pre>';
            var_dump($_SESSION);
            echo '</pre>';
            echo '<a href="../index.php">Back to Home Page</a>';
          }
        }
      ?>
  </body>
</html>
