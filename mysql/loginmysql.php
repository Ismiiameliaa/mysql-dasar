<?php
// session_start();
// if(!empty($_SESSION['username'])){
//     header('location:readmysql.php');
//     exit();
// }
include "config.php";

$data = $koneksi->query("SELECT * FROM tb_user");
$akun= $data->fetch_all(MYSQLI_ASSOC);

$kondisi = 0; 
if(isset($_POST['submit'])){
    $kondisi = 1;
    foreach ($akun as $akn){
        if($akn['username']==$_POST['username']&&$akn['password']==$_POST['password']){
            header('location:readmysql.php');
            
            $_SESSION['username']=$akn['username'];
        }else{
            $kondisi = 2;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .form-box{
            width: 30%;
            border: 1px solid transparent;
            margin: auto;
            margin-top: 100px;
            padding: 30px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            /* height: 100%; */
            background: transparent;
            backdrop-filter: blur(10px);
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            color: navy;
        }
        .form-box h2{
            font-size: 32px;
            text-align: center;
            color: navy;
        }
        .form-box .input-box{
            width: 340px;
            height: 50px;
            margin: 30px 0;
            border-bottom: 1px solid #e4e4e4;
            position: relative;
        }
        .input-box input{
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            font-size: 16px;
            color: navy;
            font-weight: 500;
            padding-right: 28px;
        }
        .input-box .icon{
            position: absolute;
            right: 0;
            top: 13px;
            font-size: 19px;
        }
        .input-box label{
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            font-size: 16px;
            font-weight: 500;
            pointer-events: none;
            transition: .5s ease;
        }
        button{
            margin-top: 20px;
            height: 30px;
            width: 40%;
            border-radius: 10px;
            background-color: pink;
        }
        .btn{
            width: 100%;
            height: 45px;
            background: gold;
            border: none;
            outline: none;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .5);
            cursor: pointer;
            font-size: 16px;
            color: navy;
            font-weight: 600;
            /* position: relative; */
        }
        .input-box i{
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            /* pointer-events: none; */
            /* transition: .5s; */
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
    </style>
</head>
<body>
<div class="background"></div>
    <div class="form-box">
    <form action="" method="post">
        <h2>Log in</h2>
        <div class="input-box">
            <span class="icon"><i class='bx bxs-user'></i></span>
            <input type="username" name="username" placeholder="Username" required>
        </div>
        <div class="input-box">
            <span class="icon"><i class='bx bxs-lock-alt'></i></span>
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" name="submit" class="btn">Login</button>
    <?php if($kondisi==2) { ?>
        <script>alert("Username/Password is Incorrect!")</script>
    <?php } ?>
    </form>
</body>
</html>
