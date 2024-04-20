<?php
$insert = false;
if(isset($_POST['email'])){
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

    $owner_name = $_POST['owner_name'];
    $email = $_POST['email'];
    $ph_no = $_POST['ph_no'];
    $animal = $_POST['animal'];
    $pet_name = $_POST['pet_name'];
    $reason = $_POST['reason'];
    
    $sql = "INSERT INTO `vms`.`appcancel` (`owner_name`,`email`, `ph_no`, `animal`,`pet_name`,`reason`) VALUES ('$owner_name', '$email', '$ph_no', '$animal','$pet_name','$reason')";
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