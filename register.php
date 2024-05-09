<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    //prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO customer (name, email, address, phone, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $address, $phone, $password);

    if ($stmt->execute()) {
        $registrationMessage = "Registration successful!";
    } else {
        $registrationMessage = "Error: " . $stmt->error;
    }

    $stmt->close();  // Close the statement
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Here</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('images/pexels-photo-616484.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            z-index: -1;
        }

        .registration-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 0, 0.897);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 400px;
        }

        .registration-container h1 {
            color: black;
        }

        .form-group {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            margin: 10px 0;
            text-align: left;
        }

        .form-group input {
            width: 95%;
            padding: 10px;
            margin: 5px 0;
            border: none;
            background-color: #EFEFEF;
            border-radius: 5px;
            transition: transform 0.2s, background-color 0.2s;
        }

        .form-group input:hover {
            transform: scale(1.02);
            background-color: #f0f0f0;
        }

        .form-group input[type="address"] {
            width: 85%;
            padding: 30px;
            margin: 5px 0;
            border: none;
            background-color: #EFEFEF;
            border-radius: 5px;
            transition: transform 0.2s, background-color 0.2s;
        }

        .register-button {
            background-color: red;
            color: white;
            border: none;
            border-radius: 15px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 20px;
            margin-top: 20px;
            transition: transform 0.2s, background-color 0.2s;
        }

        .register-button:hover {
            transform: scale(1.05);
            background-color: #ff0000;
        }

        .login-message {
            margin-top: 20px;
            color: rgb(61, 60, 60);
        }

        .login-link {
            font-weight: bold;
            color: red;
        }
    </style>
</head>

<body>
    <div class="registration-container">
        <h1>Register Here</h1>

        <?php
        if (isset($registrationMessage)) {
            echo '<p style="color: green;">' . $registrationMessage . '</p>';
        }
        ?>

        <form action="register.php" method="post">
            <div class="form-group">
                <div style="clear: both;">
                    <input type="text" name="name" placeholder="Name">
                </div>
            </div>
            <div class="form-group">
                <div style="clear: both;">
                    <input type="email" name="email" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <div style="clear: both;">
                    <input type="address" name="address" placeholder="Address">
                </div>
            </div>
            <div class="form-group">
                <input type="text" name="phone" placeholder="Phone">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password">
            </div>

            <button type="submit" name="submit" class="register-button">Sign Up</button>
        </form>

        <p class="login-message">
            <strong style="margin-right: 10px;">Want to login?</strong>
            <a class="login-link" href="login.php">Login here</a>
        </p>
    </div>
</body>

</html>