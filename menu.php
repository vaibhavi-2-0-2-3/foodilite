<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shoping_cart";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addToCart"])) {
  $foodItemId = $_POST["foodItemId"];
  $quantity = $_POST["quantity"];

  // Check if item already exists in cart, update quantity
  if (isset($_SESSION["cart"][$foodItemId])) {
    $_SESSION["cart"][$foodItemId] += $quantity;
  } else {
    // Add new item to cart
    $_SESSION["cart"][$foodItemId] = $quantity;
  }

  // Redirect to prevent form resubmission on refresh
  header("Location: " . $_SERVER["PHP_SELF"]);
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rancho&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cuprum&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Euphoria+Script&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rochester&display=swap" rel="stylesheet">
  <title>Menu Page</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Arial', sans-serif;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      width: 100%;
      align-items: center;
      background-color: rgba(0, 0, 0, 0.897);
      padding: 10px 0;
      height: 70px;
    }

    .navbar h1 {
      font-size: 50px;
      font-family: 'Lilita One', sans-serif;
      font-weight: 900;
      padding-left: 20px;
      position: relative;
    }

    .navbar h1::before,
    .navbar h1::after {
      content: "FOODILITE";
      position: absolute;
      top: 0;
      left: 20px;
      animation: glitter 2s infinite linear;
      color: transparent;
    }

    .navbar h1::before {
      color: rgb(255, 217, 0);
    }

    @keyframes glitter {
      0% {
        transform: translateX(-1px) translateY(-1px);
      }

      25% {
        transform: translateX(1px) translateY(1px);
      }

      50% {
        transform: translateX(-1px) translateY(-1px);
      }

      75% {
        transform: translateX(1px) translateY(1px);
      }

      100% {
        transform: translateX(0) translateY(0);
      }
    }

    .nav-links {
      list-style: none;
      display: flex;
      margin-right: 35px;
    }

    .nav-links li {
      margin-left: 25px;
      font-size: 20px;
      font-family: 'Cuprum', sans-serif;
    }

    .nav-links a {
      text-decoration: none;
      color: #FFF;
      font-weight: bold;
    }

    .nav-links a:hover {
      color: #FF0000;
    }

    .menu-container {
      display: flex;
      justify-content: space-between;
      padding: 20px;
    }

    .menu-left {
      flex: 1;
      padding: 20px;
      overflow-y: auto;
      max-height: calc(100vh - 140px);
      direction: ltr;
      padding-right: 5px;
      margin-right: 15px;
    }

    .menu-left p {
      font-size: 18px;
      font-family: Cuprum, sans-serif;
    }

    .price {
      margin-left: auto;
      font-size: 25px;
      font-family: Euphoria Script;
      padding-left: 10px;
      font-weight: bold;
    }


    .food-item {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
      justify-content: space-between;
      font-family: Rochester;
      font-size: 25px;
      margin-bottom: 50px;
    }

    .food-details {
      flex: 1;
    }

    .price {
      font-size: 40px;
      font-family: Euphoria Script;
      padding-left: 5px;
      padding-right: 100px;
    }

    .food-item img {
      border-radius: 50%;
      margin-right: 15px;
      width: 150px;
      height: 150px;
      object-fit: cover;
      padding-right: 30px;
    }

    .menu-right {
      flex: 0 0 500px;
      background-color: #ffe5b4;
      padding: 20px;
      position: sticky;
      margin-top: 25px;
      height: 390px;
      border-radius: 10px;
      text-align: center;

    }

    .food-details {
      flex: 1;
    }

    .buttons {
      display: flex;
      gap: 10px;
    }

    .quantity-button,

    .quantity-input {
      padding: 5px 10px;
      font-size: 12px;
      width: 30px;
      height: 20px;
    }

    .add-to-cart-button {
      padding: 10px 15px;
      font-size: 14px;
      background-color: #007BFF;
      color: #FFF;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .add-to-cart-button {
      background-color: #28A745;
    }

    .cart-title {
      font-size: 24px;
      font-family: 'Cuprum', sans-serif;
      margin-bottom: 15px;
    }
  </style>
</head>

<body>
  <div class="navbar">
    <h1>FOODILITE</h1>
    <ul class="nav-links">
      <li><a href="home.html">HOME</a></li>
      <li><a href="#menu">MENU</a></li>
      <li><a href="#reservation">RESERVATION</a></li>
      <li><a href="#login.php">LOGIN</a></li>
    </ul>
  </div>

  <div class="menu-container">
    <div class="menu-left">

      <div class="food-item">
        <img src="images/06a75e6a8a9db3a1a81df30a29f3c4c8.jpg" alt="Food Item 1">
        <div>
          <h3>Chopsuey</h3>
          <p>Bread / Potatoes / Rice</p>


          <form method="post" action="manage_cart.php">
            <input type="hidden" name="foodItemId" value="foodItem1">
            <input type="hidden" name="quantity" value="1">

            <div class="buttons">
              <input type="number" class="quantity-input" value="1" min="1">
              <button type="submit" class="add-to-cart-button" name="addToCart">Add to Cart</button>
            </div>
          </form>

        </div>

        <div class="price">
          $15 . 50
        </div>

      </div>

      <div class="food-item">
        <img src="images/7fd8c03dfc813e8d7bb6d65dbb880e79.jpg" alt="Food Item 2">
        <div>
          <h3>Fried Tokwa</h3>
          <p>Tuna / Potatoes / Rice</p>

          <form method="post" action="manage_cart.php">
            <input type="hidden" name="foodItemId" value="foodItem2">
            <input type="hidden" name="quantity" value="1">

            <div class="buttons">
              <input type="number" class="quantity-input" value="1" min="1">
              <button type="submit" class="add-to-cart-button" name="addToCart">Add to Cart</button>
            </div>
          </form>


        </div>

        <div class="price">
          $30 . 99
        </div>

      </div>

      <div class="food-item">
        <img src="images/2e174c05f7cf53754542169cae3566ef.jpg" alt="Food Item 3">
        <div>
          <h3>Grilled Beet with potatoes</h3>
          <p>Meat / Potatoes / Rice / Tomatoes</p>


          <form method="post" action="manage_cart.php">
            <input type="hidden" name="foodItemId" value="foodItem3">
            <input type="hidden" name="quantity" value="1">

            <div class="buttons">
              <input type="number" class="quantity-input" value="1" min="1">
              <button type="submit" class="add-to-cart-button" name="addToCart">Add to Cart</button>
            </div>
          </form>


        </div>

        <div class="price">
          $25 . 99
        </div>

      </div>

      <div class="food-item">
        <img src="images/791f099b9313acd3b8d6eb603ef859f9.jpg" alt="Food Item 4">
        <div>
          <h3>Tuna Roast Source</h3>
          <p>Tuna / Potatoes / Rice</p>


          <form method="post" action="manage_cart.php">
            <input type="hidden" name="foodItemId" value="foodItem4">
            <input type="hidden" name="quantity" value="1">

            <div class="buttons">
              <input type="number" class="quantity-input" value="1" min="1">
              <button type="submit" class="add-to-cart-button" name="addToCart">Add to Cart</button>
            </div>
          </form>

        </div>

        <div class="price">
          $30 . 99
        </div>

      </div>

      <div class="food-item">
        <img src="images/2742d2bfc2ca262f907d66c28f4a43b0.jpg" alt="Food Item 5">
        <div>
          <h3>Roast Beet</h3>
          <p>Crab / Potatoes / Rice</p>


          <form method="post" action="manage_cart.php">
            <input type="hidden" name="foodItemId" value="foodItem5">
            <input type="hidden" name="quantity" value="1">

            <div class="buttons">
              <input type="number" class="quantity-input" value="1" min="1">
              <button type="submit" class="add-to-cart-button" name="addToCart">Add to Cart</button>
            </div>
          </form>


        </div>

        <div class="price">
          $40 . 50
        </div>

      </div>

      <div class="food-item">
        <img src="images/2e0a248499f2d184b2efbad953427706.jpg" alt="Food Item 6">
        <div>
          <h3>Sweet Carananel Bread</h3>
          <p>Sugar / Dough / Bread</p>


          <form method="post" action="manage_cart.php">
            <input type="hidden" name="foodItemId" value="foodItem6">
            <input type="hidden" name="quantity" value="1">

            <div class="buttons">
              <input type="number" class="quantity-input" value="1" min="1">
              <button type="submit" class="add-to-cart-button" name="addToCart">Add to Cart</button>
            </div>
          </form>

        </div>

        <div class="price">
          $20 . 99
        </div>

      </div>

      <div class="food-item">
        <img src="images/f0d21f5bec274c9d0b20460d506e02e0.jpg" alt="Food Item 7">
        <div>
          <h3>Choco Cake</h3>
          <p>Sugar / Dough / Bread</p>


          <form method="post" action="manage_cart.php">
            <input type="hidden" name="foodItemId" value="foodItem7">
            <input type="hidden" name="quantity" value="1">

            <div class="buttons">
              <input type="number" class="quantity-input" value="1" min="1">
              <button type="submit" class="add-to-cart-button" name="addToCart">Add to Cart</button>
            </div>
          </form>


        </div>

        <div class="price">
          $20 . 55
        </div>

      </div>

      <div class="food-item">
        <img src="images/84dfc9bff8c208d67134d9f29a32f4c4.jpg" alt="Food Item 8">
        <div>
          <h3>Choco Bread</h3>
          <p>Sugar / Dough / Bread</p>


          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="foodItemId" value="foodItem8">
            <input type="hidden" name="quantity" value="1">

            <div class="buttons">
              <input type="number" class="quantity-input" value="1" min="1">
              <button type="submit" class="add-to-cart-button" name="addToCart">Add to Cart</button>
            </div>
          </form>


        </div>

        <div class="price">
          $25 . 99
        </div>

      </div>
    </div>


    <div class="menu-right">
      <h3 class="cart-title">Shopping Cart</h3>
    </div>
  </div>

</body>

</html>