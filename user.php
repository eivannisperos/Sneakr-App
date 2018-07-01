<html>
  <head>
    <title>Welcome to Sneakr.</title>
    <link rel="stylesheet" href="css/user.css" type="text/css"/>
  </head>

  <body>
    <!--php form-->
    <?php
      /**user input: username, email, password**/
      $username="";
      $email="";
      $pwd="";
      /*$username = trim($_POST["user-name"]);
      $email = trim($_POST["email"]);
      $pwd = trim($_POST["password"]);*/

      /**validation of data**/
      /*if (!$username || !$email || !$pwd) {
        die("Username, email, or password fields are empty.");
      }*/

      /*if (preg_match("/[^A-Za-z0-9]/", $username) || preg_match("/[^A-Za-z0-9\@\.\_\-]/", $email)) {
          die ("Invalid characters for username! Only numbers 0-9, A-Z uppercase or lowercase are allowed!");
      } else if (!$username || !$email || !$pwd) {
          die("Username, email, or password fields are empty.");
      }*/

      /**open connection to database**/
      require("php/db_connect.php");

      //query and result
      /*$query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$pwd')";
      $result = mysqli_query($connection, $query);*/

      if (isset($_POST['submit'])) {
        $username = trim($_POST["user-name"]);
        $email = trim($_POST["email"]);
        $pwd = trim($_POST["password"]);

        if (preg_match("/[^A-Za-z0-9]/", $username) || preg_match("/[^A-Za-z0-9\@\.\_\-]/", $email)) {
            die ("Invalid characters for username! Only numbers 0-9, A-Z uppercase or lowercase are allowed!");
        } else if (!$username || !$email || !$pwd) {
            die("Username, email, or password fields are empty.");
        }

        //query and result
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$pwd')";
        $result = mysqli_query($connection, $query);
        if (!$result) {
          die ("Databse query failed.".mysqli_error($connection));
        }
      }

      //closes database and frees up resources
      mysqli_close($connection);
    ?>

    <!--form --------------------------->
    <h1 id="header">Welcome to Sneakr.</h1>

    <div class="form-container">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

        <label for="username">username</label>
        <input type="text" name="user-name" placeholder="username" />

        <label for="email">email</label>
        <input type="text" name="email" placeholder="email" />

        <label for="password">confirm password</label>
        <input type="password" name="password" placeholder="password" />

        <input type="submit" name="submit" value="submit" />
      </form>
    </div>
  </body>
</html>
