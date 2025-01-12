<?php
session_start();

$totalItems = 0;
$totalPrice = 0;

if (!empty($_SESSION['cart'])) {
    include 'connection.php';

    foreach ($_SESSION['cart'] as $id => $qty) {
        $query = "SELECT price FROM item WHERE item_id = $id;";
        $result = mysqli_query($conn, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $item = mysqli_fetch_assoc($result);
            $price = $item['price'];
            
            $totalItems += $qty;
            $totalPrice += $price * $qty;
        }
    }
}

echo json_encode([
    'totalItems' => $totalItems,
    'totalPrice' => $totalPrice
]);
exit();
?>