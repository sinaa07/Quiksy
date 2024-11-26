<?php
session_start();
include 'connection.php'; 

$itemId = isset($_POST['item_id']) ? intval($_POST['item_id']) : null;
$quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

if ($itemId && $quantity > 0) {
    if (isset($_SESSION['cart'][$itemId])) {
        // Update quantity of the existing item
        $_SESSION['cart'][$itemId] = $quantity;
    } else {
        // Add new item to the cart
        $_SESSION['cart'][$itemId] = $quantity;
    }
}
$totalItems = 0;
$totalPrice = 0;

if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $id => $qty) {
        $query = "SELECT price FROM item WHERE item_id = $id";
        $result = mysqli_query($conn, $query);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $item = mysqli_fetch_assoc($result);
            $price = $item['price'];
            
            $totalItems += $qty;
            $totalPrice += $price * $qty;
        }
    }
}
$_SESSION['totI'] = $totalItems;
$_SESSION['totP'] = $totalPrice;

echo json_encode([
    'totalItems' => $totalItems,
    'totalPrice' => $totalPrice
]);
exit();
?>
