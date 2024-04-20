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
    $address = $_POST['address'];
    $ph_no = $_POST['ph_no'];
    $new_pass = $_POST['new_pass'];
    $pet_name = $_POST['pet_name'];
    $animal = $_POST['animal'];
    $pet_breed = $_POST['pet_breed'];
    $pet_gender = $_POST['pet_gender'];
    $pet_profile = $_POST['pet_profile'];
    $pet_age = $_POST['pet_age'];
    $pet_health_bio = $_POST['pet_health_bio'];
    
    $sql = "INSERT INTO `vms`.`reg` (`owner_name`, `email`, `address`, `ph_no`, `new_pass`, `pet_name`, `animal`, `pet_breed`, `pet_gender`, `pet_profile`, `pet_age`, `pet_health_bio`) VALUES ('$owner_name', '$email', '$address', '$ph_no', '$new_pass', '$pet_name', '$animal', '$pet_breed', '$pet_gender', '$pet_profile', '$pet_age', '$pet_health_bio')";
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