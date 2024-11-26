<?php
session_start();
// Initialize the cart if it's not already present
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiksy - My Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .quiksy-theme { background-color: #f3f4f6; color: #1f2937; }
        .highlight-green { color: #10B981; }
    </style>
</head>
<body class="quiksy-theme text-gray-800">

    <!-- Navigation Bar -->
  <header class="bg-white shadow-md border-b-2">
    <div class="container mx-auto px-5 py-4 flex justify-between items-center">
    <a href="index.php">
      <div class="flex justify-start space-x-2 cursor-pointer">
        <h1 class="text-2xl font-bold text-green-600 ">Quiksy</h1>
        <!-- Stylish Lightning Icon to the Right -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
        </svg>
      </div>
      </a>
      <nav class="flex space-x-6">
        <a href="index.php" class="text-gray-600 hover:text-green-500">Home</a>
        <a href="login.php" target="_self" class="text-gray-600 hover:text-green-500">Account</a>
        <a href="mycart.php" class="text-gray-600 hover:text-green-500">My Cart</a>
        <a href="contact.html" class="text-gray-600 hover:text-green-500">Contact Us</a>
      </nav> 
    </div>
  </header>

    <!-- Cart Section -->
    <section class="py-12">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-gray-700 mb-6">Order Details: </h2>
            <div class="bg-white rounded-lg shadow-md p-6">
                
                <!-- Cart Total and Checkout -->
                <div class="flex justify-between items-center mt-6">
                    <p class="text-xl font-semibold text-gray-700" id="items">Total Items: <?php echo $_SESSION['totI'] ?></p>
                    <p class="text-xl font-semibold text-gray-700" id="items">Total Amount: Rs.<?php echo $_SESSION['totP'] ?></p>
                    <a href="checkout.php" class="bg-green-500 text-white py-2 px-6 rounded-lg shadow-md hover:bg-green-600">Place Order</a>
                </div>
            </div>
        </div>
    </section>
    <script>
    let qty = sessionStorage.getItem('totalItems' ,$totalItems);
    let amount = sessionStorage.getItem('totalPrice' ,$totalPrice);
    document.getElementById("items").innerHTML = qty;
    document.getElementById("amt").innerHTML = amount;
    </script>
</body>
</html>




