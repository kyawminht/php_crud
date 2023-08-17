 <?php
     require_once './header.php';

     //delete alert message
     if (isset($_GET['delete'])){
         ?>
         <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Wow!</strong> delete data success.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
     <?php
     }
     ?>
     <?php
     //update alert message
     if (isset($_GET['update'])){
         ?>
         <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Wow!</strong> update data success.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
     <?php
     }
     ?>

     <?php
     //create alter message
     if (isset($_GET['create'])){
         ?>
         <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Wow!</strong> create new data success.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
     <?php
     }
     ?>

 <a class="btn btn-success ms-auto" href="./create.php">create</a>

 <table class="table table-striped">
     <thead>
     <tr>
         <th scope="col">ID</th>
         <th scope="col">Name</th>
         <th scope="col">Image</th>
         <th>Action</th>
     </tr>
     </thead>
     <tbody>
     <?php
      $sql="select * from users";
      $statement=$pdo->prepare($sql);
      $statement->execute();

      $result=$statement->fetchAll(PDO::FETCH_ASSOC);
      foreach ($result as $data){
          ?>
          <tr>
              <td><?php echo $data['id']?></td>
              <td><?php echo $data['name']?></td>
              <td>
                  <img src="images/<?php echo $data['image']?>" alt="" style="width: 50px; height: 50px;" class="rounded-circle">
              </td>
              <td>
                  <a href="./edit.php?id=<?php echo $data['id']?>" class="btn btn-sm btn-dark">Edit</a>
                  <a href="./delete.php?id=<?php echo $data['id']?>" class="btn btn-sm btn-danger">Delete</a>

              </td>
          </tr>
     <?php
      }
     ?>


     </tbody>
 </table>


 <?php
 require_once './footer.php';
 ?>
