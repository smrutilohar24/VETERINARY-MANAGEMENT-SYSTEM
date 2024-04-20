<?php
// Check if the form is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Collect form data
    $owner_name =  $_POST['owner_name'];
    $pet_name =  $_POST['pet_name'];
    $email = $_POST['email'];
    $card_number = $_POST['card_number']; // Retrieve card number from form
    $expiry_date = $_POST['expiry_date']; // Retrieve expiry date from form
    $cvv = $_POST['cvv']; // Retrieve CVV from form
    $amount = $_POST['amount']; // Retrieve amount from form
    $service = $_POST['service']; // Retrieve service from form

    // Display a message indicating that payment is being processed
    echo "<h2>Processing Payment...</h2>";

    // Database connection parameters
    $servername = "localhost"; // Change this to your database server name
    $username = "root"; // Change this to your database username
    $password = ""; // Change this to your database password
    $dbname = "vms"; // Change this to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert payment data into the database
    // Prepare SQL statement to insert payment data into the database
$sql = "INSERT INTO `payments` (`owner_name`, `pet_name`, `email`, `card_number`, `expiry_date`, `cvv`, `amount`, `service`, `payment_date`) 
VALUES ('$owner_name', ' $pet_name','$email','$card_number', '$expiry_date', '$cvv', '$amount', '$service', current_timestamp())";


    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        // Display payment success message
        echo "<h2>Payment Processed Successfully!</h2>";
        echo "<p>Owner Name: $owner_name</p>";
        echo "<p>Pet_name: $pet_name</p>";
        echo "<p>Service: $service</p>";
        echo "<p>Amount: $amount</p>";
        echo "<p>CVV: $cvv</p>";

        // Generate bill
        echo "<div class='bill'>";
    echo "<h2>Payment Receipt</h2>";
    echo "<div class='details'>";
    echo "<p><strong>Owner Name: </strong>$owner_name</p>";
    echo "<p><strong>Pet_name: </strong>$pet_name</p>";
    echo "<p><strong>Email: </strong>$email</p>";
    echo "<p><strong>Service:</strong> $service</p>";
    echo "<p><strong>Amount Paid:</strong> $amount</p>";
    echo "<p><strong>Card Number:</strong> $card_number</p>";
    echo "<p><strong>Expiry Date:</strong> $expiry_date</p>";
    echo "<p><strong>CVV:</strong> $cvv</p>";
    echo "</div>";
    echo "<p class='thank-you'>Thank you for your payment!</p>";
    echo "</div>";
    } else {
        // Display error message if payment insertion fails
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();

} else {
    // If the form is not submitted via POST method, redirect to the payment page
    header("Location: payment.html");
    exit(); // Terminate script execution after redirection
}
?>
