<?php
require_once './header.php';

//select
if (isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="select * from users where id=:id";
    $statement=$pdo->prepare($sql);
    $statement->bindParam(':id',$id);
    $statement->execute();
    $data=$statement->fetch(PDO::FETCH_ASSOC);

}


?>


<div class="container mt-4">
    <h4>edit form</h4>
    <form method="post" enctype="multipart/form-data" action="">
        <div class="form-group mb-4">
            <label for="nameInput">Name:</label>
            <input type="text" class="form-control" value="<?php echo $data['name']?>" id="nameInput" placeholder="Enter your name" name="updateName">
        </div>
        <div class="form-group mb-4">
            <img src="images/<?php echo $data['image']?>" alt="" style="width: 50px; height: 50px;" class="rounded-circle">

            <label for="fileInput">File:</label>
            <input type="file" class="form-control-file" id="fileInput" name="updateImage" >
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>


<?php
require_once './footer.php';

if (isset($_POST['submit'])){
    $name=$_POST['updateName'];
    $image_name=$_FILES['updateImage']['name'];
    $tmp_name=$_FILES['updateImage']['tmp_name'];
    $traget_dir="images/".$image_name;
    //move uploade file
    move_uploaded_file($tmp_name,$traget_dir);
    //insert into databasse
    $sql = "UPDATE users SET name = :name, image = :image WHERE id = :id";
    $statemet= $pdo->prepare($sql);
    $statemet->bindParam(':name',$name);
    $statemet->bindParam(':image',$image_name);
    $statemet->bindParam(':id',$id);
    if ($statemet->execute()){
        header("Location:index.php?update=success");
    }else{
        echo "database update failed";
    }
}else{
    echo "file upload failed";
}
?>
