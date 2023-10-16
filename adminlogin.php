<?php include "cnct.php";
$eror1="";
if(isset($_POST["sub"])){
    $user=$_POST["user"];
    $pass=$_POST["pass"];
    
    if(!empty($user)&& !empty($pass)){
        session_start();
        $stmt=$conn->prepare("SELECT * from infologin where adminuser='$user' and pass ='$pass' ");
        $stmt->execute();
        if($stmt->rowCount()>0){
          $result=$stmt->fetch();
          $_SESSION["nom"]=$result["adminuser"];
          header( "location:addnews.php ");
        }
        else{
            $eror1='<div class="mt-4 bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
              <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
              <div>
                <p class="font-bold">Eror in login</p>
                <p class="text-sm">Saiser username et Password</p>
              </div>
            </div>
          </div>';
        }
    }
}
 ?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="w-full h-screen flex justify-center items-center bg-slate-100 ">

<div class=" w-auto  rounded-md shadow-md bg-indigo-50 flex-row  flex  gap-4 ">
<div  class=" w-96 " > <img class="w-96" src="image/loginimg.avif"  alt=""></div>

<form class=" p-2  w-96 " action="" method="post">
    <div class=" flex w-full justify-center items-center "><p class="font-lg  text-lg ">Welcome Admin</p></div>
    <div class=" gap-6 mb-6">
        <div>
            <label for="first_name" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white"> name</label>
            <input type="text" name="user" id="first_name" class=" bg-gray-50 border  border-gray-300  text-gray-900 text-sm rounded-md focus:border-blue-500 focus:ring-1 focus:ring-blue-500 focus:outline-none w-full p-2.5  " placeholder="" required>
        </div>
        <div>
            <label for="last_name" class="block mb-2 text-lg  font-medium text-gray-900 dark:text-white">password</label>
            <input type="password" name="pass" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md  focus:border-blue-500  focus:ring-1 focus:ring-blue-500 focus:outline-none w-full p-2.5  " placeholder="" required>
            
        </div>
       

        
      <div>
      <?php echo $eror1 ;?>
      <button type="submit" name="sub" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-96">Submit</button>
      </div>
    </form>
</div>


</body>
</html>
