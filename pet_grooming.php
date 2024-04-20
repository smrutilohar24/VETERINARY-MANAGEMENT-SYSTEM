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
    $ph_no = $_POST['ph_no'];
    $pet_name = $_POST['pet_name'];
    $animal = $_POST['animal'];
    $service = $_POST['service'];
    $date = $_POST['date'];
    $mess = $_POST['mess'];
    
    $sql = "INSERT INTO `vms`.`pet_groom` ( `owner_name`, `email`, `ph_no`, `pet_name`, `animal`, `service`, `date`, `mess`) 
    VALUES ('$owner_name', '$email', '$ph_no', '$pet_name', '$animal', '$service', '$date', '$mess') ";
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