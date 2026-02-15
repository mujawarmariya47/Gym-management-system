
<?php
session_start();


if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}

include 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>


<form method="POST" action="register_process.php" class="form">
<h2>Register</h2>
    <label>Name:</label>
    <input type="text" name="name" required><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Password:</label>
    <input type="password" name="password" required><br>

    <label>Phone:</label>
    <input type="text" name="phone" required><br>

    <label>Membership Type:</label>
    <input type="text" name="membership" required><br>

    <button type="submit">Register</button>
    <p>Already have an account? <a href="login.php">Login</a></p>
</form>



</body>
</html>

