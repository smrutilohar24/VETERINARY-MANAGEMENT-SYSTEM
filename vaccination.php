<?php
include("db.php");
include("add_vaccination_form.php");
include("update_vaccination_form.php");
include("delete_vaccination_form.php");

// CRUD operations for users
// Add user
if(isset($_POST['add_vaccination'])) {
    $pet_name = $_POST['pet_name'];
    $owner_name = $_POST['owner_name'];
    $email = $_POST['email'];
    $ph_no = $_POST['ph_no'];
    $vacc_date = $_POST['vacc_date'];
    $vacc_time = $_POST['vacc_time'];

    $sql = "INSERT INTO vaccbook (pet_name, owner_name, email, ph_no, vacc_date, vacc_time) VALUES ('$pet_name', '$owner_name', '$email', '$ph_no', '$vacc_date', '$vacc_time')";
    $conn->query($sql);
}

// Update user
if(isset($_POST['update_vaccination'])) {
    $id = $_POST['id'];
    $pet_name = $_POST['pet_name'];
    $owner_name = $_POST['owner_name'];
    $email = $_POST['email'];
    $ph_no = $_POST['ph_no'];
    $vacc_date = $_POST['vacc_date'];
    $vacc_time = $_POST['vacc_time'];

    $sql = "UPDATE vaccbook SET pet_name='$pet_name', owner_name='$owner_name', email='$email', ph_no='$ph_no', vacc_date='$vacc_date', vacc_time='$vacc_time' WHERE id=$id";
    $conn->query($sql);
}

// Delete user
if(isset($_GET['delete_vaccination'])) {
    $id = $_GET['delete_vaccination'];
    $sql = "DELETE FROM vaccbook WHERE id=$id";
    $conn->query($sql);
}

// Fetch all users
$sql = "SELECT * FROM vaccbook";
$result = $conn->query($sql);
?>
