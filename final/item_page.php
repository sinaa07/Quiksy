<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
</head>
<body>
    <h2>Product Name</h2>
    <p>Price: Rs.<span id="price">500</span></p>
    <img scr="#">
    <!-- Quantity Selection -->
    <div>
        <button onclick="decreaseQuantity()">-</button>
        <input type="number" id="quantity" value="1" min="1" readonly>
        <button onclick="increaseQuantity()">+</button>
    </div>

    <!-- Add to Cart Form -->
    <form id="addToCartForm" action="add_to_cart.php" method="POST">
        <input type="hidden" name="product_id" value="1">
        <input type="hidden" name="name" value="Product Name">
        <input type="hidden" name="price" value="500">
        <input type="hidden" name="quantity" id="quantityInput" value="1">
        <button type="submit">Add to Cart</button>
    </form>
    <?php include 'cart_footer.php'; ?>
    <!-- JavaScript for quantity adjustment -->
    <script>
        function increaseQuantity() {
            let quantity = document.getElementById("quantity");
            quantity.value = parseInt(quantity.value) + 1;
            document.getElementById("quantityInput").value = quantity.value;
        }

        function decreaseQuantity() {
            let quantity = document.getElementById("quantity");
            if (quantity.value > 1) {
                quantity.value = parseInt(quantity.value) - 1;
                document.getElementById("quantityInput").value = quantity.value;
            }
        }
    </script>
</body>
</html>
