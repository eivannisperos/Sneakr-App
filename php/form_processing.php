<!---------------------------------------------------------------------------------------->
<?php
  /**user input: username, email, password**/
  if ($_GET) {
    $username = trim($_GET["user-name"]);
    $email = trim($_GET["email"]);
    $pwd = trim($_GET["password"]);
  } else {
    $username="";
    $email="";
    $pwd="";
  }

  if (preg_match("/[^A-Za-z0-9]/", $username) || preg_match("/[^A-Za-z0-9\@\.\_\-]/", $email)) {
      die ("Invalid characters for username! Only numbers 0-9, A-Z uppercase or lowercase are allowed!");
  }

  /**open connection to database**/
  require("db_connect.php");
?>

<html>
<div id="register" class="modal">
  <form id="register-modal" class="modal-content animate" method="POST">
    <div class="imgcontainer">
      <!--closes the modal-->
      <span id="close-modal-register" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      <label for="user-name">username</label>
      <input type="text" placeholder="Enter Username" name="user-name" title="username should only contain letters and numbers." required="'required'" pattern="[A-Za-z0-9]+"/>

      <label for="email">email</label>
      <input type="email" placeholder="Enter password" name="email" required="'required'"  />

      <label for="password">password</label>
      <input type="password" name="password" require />

      <button type="submit" name="submit">register</button>
    </div>

    <div id="footer" class="container" style="background-color:#f1f1f1">
      <label>Returning user?</label>
      <button id="sign-in-user-btn" type="button" class="cancelbtn">sign in</button>
    </div>
  </form>
</div>
</html>

<?php
  //query and result
  if ($username !="" || $email !="" || $pwd !="") {
    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$pwd')";
    $result = mysqli_query($connection, $query);
    ?>
    <?php
    if (mysqli_errno($connection)) {
      echo("Duplicate key!");
      return;
    ?>
    <?php
    } else {
      echo ("Registration succesful");
    }
    ?>

  <?php
  } else {
    return;
  }
  ?>
<?php
  mysqli_close($connection);
?>

<!---------------------------------------------------------------------------------------->
