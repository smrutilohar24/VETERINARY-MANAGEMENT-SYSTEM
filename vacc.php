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

    $pet_name = $_POST['pet_name'];
    $pet_breed = $_POST['pet_breed'];
    $animal = $_POST['animal'];
    $owner_name = $_POST['owner_name'];
    $vacc_date = $_POST['vacc_date'];
    $vacc_time = $_POST['vacc_time'];
    $email = $_POST['email'];
    $ph_no = $_POST['ph_no'];
    
    $sql = "INSERT INTO `vms`.`vaccbook` (`pet_name`, `pet_breed`, `animal`, `owner_name`, `vacc_date`, `vacc_time`, `email`, `ph_no`) VALUES ('$pet_name', '$pet_breed', '$animal', '$owner_name', '$vacc_date', '$vacc_time', '$email', '$ph_no')";
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