<?php
// Start the session
session_start();

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection details
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

// Define variables and initialize with empty values
$email = $password = "";
$loginMessage = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, trim($_POST["password"]));

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT cust_id, name, password FROM customer WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Retrieve hashed password from the database
        $hashedPasswordFromDatabase = $row["password"];
        echo "Hashed Password from Database: $hashedPasswordFromDatabase<br>";

        echo "Entered Password: $password<br>";

        if (password_verify($password, $hashedPasswordFromDatabase)) {
            // Authentication successful, set session variables
            $_SESSION["user_id"] = $row["cust_id"];
            $_SESSION["user_name"] = $row["name"];
            header("Location: home.html"); // Redirect to the dashboard or home page
            exit();
        } else {
            $loginMessage = "Invalid password";
        }
    } else {
        $loginMessage = "User not found";
    }

    $stmt->close();  // Close the statement
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        /* Your existing CSS styling here */
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

        .login-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 0, 0.897);
            padding: 50px;
            border-radius: 10px;
            text-align: center;
            width: 300px;
        }

        .login-container h1 {
            color: black;
        }

        .form-group {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            margin: 10px 0;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: none;
            background-color: white;
            border-radius: 5px;
            transition: transform 0.2s, background-color 0.2s;
        }

        .form-group input:hover {
            transform: scale(1.05);
            background-color: #f0f0f0;
        }

        .login-button {
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

        .login-button:hover {
            transform: scale(1.05);
            background-color: #ff0000;
        }

        .register-text {
            margin-top: 20px;
            color: rgb(61, 60, 60);
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h1>Sign In</h1>
        <?php
        // Display the login message if it exists
        if (!empty($loginMessage)) {
            echo '<p style="color: red;">' . $loginMessage . '</p>';
        }
        ?>

        <form action="login.php" method="post">
            <div class="form-group">
                <input type="text" id="email" name="email" placeholder="Email" autocomplete="username">
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="Password" autocomplete="current-password">
            </div>
            <button type="submit" class="login-button">Login</button>
        </form>

        <p class="register-text">Not registered yet?<span style="color: red;"><strong><a href="register.php" style="color: red; text-decoration: none;">Register here</a></strong></span></p>
    </div>
</body>

</html>
