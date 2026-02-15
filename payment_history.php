<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include 'db_connect.php';

$user_id = $_SESSION['user_id'];
$sql = "SELECT payment_id, amount, status, payment_date FROM payments WHERE user_id = ? ORDER BY payment_date DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($payment_id, $amount, $status, $payment_date);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment History</title>
    <link rel="stylesheet" href="history.css">
</head>
<body>

<h2>Payment History</h2>
<table border="1">
    <tr>
        <th>Payment ID</th>
        <th>Amount (₹)</th>
        <th>Status</th>
        <th>Date</th>
    </tr>

    <?php while ($stmt->fetch()) { ?>
    <tr>
        <td><?php echo htmlspecialchars($payment_id); ?></td>
        <td><?php echo htmlspecialchars($amount); ?></td>
        <td><?php echo htmlspecialchars($status); ?></td>
        <td><?php echo htmlspecialchars($payment_date); ?></td>
    </tr>
    <?php } ?>

</table>

<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
