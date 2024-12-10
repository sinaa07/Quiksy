<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="productStyle.css">
  <title>Search Products</title>
  <style>
    /* Basic styling for the product list */
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      font-family: Arial, sans-serif;
    }
    h1 {
      text-align: center;
      color: #1f2937;
    }
    form {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }
    input[type="text"] {
      padding: 10px;
      width: 60%;
      border: 1px solid #ddd;
      border-radius: 5px;
    }
    button {
      padding: 10px 20px;
      border: none;
      background-color: #10b981;
      color: white;
      border-radius: 5px;
      cursor: pointer;
    }
    .product-list {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
      gap: 20px;
    }
    .product-item {
      text-align: center;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
      transition: transform 0.3s;
    }
    .product-item:hover {
      transform: translateY(-5px);
    }
    .product-icon {
      width: 50px;
      height: 50px;
      margin-bottom: 10px;
    }
    .product-name {
      font-size: 16px;
      font-weight: bold;
      color: #1f2937;
    }
    .product-description {
      font-size: 14px;
      color: #4b5563;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Search Results</h1>
    <form action="search.php" method="GET">
      <input type="text" name="query" placeholder="Search for a product..." required>
      <button type="submit">Search</button>
    </form>
    <div class="product-list">
      <!-- Sample Product 1 -->
      <div class="product-item">
        <img src="https://via.placeholder.com/50" alt="Milk Icon" class="product-icon">
        <p class="product-name">Fresh Milk</p>
        <p class="product-description">High-quality, farm-fresh milk delivered daily.</p>
      </div>
      <!-- Sample Product 2 -->
      <div class="product-item">
        <img src="https://via.placeholder.com/50" alt="Apple Icon" class="product-icon">
        <p class="product-name">Juicy Apples</p>
        <p class="product-description">Crisp and sweet apples, perfect for a healthy snack.</p>
      </div>
      <!-- Sample Product 3 -->
      <div class="product-item">
        <img src="https://via.placeholder.com/50" alt="Bread Icon" class="product-icon">
        <p class="product-name">Whole Wheat Bread</p>
        <p class="product-description">Freshly baked whole wheat bread, full of flavor.</p>
      </div>
      <!-- Sample Product 4 -->
      <div class="product-item">
        <img src="https://via.placeholder.com/50" alt="Carrot Icon" class="product-icon">
        <p class="product-name">Organic Carrots</p>
        <p class="product-description">Crunchy and nutritious organic carrots.</p>
      </div>
      <!-- Sample Product 5 -->
      <div class="product-item">
        <img src="https://via.placeholder.com/50" alt="Eggs Icon" class="product-icon">
        <p class="product-name">Free-Range Eggs</p>
        <p class="product-description">Healthy and fresh free-range eggs, rich in nutrients.</p>
      </div>
    </div>
  </div>
</body>
</html>
