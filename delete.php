<?php
require_once './header.php';

//select
if (isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="delete from users where id=:id";
    $statement=$pdo->prepare($sql);
    $statement->bindParam(':id',$id);
   if ( $statement->execute()){
       header("Location:index.php?delete=success");
   }else{
       echo  "delete failed";
   }


}

?>

