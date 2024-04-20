<?php
$conn = mysqli_connect('localhost','root','', 'vms');

if(isset($_POST['submit'])){
  // Sanitize user input to prevent SQL injection
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = mysqli_real_escape_string($conn, $_POST['pass']);
  
  // Explicitly specify column names in the INSERT query
  $query = "INSERT INTO `loginn` (`email`, `pass`) VALUES ('$email', '$pass')";
  
  if(mysqli_query($conn,$query)){
    echo "SUCCESSFUL";
  } else {
    // Display error if query execution fails
    echo "Error: " . mysqli_error($conn);
  }
} else {
  // Handle case when form is not submitted
  die("Form not submitted");
}
?>
