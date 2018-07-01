$(document).ready(function() {
  //register functions
  closeregister = function() {
    $('#register').hide();
  }
  openregister = function() {
    $('#sign-in').hide();
    $('#register').show();
  }

  //sign in functions
  opensignin = function() {
    $('#sign-in').show();
    $('#register').hide();
  }
  closesignin = function() {
    $('#sign-in').hide();
  }

  openuseredit = function() {
    $('#user-edit').show();
  }

  closeuseredit = function() {
    $('#user-edit').hide();
  }

  //search bar
  opensearchbar = function() {
    $('#search-bar').show();
  }

  closesearchbar = function() {
    $('#search-bar').hide();
  }

  //opens and closes sign-in
  $('#user-button').click(opensignin);
  $('#close-modal-sign-in').click(closesignin);

  //opens and closes register
  $('#register-user-btn').click(openregister);
  $('#sign-in-user-btn').click(opensignin);
  $('#close-modal-register').click(closeregister);

  //opens and closes search bar
  $('#search-button').click(opensearchbar);
  $('#close-search-bar').click(closesearchbar);

  //register functions
  closeuser = function() {
    $('#user-edit').hide();
  }
  openuser = function() {
    $('#user-edit').show();
  }

  $('#user-button').click(openuser);
  $('#close-modal-update').click(closeuser);

  //user preference
  closepref = function() {
    $('#user-preference').hide();
  }

  openpref = function() {
    $('#user-preference').show();
    $('#user-edit').hide();
  }

  $('#pref-btn').click(openpref);
  $('#close-modal-pref').click(closepref);

  //set reference to modal
  var modal=document.getElementById('user-edit');

  window.onclick=function(event) {
    if (event.target==modal) {
      $('#user-edit').hide();
    }
  }

  //set reference to modal
  var modal=document.getElementById('log-in');
  var signin = document.getElementById('sign-in');

  window.onclick=function(event) {
    if (event.target==modal || event.target==signin) {
      $('#log-in').hide();
      $('#sign-in').hide();
      $('#user-preference').hide();
    }
  }
});


/*onclick="document.getElementById('log-in').style.display='none'" class="close" title="Close Modal">&times;</span>*/
