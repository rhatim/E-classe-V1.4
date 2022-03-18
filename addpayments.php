<?php
$name = $_POST['name'];
$payment_schedule = $_POST['payment_schedule'];
$bill_number = $_POST['bill_number'];
$amount_paid = $_POST['amount_paid'];
$balance_amount = $_POST['balance_amount'];
$date = $_POST['date'];

$conn = new mysqli('localhost', 'root', '', 'e_classe_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO payments(name,payment_schedule,bill_number,amount_paid,balance_amount,date) VALUES(?,?,?,?,?,?)");
    $stmt->bind_param("sssiis", $name,$payment_schedule,$bill_number,$amount_paid,$balance_amount,$date);
    $stmt->execute();
    echo "<script>window.location.replace('pay.php')</script>";
    $stmt->close();
    $conn->close();
}
