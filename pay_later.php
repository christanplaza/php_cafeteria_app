<?php
session_start();
//initialize cart if not set or is unset
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

//unset quantity
unset($_SESSION['qty_array']);

//initialize total
$total = 0;
$product_count = 0;
if (!empty($_SESSION['cart'])) {
    //connection
    $conn = new mysqli('localhost', 'root', '', 'php_cafeteria_app');
    //create array of initail qty which is 1
    $index = 0;
    if (!isset($_SESSION['qty_array'])) {
        $_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
    }
    $sql = "SELECT * FROM products WHERE id IN (" . implode(',', $_SESSION['cart']) . ")";
    $query = $conn->query($sql);
    while ($row = $query->fetch_assoc()) {
        $total += floatval($row['price']);
        $product_count++;
    }
    $date = (new \DateTime())->format('Y-m-d H:i:s');

    $save = "INSERT INTO orders (`total`, `datetime`, `order_count`, `type`) VALUES ('$total', '$date', '$product_count', 'pending');";
    $query = $conn->query($save) or die($conn->error);

    $_SESSION['message'] = "Transaction Complete";
    unset($_SESSION['cart']);
    header('location: index.php');
}
