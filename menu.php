<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "menu_cart";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

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
      margin-left: auto;
      font-size: 40px;
      font-family: Euphoria Script;
      padding-left: 5px;
      padding-right: 70px;
      font-weight: bold;
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
      /* background-color: #ffe5b4; */
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

    .menu-right {
      width: 35%;
      /* Increase width */
      background: #f8e6c0;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      position: sticky;
      top: 20px;
      height: 500px;
      margin-right: 20px;
      margin-left: 40px;
    }

    .trending-item {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
      border-bottom: 1px solid #ccc;
      padding-bottom: 10px;
    }

    .trending-img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      object-fit: cover;
      margin-right: 10px;
    }

    h4 {
      font-size: 20px;
      font-family: 'Cuprum', sans-serif;
    }
  </style>
</head>

<body>
  <div class="navbar">
    <h1>FOODILITE</h1>
    <ul class="nav-links">
      <li><a href="home.html">HOME</a></li>
      <li><a href="#menu">MENU</a></li>
      <!-- <li><a href="#reservation">RESERVATION</a></li> -->

      <li><a href="cart_display.php">MY CART</a></li>
      <li><a href="#logout">LOGOUT</a></li>
    </ul>
  </div>

  <div class="menu-container">
    <div class="menu-left">

      <?php

      $sql = "SELECT * FROM items";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        // echo $row['id'] . " " . $row['name'] . " " . $row['image'] . " " . $row['price'] . "<br>";
      ?>

        <div class="food-item">
          <img src="images/<?php echo $row['image'] ?>" alt="Food Item 1">
          <div>
            <h3><?php echo $row['name'] ?></h3>
            <p>Bread / Potatoes / Rice</p>


            <form method="post">
              <input type="hidden" name="foodItemId" value="foodItem1">

              <input type="hidden" name="quantity" value="1">

              <div class="buttons">
                <input type="number" class="quantity-input" value="1" min="1" id="quantity<?php echo $row['id'] ?>">
                <button type="submit" class="add-to-cart-button add" name="addToCart" data-id="<?php echo $row['id'] ?>">Add to Cart</button>
              </div>
            </form>

          </div>

          <div class="price">$ <?php echo $row['price'] ?>

            <input type="hidden" id="name<?php echo $row['id'] ?>" value='<?php echo $row['name'] ?>'>
            <input type="hidden" id="price<?php echo $row['id'] ?>" value='<?php echo $row['price'] ?>'>
            <div>
              <span style="font-size: 20px; font-weight: normal; color: #555;">
                ⭐⭐⭐⭐
              </span>
            </div>
          </div>

        </div>



      <?php
      }
      ?>


    </div>

    <div class="menu-right">
      <h2 class="cart-title" style="font-size: 30px; font-family: 'Cuprum', sans-serif; margin-bottom: 30px;"> Trending Dishes 🔥</h2>
      <?php
      $sql_trending = "SELECT * FROM items ORDER BY RAND() LIMIT 4";  // Fetch random 3 dishes
      $result_trending = mysqli_query($conn, $sql_trending);

      while ($row_trending = mysqli_fetch_assoc($result_trending)) {
      ?>
        <div class="trending-item">
          <img src="images/<?php echo $row_trending['image'] ?>" alt="Trending Dish" class="trending-img">
          <h4><?php echo $row_trending['name'] ?></h4>
        </div>
      <?php
      }
      ?>
    </div>



    <script>
      $(document).ready(function() {

        alldeleteBtn = document.querySelectorAll('.delete')
        alldeleteBtn.forEach(onebyone => {
          onebyone.addEventListener('click', deleteINsession)
        })

        function deleteINsession() {
          removable_id = this.id;
          $.ajax({
            url: 'cart.php',
            method: 'POST',
            dataType: 'json',
            data: {
              id_to_remove: removable_id,
              action: 'remove'
            },
            success: function(data) {
              $('#displayCheckout').html(data);
              alldeleteBtn = document.querySelectorAll('.delete')
              alldeleteBtn.forEach(onebyone => {
                onebyone.addEventListener('click', deleteINsession)
              })
            }
          }).fail(function(xhr, textStatus, errorThrown) {
            alert(xhr.responseText);
          });

        }



        $(document).ready(function() {
          $('.add').click(function(event) {
            event.preventDefault(); // Prevent form submission

            var id = $(this).data('id');
            var quantity = $('#quantity' + id).val();
            var button = $(this); // Store button reference

            $.ajax({
              url: 'cart.php',
              method: 'POST',
              dataType: 'json',
              data: {
                cart_id: id,
                cart_quantity: quantity,
                action: 'add'
              },
              success: function(data) {
                $('#displayCheckout').html(data);

                // Show "Added!" message on the button
                button.text("✅ Added!");
                button.css("background-color", "#28A745"); // Green color

                // Reset text back to "Add to Cart" after 2 seconds
                //setTimeout(function() {
                //button.text("Add to Cart");
                //button.css("background-color", "#28A745"); 
                //}, 2000);
              }
            }).fail(function(xhr, textStatus, errorThrown) {
              alert("Error: " + xhr.responseText);
            });
          });
        });





      })
    </script>

</body>

</html>

<?php


mysqli_close($conn);


?>