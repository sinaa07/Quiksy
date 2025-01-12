<?php
session_start();
include 'connection.php'; // Database connection file

// Ensure user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php'); // Redirect if the user is not logged in
    exit;
}

// Retrieve user and session values
$userID = $_SESSION['user'];
$total_items = $_SESSION['totI'] ?? 0; // Total items
$total_price = $_SESSION['totP'] ?? 0; // Total price

// Fetch user details
$query = "SELECT * FROM user_details WHERE user_id='$userID';";
$result = mysqli_query($conn, $query);
$user_details = mysqli_fetch_assoc($result);

if (!$user_details) {
    die("Error fetching user details.");
}

// Fetch the last order ID and calculate the next one
$order_id_query = "SELECT MAX(order_id) AS max_order_id FROM orders";
$order_id_result = mysqli_query($conn, $order_id_query);
$order_id_row = mysqli_fetch_assoc($order_id_result);
$next_order_id = $order_id_row['max_order_id'] ? $order_id_row['max_order_id'] + 1 : 1; // Default to 1 if no orders exist

date_default_timezone_set('Asia/Kolkata'); // Set timezone to IST
$order_date = date("Y-m-d H:i:s"); // Current time in IST
$delivery_time = date("h:i A", strtotime("+20 minutes")); // Delivery time in 20 minutes
// Order details
$order_date = date("Y-m-d H:i:s");
$shipping_address = $user_details['address'];
$payment_method = "COD"; // Cash on Delivery
$status = "processing"; // Default status

// Insert the order into the database with the incremented order ID
$sql = "INSERT INTO orders (order_id, user_id, order_date, total_amount,status,payment_method, shipping_address) 
        VALUES ('$next_order_id', '$userID', '$order_date', '$total_price','$status' ,'$payment_method', '$shipping_address');";

if (mysqli_query($conn, $sql)) {
    // Success
} else {
    die("Error placing the order: " . mysqli_error($conn));
}

// Calculate delivery time
$delivery_time = date("h:i A", strtotime("+20 minutes"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Placed - Quiksy</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="quiksy-theme text-gray-800">
    <div class="container mx-auto px-6 py-8">
        <div class="bg-white p-6 rounded-lg shadow-md text-center">
            <h2 class="text-2xl font-semibold text-green-600 mb-4">Order Placed Successfully!</h2>
            <p class="text-xl text-gray-700 mb-2">Order ID: <strong><?php echo $next_order_id; ?></strong></p>
            <p class="text-xl text-gray-700 mb-2">Thank you, <strong><?php echo htmlspecialchars($user_details['name']); ?></strong>!</p>
            <p class="text-lg text-gray-700 mb-4">Your order will be delivered to:</p>
            <p class="text-lg text-gray-700 mb-2"><?php echo htmlspecialchars($shipping_address); ?></p>
            <p class="text-lg text-gray-700 mb-2">Total Items: <?php echo $total_items; ?></p>
            <p class="text-lg text-gray-700 mb-2">Total Amount: ₹<?php echo $total_price; ?></p>
            <p class="text-lg text-gray-700 mb-4">Expected Delivery Time: <strong><?php echo $delivery_time; ?></strong></p>
            <a href="index.php" class="bg-green-500 text-white py-3 px-6 rounded-lg shadow-md hover:bg-green-600">Back to Home</a>
        </div>
    </div>
</body>
</html>

<?php
mysqli_close($conn); // Close the database connection
?>