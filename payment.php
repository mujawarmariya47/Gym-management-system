<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include 'db_connect.php';

$user_id = $_SESSION['user_id'];
$sql = "SELECT name, email, membership FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($name, $email, $membership);
$stmt->fetch();
$stmt->close();

// Membership Price (Example Prices)
$price = 500; // Default price in INR
if ($membership == "Premium") {
    $price = 1000;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Payment</title>
   <link rel="stylesheet" href="payment.css">
</head>
<body>

<h2>Complete Your Payment</h2>
<p>Name: <?php echo htmlspecialchars($name); ?></p>
<p>Email: <?php echo htmlspecialchars($email); ?></p>
<p>Membership Type: <?php echo htmlspecialchars($membership); ?></p>
<p>Amount: ₹<?php echo $price; ?></p>

<!-- Fake Payment Redirect Form -->
<form action="payment_success.php" method="POST">
    <input type="hidden" name="payment_id" value="PAY<?php echo rand(100000, 999999); ?>">
    <input type="hidden" name="amount" value="<?php echo $price; ?>">
    <button type="submit">Pay Now</button>
</form>

</body>
</html>
