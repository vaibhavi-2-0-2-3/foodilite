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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <title>My Cart</title>
</head>

<body>
  <div class="menu-right">
    <h3 class="cart-title">Shopping Cart</h3>
    <div id="displayCheckout">

      <?php

      if (!empty($_SESSION['cart'])) {
        $outputTable = '';
        $total = 0;
        $outputTable .= "<table class='table table-bordered'><thead><tr><td>Name</td><td>Price</td><td>Quantity</td><td>Action</td> </tr></thead>";
        foreach ($_SESSION['cart'] as $key => $value) {
          $outputTable .= "<tr><td>" . $value['p_name'] . "</td><td>" . ($value['p_price'] * $value['p_quantity']) . "</td><td>" . $value['p_quantity'] . "</td><td><button id=" . $value['p_id'] . " class='btn btn-danger delete'>Delete</button></td></tr>";
          $total = $total + ($value['p_price'] * $value['p_quantity']);
        }
        $outputTable .= "</table>";
        $outputTable .= "<div class='text-center'><b>Total: " . $total . "</b></div>";

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