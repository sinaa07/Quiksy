<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="productStyle.css">
  <title>Search Products</title>
  
</head>
<body>
  <div class="container">
    <h1>Search Results</h1>
    <form action="search.php" method="GET">
      <input type="text" name="query" placeholder="Search for a product..." required>
      <button type="submit">Search</button>
    </form>
    <div class="product-list">
      <?php include 'search.php'; ?>
    </div>
  </div>
</body>
</html>