<?php
session_start();
// echo $_SESSION['id'];
if (isset($_SESSION['id']) !== TRUE) {
  header("Location: signin.php");
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
        echo "<pre>";
        print_r($_FILES['image']);
        echo "</pre>";
      
      $storefile = $_FILES['image'];
    
      $id = $_POST['id'];
      $image=$storefile['name'];
      $name = $_POST['name'];
      $email = $_POST['email'];
      $mobile = $_POST['mobile'];

      move_uploaded_file($storefile['tmp_name'],'images/'. $image);
      $update_data = "UPDATE students SET image='{$image}',name='{$name}',email='{$email}',mobile='{$mobile}' WHERE id={$id}"; 

if($DBConnect->query($update_data) === TRUE){
  echo "Data Updated  Successfully";
  header("Location: show.php");
  echo "<br>";
}else {
  echo "Error while updating data : ". $DBConnect->error;
  echo "<br>";
}
    }




    $student_id = $_GET['id'];

    $allData = "SELECT * FROM students WHERE id = {$student_id}";
    $result = mysqli_query($DBConnect,$allData);

    // echo "<pre>";
    // echo print_r($result);
    // echo "<pre>";

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
        ?>
   <div class="container">
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
      <form action=" <?php echo $_SERVER['PHP_SELF'] ?> " method="post"  encType="multipart/form-data">
        <p> <input type="hidden" name="id" value=<?php echo $row["id"];?> > </p>
        <p><img src="images/<?php echo $row["image"];?>" alt="" height="50px" width="50px"></p>
        <p> <input type="file" name="image"  class="form-control"> </p>
        <p> <input type="text" placeholder="Enter Name" name="name"  value=<?php echo $row["name"];?>  class="form-control"> </p>
        <p> <input type="email" placeholder="Enter Email" name="email"  value=<?php echo $row["email"];?> class="form-control"> </p>
        <p> <input type="number" placeholder="Enter Number" name="mobile"  value=<?php echo $row["mobile"];?> class="form-control"> </p>
        <p> <input type="submit" name="save" value="UPDATE" class="btn btn-outline-info form-control"> </p>
      </form>
        </div>
        <div class="col-sm-4"></div>
      </div>
    </div>
   <?php } } ?>
</body>
</html>