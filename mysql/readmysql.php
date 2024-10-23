<?php
include "config.php";
// if(empty($_SESSION['username'])){
//     header('location:loginmysql.php');
// }

            
$data = $koneksi->query("SELECT * FROM data_barang");
$data_barang = $data->fetch_all(MYSQLI_ASSOC);

$i = 1;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .table{
            margin: auto;
            margin-top: 30px;
            border-spacing: 0px;
            border-collapse: collapse; /* Menghilangkan spasi antara sel */
            /* width: 100%; Opsional, jika ingin tabel mengisi lebar kontainer */
        }
        th, td {
            border: none; /* Menghilangkan border */
            padding: 10px; /* Padding untuk sel */
        }
        th{
            background-color: skyblue;
            color: white;
            padding: 12px;
        }
        td{
            padding: 10px;
        }
        .option {
            justify-content: space-between; /* Mengatur jarak antara tautan */
        }
        .option a {
            margin-right: 50px; /* Atur jarak antara tautan */
        }
        /* PEWARNAAN BARIS GANJIL */
        tr:nth-child(even){ 
        background-color: #e4e4e4;
        }
        /* PEWARNAAN BARIS GENAP */
        tr:nth-child(odd){
            background-color: white;
        }
        .background {
            background-image: url('./sky.jpg');
            background-size: cover;
            background-position: center;
            position: absolute;
            top: 0;
            width: 100vw;
            height: 100vh;
            z-index: -1;
            background-repeat: no-repeat;
        }
        body {
            margin: 0;
            height: 100%;
            font-family: Arial, sans-serif;
        }
        h2{
            color: white;
            margin-left: 346px;
        }
        .button a{
            color: white;
            margin-left: 346px;
        }
    </style>
</head>
<body>
<div class="background"></div> <!-- Menambahkan div untuk background -->
    <div class="button">
        <a href="logoutmysql.php" class="logout">Logout</a><br><br>
        <a href="createmysql.php" class="tambah">+Add New Data</a>
    </div>
    <h2>Stock Opname</h2>
    <center>
        <table border="1">
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($data_barang as $dtb){?>
            <tr>
                <td><?=$i++?></td>
                <td><?=$dtb['Kode']?></td>
                <td><?=$dtb['Nama']?></td>
                <td><?=$dtb['Harga']?></td>
                <td><?=$dtb['Stok']?></td>     
                <td class="option">
                    <a href="updatemysql.php?kode=<?= $dtb['Kode'] ?>">Edit</a>
                    <a href="deletemysql.php?kode=<?= $dtb['Kode'] ?>">Delete</a>
                    <!-- </button> -->
                </td>
            </tr>
        <?php } ?>
        </table>
        </center>
</body>
</html>
