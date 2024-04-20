<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "vms";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the "doctors" table
$sql = "SELECT email, pet_name, pet_breed, owner_name  FROM reg";
$result = $conn->query($sql);

$reg = array();
if ($result->num_rows > 0) {
    // Fetch data from each row and store it in the $doctors array
    while ($row = $result->fetch_assoc()) {
        $reg[] = $row;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Patients - Veterinary Management System</title>
    <link rel="stylesheet" href="styles.css">
<style>
body {
    font-family: Times New Roman, sans-serif;
font-size: 25px;
    background-color:#e4f9f7;
      background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}

.container {
    max-width: 700px;
    margin: 0 auto;
    padding: 100px;
    background-color:#f4d1e5 ;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
opacity: 0.7;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
font-weight: bold;
font-size: 20px;
  color: black;
  padding: 8px;
  font-family: Times New Roman;
}



input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

button {
    background-color: #007BFF;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
background-color: green;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.6),
                    0 6px 20px 0 rgba(0, 0, 0, 0.24);
}

    button:hover {
        background-color: #0056b3;
    }

#confirmation {
    margin-top: 20px;
    text-align: center;
    font-weight: bold;
}
select {
display: block;
        width: 250px;
        margin: 8px;
font-weight: normal;
font-size: 20px;
padding: 8px;

    }
    select:focus {
        min-width: 250px;
        width: auto;
    }
    .bg{
        background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
    width: 100%;
    height: 150%;
    position: absolute;
    z-index: -1;
    opacity: 0.6;
}
  
</style>
</head>
<body>
    <header>
        <h1>Manage Patients</h1>
        <!-- Add navigation or other elements here -->
    </header>

    <div class="container">
        <div class="admin-content">
            <h2>Patients List</h2>
           <table border="1" cellspacing="50">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Pet Name</th>
                        <th>Pet Breed</th>
                        <th>Owner Name</th>
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reg as $patient): ?>
                    <tr>
                        <td><?php echo $patient['email']; ?></td>
                        <td><?php echo $patient['pet_name']; ?></td>
                        <td><?php echo $patient['pet_breed']; ?></td>
                        <td><?php echo $patient['owner_name']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>        </div>
    </div>
</body>
</html>
