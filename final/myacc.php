<?php
session_start();
if(!isset($_SESSION['user'])){
  header('Location: login.php');
}
else{
  include 'connection.php';
  $userID = $_SESSION['user'];
  $query = "select * from user_details where user_id='$userID';";
  $result = mysqli_query($conn,$query);
  $row = mysqli_fetch_assoc($result);

}
?>


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
        <p><strong>Name:</strong> <?php echo htmlspecialchars($row['name']); ?> </p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?> </p>
        <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($row['phone']); ?> </p>
      </div>

      <!-- Address Management Section -->
      <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Address Management</h3>
        <button class="bg-green-500 text-white py-2 px-4 rounded mb-4" onclick="showAddressForm()">+ Edit Address</button>
        
        <!-- Placeholder for showing current addresses -->
        <ul class="text-gray-700">
          <li class="border-b py-2"><?php echo htmlspecialchars($row['address']); ?></li>
        </ul>

        <!-- Add New Address Form (hidden initially) -->
        <form id="addressForm" method = "POST" class="hidden mt-4">
          <input type="text" placeholder="Address" class="w-full p-2 mb-2 border rounded" name ="address" required>
          <button class="bg-green-500 text-white py-2 px-4 rounded" type="submit">Save Address</button>
        </form>
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['address'])) {
           $userId = $_SESSION['user'];  
           $address = mysqli_real_escape_string($conn, $_POST['address']);
           $query = "update user_details set address = '$address' where user_id = '$userId';";
           if (mysqli_query($conn, $query)) {
               echo "Address saved successfully!";
               header('Location: myacc.php');
           } else {
               echo "Error saving address: " . mysqli_error($conn);
          }
       } ?>
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