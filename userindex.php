<?php include "navuser.php";?>


<div id="div" class="w-full grid sm:justify-center ps-3 pe-3  lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-2">


</div>
<script>
function loadDoc() {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("div").innerHTML = this.responseText;
  }
  xhttp.open("GET", "datause.php");
  xhttp.send();
}
loadDoc()
</script>