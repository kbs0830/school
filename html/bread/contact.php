<?php
include 'includes/db.php';
include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>聯絡我們 - Bread</title>
    <!-- 引入 Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<main class="container mt-4">
    <h1 class="mb-4">聯絡我們</h1>
    <div class="row">
        <div class="col-md-12">
            <h2>聯絡資訊</h2>
            <p>地址: 高雄科技大學燕巢校區</p>
            <p>高雄市燕巢區高科路415號</p>
            <h3>地圖位置</h3>
            <div class="map-container mb-4">
                <iframe
                    title="Google Maps"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2685.8531671223285!2d120.30657931524218!3d22.743574847047743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3460d22b15b3e295%3A0x84d5d295c67d68a5!2sNational%20Kaohsiung%20University%20of%20Science%20and%20Technology%2C%20Yanchao%20Campus!5e0!3m2!1sen!2stw!4v1692545632113!5m2!1sen!2stw"
                    width="600"
                    height="450"
                    style="border: 0;"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</main>

<!-- 引入 Bootstrap JS 和依賴的 Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php include 'includes/footer.php'; ?>
</body>
</html>
