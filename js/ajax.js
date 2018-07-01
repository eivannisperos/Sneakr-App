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

  xmlhttp.open("GET", "search_suggestion.php?shoe_name="+str, true);
  xmlhttp.send();
}

$( document ).ready(search_suggestion);
