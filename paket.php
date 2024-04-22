<?php 
require_once "function.php"; //untuk menyambungkan php ke function.php
session_start();

if (!$_SESSION["auth"]) {
    header("Location: " . "index.php");
}
$id = $_GET["id"]; //mengambil methode get dari id untuk disimpat di $id
$data = $datapaket[$id]; //memasukan data array yang sudah berisi $id di dalamnya kedalam $data untuk nanti diambil kembali agar dapat menampilkan array di perulangan
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
            <div class="detail">
                <div class="">
                    <div class="detail-flex">
                        <label for="no">No Transaksi</label>
                        <input type="text" name="no" id="no">
                    </div>
                    <div class="detail-flex">
                        <label for="tanggal">Tanggal Transaksi</label>
                        <input type="date" name="tanggal" id="tanggal">
                    </div>
                    <div class="detail-flex">
                        <label for="nama">Nama Customer</label>
                        <input type="text" name="nama" id="nama">
                    </div>
                    <div class="detail-flex">
                        <label for="paket">Pilihan Paket:</label>
                        <input type="text" id="paket" name="paket" value="<?= htmlspecialchars($data[0])?>">
                    </div>
                    <div class="detail-flex">
                        <label for="harga">harga Paket</label>
                        <input type="text" id="harga" name="harga" value="<?= htmlspecialchars($data[2]) ?>">
                    </div>
                </div>
                <div class="right">
                    <div class="">
                    <div>
                        <input type="radio" name="tambahan" value="0" id="tidak">
                        <label for="tidak">Tidak ada tambahan - Rp.0</label>
                    </div>
                    <div>
                        <input type="radio" name="tambahan" value="10000" id="pelembut">
                        <label for="pelembut">Pelembut - Rp. 10000</label>
                    </div>
                    </div>
                    <div class="">
                        <button id="total" name="total" class="btn">Hitung Harga total</button>
                    </div>
                </div>
            </div>
                <div class="harga">
                    <div class="row-1">
                    <div class="">
                        <label for="total">Total Harga</label>
                        <input type="text" name="total" id="total" class="total">
                    </div>
                    <div class="">
                        <label for="total">Pembayaran</label>
                        <input id="pembayaran" type="text" name="pembayaran">
                    </div>
                <button id="kembalian" class="transkasi-btn">Hitung Kembalian</button>
                </div>
                <div class="harga">
                    <div class="row-1">
                    <div class="">
                        <label for="total">Kembalian</label>
                        <input type="text" name="totalkembalian" id="totalkembalian">
                    </div>
                    <div class="">
                    <button id="simpan" class="transkasi-btn">Simpan Transaksi</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-2">
                <?php require_once "element/footer.php" ?>
        </div>
       <script>
//ini adalah variable yang diambil dari id="" pada html diatas lalu dimasukan ke dalam variable agar dijadikan fungsi
            const jumlahbtn = document.getElementById("total"); 
            const jumlahbrg = document.querySelector(".total");
            const hargabrg = document.querySelector("#harga");
            const bayarbrg = document.getElementById("pembayaran");
            const pelembut = document.getElementById("pelembut");
            const kembalianBtn = document.getElementById("kembalian");
            const totalkembalian = document.getElementById("totalkembalian");
            const simpanBtn = document.getElementById("simpan");

            let total;
     
        jumlahbtn.addEventListener("mousedown",() => { //menambahkan event pada button ber id="total"
            if (pelembut.checked){ //jika pelembut di check
                    total = parseInt(hargabrg.value) + parseInt(pelembut.value); //maka harga dari paket tersebut ditambahkan dengan harga pelembut
            } else { //jika tidak
                    total = parseInt(hargabrg.value); //harga barang tidak ditambahkan dengan harga apapun
            }
            jumlahbrg.value = total; //value dari jumlah barang adalah total dari perhitungan diatas
            return total; //mengembalikan nilai total
            });
     
        kembalianBtn.addEventListener("mousedown",() => { //membuat fungsi pada button kembalian
                totalkembalian.value = parseInt(bayarbrg.value) - parseInt(total) ; //total kembalian diambil dari semua dari total harga barang dengan pelembut maupun tidak lalu dikurangi dengan uang costomer
        });

        simpanBtn.addEventListener("mousedown",() => { //membuat fungsi pada button simpan
            alert('Data Berhasil Disimpan'); //jika tombol dipencet maka akan mengelurakan pop up ini
            window.location.href = "home.php"; //lalu user akan dikembalikan ke halaman admin
            });
     </script>
</body>
</html>