<?php
include "adminnav.php";
include "cnct.php";
if(isset($_GET["id"])){
$id=$_GET["id"];
$stmt=$conn->prepare("SELECT * from lesnews WHERE id =".$id." ");
$stmt->execute();
$result=$stmt->fetch();

?>


<div class=" w-full justify-center items-center flex ">
   <form  enctype="multipart/form-data" action="" method="post" class="flex flex-col justify-center items-center shadow-lg bg-white mt-10 w-96 h-auto p-4 rounded-md border border-gray-200 p-3 ">
    <div><p class=" text-lg font-bold ">Modifier New</p></div>
   <img src="<?php echo $result["img"]; ?>"  alt="" >
   
    <!--fichier-->
<div class="w-full">
<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Choiser Image</label>
<input name="image" class="  block w-full text-sm  items-center text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
</div>
<!--fichier-->
     <div class=" w-full mt-6 ">
        <label for="title" class=" font-medium text-sm block text-black">Entrer title </label>
     <input type="text" name="title" id="title" class=" h-12 w-full rounded-md border border-gray-300 focus:ring-1 focus:border-blue-700 focus:ring-blue-700" value="<?php echo $result["title"];?>">
    </div>

    <div class=" mt-7">
        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">entrer description</label>
<textarea id="message" name="des" rows="4" cols="50" class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-1 focus:border-blue-600 focus:ring-blue-500  " placeholder="Write your thoughts here..."> <?php echo $result["descri"];} ?></textarea>
</div>
<div class=" w-full mt-6 "> <button type="submit" name="sub" class=" w-full h-10 font-medium mt text-md rounded-md bg-blue-400 text-center">ADD</button></div>
    </form>
</div>

<?php
if (isset($_POST["sub"])) {
    $title = $_POST["title"];
    $des = $_POST["des"];
    
    // Move the uploaded file to a secure location
    $targetDirectory = "image/";
    $targetFileName = $targetDirectory . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $targetFileName);

    // Prepare the SQL statement with placeholders
    $Q = $conn->prepare("UPDATE lesnews SET img=:image, title=:title, descri=:descri WHERE id=:id");

    // Bind the values to the parameters
    $Q->bindParam(':image', $targetFileName);
    $Q->bindParam(':title', $title);
    $Q->bindParam(':descri', $des);
    $Q->bindParam(':id', $_GET["id"]);

    // Execute the statement
    $Q->execute();
}
?>
