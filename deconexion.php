<?php

session_start();

// Check if the "nom" session variable is set
if (isset($_SESSION["nom"])) {
   // Remove the "nom" session variable
   unset($_SESSION["nom"]);
}

// Redirect to a different page
header("location: adminlogin.php");
exit();
?>