<?php
session_start(); // 確保這裡是唯一調用 session_start() 的地方
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bread - 西點購物網站</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">首頁</a></li>
                <li><a href="products.php">產品頁面</a></li>
                <li><a href="cart.php">購物車</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <!-- <li><a href="checkout.php">結帳</a></li> -->
                    <li><a href="profile.php">會員資料</a></li>
                    
                    <li><a href="logout.php">登出</a></li>
                <?php else: ?>
                    <li><a href="register.php">註冊</a></li>
                    <li><a href="login.php">登入</a></li>
                <?php endif; ?>
                <li><a href="contact.php">聯絡我們</a></li>
            </ul>
        </nav>
    </header>
