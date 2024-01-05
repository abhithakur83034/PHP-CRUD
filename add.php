<?php
session_start();
if(isset($_SESSION['id']) !== TRUE){
  header("Location:signin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
       include 'header.php';
       require 'dbconnection.php';
       include 'style.php';

      if(isset($_POST['save'])){
        // echo "<pre>";
        // echo print_r($_POST);
        // echo "</pre>";

        $table = "CREATE TABLE students(
            id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL,
            email VARCHAR(30) NOT NULL,
            mobile VARCHAR(30) NOT NULL,
            password VARCHAR(30) NOT NULL)";
            

      if($DBConnect->query($table) === TRUE){
        echo "Table Created Successfully";
        echo "<br>";
      }


      // echo "<pre>";
      // print_r($_FILES['image'] );
      // echo "<pre>";
      // echo "<pre>";
      // echo print_r($_POST);
      // echo "<pre>";


      $storefile = $_FILES['image'];

      $image=$storefile['name'];
      $name=$_POST['name'];
      $email=$_POST['email'];
      $mobile=$_POST['mobile'];
      $password=$_POST['password'];
      
      
      // Code for move image into directory
      echo $image;
      move_uploaded_file($storefile['tmp_name'],'images/'. $image);
      $insert_data = "INSERT INTO students(image,name,email,mobile,password)
      VALUES('$image','$name','$email','$mobile','$password')"; 

      if($DBConnect->query($insert_data) === TRUE){
        echo "Data Added Successfully";
        echo "<br>";
      }else {
        echo "Error while adding data : ". $DBConnect->error;
        echo "<br>";
      }

      }


     
    ?>

    <div class="container mt-5">
      <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
        <form action=" <?php echo $_SERVER['PHP_SELF'] ?> " method="post"  encType="multipart/form-data">
        <p> <input type="file" name="image"  class="form-control"> </p>
        <p> <input type="text" placeholder="Enter Name" name="name" class="form-control"> </p>
        <p> <input type="email" placeholder="Enter Email" name="email" class="form-control"> </p>
        <p> <input type="number" placeholder="Enter Number" name="mobile" class="form-control"> </p>
        <p> <input type="password" placeholder="Enter Password" name="password" class="form-control"> </p>
        <p> <input type="submit" name="save" class="btn btn-outline-info form-control"> </p>
      </form>
        </div>
        <div class="col-sm-4"></div>
      </div>
    </div>
</body>
</html>