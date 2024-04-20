<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check login credentials (you may replace this with your authentication logic)
    $doctorname = $_POST["doctorname"];
    $doctorpass = $_POST["doctorpass"];
    
    // Assuming the correct username and password are "admin"
    if ($doctorname=== "John Doe" && $doctorpass === "john123") {
        // Set session variables
        $_SESSION["doctor_login"] = true;
       
        // Redirect to admin panel
        header("Location: doctors_dashboard.php");
        exit();
    }
    if ($doctorname=== "Smitha Jane" && $doctorpass === "smitha123") {
        // Set session variables
        $_SESSION["doctor_login"] = true;
        
        // Redirect to admin panel
        header("Location: doctors_dashboard.php");
        exit();
    }
    else {
        // Redirect back to login page with error message
        header("Location: doctor_login.php?error=1");
        exit();
    }
}

// If the session variable is not set, redirect back to login page
if (!isset($_SESSION["doctor_login"])) {
    header("Location: doctor_login.php");
    exit();
}
?>

<?php
    // Database connection
    $db_host = 'localhost'; // Database host
    $db_username = 'root'; // Database username
    $db_password = ''; // Database password
    $db_name = 'vms'; // Database name

    // Create connection
    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to fetch doctors
    $sql_doctors = "SELECT * FROM doctors";
    $result_doctors = $conn->query($sql_doctors);

     // Query to fetch appointmentss
     $sql_appointbook = "SELECT * FROM appointbook";
     $result_appointbook = $conn->query($sql_appointbook);

     // Query to fetch vaccinations
    $sql_vaccbook = "SELECT * FROM vaccbook";
    $result_vaccbook = $conn->query($sql_vaccbook);

      // Query to fetch onlineconsult
      $sql_onlineconsult = "SELECT * FROM onlineconsult ";
      $result_onlineconsult = $conn->query($sql_onlineconsult );
  
      $sql_pet_groom = "SELECT * FROM pet_groom";
      $result_pet_groom = $conn->query($sql_pet_groom );

      $sql_payments = "SELECT * FROM payments";
      $result_payments = $conn->query($sql_payments);
    // Calculate total users and doctors
    
    $total_doctors = $result_doctors->num_rows;
    $total_appointbook = $result_appointbook->num_rows;
    $total_vaccbook = $result_vaccbook->num_rows;
    $total_onlineconsult = $result_onlineconsult->num_rows;
    $total_pet_groom = $result_pet_groom->num_rows;
    $total_payments = $result_payments->num_rows;
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinarian Dashboard</title>
    <style>
        /* CSS styles */
        .container {
            display: flex;
        }

        .sidebar {
            width: 250px;
            background-color: pink;
        }

        .sidebar h2 {
            padding: 20px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 10px 20px;
            font-size: 25px; /* Increase font size */
        font-weight: xx-large; /* Make text bold */
        
    }

        .sidebar ul li a {
            text-decoration:underline;
            color: darkred;
            font-weight: bold;
        }
        .sidebar ul li img {
    width: 25px; /* Adjust size as needed */
    height: 25px; /* Adjust size as needed */
    margin-right: 10px; /* Adjust spacing between icon and text */
}
        .main-content {
            flex-grow: 1;
            padding: 20px;
        }

        .info-box {
            background-color: papayawhip;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            font-size: bold;
            color: black;
        }
        .info-box p {
        display: inline-block;
        border: 2px solid #4CAF50;
        padding: 20px;
        margin: 0 10px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        font-weight: x-large; /* Make text bold */
        color: #333; 
        font-size:30px;
        transition: all 0.3s ease-in-out;
        font-style:bold;
        
    }
    .info-box p:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
    }

    .total-doctors {
        background-color: #99ccff; /* Light blue */
        border: 2px solid #6699ff; /* Blue */
    }
    .total-appointbook {
        background-color: #b3ffb3; /* Light green */
        border: 2px solid #00b300; /* Green */
    }
    .total-vaccbook {
        background-color: pink; /* Light red */
        border: 2px solid #ff6666; /* Red */
    }
    .total-onlineconsult {
        background-color: yellow; /* Light red */
        border: 2px solid #ff6666; /* Red */
    }
    .total-pet_groom {
        background-color: lavenderblush; /* Light red */
        border: 2px solid #ff6666; /* Red */
    }
    .total-payments {
        background-color: paleturquoise; /* Light green */
        border: 2px solid #00b300; /* Green */
    }

        .info-box h3 {
            margin-top: 0;
            font-size: 30px;
            font-family: 'Times New Roman', Times, serif;
            color: black;
            font-weight: xx-large;
        }

        

        .doctor-list {
            list-style-type: none;
            padding: 0;
        }

        .doctor-list li {
            margin-bottom: 10px;
        }

        .appointment-list {
            list-style-type: none;
            padding: 0;
        }

        .appointment-list li {
            margin-bottom: 10px;
        }

        .vaccination-list {
            list-style-type: none;
            padding: 0;
        }

        .vaccination-list li {
            margin-bottom: 10px;
        }

        .onlineconsult-list {
            list-style-type: none;
            padding: 0;
        }

        .onlineconsult-list li {
            margin-bottom: 10px;
        }

        .pet_groom-list {
            list-style-type: none;
            padding: 0;
        }

        .pet_groom-list li {
            margin-bottom: 10px;
        }

        .payments-list {
            list-style-type: none;
            padding: 0;
        }

        .payments-list li {
            margin-bottom: 10px;
        }

    .info-box .doctor-list li,
    .info-box .appointment-list li ,
    .info-box .vaccination-list li,
    .info-box .onlineconsult-list li,
    .info-box .pet_groom-list li ,
    .info-box .payments-list li 
    {
        font-size: 25px; /* Increase font size */
        font-weight: x-large; /* Make text bold */
    }
    h2{
        font-size: 30px; /* Increase font size */
        font-weight: x-large; /* Make text bold */
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>Veterinarian Dashboard</h2>
            <ul>
                
                <li><a href="doctors.php"><img src="doctor_icon.png" alt="Doctor Icon">Veterinarians</a></li>
                <li><a href="appointments.php"><img src="appoint_icon.png" alt="App Icon">Appointments</a></li>
                <li><a href="vaccination.php"><img src="vacc_icon.png" alt="Vaccination Icon">Vaccinations</a></li>
                <li><a href="admin_logout.php"><img src="logout_icon.png" alt="Logout Icon">Logout</a></li>
            </ul>
        </div>
        <div class="main-content">
            <h2>Welcome Veterinarian </h2>
            <div class="info-box">
                <h3>Total Veterinarians, Appointments, Vaccinations</h3>
                <p class="total-doctors">Total Veterinarians: <?php echo $total_doctors; ?></p>
                <p class="total-appointbook">Total Appointments: <?php echo $total_appointbook; ?></p>
                <p class="total-vaccbook">Total Vaccinations: <?php echo $total_vaccbook; ?></p>
            </div>

            <div class="info-box">
                <h3>Total Online Consult, Pet Grooming, Payments</h3>
                <p class="total-onlineconsult">Total Online Consult: <?php echo $total_onlineconsult; ?></p>
                <p class="total-pet_groom">Total Pet Grooming: <?php echo $total_pet_groom; ?></p>
                <p class="total-payments">Total Payments: <?php echo $total_payments; ?></p>
            </div>

            <div class="info-box">
                <h3>Veterinarians List</h3>
                <ul class="doctor-list">
                <?php
                    if ($result_doctors->num_rows > 0) {
                        while ($row = $result_doctors->fetch_assoc()) {
                            echo "<li>" . $row['name'] . " - " . $row['email'] .  " - " . $row['specialization'] ."</li>";
                        }
                    } else {
                        echo "No doctors found.";
                    }
                    ?>
                </ul>
            </div>
            
            <div class="info-box">
                <h3>Appointments List</h3>
                <ul class="appointment-list">
                <?php
                    if ($result_appointbook->num_rows > 0) {
                        while ($row = $result_appointbook->fetch_assoc()) {
                            echo "<li>" . $row['id']. " - " . $row['pet_name'] . " - " . $row['email'] ." - " . $row['owner_name'] ."</li>";
                        }
                    } else {
                        echo "No users found.";
                    }
                    ?>
                </ul>
            </div>

            <div class="info-box">
                <h3>Vaccinations List</h3>
                <ul class="vaccination-list">
                <?php
                    if ($result_vaccbook->num_rows > 0) {
                        while ($row = $result_vaccbook->fetch_assoc()) {
                            echo "<li>" . $row['id']. " - " . $row['pet_name'] . " - " . $row['email'] ." - " . $row['owner_name'] ."</li>";
                        }
                    } else {
                        echo "No users found.";
                    }
                    ?>
                </ul>
            </div>

            <div class="info-box">
                <h3>Online Consult List</h3>
                <ul class="onlineconsult-list">
                <?php
                    if ($result_onlineconsult->num_rows > 0) {
                        while ($row = $result_onlineconsult->fetch_assoc()) {
                            echo "<li>" . $row['id']. " - " . $row['pet_name'] . " - " . $row['email'] ." - " . $row['owner_name'] ."</li>";
                        }
                    } else {
                        echo "No users found.";
                    }
                    ?>
                </ul>
            </div>

            <div class="info-box">
                <h3>Pet Grooming List</h3>
                <ul class="pet_groom-list">
                <?php
                    if ($result_pet_groom->num_rows > 0) {
                        while ($row = $result_pet_groom->fetch_assoc()) {
                            echo "<li>" . $row['id']. " - " . $row['pet_name'] . " - " . $row['email'] ." - " . $row['owner_name'] ." - " . $row['service']." - " . $row['animal']."</li>";
                        }
                    } else {
                        echo "No users found.";
                    }
                    ?>
                </ul>
            </div>

            <div class="info-box">
                <h3>Payments List</h3>
                <ul class="payments-list">
                <?php
                    if ($result_payments->num_rows > 0) {
                        while ($row = $result_payments->fetch_assoc()) {
                            echo "<li>" . $row['id']. " - " . $row['pet_name'] . " - " . $row['email'] ." - " . $row['owner_name'] ." - " . $row['service']." - " . $row['amount']."</li>";
                        }
                    } else {
                        echo "No users found.";
                    }
                    ?>
                </ul>
            </div>
            <!-- You can add more sections for doctors, appointments, etc. -->
            
        </div>
    </div>
</body>
</html>
