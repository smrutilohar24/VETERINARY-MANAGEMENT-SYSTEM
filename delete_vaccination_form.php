<?php
// Assuming $user is an associative array containing user data
// For demonstration purposes, let's assume it's fetched from a database
$vacc = array(
    'id' => 1, // Assuming this is the user's ID
    'pet_name' => 'example_petname',
    'owner_name' => 'example_ownername',
    'email' => 'example@example.com',
    'ph_no' => 'phone' ,
    'vacc_date' => 'vacc_date',
    'vacc_time' => 'vacc_time'// Assuming the user's role
);

// Check if the form is submitted for user deletion
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["delete_vaccination"])) {
    // Retrieve user ID to delete
    $id_to_delete = $_GET["delete_vaccination"];
    
    // Here you would typically perform deletion of the user with the specified ID from the database
    // For demonstration purposes, let's just display a message
    echo "<h2>User Deleted:</h2>";
    echo "<p>ID: $id_to_delete</p>";
    // In a real application, you would typically perform the deletion operation in the database
}
?>

<!-- Assuming this form is embedded within a loop to display multiple users -->
<form method="get" action="vaccination.php">
    <input type="hidden" name="delete_vaccination" value="<?php echo $appoint['id']; ?>">
    <input type="submit" value="Delete">
</form>
