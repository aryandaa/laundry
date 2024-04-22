<?php 
require_once "./function.php";


if (isset($_POST["logout"])) {
    session_start();
    setcookie("auth", "", 100);
    session_unset();
    session_destroy();

    header("Location: " . "index.php");
}
?>

<nav class="navbar">
    <ul class="nav-list">
        <li class="nav-item">Home</li>
        <li class="nav-item">Transaksi</li>
        <li class="nav-item">
            <form method="post">
                <button type="submit" id="logout" name="logout" style="border: none;">Logout</button>
            </form>
        </li>
    </ul>
</nav>