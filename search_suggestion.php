<?php
  //provide credentials
  $host="localhost";
  $username="root";
  $password="enispero";
  $db_name="enispero";

  $con=mysqli_connect("$host", "$username", "$password", "$db_name") or die("cannot connect");

  $shoe_name= $_GET['search_value'];
  if (strlen($shoe_name) > 0) {
    $query="SELECT shoe_name FROM shoes WHERE shoe_name LIKE '$shoe_name%'";
    $result=mysqli_query($con, $query);

    while ($row=mysqli_fetch_array($result)) {
      echo "<p>".$row['shoe_name']."</p>";
    }
  } else {
    echo "<p></p>";
  }
 ?>
