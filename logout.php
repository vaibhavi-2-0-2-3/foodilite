<?php
session_start();
session_destroy(); // Destroy the session
header("Location: login.php?message=See you soon!"); // Redirect with message
exit();
