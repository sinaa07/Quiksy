<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiksy - My Account Dashboard</title>
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
      <h1 class="text-2xl font-bold text-green-600">Quiksy</h1>
      <nav class="flex space-x-6">
        <a href="index.html" class="text-gray-600 hover:text-green-500">Home</a>
        <a href="mycart.php" class="text-gray-600 hover:text-green-500">My Cart</a>
        <a href="contact.php" class="text-gray-600 hover:text-green-500">Contact</a>
        <a href="logout.php" class="text-gray-600 hover:text-green-500">Logout</a>
      </nav>
    </div>
  </header>

  <!-- Dashboard Container -->
  <section class="py-12">
    <div class="container mx-auto px-6">
      <h2 class="text-2xl font-bold text-green-600 mb-6">My Account</h2>

      <!-- Personal Information Section -->
      <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Personal Information</h3>
        <p><strong>Name:</strong> <!-- Placeholder for name, fetched dynamically --> John Doe</p>
        <p><strong>Email:</strong> <!-- Placeholder for email --> johndoe@example.com</p>
        <p><strong>Phone Number:</strong> <!-- Placeholder for phone number --> +1234567890</p>
      </div>

      <!-- Address Management Section -->
      <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Address Management</h3>
        <button class="bg-green-500 text-white py-2 px-4 rounded mb-4" onclick="showAddressForm()">+ Add New Address</button>
        
        <!-- Placeholder for showing current addresses -->
        <ul class="text-gray-700">
          <li class="border-b py-2">123 Main Street, City, Country</li>
          <li class="border-b py-2">456 Park Avenue, City, Country</li>
        </ul>

        <!-- Add New Address Form (hidden initially) -->
        <form id="addressForm" class="hidden mt-4">
          <input type="text" placeholder="Address" class="w-full p-2 mb-2 border rounded" required>
          <input type="text" placeholder="City" class="w-full p-2 mb-2 border rounded" required>
          <input type="text" placeholder="Country" class="w-full p-2 mb-2 border rounded" required>
          <button class="bg-green-500 text-white py-2 px-4 rounded" type="submit">Save Address</button>
        </form>
      </div>

      <!-- Orders Section -->
      <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">My Orders</h3>
        <ul class="text-gray-700">
          <li class="border-b py-2">Order #1234 - Status: Delivered</li>
          <li class="border-b py-2">Order #5678 - Status: Pending</li>
          <!-- Placeholder for more orders -->
        </ul>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-4">
    <div class="container mx-auto text-center">
      <p>&copy; 2024 Quiksy. All rights reserved.</p>
    </div>
  </footer>

  <script>
    // JavaScript to show address form
    function showAddressForm() {
      document.getElementById('addressForm').classList.toggle('hidden');
    }
  </script>
</body>
</html>