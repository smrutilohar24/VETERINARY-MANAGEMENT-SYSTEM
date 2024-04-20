<?php
include("db.php");
include("add_doctor_form.php");
include("update_doctor_form.php");
include("delete_doctor_form.php");

// CRUD operations for users
// Add user
if(isset($_POST['add_doctor'])) {
    $name = $_POST['name'];
    $specialization = $_POST['specialization'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO doctors (name, specialization, email, phone) VALUES ('$name', '$specialization', '$email', '$phone')";
    $conn->query($sql);
}

// Update user
if(isset($_POST['update_doctor'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $specialization = $_POST['specialization'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE doctors SET name='$name', specialization='$specialization', email='$email', phone='$phone' WHERE id=$id";
    $conn->query($sql);
}

// Delete user
if(isset($_GET['delete_doctor'])) {
    $id = $_GET['delete_doctor'];
    $sql = "DELETE FROM doctors WHERE id=$id";
    $conn->query($sql);
}

// Fetch all users
$sql = "SELECT * FROM doctors";
$result = $conn->query($sql);
?>
