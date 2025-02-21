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

  <title>My Cart</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;

    }

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


    .menu-right {
      background-color: #fff;
      border-radius: 5px;
      padding: 20px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .cart-title {
      font-size: 35px;
      font-weight: 900;
      margin-bottom: 15px;
      text-align: center;
      font-family: Rochester;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    th,
    td {
      border: 1px solid #ddd;
      padding: 20px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    .title tr {
      font-weight: bold;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    .btn-danger {
      background-color: #dc3545;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 3px;
      cursor: pointer;
    }

    .btn-danger:hover {
      background-color: #c82333;
    }

    .total-btn {
      text-align: center;
    }
  </style>

</head>

<body>
  <div class="navbar">
    <h1>FOODILITE</h1>
    <ul class="nav-links">
      <li><a href="home.html">HOME</a></li>
      <li><a href="menu.php">MENU</a></li>
      <!-- <li><a href="#reservation">RESERVATION</a></li> -->

      <li><a href="#name">MY CART</a></li>
      <li><a href="#logout">LOGOUT</a></li>
    </ul>
  </div>

  <div class="menu-right">
    <h3 class="cart-title">Shopping Cart</h3>
    <div id="displayCheckout">
      <?php

      if (!empty($_SESSION['cart'])) {
        $outputTable = '';
        $total = 0;
        $outputTable .= "<table class='table table-bordered'><thead class='title'><tr><td>Name</td><td>Price</td><td>Quantity</td><td>Action</td> </tr></thead>";
        foreach ($_SESSION['cart'] as $key => $value) {
          $outputTable .= "<tr><td>" . $value['p_name'] . "</td><td>" . ($value['p_price'] * $value['p_quantity']) . "</td><td>" . $value['p_quantity'] . "</td><td><button id=" . $value['p_id'] . " class='btn btn-danger delete'>Delete</button></td></tr>";
          $total = $total + ($value['p_price'] * $value['p_quantity']);
        }
        $outputTable .= "</table>";
        $outputTable .= "<div class='total-btn'><b>Total: " . $total . "</b></div>";

        echo ($outputTable);
      }

      ?>
    </div>
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




      $('.add').click(function() {
        event.preventDefault();
        var id = $(this).data('id');
        var name = $('#name' + id).val();
        var price = $('#price' + id).val();
        var quantity = $('#quantity' + id).val();
        $.ajax({
          url: 'cart.php',
          method: 'POST',
          dataType: 'json',
          data: {
            cart_id: id,
            cart_name: name,
            cart_price: price,
            cart_quantity: quantity,
            action: 'add'
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
      })
    })
  </script>
</body>

</html>

<?php


mysqli_close($conn);


?>
