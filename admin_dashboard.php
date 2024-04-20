<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check login credentials (you may replace this with your authentication logic)
    $adminname = $_POST["adminname"];
    $adminpass = $_POST["adminpass"];
    
    // Assuming the correct username and password are "admin"
    if ($adminname=== "SMRUTI" && $adminpass === "smruti123") {
        // Set session variables
        $_SESSION["admin_login"] = true;
        
        // Redirect to admin panel
        header("Location: admin_dashboard.php");
        exit();
    } else {
        // Redirect back to login page with error message
        header("Location: admin_login.php?error=1");
        exit();
    }
}

// If the session variable is not set, redirect back to login page
if (!isset($_SESSION["admin_login"])) {
    header("Location: admin_login.php");
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

    // Query to fetch users
    $sql_users = "SELECT * FROM users";
    $result_users = $conn->query($sql_users);

    // Query to fetch doctors
    $sql_doctors = "SELECT * FROM doctors";
    $result_doctors = $conn->query($sql_doctors);

     // Query to fetch appointmentss
     $sql_appointbook = "SELECT * FROM appointbook";
     $result_appointbook = $conn->query($sql_appointbook);

     $sql_payments = "SELECT * FROM payments";
     $result_payments = $conn->query($sql_payments);
 

    // Calculate total users and doctors
    $total_payments = $result_payments->num_rows;
    $total_users = $result_users->num_rows;
    $total_doctors = $result_doctors->num_rows;
    $total_appointbook = $result_appointbook->num_rows;
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
        font-weight: xx-large; /* Make text bold */
        color: #333; 
        font-size:30px;
        transition: all 0.3s ease-in-out;
        font-style:bold;
        
    }
    .info-box p:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
    }

    .total-users {
        background-color: pink; /* Light red */
        border: 2px solid #ff6666; /* Red */
    }
    .total-doctors {
        background-color: #99ccff; /* Light blue */
        border: 2px solid #6699ff; /* Blue */
    }
    .total-appointbook {
        background-color: #b3ffb3; /* Light green */
        border: 2px solid #00b300; /* Green */
    }
    .total-payments {
        background-color: lightsalmon; /* Light green */
        border: 2px solid #00b300; /* Green */
    }

        .info-box h3 {
            margin-top: 0;
            font-size: 30px;
            font-family: 'Times New Roman', Times, serif;
            color: black;
            font-weight: xx-large;
        }

        .user-list {
            list-style-type: none;
            padding: 0;
        }

        .user-list li {
            margin-bottom: 10px;
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
        .payments-list {
            list-style-type: none;
            padding: 0;
        }

        .payments-list li {
            margin-bottom: 10px;
        }
        .info-box .user-list li,
    .info-box .doctor-list li,
    .info-box .appointment-list li ,
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
            <h2>Admin Dashboard</h2>
            <ul>
                <li><a href="users.php"><img src="user_icon.png" alt="User Icon">Users</a></li>
                <li><a href="doctors.php"><img src="doctor_icon.png" alt="Doctor Icon">Veterinarians</a></li>
                <li><a href="appointments.php"><img src="appoint_icon.png" alt="App Icon">Appointments</a></li>
                <li><a href="admin_logout.php"><img src="logout_icon.png" alt="Logout Icon">Logout</a></li>
            </ul>
        </div>
        <div class="main-content">
        <h2>Welcome Admin</h2>
            <div class="info-box">
                <h3>Total Users, Veterinarians, Appointments, and Payments</h3>
                <p class="total-users">Total Users: <?php echo $total_users; ?></p>
                <p class="total-doctors">Total Veterinarians: <?php echo $total_doctors; ?></p>
                <p class="total-appointbook">Total Appointments: <?php echo $total_appointbook; ?></p>
                <p class="total-payments">Total Payments: <?php echo $total_payments; ?></p>
            </div>
            
            <div class="info-box">
                <h3>User List</h3>
                <ul class="user-list">
                <?php
                    if ($result_users->num_rows > 0) {
                        while ($row = $result_users->fetch_assoc()) {
                            echo "<li>" . $row['id']. " - " . $row['username'] . " - " . $row['email'] . "</li>";
                        }
                    } else {
                        echo "No users found.";
                    }
                    ?>
                </ul>
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
