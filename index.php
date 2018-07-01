<?php session_start(); ?>
<html>
  <head>
    <title>Sneakr</title>
    <link rel="stylesheet" href="css/main.css" type="text/css"/>
    <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
  </head>
  <body>

    <?php require('php/form_processing.php'); ?>

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
      <div class="col-2-uc">
        <a href="#"><image src="img/Flyknit.jpg"></image></a>
        <h1 class="item-header-1">NIKE FLYKNIT RACER “OREO”</h1>
        <h2 class="item-date-1">TOMORROW</h2>
      </div>
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

    <!--<div id="register" class="modal">
      <form id="register-modal" class="modal-content animate" method="POST">
        <div class="imgcontainer">
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
    </div>-->

    <div id="sign-in" class="modal">
      <form id="sign-in-modal" class="modal-content animate" action="php/sign_in_processing.php" method="POST">
        <div class="imgcontainer">
          <!--closes the modal-->
          <span id="close-modal-sign-in" class="close" title="Close Modal">&times;</span>
        </div>

        <div class="container">
          <label for="user-name">username</label>
          <input type="text" placeholder="Enter Username" name="user-name" title="username should only contain letters and numbers." required="'required'" pattern="[A-Za-z0-9]+"/>

          <label for="password">password</label>
          <input type="password" name="password" require />

          <button type="submit" name="submit">sign in</button>
        </div>

        <div id="footer" class="container" style="background-color:#f1f1f1">
          <label>New user?</label>
          <button id="register-user-btn" type="button" class="cancelbtn">register</button>
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

    <!--ajax-->
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
