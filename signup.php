<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiksy - Sign Up</title>
  <!-- Tailwind CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    /* Custom Styling */
    .quiksy-theme {
      background-color: #f3f4f6;
      color: #1f2937;
    }
  </style>
</head>
<body class="quiksy-theme text-gray-800">

  <!-- Navigation Bar -->
  <header class="bg-white shadow-md border-b-2">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
      <div class="flex justify-start space-x-2">
        <h1 class="text-2xl font-bold text-green-600">Quiksy</h1>
        <!-- Stylish Lightning Icon to the Right -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
        </svg>
      </div>
      <nav class="flex space-x-6">
        <a href="index.html" class="text-gray-600 hover:text-green-500">Home</a>
        <a href="login.php" class="text-gray-600 hover:text-green-500">Login</a>
        <a href="#mycart" class="text-gray-600 hover:text-green-500">My Cart</a>
        <a href="#contact" class="text-gray-600 hover:text-green-500">Contact</a>
      </nav>
    </div>
  </header>

  <!-- Sign Up Form -->
  <section class="flex items-center justify-center min-h-screen bg-green-50">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
      <h2 class="text-2xl font-bold text-green-600 text-center mb-6">Create an Account</h2>
      
      <form action="signup_process.php" method="POST" class="space-y-4">
        <div>
          <label for="name" class="block text-gray-700 font-semibold">Name:</label>
          <input type="text" id="name" name="name" required class="w-full p-3 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Enter your name">
        </div>
        
        <div>
          <label for="email" class="block text-gray-700 font-semibold">Email:</label>
          <input type="email" id="email" name="email" required class="w-full p-3 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Enter your email">
        </div>
        
        <div>
          <label for="password" class="block text-gray-700 font-semibold">Password:</label>
          <input type="password" id="password" name="password" required class="w-full p-3 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Enter your password">
        </div>
        
        <div>
          <label for="confirm-password" class="block text-gray-700 font-semibold">Confirm Password:</label>
          <input type="password" id="confirm-password" name="confirm_password" required class="w-full p-3 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Confirm your password">
        </div>

        <div class="flex items-center justify-between mt-4">
          <button type="submit" class="w-full py-3 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 focus:outline-none">Sign Up</button>
        </div>
        
        <p class="text-sm text-center text-gray-600 mt-6">
          Already have an account? <a href="login.php" class="text-green-600 hover:underline">Login</a>
        </p>
      </form>
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
