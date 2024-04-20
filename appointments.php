<?php
include("db.php");
include("add_appointment_form.php");
include("update_appointment_form.php");
include("delete_appointment_form.php");

// CRUD operations for users
// Add user
if(isset($_POST['add_appointment'])) {
    $pet_name = $_POST['pet_name'];
    $owner_name = $_POST['owner_name'];
    $email = $_POST['email'];
    $ph_no = $_POST['ph_no'];
    $app_date = $_POST['app_date'];
    $app_time = $_POST['app_time'];

    $sql = "INSERT INTO appointbook (pet_name, owner_name, email, ph_no, app_date, app_time) VALUES ('$pet_name', '$owner_name', '$email', '$ph_no', '$app_date', '$app_time')";
    $conn->query($sql);
}

// Update user
if(isset($_POST['update_appointment'])) {
    $id = $_POST['id'];
    $pet_name = $_POST['pet_name'];
    $owner_name = $_POST['owner_name'];
    $email = $_POST['email'];
    $ph_no = $_POST['ph_no'];
    $app_date = $_POST['app_date'];
    $app_time = $_POST['app_time'];

    $sql = "UPDATE appointbook SET pet_name='$pet_name', owner_name='$owner_name', email='$email', ph_no='$ph_no', app_date='$app_date', app_time='$app_time' WHERE id=$id";
    $conn->query($sql);
}

// Delete user
if(isset($_GET['delete_appointment'])) {
    $id = $_GET['delete_appointment'];
    $sql = "DELETE FROM appointbook WHERE id=$id";
    $conn->query($sql);
}

// Fetch all users
$sql = "SELECT * FROM appointbook";
$result = $conn->query($sql);
?>
