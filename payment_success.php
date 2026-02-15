<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $payment_id = $_POST['payment_id'] ?? "PAY" . rand(100000, 999999);
    $amount = $_POST['amount'] ?? 0;
    $status = "Success";

    // Insert payment details into database
    $sql = "INSERT INTO payments (user_id, payment_id, amount, status) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isis", $user_id, $payment_id, $amount, $status);

    if ($stmt->execute()) {
        // Redirect after success
        header("Location: payment_history.php");
        exit;
    } else {
        echo "Error saving payment details.";
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: payment.php"); // Redirect if accessed incorrectly
    exit;
}
?>
