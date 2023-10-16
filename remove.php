<?php 
include "cnct.php";
if(isset($_GET["id"])){
    $id=$_GET["id"];
    $stmt=$conn->prepare(" DELETE FROM   lesnews WHERE id ='$id'  ");
    $stmt->execute();
    header("location:indexadmin.php");
}


?>