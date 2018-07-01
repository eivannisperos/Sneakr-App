<?php session_start();
  $c = new mysqli('localhost', 'root', 'enispero', 'enispero');
  $current_user = $_SESSION['valid_user'];

  $q = "SELECT brand FROM userpref WHERE username='$current_user'";
  $result = mysqli_query($c, $q);

  if (!$result) {
    echo "Cannot run query.";
    exit;
  }

  $array = mysqli_fetch_array($result);
  $brand = $array['brand'];
?>
<html>
  <head>
    <title>Sneakr</title>
    <link rel="stylesheet" href="css/main.css" type="text/css"/>
    <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
    <!--<script type="text/javascript" src="js/script_members.js"></script>-->
    <script type="text/javascript" src="js/script.js"></script>
    <!--<script type="text/javascript" src="js/ajax.js"></script>-->
  </head>
  <body>
    <div id="index-featured">
      <div class="navbar">
        <!--<a href="#"><image src="http://webvision.med.utah.edu/wp-content/uploads/2012/06/50-percent-gray.jpg" style="width:26px;height:26px" alt="logo"/></a>-->
        <a href="#">SNEAKR</a>
        <div id="navbar-float-right">
          <a href="#" id="user-button">USERS</a>
          <a href="#">BRANDS</a>
          <a href="#" id="search-button">SEARCH</a>
        </div>
      </div>
      <div class="featured">
        <p>FEATURED</p>
        <a href="#"><image src="img/eqt.jpg" alt="featured-picture"></a>
        <div id="feature-caption">
          <p>スニーカー中毒</p>
        </div>
        <p id="shoe-feature">ADIDAS EQT GREEN</p>
      </div>
    </div>

    <div class="upcoming-release">
      <p>UPCOMING RELEASES</p>

      <?php
        if ($brand == 'nike') {
      ?>
        <div class="col-2-uc">
          <a href="#"><image src="img/Flyknit.jpg"></image></a>
          <h1 class="item-header-1">NIKE FLYKNIT RACER “OREO”</h1>
          <h2 class="item-date-1">TOMORROW</h2>
        </div>
      <?php } else { ?>
        <div class="col-2-uc">
          <a><image src="img/v2.jpg"></image></a>
          <h1 class="item-header-2">YEEZY 350 V2 BLACK RED</h1>
          <h2 class="item-date-2">IN 2 DAYS</h2>
        </div>
        <div class="col-2-uc">
          <a><image src="img/nmd.jpg"></image></a>
          <h1 class="item-header-3">KITH X NAKED NMD CS R2</h1>
          <h2 class="item-date-3">27/03/2017</h2>
        </div>
      <?php } ?>
    </div>

    <div class="search-brand">
      <div id="brand-select-img"></div>
      <p>BRANDS</p>
      <!--<image src="img/brand-select-adidas.png" id="brand-select-img"></image>-->
      <div class="row-1">
        <a href="#">ADIDAS</a>
        <a href="#">NIKE</a>
        <a href="#">ASICS</a>
        <a href="#">Y-3</a>
        <a href="#">COMMON PROJECTS</a>
      </div>
      <div class="row-1">
        <a href="#">JORDANS</a>
        <a href="#">PUMA</a>
        <a href="#">CONVERSE</a>
        <a href="#">YEEZY</a>
        <a href="#">NEW BALANCE</a>
      </div>
    </div>

    <div class="footer">
      <h1>ABOUT</h1>
      <p>Sneakerpedia is an online archive that houses sneakers from all types of brands.
        All photography is owned by the respective copyright owners.</p>
      <p>MADE BY @EIVAN</p>
    </div>

    <div id="user-edit" class="modal">
      <form id="user-edit-modal" class="modal-content animate" action="php/user-edit.php" method="POST">
        <div class="imgcontainer">
          <!--closes the modal-->
          <span id="close-modal-update" class="close" title="Close Modal">&times;</span>
        </div>

        <div class="container">
          <label for="user-name"><?php echo 'You are logged in as: '.$_SESSION['valid_user'].' <br />'; ?></label>

          <label for="password1">Enter New Password</label>
          <input type="password" name="password1" require />

          <label for="password2">Re-Enter New Password</label>
          <input type="password" name="password2" require />

          <button type="submit" name="update">update</button>
        </div>

        <div id="footer" class="container" style="background-color:#f1f1f1">
          <button onclick="location.href='php/log_out.php';" id="log-btn" type="button" class="cancelbtn">log-out</button>
          <button id="pref-btn" type="button" class="cancelbtn">brand preferences</button>
        </div>
      </form>
    </div>

    <div id="user-preference" class="modal">
      <form id="user-pref-modal" class="modal-content animate" action="php/brand_pref.php" method="POST">
        <div class="imgcontainer">
          <!--closes the modal-->
          <span id="close-modal-pref" class="close" title="Close Modal">&times;</span>
        </div>

        <div class="container">
          <input type="radio" name="brand" value="adidas" checked> adidas<br>
          <input type="radio" name="brand" value="nike"> nike<br>
          <input type="radio" name="brand" value="newbalance"> new balance <br />

          <div id="current-pref"></div>

          <button type="submit" name="update">update</button>
        </div>

        <div id="footer" class="container" style="background-color:#f1f1f1">
          <button onclick="location.href='php/log_out.php';" id="log-btn" type="button" class="cancelbtn">log-out</button>
        </div>
      </form>
    </div>

    <div id="search-bar" class="modal">
      <form id="search-bar-modal" class="modal-content animate" method="GET" action="search_suggestion.php">
        <div class="imgcontainer">
          <!--closes the modal-->
          <span id="close-search-bar" class="close" title="Close Modal">&times;</span>
        </div>

        <div class="container">
          <input id="search" name="search_value" onKeyUp="search_suggestion()" type="text" placeholder="search..." required />
        </div>

        <div id="suggestion"></div>
      </form>
    </div>

    <script>
      function search_suggestion() {
        var str = document.getElementById("search").value;

        if (window.XMLHttpRequest) {
          xmlhttp=new XMLHttpRequest();
        } else {
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange=function() {
          if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("suggestion").innerHTML=xmlhttp.responseText;
          }
        }

        xmlhttp.open("GET", "search_suggestion.php?search_value="+str, true);
        xmlhttp.send();
      }
    </script>

  </body>
</html>
