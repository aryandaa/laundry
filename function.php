<?php 
//login function
function login() {
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = "userlsp"; //dummy untuk username
    $password = "smkn2bjm"; //dummy untuk password

    $enterUs = $_POST["username"]; //variable untuk mengambil username yang dimasukan di input name "username"
    $enterPass = $_POST["password"];//variable untuk mengambil password yang dimasukan di input name "password"

if($enterUs == $username && $enterPass == $password) { //jika input username dan password sama seperti variable $username dan $password
    $auth = $_SESSION["auth"] = "$username";
    setcookie("auth", $auth);
    header("location: home.php"); //maka akan dipindahkan ke halaman home.php
    exit(); 
} else { //dan jika username dan password yang dimasukan tidak sama
    echo'<p style="color:red;">username dan password anda salah</p>'; //maka akan ditampilkan tulisan ini
}}}
//end login function

//home function

$datapaket = array (
    array("Paket A", "cuci kering biasa",40000),
    array("Paket B", "Cuci kering dan lipat",45000),
    array("Paket C", "Cuci kering, setrika, dan lipat",50000),
    array("Paket D", "Cuci kering, setrika, pengharum,lipat",55000)
   );
//end home function

function logout() {
    echo "<script>alert('s')</script>";
    session_start();
    setcookie("auth", "", 100);
    session_unset();
    session_destroy();

    header("Location: " . "index
    .php");
}
?>