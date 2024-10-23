<?php
$host = "localhost";
$database = "stok_barang";
$username = "root";
$password = "";

$koneksi = new mysqli($host, $username, $password, $database);

if (!$koneksi){
    echo "Failed connected to Database";
}else{
    echo "Database is Connected";
}
?>