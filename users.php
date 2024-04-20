<?php
include("db.php");
include("add_user_form.php");
include("update_user_form.php");
include("delete_user_form.php");

// CRUD operations for users
// Add user
if(isset($_POST['add_user'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $sql = "INSERT INTO users (username, password, email, role) VALUES ('$username', '$password', '$email', '$role')";
    $conn->query($sql);
}

// Update user
if(isset($_POST['update_user'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $sql = "UPDATE users SET username='$username', password='$password', email='$email', role='$role' WHERE id=$id";
    $conn->query($sql);
}

// Delete user
if(isset($_GET['delete_user'])) {
    $id = $_GET['delete_user'];
    $sql = "DELETE FROM users WHERE id=$id";
    $conn->query($sql);
}

// Fetch all users
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>
