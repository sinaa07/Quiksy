<?php
session_start();

// Clear the cart by resetting the 'cart' session variable
if (isset($_SESSION['cart'])) {
    // Empty the cart
    $_SESSION['cart'] = [];
}

// Return a JSON response confirming the cart is cleared
echo json_encode([
    'totalItems' => 0,
    'totalPrice' => 0
]);

exit();
?>