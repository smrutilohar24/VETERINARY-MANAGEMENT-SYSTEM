<?php
$insert = false;

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['email'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "vms";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password, $database);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables

    $owner_name = $_POST['owner_name'];
    $email = $_POST['email'];
    $pet_name = $_POST['pet_name'];
    $mess = $_POST['mess'];

    // Ensure values are properly sanitized before insertion to prevent SQL injection
    $owner_name = mysqli_real_escape_string($con, $owner_name);
    $email = mysqli_real_escape_string($con, $email);
    $pet_name = mysqli_real_escape_string($con, $pet_name);
    $mess = mysqli_real_escape_string($con, $mess);
    
    $sql = "INSERT INTO `vms`.`onlineconsult` (`owner_name`,`email`,`pet_name`,`mess`) VALUES ('$owner_name','$email','$pet_name','$mess')";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>