$(document).ready(function() {
  //register functions
  closeuser = function() {
    $('#user-edit').hide();
  }
  openuser = function() {
    $('#user-edit').show();
  }

  $('#user-button').click(openuser);
  $('#close-modal-update').click(closeuser);

  //set reference to modal
  var modal=document.getElementById('user-edit');

  window.onclick=function(event) {
    if (event.target==modal) {
      $('#user-edit').hide();
    }
  }
});


/*onclick="document.getElementById('log-in').style.display='none'" class="close" title="Close Modal">&times;</span>*/
