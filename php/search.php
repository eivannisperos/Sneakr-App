<?php
  session_start();

  $search = trim($_GET['search']);

  $db_conn = new mysqli('localhost', 'root', 'enispero', 'enispero');

  $query = "SELECT * FROM shoes WHERE shoe_name LIKE '%$search%' OR shoe_brand LIKE '%$search%'";

  $result = mysqli_query($db_conn, $query);

  if (isset($_GET['search'])) {
    if (!$result) {
      die("Database query failed.".mysqli_error($connection));
    }

    echo "<br>";
    echo "You entered:".$search;
    echo "</br>";

    //implement a "search not found" query
    while($row=mysqli_fetch_array($result)) {
      if ($row == null) {
        break;
      }
      echo "<li>";
      echo $row["shoe_id"].", ".$row["shoe_name"].", ".$row["shoe_brand"].", "."$".$row["shoe_price"];
      echo "</li>";
    }


  }

  mysqli_free_result($result);
  mysqli_close($db_conn);
?>
