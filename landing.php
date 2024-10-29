<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to Quiksy</title>
  <!-- Tailwind CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-yellow-50 text-gray-800">

  <!-- Header Section -->
  <header class="bg-yellow-600 shadow-md py-4">
    <div class="container mx-auto flex justify-between items-center px-6">
      <h1 class="text-3xl font-bold text-white">Quiksy</h1>
      <nav>
        <a href="#features" class="text-white hover:text-yellow-200 px-4">Features</a>
        <a href="#about" class="text-white hover:text-yellow-200 px-4">About</a>
        <a href="#contact" class="text-white hover:text-yellow-200 px-4">Contact</a>
      </nav>
    </div>
  </header>

  <!-- Search Bar Section -->
  <section class="py-4 bg-yellow-100">
    <div class="container mx-auto px-6">
      <form action="search.php" method="GET" class="flex justify-center">
        <input type="text" name="query" placeholder="Search for products..." class="w-1/2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400">
        <button type="submit" class="bg-yellow-500 text-white py-3 px-4 rounded-lg font-semibold hover:bg-yellow-600 transition">Search</button>
      </form>
    </div>
  </section>

  <!-- Features Section -->
  <section class="bg-yellow-50 py-16">
    <div class="container mx-auto px-6 text-center">
      <h2 class="text-3xl font-bold text-yellow-600 mb-8">Why Choose Quiksy?</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Feature 1 -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition">
          <img src="https://via.placeholder.com/60" alt="Fast" class="mx-auto mb-4">
          <h3 class="text-xl font-semibold text-yellow-600 mb-2">Fast</h3>
          <p class="text-gray-700">Experience lightning-fast deliveries that fit seamlessly into your schedule.</p>
        </div>
        <!-- Feature 2 -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition">
          <img src="https://via.placeholder.com/60" alt="Reliable" class="mx-auto mb-4">
          <h3 class="text-xl font-semibold text-yellow-600 mb-2">Reliable</h3>
          <p class="text-gray-700">Trust in our consistently high-quality service for all your shopping needs.</p>
        </div>
        <!-- Feature 3 -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition">
          <img src="https://via.placeholder.com/60" alt="Convenient" class="mx-auto mb-4">
          <h3 class="text-xl font-semibold text-yellow-600 mb-2">Convenient</h3>
          <p class="text-gray-700">Get everything you need, delivered to your door with just a few clicks.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Categories Section -->
  <section id="categories" class="py-16 bg-yellow-100">
    <div class="container mx-auto px-6">
      <h2 class="text-3xl font-bold text-center text-yellow-600 mb-8">Shop by Categories</h2>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <!-- Category 1 -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition text-center">
          <img src="https://via.placeholder.com/50" alt="Category 1" class="mx-auto mb-4">
          <h3 class="text-xl font-semibold">Fruits</h3>
        </div>
        <!-- Category 2 -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition text-center">
          <img src="https://via.placeholder.com/50" alt="Category 2" class="mx-auto mb-4">
          <h3 class="text-xl font-semibold">Vegetables</h3>
        </div>
        <!-- Category 3 -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition text-center">
          <img src="https://via.placeholder.com/50" alt="Category 3" class="mx-auto mb-4">
          <h3 class="text-xl font-semibold">Dairy</h3>
        </div>
        <!-- Category 4 -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition text-center">
          <img src="https://via.placeholder.com/50" alt="Category 4" class="mx-auto mb-4">
          <h3 class="text-xl font-semibold">Snacks</h3>
        </div>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="py-16 bg-yellow-50">
    <div class="container mx-auto px-6 text-center">
      <h2 class="text-3xl font-bold text-yellow-600 mb-4">About Quiksy</h2>
      <p class="text-lg text-gray-700">Quiksy is dedicated to making your shopping experience fast and hassle-free. Our platform connects you to a wide range of products, ensuring timely deliveries and reliable service. Experience quick commerce like never before.</p>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-4">
    <div class="container mx-auto text-center">
      <p>&copy; 2024 Quiksy. All rights reserved.</p>
    </div>
  </footer>

</body>
</html>