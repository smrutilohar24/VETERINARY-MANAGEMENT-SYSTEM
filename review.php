<?php
$insert = false;

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['name'])){
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

    $name = $_POST['name'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    // Ensure values are properly sanitized before insertion to prevent SQL injection
    $name = mysqli_real_escape_string($con, $name);
    $rating = mysqli_real_escape_string($con, $rating);
    $comment = mysqli_real_escape_string($con, $comment);
    
    $sql = "INSERT INTO `reviewp` ( `name`, `rating`, `comment`) VALUES ( '$name', '$rating', '$comment')";
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