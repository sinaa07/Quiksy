<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiksy - Quick Commerce Made Easy</title>
  <!-- Tailwind CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    /* Custom Styling */
    .quiksy-theme {
      background-color: #f3f4f6;
      color: #1f2937;
    }
    .category-icon {
      background-color: #e6faf0;
      border-radius: 50%;
      padding: 10px;
      transition: transform 0.3s ease;
    }
    .category-icon:hover {
      transform: scale(1.1);
    }
    .feature-card {
      transition: transform 0.3s ease;
    }
    .feature-card:hover {
      transform: translateY(-10px);
    }
    
    .category
    {
      height:auto;
      display: flex;
      flex-direction: row;
      justify-content: center;
      flex-wrap: wrap;
      background-color: rgb(229, 244, 237, 0.44);

    }
    .cate
    {
      display: flex;
      flex-direction: row;
      flex-wrap: wrap;
      margin-left:32px;
      margin-right:32px;
      width:135px;
      margin-top:15px;
      margin-bottom: 15px;
      height:140px;
      background-color:rgb(236,245,255);
      border-radius: 15px;
      transition: transform 0.5 ease;
    }
    .cat_ic
    {
      width:90px;
      height:85px;
      margin-left:22px;
      margin-top:5px;
      border-radius: 4px;

    }
    .cat_text
    {
      background-color: rgb(236,245,255);
      margin-left:25px;
      margin-top:5px;
      width:90px;
      font-size: small;
      border-radius: 4px;
    }
    .cate:hover{
      box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
      cursor: pointer;
      transform: scale(1.05);
    }
  </style>
  <script src="scripts.js"></script>
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

  <!-- Hero Section with Search Bar -->
  <section class="bg-green-50 py-16 border-b-2">
    <div class="container mx-auto px-6 text-center">
      <h2 class="text-3xl font-bold text-green-600 mb-4">Quick and Convenient Shopping with Quiksy
        <!-- Updated Lightning Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500 inline-block ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
        </svg>
      </h2>
      <p class="text-lg text-gray-600 mb-8">Shop in Seconds, Fast and Fresh!</p>
      <div class="relative max-w-md mx-auto">
        <input type="text" placeholder="Search for products..." class="w-full p-4 pl-10 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500" />
        <button class="absolute inset-y-0 right-0 px-4 bg-green-500 text-white rounded-r-lg">Go</button>
      </div>
    </div>
  </section>

  <!-- Category Section -->
  <section class="py-12" >
    <a href="categories.php">
      <h3 class="mx-auto px-6 text-center text-2xl font-semibold text-gray-600 mb-6 mx-6">Shop by Categories</h3>
    
    <div class="category">
        <div class="cate">
          <img src="cat_photos/bread.png" alt="" class="cat_ic">
          <div class="cat_text"> Dairy, Breads &nbsp; &nbsp; &nbsp; &nbsp;& Eggs
          </div>
        </div>
        <div class="cate">
          <img src="cat_photos/f&v.png" alt="" class="cat_ic">
          <div class="cat_text">&nbsp; &nbsp;Fruits & &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Vegetables
          </div>
        </div>
        <div class="cate">
          <img src="cat_photos/cdj.png" alt="" class="cat_ic">
          <div class="cat_text">&nbsp;Cold drinks & &nbsp; &nbsp; &nbsp; &nbsp;Juices
          </div>
        </div>
        <div class="cate">
          <img src="cat_photos/s&m.png" alt="" class="cat_ic">
          <div class="cat_text"> &nbsp;&nbsp;Snacks & &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;Munchies
          </div>
        </div>
        <div class="cate">
          <img src="cat_photos/b&if.png" alt="" class="cat_ic">
          <div class="cat_text">&nbsp; Breakfast & &nbsp;  &nbsp; &nbsp; Instant food
          </div>
        </div>
        <div class="cate">
          <img src="cat_photos/chocs.png" alt="" class="cat_ic">
          <div class="cat_text">&nbsp;&nbsp; &nbsp; Sweet &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;Tooth
          </div>
        </div>
        <div class="cate">
          <img src="cat_photos/bsct.png" alt="" class="cat_ic">
          <div class="cat_text"> &nbsp; &nbsp; Bakery &&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Biscuits
          </div>
        </div>
        <div class="cate">
          <img src="cat_photos/tea.png" alt="" class="cat_ic">
          <div class="cat_text"> Tea, Coffee & &nbsp; &nbsp;Health Drinks
          </div>
        </div>
        <div class="cate">
          <img src="cat_photos/atta.png" alt="" class="cat_ic">
          <div class="cat_text">
            &nbsp;&nbsp;Atta, Rice & &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; Daal
          </div>
        </div>
        <div class="cate">
          <img src="cat_photos/baby.png" alt="" class="cat_ic">
          <div class="cat_text"> &nbsp; &nbsp; &nbsp; Baby &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;Care</div>
        </div>
        <div class="cate">
          <img src="cat_photos/personal.png" alt="" class="cat_ic">
          <div class="cat_text">&nbsp; &nbsp; Personal &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Hygiene</div>

        </div>
        <div class="cate">
          <img src="cat_photos/masala.png" alt="" class="cat_ic">
          <div class="cat_text"> &nbsp;Masala, Oil & &nbsp; &nbsp; &nbsp; &nbsp;More</div>
        </div>
        <div class="cate">
          <img src="cat_photos/clean.png" alt="" class="cat_ic">
          <div class="cat_text">&nbsp; &nbsp; Cleaning &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Essentials</div></div>
        
        <div class="cate">
          <img src="cat_photos/sauce.png" alt="" class="cat_ic">
          <div class="cat_text"> &nbsp; &nbsp;Sauces & &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Spreads</div>
        </div>
    </div>
    </a>
    </section>

  <!-- Features Section -->
  <section class="bg-white py-16 border-t-1 border-b-none">
    <div class="container mx-auto px-6 text-center">
      <h3 class="text-2xl font-bold text-green-600 mb-8">Why Choose Quiksy?</h3>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="p-4 bg-green-50 feature-card shadow-lg rounded-lg">
          <h4 class="font-bold text-lg text-green-600 mb-2">Fast Delivery</h4>
          <p class="text-gray-600">Get your products delivered to your doorstep quickly.</p>
        </div>
        <div class="p-4 bg-green-50 feature-card shadow-lg rounded-lg">
          <h4 class="font-bold text-lg text-green-600 mb-2">Best Prices</h4>
          <p class="text-gray-600">Enjoy affordable prices on all items.</p>
        </div>
        <div class="p-4 bg-green-50 feature-card shadow-lg rounded-lg">
          <h4 class="font-bold text-lg text-green-600 mb-2">Quality Assurance</h4>
          <p class="text-gray-600">We ensure quality in every product.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Random items category -->
  <section class="py-12">
    <div class="container mx-auto px-6">
      <h3 class="text-2xl font-bold text-gray-700 mb-6">Shop by Categories</h3>
      <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
        <!-- Category Items -->
        <div class="text-center">
          <div class="category-icon mx-auto mb-2">
            <img src="https://via.placeholder.com/50" alt="Groceries" class="w-10 h-10" />
          </div>
          <p class="text-sm font-semibold text-gray-700">Groceries</p>
        </div>
        <div class="text-center">
          <div class="category-icon mx-auto mb-2">
            <img src="https://via.placeholder.com/50" alt="Vegetables" class="w-10 h-10" />
          </div>
          <p class="text-sm font-semibold text-gray-700">Vegetables</p>
        </div>
        <div class="text-center">
          <div class="category-icon mx-auto mb-2">
            <img src="https://via.placeholder.com/50" alt="Fruits" class="w-10 h-10" />
          </div>
          <p class="text-sm font-semibold text-gray-700">Fruits</p>
        </div>
        <!-- Add more categories as needed -->
      </div>
    </div>
  </section>

  <?php include 'cart_footer.php'; ?>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-4">
    <div class="container mx-auto text-center">
      <p>&copy; 2024 Quiksy. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>
