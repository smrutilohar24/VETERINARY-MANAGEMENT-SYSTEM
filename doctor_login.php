<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Login</title>
    <style>
        body {
            background-color: plum;
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    text-align: center;
    margin-top: 50px;
}

.login-container {
    width: 300px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.login-container h2 {
    margin-bottom: 20px;
}

.login-container input[type="text"],
.login-container input[type="password"],
.login-container button {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

.login-container button {
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
}

.doctor-panel {
    width: 300px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.doctor-panel h2 {
    margin-bottom: 20px;
}

.doctor-panel a {
    text-decoration: none;
    color: #007bff;
}

.doctor-panel a:hover {
    text-decoration: underline;
}

</style>
</head>
<body>

    <div class="login-container">
        <h2>Doctor Login</h2>
        <form action="doctors_dashboard.php" method="post">
            <input type="text" name="doctorname" placeholder="Doctor Name" required>
            <input type="password" name="doctorpass" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
