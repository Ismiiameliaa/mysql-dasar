<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "data_karyawan";

$koneksi = new mysqli($host,$user,$pass,$dbname);

if($koneksi->connect_error){
    die("Koneksi Gagal". $koneksi->connect_error);
}echo "Koneksi Berhasil";

// perintah penting untuk koneksi data $koneksi-query
$data = $koneksi->query("SELECT * FROM staff");

// contoh saja dalam mengubah data dalam database menjadi array asosiatif
$data_karyawan = $data->fetch_all(MYSQLI_ASSOC);
// mencetak
// var_dump($data_karyawan);

$id = 1;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Data Karyawan</h2>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Gaji</th>
            <!-- apabila tunjangan, bonus, dll tidak perlu dibuat dalam database karena sistem php dapat menghitung secara otomatis. tambahkan saja tabelnya di php -->
            <th>Tunjangan</th>
            <th>Total Penghasilan</th>
            <th>Tanggal Masuk</th>
        </tr>
        <?php foreach($data_karyawan as $dk){?>
            <tr>
            <td><?=$id++?></td>
            <td><?=$dk['nama']?></td>
            <td><?=$dk['jabatan']?></td>
            <!-- ,0 pemisah desimal , . pemisah angka -->
            <td><?="Rp. ".number_format($dk['gaji'],0,',','.')?></td>
            <!-- 1 = 100%, 1.2 = 120% format Rp sama di atas + *1.2-->
            <td><?=$dk['gaji']*1.2?></td>
            <td><?=$dk['gaji']*1.2+$dk['gaji']?></td>
            <td><?=$dk['tgl_masuk']?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
