<?php
$insert = false;

if(isset($_POST['name'])){
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
$server = "localhost";
$username = "root";
$password = "";
$database = "trip";

$con = mysqli_connect($server, $username, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} 
    //echo "Database connection successful!";

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql ="INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
   // echo $sql;

    if($con->query($sql) == true){
       // echo "Successfully inserted";
       $insert = true;
    }
    else{
        echo "Error : $sql <br> $conn->error";
    }

    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="background">
    <div class="container">
        <h1>Welcome to Us Trip Form</h1>
        <br>
        <p  >Enter your details for the trip.</p>
        <br>
        <?php
        if($insert == true){
        echo "<p class='msg'> Thanks for submitting your form.</p>";
        }
        ?>
        <form action="/project/index.php" method="post">
           <input type="text" name="name" id="name" placeholder="Enter your name">
           <input type="text" name="age" id="age" placeholder="Enter your age">
           <input type="text" name="gender" id="gender" placeholder="Enter your gender">
           <input type="email" name="email" id="email" placeholder="Enter your email">
           <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
           <textarea name="desc" id="desc" placeholder="Enter any other information "></textarea>
           <button class="btn">Submit</button>
        </form>
    </div>
   
    <script src="index.js"></script>
    
</body>
</html>
