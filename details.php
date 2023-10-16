<?php 
include "cnct.php";
include "navuser.php";
if(isset($_GET["id"])){
    $id=$_GET["id"];
    $stmt=$conn->prepare("SELECT * from lesnews WHERE id =".$id." ");
    $stmt->execute();
    $news=$stmt->fetch();
   echo' <div class=" w-full  ">
  <div class=" mt-4 mb-2 w-full flex justify-center items-center"> <p class=" w-96 text-center font-bold">'. $news["title"] .'</p></div>
  <div class=" overflow-hidden w-full h-96 ">
<img src="'. $news["img"].' " class=" h-full object-scale-down  w-full" alt="">
</div>
<div class=" w-full p-2"> <p class="w-full text-clip font-medium text-slate-800">'. $news["descri"].'</p></div>

</div>';}


?>