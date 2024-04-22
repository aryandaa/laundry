<?php 
require "function.php"; //untuk menyambungkan php ke function.php
session_start();

if (isset($_SESSION["auth"])) {
    header("Location: " . "home.php");
}

if(isset($_POST["submit"])) {
    login();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=p, initial-scale=1.0">
    <title>tugas SLP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="login-container"> 
        <div class="logo"></div>
        <div class="login-text">
            <h2>Selamat datang di Laundry <br> <span> Smkn 2 Banjarmasin </span></h2>
        </div>
        <form method="post" class="login-card">
            <div class="login-content">
                <input type="text" name="username" id="username" placeholder="Username">
                <input type="password" name="password" id="password" placeholder="Password">
                <div class="btn-group">
                    <button type="submit">Register</button>
                    <button type="submit" id="submit" name="submit">Login</button>
                </div>
            </div>
        </form>
         </div>
</body>
</html>