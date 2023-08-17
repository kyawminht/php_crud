<?php
require_once './header.php';
?>

<div class="container mt-4">
    <form method="post" enctype="multipart/form-data" action="">
        <div class="form-group mb-4">
            <label for="nameInput">Name:</label>
            <input type="text" class="form-control" id="nameInput" placeholder="Enter your name" name="name">
        </div>
        <div class="form-group mb-4">
            <label for="fileInput">File:</label>
            <input type="file" class="form-control-file" id="fileInput" name="image">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>


<?php
require_once './footer.php';

if (isset($_POST['submit'])){
    $name=$_POST['name'];
    print_r($_FILES);
   $image_name=$_FILES['image']['name'];
   $tmp_name=$_FILES['image']['tmp_name'];
   $traget_dir="images/".$image_name;
   //move uploade file
   move_uploaded_file($tmp_name,$traget_dir);
   //insert into databasse
    $sql="insert into users (name,image) values (:name,:image)";
   $statemet= $pdo->prepare($sql);
   $statemet->bindParam(':name',$name);
    $statemet->bindParam(':image',$image_name);
    $statemet->execute();
    header("Location:index.php?create=success");



}
?>
