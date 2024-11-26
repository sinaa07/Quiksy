<?php 
include 'connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category_id'])) {
    $categoryId = $_POST['category_id'];
    $_SESSION['category_id'] = $categoryId;
    header("Location: categories.php");
    exit();
}

$categoryId = isset($_SESSION['category_id']) ? $_SESSION['category_id'] : 1;

$categoriesQuery = "SELECT * FROM categories;";
$categoriesResult = mysqli_query($conn, $categoriesQuery);

$itemsQuery = "SELECT * FROM item WHERE category_id = $categoryId;";
$itemsResult = mysqli_query($conn, $itemsQuery);

$categoryNameQuery = "SELECT name FROM categories WHERE category_id = $categoryId;";
$categoryNameResult = mysqli_query($conn, $categoryNameQuery);
$categoryName = mysqli_fetch_assoc($categoryNameResult)['name'];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
      input[type="number"] {
      -webkit-appearance: none;
      -moz-appearance: textfield;
      appearance: textfield;
      }
      input[type="number"]::-webkit-inner-spin-button,
      input[type="number"]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
      }
    </style>
</head>
<body class="bg-gray-100">

<!-- Navigation Bar -->
<header class="bg-white shadow-md border-b-2">
    <div class="container mx-auto px-5 py-4 flex justify-between items-center">
    <a href="index.php">
      <div class="flex justify-start space-x-2 cursor-pointer">
        <h1 class="text-2xl font-bold text-green-600 ">Quiksy</h1>
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

<div class="flex">
    <!-- Left: Categories List -->
    <div class="w-1/4 bg-white shadow-md p-4">
        <h2 class="text-xl font-bold mb-4">Categories</h2>
        <?php while ($category = mysqli_fetch_assoc($categoriesResult)): ?>
            <form method="POST" action="categories.php" class="mb-2">
                <button type="submit" name="category_id" value="<?php echo $category['category_id']; ?>" 
                        class="flex items-center p-2 w-full text-left <?php echo $categoryId == $category['category_id'] ? 'border-2 border-green-600 rounded-lg bg-gray-100' : ''; ?>">
                    <img src="<?php echo htmlspecialchars($category['image_url']); ?>" 
                         alt="<?php echo htmlspecialchars($category['name']); ?>" 
                         class="w-8 h-8 rounded-full mr-2">
                    <span><?php echo htmlspecialchars($category['name']); ?></span>
                </button>
            </form>
        <?php endwhile; ?>
    </div>

    <!-- Right: Items Display -->
    <div class="w-3/4 p-4">
        <h2 class="text-2xl font-bold mb-4"><?php echo htmlspecialchars($categoryName); ?></h2>
        <div class="grid grid-cols-3 gap-6">
    <?php while ($item = mysqli_fetch_assoc($itemsResult)): ?>
        <div class="bg-white shadow-md rounded p-4">
            <!-- Form for navigating to product page -->
            <form action="product.php" method="POST">
                <!-- Hidden input to pass the item_id -->
                <input type="hidden" name="item_id" value="<?php echo htmlspecialchars($item['item_id']); ?>">
                <!-- Item Image (Submit the form when clicked) -->
                <button type="submit" class="block w-full">
                    <img src="<?php echo htmlspecialchars($item['image_url']); ?>" 
                         alt="<?php echo htmlspecialchars($item['name']); ?>" 
                         class="w-32 h-32 object-cover mx-auto mb-4 rounded-lg">
                </button>
            </form>
            
            <!-- Item Details -->
            <h3 class="font-bold text-lg mb-2 text-gray-700 text-center"><?php echo htmlspecialchars($item['item_name']); ?></h3>
            <p class="text-gray-600 mb-4 text-center">Rs.<?php echo number_format($item['price'], 2); ?></p>

            <!-- Quantity Control -->
             <div class="flex items-center justify-center mb-4">
                <button type="button" class="quantity-btn decrease bg-gray-200 text-gray-700 px-3 py-1 rounded-l hover:bg-gray-300" 
                data-item-id="<?php echo $item['item_id']; ?>">-</button>
                <input type="number" id="quantity-<?php echo $item['item_id']; ?>" class="w-12 text-center" value="1" min="1" />
                <button type="button" class="quantity-btn increase bg-gray-200 text-gray-700 px-3 py-1 rounded-r hover:bg-gray-300"
                data-item-id="<?php echo $item['item_id']; ?>">+</button>
            </div>
            
            <!-- Add to Cart Button -->
             <button type="button" class="add-to-cart-btn bg-green-500 text-white py-2 px-4 rounded shadow-md hover:bg-green-600 w-full" 
             data-item-id="<?php echo $item['item_id']; ?>">
             Add to Cart
            </button>
        </div>
    <?php endwhile; ?>
</div>
    </div>
</div>
<?php include 'cart_footer.php'; ?> 
<script>
    // Handle Add to Cart button clicks
document.querySelectorAll('.add-to-cart-btn').forEach(button => {
    button.addEventListener('click', function () {
        const itemId = this.getAttribute('data-item-id');
        const quantity = parseInt(document.getElementById('quantity-' + itemId).value) || 1;

        // Update the cart on the server and refresh the cart footer
        addToCart(itemId, quantity);
    });
});

// Adjust quantity locally based on button clicks (+ or -)
document.querySelectorAll('.quantity-btn').forEach(button => {
    button.addEventListener('click', function () {
        const itemId = this.getAttribute('data-item-id');
        const quantityInput = document.getElementById('quantity-' + itemId);
        let quantity = parseInt(quantityInput.value);

        // Adjust quantity locally based on button clicked
        if (this.classList.contains('increase')) {
            quantityInput.value = Math.max(1, quantity + 1);  // Increase quantity
        } else if (this.classList.contains('decrease')) {
            quantityInput.value = Math.max(1, quantity - 1);  // Decrease quantity, minimum 1
        }
        document.getElementById('quantity-input-' + itemId).value = quantityInput.value;
    });
});

// Function to add/update item in the cart (called when Add to Cart button is clicked)
function addToCart(itemId, quantity) {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            try {
                const response = JSON.parse(this.responseText);

                // Debugging: Log the server response
                console.log('Server Response:', response);

                // Update cart footer totals
                document.getElementById('totalItems').textContent = response.totalItems || 0;
                document.getElementById('totalPrice').textContent = `Rs. ${response.totalPrice.toFixed(2) || '0.00'}`;

                // Update hidden form inputs 
                document.getElementById('checkout-totalItems').value = response.totalItems || 0;
                document.getElementById('checkout-totalPrice').value = response.totalPrice.toFixed(2) || '0.00';
            } catch (error) {
                console.error('Error parsing JSON:', error, this.responseText);
            }
        }
    };
    xhr.open('POST', 'update_cart.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(`item_id=${itemId}&quantity=${quantity}`);
}
// Handle the Clear Cart button click
document.getElementById('clear-cart-btn').addEventListener('click', function () {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            try {
                const response = JSON.parse(this.responseText);

                // Reset the cart footer values (items and price)
                document.getElementById('totalItems').textContent = response.totalItems;
                document.getElementById('totalPrice').textContent = `Rs. ${response.totalPrice}`;

            } catch (error) {
                console.error('Error parsing JSON:', error, this.responseText);
            }
        }
    };
    xhr.open('GET', 'clearCart.php', true);
    xhr.send();
});
</script>

</body>
</html>