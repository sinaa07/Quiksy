<?php
session_start();
include 'connection.php';
// Sample product data for display (replace with dynamic data fetching from the database)
$id = $_POST['item_id'];
$query = "select * from item where item_id = $id;";
$r= mysqli_query($conn,$query);

$product = mysqli_fetch_assoc($r);
$c_id = $product['category_id'];

// Related products (replace with actual related product queries from the database)
$q2 = "select * from item where category_id = $c_id and item_id <> $id limit 4;";
$r2= mysqli_query($conn,$q2);
$relatedProducts = [];
while ($row = mysqli_fetch_assoc($r2)) {
    $relatedProducts[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiksy - <?php echo $product['name']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .quiksy-theme { background-color: #f3f4f6; color: #1f2937; }
        .highlight-green { color: #10B981; }
        .floating-cart { 
            position: fixed; 
            bottom: 0; 
            width: 100%; 
            background-color: #fff; 
            border-top: 2px solid #10B981; 
            box-shadow: 0 -2px 8px rgba(0,0,0,0.2); 
        }
        .related-product-img {
            width: 100%;
            height: 160px; /* Adjust height as needed */
            object-fit: cover; /* Ensures no distortion */
            border-radius: 8px; /* Rounded corners */
        }
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

    <!-- Main Product Section -->
    <section class="py-12">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Product Image -->
            <div>
                <img src="<?php echo $product['image_url']; ?>" alt="<?php echo $product['item_name']; ?>" class="w-full rounded-lg shadow-md">
            </div>
            <!-- Product Details -->
            <div>
                <h2 class="text-3xl font-bold text-gray-700"><?php echo $product['item_name']; ?></h2>
                <!--<p class="text-lg text-gray-600 my-4"><?php //echo $product['description']; ?></p> -->
                <p class="text-2xl font-semibold text-green-600 mb-6">Rs.<?php echo number_format($product['price'], 2); ?></p>
                
                <!-- Add to Cart Button -->
                <button class="bg-green-500 text-white py-2 px-6 rounded shadow-lg">Add to Cart</button>
            </div>
        </div>
    </section>

    <!-- Related Products Section -->
    
<section class="bg-white py-12 border-t-2 border-gray-200">
    <div class="container mx-auto px-6">
        <h3 class="text-2xl font-bold text-gray-700 mb-6">You May Also Like</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <?php foreach ($relatedProducts as $related): ?>
            <div class="text-center">
                <!-- Form to Send POST Request -->
                <form action="product.php" method="POST">
                    <input type="hidden" name="item_id" value="<?php echo htmlspecialchars($related['item_id']); ?>">
                    <button type="submit" class="block w-full text-left">
                        <img 
                            src="<?php echo htmlspecialchars($related['image_url']); ?>" 
                            alt="<?php echo htmlspecialchars($related['item_name']); ?>" 
                            class="w-full h-40 object-cover rounded-lg shadow-md mb-2"
                        >
                        <h4 class="text-lg font-semibold text-gray-700 text-center"><?php echo htmlspecialchars($related['item_name']); ?></h4>
                        <p class="text-green-600 font-semibold text-center">Rs.<?php echo number_format($related['price'], 2); ?></p>
                    </button>
                </form>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</section>

    <!-- Floating Cart Footer 
    <div class="floating-cart p-4 flex justify-between items-center">
        <p class="text-gray-700 font-semibold">Cart Total: <span class="text-green-600">$12.50</span></p>
        <a href="checkout.php" class="bg-green-500 text-white py-2 px-6 rounded shadow-lg">Proceed to Checkout</a>
    </div>
    -->
</body>
</html>