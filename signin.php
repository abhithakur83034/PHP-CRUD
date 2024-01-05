<?php
session_start(); 
// echo $_SESSION['id'];
if(isset($_SESSION['id']) === TRUE){
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

    // echo "<pre>";
    // echo print_r($_POST);
    // echo "<pre>";

    if(isset($_POST['save'])){
        

        $email = $_POST['email'];
        $password = $_POST['password'];


        $sql = "SELECT * FROM register WHERE email='$email' AND password='$password'";

        $result = mysqli_query($DBConnect, $sql);

    // echo "<pre>";
    // echo print_r($result);
    // echo "<pre>";

    
        if (mysqli_num_rows($result) === 1) {
            
                echo "Logged in!";
                $row = mysqli_fetch_assoc($result);
                $_SESSION['email'] = $row['email'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['id'] = $row['id'];
                header("Location: add.php");
            }else{
                echo "Incorect User email or password";
               }
        }
    ?>


    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
     <p> <input type="email" placeholder="Enter Email" name="email"> </p>
     <p> <input type="password" placeholder="Enter Password" name="password"> </p>
     <p> <input type="submit" name="save" value="SignUp"> </p>

     <p> <a href="signup.php">Go To SignUp</a> </p>
    </form>
</body>
</html>