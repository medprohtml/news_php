<?php 
include "adminnav.php";
include "cnct.php";
session_start();

 echo '<div class="w-full grid sm:justify-center  lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-2">';

if(empty($_SESSION["nom"])){
   header("location:adminlogin.php");
}


else{
$stmt=$conn->prepare("SELECT * FROM lesnews" );
$stmt->execute();
while($news=$stmt->fetch(PDO::FETCH_ASSOC)  ){


?>

<?php echo' <div class=" hover:scale-100 shadow-sm shadow-slate-500 w-96 p-4 flex flex-col gap-2 col-span-1 overflow-hidden bg-white ms-4  mt-10  ">
<img src="'. $news["img"].' " class=" object-cover h-52  w-full" alt="">
<div class=" font-bold text-base text-slate-950"><p>Title :</p></div>
<div class=" font-md font-semibold text-slate-800 p-2 w-full truncate text-lg "> '. $news["title"] .'</div>
<div class=" font-bold text-base text-slate-950"><p>Description :</p></div>
<div class="px-3 shadow-sm break-all shadow-slate-300 rounded-md py-2">
<p class=" font-md text-base h-48  mb-5  p-2">'. $news["descri"].'</p>
</div>
<div class="flex w-full">
<button class=" w-full rounded-md h-12 text-white bg-blue-400"> <a class=" h-12" href="modifiernews.php?id='.$news["id"].'"> Modifier</a></button>
<button class=" ms-9 w-full rounded-md h-12 text-white bg-red-400"> <a href="remove.php?id='.$news["id"].'"> Remove</a></button>
 </div>
</div>

';}}
?> 
</div>




