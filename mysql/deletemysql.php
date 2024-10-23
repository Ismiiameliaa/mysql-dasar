<?php
include "config.php";
$kode = $_GET['kode'];

$data = $koneksi->query("DELETE FROM data_barang WHERE kode = '$kode'");

header('location:readmysql.php');
echo "Deleted Successfully";
?>