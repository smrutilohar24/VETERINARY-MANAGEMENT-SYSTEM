<!-- update_appointment_form.php -->
<?php
// Assuming $user is an associative array containing user data
// For demonstration purposes, let's assume it's fetched from a database
$appoint = array(
    'id' => 1, // Assuming this is the user's ID
    'pet_name' => 'example_petname',
    'owner_name' => 'example_ownername',
    'email' => 'example@example.com',
    'ph_no' => 'phone' ,
    'app_date' => 'app_date',
    'app_time' => 'app_time' // Assuming the user's role
);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_appointment"])) {
    // Retrieve form data
    $id = $_POST["id"];
    $pet_name = $_POST['pet_name'];
    $owner_name = $_POST['owner_name'];
    $email = $_POST['email'];
    $ph_no = $_POST['ph_no'];
    $app_date = $_POST['app_date'];
    $app_time = $_POST['app_time'];
    
    
    // Here you can perform validation and sanitization of the form data
    
    // For demonstration purposes, let's just display the submitted data
    echo "<h2>Updated Data:</h2>";
    echo "<p>ID: $id</p>";
    echo "<p>Pet Name: $pet_name</p>";
    echo "<p>Owner's Name: $owner_name</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Phone: $ph_no</p>";
    echo "<p>Appointment Date: $app_date</p>";
    echo "<p>Appointment Time: $app_time</p>";
    // In a real application, you would typically process the data further, such as updating it in a database
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Appointment</title>
    <style>
        /* Style for form container */
.form-container {
    width: 300px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f4f4f4;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Style for form labels */
.form-container label {
    display: block;
    margin-bottom: 5px;
}

/* Style for form inputs */
.form-container input[type="text"],
.form-container input[type="email"],
.form-container input[type="date"],
.form-container input[type="time"],
.form-container input[type="number"],
.form-container select {
    width: calc(100% - 12px);
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

/* Style for submit button */
.form-container input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #4caf50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

/* Style for submit button on hover */
.form-container input[type="submit"]:hover {
    background-color: #45a049;
}

/* Style for form submission message */
.form-submission-message {
    margin-top: 20px;
    padding: 10px;
    background-color: #dff0d8;
    border: 1px solid #d6e9c6;
    border-radius: 4px;
    color: #3c763d;
}

    </style>
</head>
<body>
<div class="form-container">
<form method="post" action="appointments.php">
    <input type="hidden" name="id" value="<?php echo $appoint['id']; ?>">
    <label for="pet_name">Pet Name:</label>
    <input type="text" name="pet_name" value="<?php echo $appoint['pet_name']; ?>" required><br>
    <label for="owner_name">Owner's Name:</label>
    <input type="text" name="owner_name" value="<?php echo $appoint['owner_name']; ?>" required><br>
    <label for="email">Email:</label>
    <input type="email" name="email" value="<?php echo $appoint['email']; ?>" required><br>
    <label for="ph_no">Phone:</label>
    <input type="number" name="ph_no" value="<?php echo $appoint['ph_no']; ?>" required><br>
    <label for="app_date">Appointment Date:</label>
    <input type="date" name="app_date" value="<?php echo $appoint['app_date']; ?>" required><br>
    <label for="app_time">Appointment Time:</label>
    <input type="time" name="app_time" value="<?php echo $appoint['app_time']; ?>" required><br>
    <input type="submit" name="update_appointment" value="Update Appointment">
</form>
</div>
</body>
</html>