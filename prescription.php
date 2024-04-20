<?php
$insert = false;
if(isset($_POST['owner_name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables

    $pet_name = $_POST['pet_name'];
    $owner_name = $_POST['owner_name'];
    $medication = $_POST['medication'];
    $instructions = $_POST['instructions'];
    $doctor_name = $_POST['doctor_name'];
    
    $sql = "INSERT INTO `vms`.`prescript` (`pet_name`,`owner_name`,`medication`,`instructions`,`doctor_name`) VALUES ('$pet_name','$owner_name','$medication','$instructions','$doctor_name')";
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