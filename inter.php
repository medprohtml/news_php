<?php 
include "navuser.php";
include "cnct.php";
 echo '<div class="w-full grid sm:justify-center  lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-2">';




$stmt=$conn->prepare("SELECT * FROM lesnews  where typee='inter' " );
$stmt->execute();
while($news=$stmt->fetch(PDO::FETCH_ASSOC)  ){


?>

<?php echo' 
  <div class=" shadow-sm rounded-md shadow-slate-500 w-full flex flex-col   overflow-hidden bg-white p-2 lg:mt-3 md:mt-1 sm:mt-1  ">
  <img src="'. $news["img"].' " class=" object-cover h-32 w-full" alt="">
  <div class=" font-medium text-sm text-slate-800 p-1 w-full truncate text-lg "> '. $news["title"] .'</div>
  <div class="px-3 shadow-sm h-24 shadow-slate-100 rounded-md py-2">
  <p class=" font-thin text-sm  line-clamp-4  mb-5 ">'. $news["descri"].'</p>
  </div> 
  
  <a class="inline-block" href="#">
  <button
    class="flex select-none items-start  rounded-lg py-3 ms-3 mt-1 text-center align-middle font-sans text-xs font-bold uppercase text-pink-500 transition-all hover:bg-pink-500/10 active:bg-pink-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
    type="button"
  >
   قراءة المزيد 
  </button>
  </a>
   
  </div> 
  
  
   

';}
?>  
</div>