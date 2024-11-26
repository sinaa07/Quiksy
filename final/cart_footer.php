<?php
session_start();
// Show cart footer only if the user is logged in
if (isset($_SESSION['user'])): $name=$_SESSION['user']

?>
<html>
  <head>
  </head>
  <body>
  <div id="cart-footer" class="fixed bottom-0 left-0 w-full bg-white shadow-lg border-t border-gray-200 p-4">
    <div class="container mx-auto grid grid-cols-4 gap-4 items-center text-center">
        <!-- Items Count -->
        <div>
            <span class="text-gray-700 font-semibold">
                Items: <span id="totalItems"></span>
            </span>
        </div>

        <!-- Total Price -->
        <div>
            <span class="text-gray-700 font-semibold">
                Total: <span id="totalPrice"></span>
            </span>
        </div>

        <!-- Clear Cart Button -->
        <div class="text-right">
            <button id="clear-cart-btn" class="text-red-500 py-2 px-4 rounded-lg shadow hover:border-rose-500">
                Clear Cart
            </button>
        </div>

        <!-- Proceed to Checkout -->
        <div class="text-right">
            <a href="mycart.php" class="bg-green-500 text-white py-2 px-4 rounded-lg shadow hover:bg-green-600 inline-block">
                Proceed to Checkout
            </a>
        </div>
    </div>
</div>
  </body>
</html>
<?php endif; ?>