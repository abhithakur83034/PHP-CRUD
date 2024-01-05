<?php
session_start();
// echo $_SESSION['id'];
if (isset($_SESSION['id']) === TRUE ) {
  header("Location: add.php");
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
    require 'dbconnection.php';

    
$sql = "CREATE TABLE IF NOT EXISTS register (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    mobile VARCHAR(12),
    password VARCHAR(50)
    )";
    
    if ($DBConnect->query($sql) === TRUE) {
    echo "Table register created successfully";
    } else {
    echo "Error creating table: " . $DBConnect->error;
    }
    // echo "<pre>";
    // echo print_r($_POST);
    // echo "<pre>";

    if(isset($_POST['save'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];


       $register_user = "INSERT INTO register(firstname,lastname,email,mobile,password)
       VALUES('$fname','$lname','$email','$mobile','$password')";

       if($DBConnect->query($register_user) === TRUE){
        echo "User Registered Successfully";
        echo "<br>";
       }else {
        echo "Error while registering user : ". $DBConnect->error;
        echo "<br>";
       }
    }
    ?>


    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <p> <input type="text" placeholder="Enter First Name" name="fname"> </p>
    <p> <input type="text" placeholder="Enter Last Name" name="lname"> </p>
     <p> <input type="email" placeholder="Enter Email" name="email"> </p>
     <p> <input type="number" placeholder="Enter Number" name="mobile"> </p>
     <p> <input type="password" placeholder="Enter Password" name="password"> </p>
     <p> <input type="submit" name="save" value="SignUp"> </p>

     <p> <a href="signin.php">Go To SignIn</a> </p>
    </form>
</body>
</html>