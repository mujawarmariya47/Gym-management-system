<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}


session_regenerate_id(true);

include 'db_connect.php';

$user_id = $_SESSION['user_id'];

$sql = "SELECT name, email, phone, membership FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($name, $email, $phone, $membership);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./dashboard.css">
</head>
<body>

<nav>
    <a href="index.html">Home</a>
    <a href="payment.php">Make Payment</a>
    <a href="payment_history.php">View Payment History</a>
    <a href="logout.php">Logout</a>
</nav>

<div class="dashboard-container">
    <h2>Welcome, <?php echo htmlspecialchars($name); ?>!</h2>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
    <p><strong>Phone:</strong> <?php echo htmlspecialchars($phone); ?></p>
    <p><strong>Membership Type:</strong> <?php echo htmlspecialchars($membership); ?></p>
</div>

</body>
</html>
