<?php 
require_once "function.php";
session_start();

if (!$_SESSION["auth"]) {
    header("Location: " . "index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row-1">
        <?php require_once "element/navbar.php" ?>

            <div class="hero"></div>

            <div class="content">
                <h3>Daftar Paket Laundry</h3>
                <div class="paket">
                    <?php $i = 0 ?>
                    <?php foreach($datapaket as $data) : ?>
                        <div class="paket-loop">
                            <div class="card">
                                <p><?= $data[0] ?></p>
                                <p><?= $data[1] ?></p>
                                <p>Rp.<?= $data[2] ?></p>
                            </div>
                            <a href="paket.php?id=<?= $i++ ?>" class="paket-btn">PILIH PAKET</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
                <div class="row-2">
                    <?php require_once "element/footer.php" ?>
                </div></div>
    </div>
</body>
</html>