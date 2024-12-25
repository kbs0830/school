<?php
include 'includes/db.php';
include 'includes/header.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// 顯示會員資料
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// 顯示歷史訂單
$sql = "SELECT * FROM orders WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$orders = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員資料 - Bread</title>
    <!-- 引入 Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<main class="container mt-4">
    <h1>會員資料</h1>
    <p>使用者名稱: <?php echo htmlspecialchars($user['username']); ?></p>

    <h2>歷史訂單</h2>
    <?php while($order = $orders->fetch_assoc()): ?>
        <h3>訂單編號: <?php echo htmlspecialchars($order['id']); ?></h3>
        <p>總價: <?php echo htmlspecialchars($order['total']); ?> 元</p>
        <ul>
            <?php
            $order_id = $order['id'];
            $sql = "SELECT p.title, oi.quantity, p.price 
                    FROM order_items oi 
                    JOIN products p ON oi.product_id = p.id 
                    WHERE oi.order_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $order_id);
            $stmt->execute();
            $items = $stmt->get_result();
            while($item = $items->fetch_assoc()):
            ?>
                <li>
                    <?php echo htmlspecialchars($item['title']); ?> - 
                    數量: <?php echo htmlspecialchars($item['quantity']); ?> 件 - 
                    價格: <?php echo htmlspecialchars($item['price'] * $item['quantity']); ?> 元
                </li>
            <?php endwhile; ?>
        </ul>
    <?php endwhile; ?>
</main>

<?php include 'includes/footer.php'; ?>

<!-- 引入 Bootstrap JS 和依賴的 Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

