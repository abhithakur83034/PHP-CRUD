<?php
session_start();
// echo $_SESSION['id'];
if (!$_SESSION['id']) {
  header("Location: signin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      .f:hover{
        filter: contrast(150%);
        transition: transform 0.3s ease-in-out;
        transform: scale(1.3);
      }
    </style>
</head>
<body>
    <?php
        
    ?>
<?php
       include 'header.php';
       include 'style.php';
       require 'dbconnection.php';


     // start delete record from table *****************************************************************************************************
if(isset($_GET['id'])){
    $student_id = $_GET['id'];
    
            // echo $student_id;
    
            $delData = "DELETE FROM students WHERE id = {$student_id}";
    
            if (mysqli_query($DBConnect, $delData)) {
                echo "Record deleted successfully";
            } else {
                echo "Error deleting record: " . mysqli_error($DBConnect);
            }
}
     // end delete record from table *****************************************************************************************************



     $allData = "SELECT * FROM students";
     $result = mysqli_query($DBConnect,$allData);

      if (mysqli_num_rows($result) > 0) {
           
    ?>

    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-sm-12">
        <table  class="table table-dark" >
        <thead>
            <tr>
                <th>Sr no.</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
              while ($row = mysqli_fetch_assoc($result)) {  
                // echo "<pre>";
                // print_r($row);
                // echo "</pre>";
                ?>
              <tr>
                <td><?php echo $row["id"];?></td>
                <td>
                  <img class="f" src="images/<?php echo $row["image"];?>" alt="" height="50px" width="50px" >                  
                </td>
                <td><?php echo $row["name"];?></td>
                <td><?php echo $row["email"];?></td>
                <td><?php echo $row["mobile"];?></td>
                <td> <a style="text-decoration:none; color:white" href="edit.php?id=<?php echo $row["id"];?>">Update</a> </td>
                <td> <a style="text-decoration:none; color:white"href="?id=<?php echo $row["id"];?>">Delete</a> </td>
              </tr>
          <?php }  ?>
        </tbody>
    </table>
    <?php }else{
        echo "<h2>No Record Found..</h2>";
    } ?>
        </div>
      </div>
    </div>
</body>
</html>