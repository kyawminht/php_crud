<?php
$con=new PDO("mysql:host=localhost;dbname=php","root","");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>User Registration</h2>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Register" name="submit">
    </form>
</body>
</html>
<?php
if (isset($_POST['submit'])){
   $name= $_POST['name'];
   $email= $_POST['email'];
   $pass= $_POST['password'];


   $sql='insert into users (name,email,password) values(:name,:email,:password)';


$stm=$con->prepare($sql);
$stm->bindParam(":name",$name);
$stm->bindParam(":email",$email);
$stm->bindParam(":password",$pass);


$stm->execute();

echo "success";
}
?>